<!DOCTYPE html>
<html lang="en">
    <head><meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="chore icon.png">
        <title>Ashesi Judicial Management System</title>
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

                    <h1>Registration</h1>
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
                        <label for="firstname">Firstname</label>
                    <input name="firstname" type="text"  required id="firstname">
                    </div>
                    <div class="input-field">
                        <label for="lastname">Lastname</label>
                    <input name="lastname" type="text"  required id="lastname">
                    </div>
                    </div>


                    

                    
                


                    


                    <div class="input-box">
                        <div class="input-field">
                        <label for="phone">Phone Number:</label>
                        <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" required>

                        </div>

                    <div class="input-field">
                        <label for="email">Email:</label>
                        <input name="email" type="text"  required id="email">
                        </div>

                    </div>


                    <div class = "input-box">
                    <div class="input-field">
                        <label for="psw">Password</label>                    
                        <input name = "psw" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required
                 id="psw">
                    </div>

                    <div class="input-field">
                    <label for="psw2" >Confirm Password</label>
                    <input type="password" name="psw2" 
                    id="psw2" required>
                    </div>
                    </div>


                    <label class="confirmation" value=1><input type="checkbox" name= "confirmation" id="confirmation">I hereby declare that the above 
                    information is true and correct</label>

                        <div>
                    <button name="register" type="submit" id="#register">Register</button>
                        </div>

                    <div class="Login">
                        <p>You can now <a href="../login/Login_view.php">Log in</a></p>
                    </div>
                </form>

                </div>


                


                       
    </body>
</html>