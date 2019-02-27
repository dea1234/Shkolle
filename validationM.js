var errors;
//username validation
    function usernameValidation()
{
    var username = document.getElementById('username').value;


    if(!username.match((/^[a-zA-Z].*[\s\.]*$/g)))
        {
           
            document.getElementById('usernameError').innerHTML="* It can contain only letters";
            document.getElementById('usernameError').style.color='black';
            return false;
        }
    
    else
     {
            document.getElementById('usernameError').innerHTML="Valid";
            document.getElementById('usernameError').style.color='black';
            
     }
    
}

//FUNCTION VALIDATIONS

	function emailValidation()
{
    var email = document.getElementById('email').value;  

      
    if(email==''){
            document.getElementById('emailError').innerHTML="* Email Field cannot be empty";
            document.getElementById('emailError').style.color='black';
            return false;
    } 
        
            else
    if(!email.match(/^[a-zA-Z0-9._]+@[a-zA-Z0-9]+\.(com|org|in|gov|info|yahoo|live|)$/))
        {
            document.getElementById('emailError').innerHTML="* Invalid Email! Your email needs to be like someone@email.com ";
            document.getElementById('emailError').style.color='black';
            return false;
        }else{  
                $.ajax({
                
                    url: "checkdata.php",
                    method: "POST",
                    data: {email: email},
                    success: function (response) {
                        response = response.trim();
                        if(response == "Yes" ){ 

                               document.getElementById('emailError').innerHTML="* Email already exists in our database";
                               document.getElementById('emailError').style.color='black';
                              errors=true;
                              $('#mainForm').attr('onsubmit', 'return false');
                        }else{
                               document.getElementById('emailError').innerHTML="Valid";
                               document.getElementById('emailError').style.color='black';
                               errors=false;

                               $('#mainForm').attr('onsubmit', 'return true');
                            
                        }

                    }

                });
              


        }

}

//PASSWORD VALIDATION
function passValidation()
{
     var pass = document.getElementById('password').value;
     
    if(pass=='')
        {
            document.getElementById('passError').innerHTML='* Password cannot be empty';
            document.getElementById('passError').style.color='black';
            return false;
        }
    if(!pass.match(/[a-z]/g)){
        document.getElementById('passError').innerHTML='* LowerCase Character missing';
        document.getElementById('passError').style.color='black';
        return false;
    }
    if(!pass.match(/[A-Z]/g)){
        document.getElementById('passError').innerHTML='* UpperCase Character missing';
        document.getElementById('passError').style.color='black';
        return false;
    }
    if(!pass.match(/[0-9]/g)){
        document.getElementById('passError').innerHTML='* Numeric Character missing';
        document.getElementById('passError').style.color='black';
        return false;
    }
    

    else if(pass.length<8)
    {
        document.getElementById('passError').innerHTML='* Password must be 8 character long';
        document.getElementById('passError').style.color='black';
        return false;
    }
    else{
        document.getElementById('passError').innerHTML='Valid';
        document.getElementById('passError').style.color='black';
       
    }
    
}

function bioValidation(){
    var bio = document.getElementById('bio').value;
     
    if(bio=='')
        {
            document.getElementById('bioError').innerHTML='*Bio cannot be empty';
            document.getElementById('bioError').style.color='black';
            return false; 
        }
        else
         {
            document.getElementById('bioError').innerHTML='Valid';
            document.getElementById('bioError').style.color='black';
         }

}


//FORM VALIDATION
 


function validateFormM()
{
       
    if(usernameValidation()==false || errors==false || passValidation()==false || bioValidation()==false ||  emailValidation()==false )
        {   
            
           alert("Please check your information again");            
          return false;
        }
    else{
       
        return true;
    }
    
   
} 


