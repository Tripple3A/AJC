
<!DOCTYPE html>
<html lang="en">
    <head><meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="chore icon.png">
        <title>Chore Management System</title>
        <link rel="stylesheet" href="../css/login.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>


    <body>

       
                         
            
            
           <div class="wrapper">
            <div class="toggle-left">
            <div class="form">
                <!--Form to be filled when sign in is clicked-->
                <form action="../actions/login_user_action.php" method="POST" id="LoginForm" name="Form" onsubmit="return validation()">
                    <h2>AJC MS</h2>
                    <p>Justice Made Simple and Accessible!!</p>
                    <p id="result">head</p>
                    <div class=" input">
                    <input name="email" type="text" placeholder="Email" required id="Email">
                    <i class='bx bx-user'></i>
                    </div>
                    <div class="input">
                    <input name = "psw" type="password" 
                    placeholder="Password" 
                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number 
                    and one uppercase and lowercase letter, and at least 8 or more characters" required
                 id="Password">
                 <i class='bx bx-lock'></i>
                    </div>

                    <div class="remember-forgot">
                        <label><input type="checkbox">Remember me</label>
                        <a href="#">Forgot password?</a>

                    </div>

                    <button name = 'login' type="submit" class="Login">Login</button>

                    <div class="register">
                        <p>Don't have an account?<a href="../login/Register_view.php">Register</a></p>
                    </div>
                </form>

                </div>
                </div>

                <div class="toggle-right">
                    
                    <img src="../images/scales.png" width="400" height="200">

                </div>


                </div>

         
                

                
              <!--The validation code-->  
                
               <script>    
              function validation(){

                    const isValidEmail = email => {
            const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(String(email).toLowerCase());
            }

            
                    

                    if(document.Form.email.value===""){
                        document.getElementById("result").innerHTML="Please enter your email";
                        return false;
                    }


                    else if (!isValidEmail(document.Form.email.value)){
                        document.getElementById("result").innerHTML="Please enter a valid email";
                        return false;

                    }


                    else if(document.Form.psw.value==""){
                        document.getElementById("result").innerHTML="Please enter your password";
                        return false;
                    }


                    

                
            }
            

               </script>

            


    </body>
</html>