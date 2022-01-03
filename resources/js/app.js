const { default: axios } = require('axios');

require('./bootstrap');

document.getElementById('').addEventListener('click',(event)=>{

    event.preventDefault();

    const requestBody = {
        amount:document.getElementById('amount'),value,
        phone:document.getElementById('phone'),value,
        
    }

    axios.post('stkpush',requestBody).then((response) =>{
        if(response.data.ResponseDescription){
       
        }
        else{

        }
    }).catch((error) => {
        console.log(error);
    })
})