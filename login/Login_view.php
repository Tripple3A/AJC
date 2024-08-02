<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="chore icon.png">
    <title>AJMS</title>
    <link rel="stylesheet" href="../css/login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="wrapper">
        <div class="toggle-left">
            <div class="form">
                <!-- Form to be filled when sign in is clicked -->
                <form action="../actions/login_user_action.php" method="POST" id="LoginForm" name="Form" onsubmit="return validation()">
                    <h2 style="color: rgb(146, 61, 65);">AJC MS</h2>
                    <p style="color: rgb(146, 61, 65);">Justice Made Simple and Accessible!!</p>
                    <p id="result" style="color: rgb(146, 61, 65);">
                        <?php
                        // Display error messages from the session
                        session_start();
                        if (isset($_SESSION['errors'])) {
                            foreach ($_SESSION['errors'] as $error) {
                                echo "<p>$error</p>";
                            }
                            // Clear errors after displaying
                            unset($_SESSION['errors']);
                        }
                        ?>
                    </p>
                    <div class="input" style="color: rgb(146, 61, 65);">
                        <input style="color: rgb(146, 61, 65);" name="email" type="text" placeholder="Email" required id="Email">
                        <i class='bx bx-user'></i>
                    </div>
                    <div class="input">
                        <input name="psw" type="password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required id="Password">
                        <i class='bx bx-lock'></i>
                    </div>
                    <div class="remember-forgot">
                        <label><input style="color: rgb(146, 61, 65);" type="checkbox">Remember me</label>
                        <a style="color: rgb(146, 61, 65);" href="#">Forgot password?</a>
                    </div>
                    <button name="login" type="submit" class="Login" style="color: rgb(146, 61, 65);">Login</button>
                    <div class="register">
                        <p style="color: rgb(146, 61, 65);">Don't have an account?<a style="color: rgb(146, 61, 65);" href="../login/Register_view.php">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
        <div class="toggle-right">
            <img src="../images/just2.png">
        </div>
    </div>
    <!-- The validation code -->
    <script>
        function validation() {
            const isValidEmail = email => {
                const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(String(email).toLowerCase());
            }

            if (document.Form.email.value === "") {
                document.getElementById("result").innerHTML = "Please enter your email";
                return false;
            } else if (!isValidEmail(document.Form.email.value)) {
                document.getElementById("result").innerHTML = "Please enter a valid email";
                return false;
            } else if (document.Form.psw.value === "") {
                document.getElementById("result").innerHTML = "Please enter your password";
                return false;
            }
        }
    </script>
</body>
</html>
