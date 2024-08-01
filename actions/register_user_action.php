

<?php

include "../settings/connection.php";


//initializing variables
$firstname="";
$lastname = "";
$errors = array();


//*Receiving all input value from the form
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
    if(empty($firstname)){array_push($errors, "firstname is required");}
    if(empty($lastname)){array_push($errors, "lastname is required");}
    if(empty($email)){array_push($errors, "email is required");}
    if(empty($rid)){array_push($errors, "role is required");}
    if(empty($psw)){array_push($errors, "password is required");}
    if(empty($psw2)){array_push($errors, "please confirm your password");}
    
    



    

    //Validating whether the passwords match
    if($psw!== $psw2){
        array_push($errors, "Passwords do not match");
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
        if($user['email']===$email){
            array_push($errors, "Email already exists");
        }

    }



    // Check if there are any errors in the $errors array
if (!empty($errors)) {
    // Loop through the errors and print each one
    foreach ($errors as $error) {
        echo $error . '<br>';
    }
}


    


    //Finally registering the user if there are no errors in the form
    if(count($errors)==0){

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
        

    }



    




?>