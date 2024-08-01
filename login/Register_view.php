<!DOCTYPE html>
<html lang="en">
    <head><meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="chore icon.png">
        <title>AJMS</title>
        <link rel="stylesheet" href="../css/registration.css">
        
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>


        <script>
$(document).ready(function() {
    // Attach a click event handler to the register button
    $("#register").click(function() {
        // Validate the form using the validation function
        // Prevent the form from submitting normally
        e.preventDefault();
        if (validation()) {
            // Serialize the form data
            var formData = $("#registration").serialize();

            // Make an AJAX request
            $.ajax({
                type: "POST",
                url: "../actions/register_user_action.php",
                data: formData,
                success: function(response) {
                    // Display the response from the server
                    $("#result").html(response);
                },
                error: function(error) {
                    // Handle errors if any
                    console.log(error);
                }
            });
        }
    });
});

function validation() {
    const isValidEmail = email => {
        const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(email).toLowerCase());
    }

    if (document.registration.email.value === "") {
        document.getElementById("result").innerHTML = "Please enter your email";
        return false;
    } else if (!isValidEmail(document.registration.email.value)) {
        document.getElementById("result").innerHTML = "Please enter a valid email";
        return false;
    } else if (document.registration.psw.value === "") {
        document.getElementById("result").innerHTML = "Please enter your password";
        return false;
    } else if (document.registration.psw.value.trim() !== document.registration.psw2.value.trim()) {
        document.getElementById("result").innerHTML = "Passwords do not match";
        return false;
    }
}
</script>



        
    </head>


    <body>
                               
            
           <div class="container">
                <!--Form to be filled for registration-->
                <div id="error"></div>
                <form action="../actions/register_user_action.php" method="POST" class="Signup" id="registration"  name="registration" onsubmit="return validation()">

                    <h1 style="color: rgb(146, 61, 65);">Registration</h1>
                    <?php
                    if (!empty($errors)) {
    echo "<ul>";
    foreach ($errors as $error) {
        echo "<li>$error</li>";
    }
    echo "</ul>";
}

    ?>

                    <p id="result"></p>

                    <div class="input-box">
                       <div class="input-field">
                        <label for="firstname"style="color: rgb(146, 61, 65);">Firstname</label>
                    <input style="background-color: rgb(146, 61, 65);" name="firstname" type="text"  required id="firstname" style="color: rgb(146, 61, 65);">
                    </div>
                    <div class="input-field">
                        <label for="lastname" style="color: rgb(146, 61, 65);">Lastname</label>
                    <input style="background-color: rgb(146, 61, 65);" name="lastname" type="text"  required id="lastname">
                    </div>
                    </div>


                    

                    
                


                    


                    <div class="input-box">
                    
                    <div class="input-field">
                        <label style="color: rgb(146, 61, 65);" for="role">Select role</label> 
                        <select name="role" id="role"> 
                        <option value="0">Select</option> 
                         

                        <?php
                        include "../functions/select_role.php";


                        //Looping through the roles to builg the options
                        foreach ($roles as $role) {
                            echo '<option value="' . $role['role_id'] . '">' . $role['role_name'] . '</option>';
                        }
                     ?>
                        </select>
                    </div>

                    <div class="input-field">
                        <label for="email" style="color: rgb(146, 61, 65);">Email:</label>
                        <input style="background-color: rgb(146, 61, 65);" name="email" type="text"  required id="email">
                        </div>

                    </div>


                    <div class = "input-box">
                    <div class="input-field">
                        <label for="psw" style="color: rgb(146, 61, 65);">Password</label>                    
                        <input style="background-color: rgb(146, 61, 65);" name = "psw" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required
                 id="psw">
                    </div>

                    <div class="input-field">
                    <label for="psw2" style="color: rgb(146, 61, 65);" >Confirm Password</label>
                    <input style="background-color: rgb(146, 61, 65);" type="password" name="psw2" 
                    id="psw2" required>
                    </div>
                    </div>


                    <label class="confirmation" value=1><input type="checkbox" name= "confirmation" id="confirmation"style="color: rgb(146, 61, 65);">I hereby declare that the above 
                    information is true and correct</label>

                        <div>
                    <button name="register" type="submit" id="#register"style="color: rgb(146, 61, 65);">Register</button>
                        </div>

                    <div class="Login">
                        <p>You can now <a href="../login/Login_view.php"style="color: rgb(146, 61, 65);">Log in</a></p>
                    </div>
                </form>

                </div>


                


                       
    </body>
</html>