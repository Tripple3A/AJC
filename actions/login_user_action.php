<?php
// Starting a session
session_start();

//including the connection file
include '../settings/connection.php';

//initializing variable error for capturing errors
$errors = array();





if(isset($_POST['login'])){
   


    //Collecting form data and storing in variables
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['psw']);


        //Query to check if the user exists
    $query = "SELECT * FROM People WHERE email = '$email'";
    $result = mysqli_query($connection, $query);
    $user = mysqli_fetch_assoc($result);

    
  

    if(!$user){

            echo '<h2>No registered account found!!!</h2>';
        
            array_push($errors, "User not found!!");

            header("Location: ../login/Register_view.php");
            die();
        }


        else{

            //User then exists
            //Retrieving the hashed password from the database
            $passwdquery = "SELECT passwd FROM People WHERE email= '$email'";
            $passwdresult = mysqli_query($connection,$passwdquery);
            $row = mysqli_fetch_assoc($passwdresult);
            $hashedpasswd = $row['passwd'];



            //Comparing the entered password with the hashed password
            if(password_verify($password, $hashedpasswd)){
                //passwords meatch meaning log in was successful
                //storing user id and role id
                $user_query = "SELECT pid FROM People WHERE email= '$email'";
                $user_id_result = mysqli_query($connection,$user_query);
                $user_row = mysqli_fetch_assoc($user_id_result);
                $user_id_value = $user_row['pid'];


                $rid_query = "SELECT rid FROM People WHERE email= '$email'";
                $rid_result = mysqli_query($connection,$rid_query);
                $rid_row = mysqli_fetch_assoc($rid_result);
                $rid_value = $rid_row['rid'];




               
                $_SESSION['user_id'] = $user_id_value;
                $_SESSION['role_id'] = $rid_value;

                //Redirecting admins to admin pages and regular users to homepage
                //Admins, mother and father with fid, 1, 2
                
                $rid_query = "SELECT rid FROM People WHERE email= '$email'";
                $rid_result = mysqli_query($connection,$rid_query);
                $rid_row = mysqli_fetch_assoc($rid_result);
                $rid_value = $rid_row['rid'];

               

                if($rid_value == 1){
                    
                    header("Location:../admin/admin.php");
                }
                else if($rid_value == 2){
                    
                    header("Location:../admin/secondary_admin.php");
                }
                else if($rid_value == 3){
                    header("Location:../view/dashboard.php");
                }
            }    

            }
        }




?>