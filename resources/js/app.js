const { default: axios } = require('axios');

require('./bootstrap');


       

/* document.getElementById('makePayment').addEventListener('click',(event)=>{

    event.preventDefault();
    
    const requestBody = {
        amount:document.getElementById('amount').value,
        phone:document.getElementById('phone').value,
        
        
    }
    
    axios.post('/customerMpesaSTKPush',requestBody, { headers: { 
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': token.content,
        'X-Requested-With': 'XMLHttpRequest',}
    })
    .then((response) =>{
        if(response.data.ResponseDescription){
       console.log(response.data);
        }
        else{
    
        }
    }).catch((error) => {
        console.log(error);
    })
    })  */