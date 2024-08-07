<?php

//including the connection file
include '../settings/connection.php';

//initializing variable error for capturing errors
//initializing variables
$email="";
$password= "";
$errors = array();

if(isset($_POST['login'])){   
    //Collecting form data and storing in variables
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['psw']);

    //form validation
    //adds corresponding error into errors array
    if(empty($email)){array_push($errors, "Email is required");}
    if(empty($password)){array_push($errors, "Password is required");}

    //if no errors are found
    //Query to check if the user exists
    $query = "SELECT * FROM Users WHERE email = '$email'";
    $result = mysqli_query($connection, $query);
    $user = mysqli_fetch_assoc($result);

    if(!$user){
        array_push($errors, "User not found!!");
        header("Location: ../login/Register_view.php");
        die();
    }
    else{
        //User then exists
        //Retrieving the hashed password from the database
        $passwdquery = "SELECT psw FROM Users WHERE email= '$email'";
        $passwdresult = mysqli_query($connection,$passwdquery);
        $row = mysqli_fetch_assoc($passwdresult);
        $hashedpasswd = $row['psw'];

        //Comparing the entered password with the hashed password
        if(password_verify($password, $hashedpasswd)){
            //passwords meatch meaning log in was successful
            //storing user id and role id
            $user_query = "SELECT user_id FROM Users WHERE email= '$email'";
            $user_id_result = mysqli_query($connection,$user_query);
            $user_row = mysqli_fetch_assoc($user_id_result);
            $user_id_value = $user_row['user_id'];
            $rid_value = $user_row['role_id'];
            
            $_SESSION['user_id'] = $user_id_value;
            $_SESSION['role_id'] = $rid_value;

            //Redirecting admins to admin pages and regular users to homepage
            //Admins with fid, 1, 2

            if($rid_value == 1){ 
                header("Location:../view/student_home.php");
                die();

            }
            else if($rid_value == 2){  
                header("Location:../admin_view/home_admin.php");
                die();
            }
                
        } 
        else {
            // Passwords do not match
            array_push($errors, "Incorrect password. Please try again.");
            header("Location:../login/Login_view.php?error=Incorrect Password");
            die();
            }  

        }
          
    }
