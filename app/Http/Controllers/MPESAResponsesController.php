<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class MPESAResponsesController extends Controller
{
    //
    public function validation(Request $request){
        Log::info('Validation endpoint hit');
        Log::info($request->all());

        return [
            'ResultCode' => 0,
            'ResultDesc' => 'Accept Service',
            'ThirdPartyTransID' => rand(3000, 10000)
        ];
    }


    public function stkPush(Request $request) {
        try {
            Log::info('STK Push endpoint hit');
            Log::info($request->all());

            return [
                'ResultCode' => 0,
                'ResultDesc' => 'Accept Service',
                'ThirdPartyTransID' => rand(3000, 10000)
            ];
            
            // $MerchantRequestID  = $body[0]['Body']['stkCallback']['MerchantRequestID'];
            // $Amount  = $body[0]['Body']['stkCallback']['CallbackMetadata']['Item'][0]['Value'];
            // $MpesaReceiptNumber  = $body[0]['Body']['stkCallback']['CallbackMetadata']['Item'][1]['Value'];
            // $TransactionDate  = $body[0]['Body']['stkCallback']['CallbackMetadata']['Item'][3]['Value'];
            // $PhoneNumber  = $body[0]['Body']['stkCallback']['CallbackMetadata']['Item'][4]['Value'];
            
        } catch (Throwable $th) {
            Log::info('Mpesa Error:');
            Log::error($th);
        }
    }


    public function b2cCallback(Request $request){
        Log::info('B2C endpoint hit');
        Log::info($request->all());
        return [
            'ResultCode' => 0,
            'ResultDesc' => 'Accept Service',
            'ThirdPartyTransID' => rand(3000, 10000)
        ];
    }
    
    public function b2ctimeout(Request $request){
        Log::info('B2C endpoint hit (Timeout)');
        Log::info($request->all());
        return [
            'ResultCode' => 0,
            'ResultDesc' => 'Accept Service',
            'ThirdPartyTransID' => rand(3000, 10000)
        ];
    }

    public function transactionStatusResponse(Request $request){
        Log::info('transactionStatusResponse endpoint hit');
        Log::info($request->all());
        return [
            'ResultCode' => 0,
            'ResultDesc' => 'Accept Service',
            'ThirdPartyTransID' => rand(3000, 10000)
        ];
    }

    public function transactionReversal(Request $request){
        Log::info('transactionReversal  endpoint hit');
        Log::info($request->all());
        return [
            'ResultCode' => 0,
            'ResultDesc' => 'Accept Service',
            'ThirdPartyTransID' => rand(3000, 10000)
        ];
    }


    public function confirmation(Request $request){
        Log::info('Confirmation endpoint hit');
        Log::info($request->all());

        return [
            'ResultCode' => 0,
            'ResultDesc' => 'Accept Service',
            'ThirdPartyTransID' => rand(3000, 10000)
        ];
    }


    //Deposit
    public function PostDeposit($status,$transaction_id,$user_id){
        //Phase 2: After Payment Completed

        //Handle Success | Failure
        if ($status == 'fail') {

            //delete Deposit record
            Deposit::where('transaction_id', $transaction_id)->delete();

            //delete Transaction record
            Transaction::where('id', $transaction_id)->delete();


        }else if ($status ='success'){
            // Get User Details
            $user = User::where('id', $user_id)->first();

            //Get transaction details
            $transaction = Transaction::where('id',$transaction_id)->first();    
            
            // 1. Update Transaction status & Investment balance
            if($user->currency == $transaction->currency){
                // echo "Direct Add";
                $user->investment_balance = ($user->investment_balance) + ($transaction->amount);
            }else{
                // echo "Convert to add";
                $user->investment_balance = ($user->investment_balance) + ($this->ConvertCurrency($transaction->amount,$user->currency));
            }

            $user->save();

            // 2. Update Transaction Status
            $transaction = Transaction::where('id',$transaction_id)->first();
            $transaction->status='completed'; 
            $transaction->save();

            if($user->subscription =='standard'){
                $user->subscription = 'premium';
                $user->save();
                // echo "\n User now Premium";  
            }
            
            //3. Credit Promoters up to level 3
            $this->GeneratePromotionBonuses($user_id,$transaction->currency,$transaction->amount);
         
        }   
    }

    //Investment
    public function PostPayment($status,$transaction_id,$user_id){
        //Phase 2: After Payment Completed
        $user = User::where('id', $user_id)->first();

        //Handle Success | Failure
        if ($status == 'fail') {

            //delete Investment record
            Investment::where('transaction_id', $transaction_id)->delete();

            //delete Transaction record
            Transaction::where('id', $transaction_id)->delete();

            //route to upgrade page

        }else if ($status ='success'){

            //Get transaction details
            $transaction = Transaction::where('id',$transaction_id)->first();            

            //Get Investment details
            $investment = Investment::where('transaction_id', $transaction_id)->first();

            //1. Update Transaction status & Investment balance
            if($user->currency == $transaction->currency){
                // echo "Direct Add";
                $user->investment_balance = ($user->investment_balance) + ($transaction->amount);
            }else{
                // echo "Convert to add";
                $user->investment_balance = ($user->investment_balance) + ($this->ConvertCurrency($transaction->amount,$user->currency));
            }

            $user->save();

            $transaction->status = 'completed';
            $transaction->save();
            
            // echo "<br> Transaction uus updated";

            //2. Update Subscription [standard to premium]

            if($user->subscription =='standard'){
                $user->subscription = 'premium';
                $user->save();
                // echo "\n User now Premium";  
            }

            //3. Credit Promoters up to level 3
            $this->GeneratePromotionBonuses($user_id,$transaction->currency,$transaction->amount);
          
        }
    }

    public function GeneratePromotionBonuses($user_id,$currency,$amount){

        $user = User::where('id', $user_id)->first();

        // Check if Auth::User was invited 
        $LV1_Promoter = false;
        $LV2_Promoter = false;
        $LV3_Promoter = false;
        
        if(!is_null($user->invited_by)){
            $LV1_Promoter = true;
        }

        // Credit Level 1 if qualified
        if($LV1_Promoter == true){
            //Get User
            $LV1_Promoter = User::where('id',$user->invited_by)->first();
            
            //Check if promoter / Investor then Credit Level 1
            if($LV1_Promoter->is_promoter == $user->is_promoter && $user->is_promoter == 1){
                // Credit
                $newamount = $amount * 0.3;
                $this->CreatePromotionBonus($user_id,$LV1_Promoter->id,$newamount,$currency,1);
            }else{
                // Credit
                $newamount = $amount * 0.1;
                $this->CreatePromotionBonus($user_id,$LV1_Promoter->id,$newamount,$currency,1);
            }
        }

        // Credit Level 2 if qualified
        if(!($LV1_Promoter == false)){
            if((!is_null($LV1_Promoter->invited_by))){
                // Get User
                $LV2_Promoter = User::where('id',$LV1_Promoter->invited_by)->first();
                // Credit Promoter
                $newamount = $amount * 0.1;
                $this->CreatePromotionBonus($user_id,$LV2_Promoter->id,$newamount,$currency,2);
            }
        }
        
        if(!($LV2_Promoter == false)){
            // Credit Level 3
            if(!is_null($LV2_Promoter->invited_by)){
                //Get User
                $LV3_Promoter = User::where('id',$LV2_Promoter->invited_by)->first();
                // Credit
                $newamount = $amount * 0.05;
                $this->CreatePromotionBonus($user_id,$LV3_Promoter->id,$newamount,$currency,3);
            }
        }

    }

    public function CreatePromotionBonus($user_id,$inviter_id,$amount,$currency,$level){
        //Get Details
        $user = User::where('id', $user_id)->first();
        $Inviter = User::where('id',$inviter_id)->first();
       
        //Convert amount to same currency as the Promoter 
        if(!($Inviter->currency == $currency)){
            $amount = $this->ConvertCurrency($amount,$Inviter->currency);
            $currency = $Inviter->currency;
        }

        // echo ("<br> Inviter->currency : ".$Inviter->currency);
        // echo ("<br> Amount".$amount);
        // echo ("<br> Current Currency : ".$currency);
        

        //Add record to DB
        $PromotionBonus = PromotionBonus::create([
            'amount' => $amount, 
            'currency' => $currency,
            'level' => $level,
            'inviter_id' => $Inviter->id,
            'user_id' => $user->id,
        ]);
        
        if($PromotionBonus->wasRecentlyCreated === true){
            echo('Created Promotion');
        }else{            
            echo('Failed to Create Promotion');
        }

        // Update Inviter's Promotion Balance
        if($Inviter->subscription =='premium'){
            if($Inviter->currency == $currency){
                // echo "Direct Add";
                $Inviter->promotion_bonus_balance = ($Inviter->promotion_bonus_balance) + ($amount);
                $Inviter->wallet_balance = ($Inviter->wallet_balance) + ($amount);
    
            }else{
                // echo "Convert to add";
                $Inviter->promotion_bonus_balance = ($Inviter->promotion_bonus_balance) + ($this->ConvertCurrency($amount,$Inviter->currency));
                $Inviter->wallet_balance = ($Inviter->wallet_balance) + ($this->ConvertCurrency($amount,$user->currency));
             }
    
            $Inviter->save();
        }         
    }

    public function ConvertCurrency($amount,$to_currency){
        if($to_currency =='usd'){
            // USD --> KES
            // echo "Converting KES to USD";
            return ($amount / 104);

        }else if($to_currency =='kes'){
            // KES --> USD 
            // echo "Converting USD to KES";

            return ($amount * 104);            
        }
    }
}