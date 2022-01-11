<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\PostsImage;

class PostController extends Controller
{
    //
    public function addPostSave(Request $request, Posts $post){
        try{
        $request->validate([
           
            'title'=>'required',
            'post'=>'required',
            'filename'=>'required',
          
]);

        $post= new Posts;
        $post->title = $request->title;
        $post->post = $request->post;
        $save= $post->save();

        $postimage= new PostsImage;
        $postimage->filename =$request->filename;
       
        if($request->hasfile('filename')){
            $images=$request->file('filename');
           /*  $name = $request->input('name'); */
        
        
            foreach($images as $image){
                
                $name=$image->getClientOriginalName();
                $path=$image->move(public_path().'/storage/img/blog/', $name);
              
                $postid = $post->id;
                             
                PostsImage::create([
                    'filename'=>$name,
                  
                    'posts_id'=>$postid
                    
                ]);

            }
            
        }
        return back()->with('success','Post added successfully');
 
    }
    catch(\Exception $e){
        return back()->with('fail','Something went wrong, try again');
    }

    }
    public function deletepost($id){
        $findPost = Posts::find($id);
        $findPost->delete();
        return back()->with('success','Post Deleted successfully');

   
    }
    public function updatepost(Request $request, $id){
        $findPost = Posts::find($id);
        $findPost->update( $request->except(['_token', '_method' ]));
        return back()->with('success-post','Post updated successfuly');

    }
    public function deletepostimage($id){
        $findPost = Posts::find($id)->where('news_post_id', '=', $id);
        $findPost->delete();
        return back()->with('success','Post images Deleted successfuly');
    }
    public function addpostimage(Request $request, $id){
        try{
            $request->validate([
                'filename'=>'required',
                
              
    ]);
    
        
            $postimage= new PostsImage;
            $postimage->filename =$request->filename;
           
            if($request->hasfile('filename')){
                $images=$request->file('filename');
                $name = $request->input('name');
            
            
                foreach($images as $image){
                    $name=$image->getClientOriginalName();
                    $path=$image->move(public_path().'/storage/img/blog/', $name);
                    $postid = $id;
                                 
                    PostsImage::create([
                        'filename'=>$name,
                        'posts_id'=> $postid
                    ]);
    
                }
                
            }
            return back()->with('success','Image added successfully');
     
        }
        catch(\Throwable $th){
            throw $th;
            return back()->with('fail','Something went wrong, try again');
        }
    
        }
    
}
