<?php
include "../settings/connection.php";
//Receiving all input value from the form
if(isset($_POST['register'])){
    //receive all input values from the form
    $firstname = mysqli_real_escape_string($connection, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($connection, $_POST['lastname']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $rid = mysqli_real_escape_string($connection, $_POST['role']);
    $psw = mysqli_real_escape_string($connection, $_POST['psw']);
    $psw2 = mysqli_real_escape_string($connection, $_POST['psw2']);
    
    //form validation
    //adds corresponding error into errors array
    if(empty($firstname)){header("Location: ../login/Register_view.php?error=Invalid Firstname");}
    if(empty($lastname)){header("Location: ../login/Register_view.php?error=Invalid Lastname");}
    if(empty($email)){header("Location: ../login/Register_view.php?error=Invalid Email");}
    if(empty($rid)){header("Location: ../login/Register_view.php?error=Select Role");}
    if(empty($psw)){header("Location: ../login/Register_view.php?error=Fill All Fields");}  
    if(empty($psw2)){header("Location: ../login/Register_view.php?error=Fill All Fields");}
    
    //Validating whether the passwords match
    if($psw!== $psw2){
        header("Location: ../login/Register_view.php?error=Passwords Do not Match");
    }

        //if no errors are found
    //Checking the database to make sure that the user does not exist
    //Assuming that a persons email makes them unique
    $user_check_query = "SELECT * FROM Users WHERE email='$email' LIMIT 1";
    $result = mysqli_query($connection, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if($user){
        //if user exists
        //&& $user['dob']===$dob
        if($user['email']==$email){
            header("Location: ../login/Register_view.php?error=Email already exists");
        }
    }
      
    //Finally registering the user if there are no errors in the form
        $hashedPassword = password_hash($psw, PASSWORD_DEFAULT);

        // Determine the role ID based on the family role, default role id is 3
        if($rid==1){
            $roleId = 1;
        }

        else if($rid==2){
            $roleId=2;
        }
        //INSERT query to insert into database

        $query = "INSERT INTO Users (fname,lname,email,role_id,psw) VALUES ('$firstname','$lastname','$email','$roleId','$hashedPassword')";
        //Executing the query
        $insertResult= mysqli_query($connection, $query);


        if ($insertResult) {
            // Redirect to login_view page upon successful registration
            $success_message = 'Registeration was successfull!!';
            header("Location: ../login/Login_view.php");
            exit();
        } else {
            // Display an error message and redirect back to register_view page
            foreach ($errors as $errorMessage) {
            echo $errorMessage;
            }
            header("Location: ../login/Register_view.php");
            exit();
        }
    } 
    mysqli_close($connection);
?>
