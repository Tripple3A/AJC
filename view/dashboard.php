<?php

include_once '../functions/user_fxn.php';

?>



<!DOCTYPE html>
<html lang="en">
    <head><meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="chore icon.png">
        <title>Chore Management System</title>
        <link rel="stylesheet" href="../css/dashboard.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>


    <body>
        <div class="sidebar">
            <div class="logo">
                <!--<img src="" width="100" height="100">-->
            </div>

            
                <ul class="menu">
                    <li>
                        <a href="../view/dashboard.php" class="active">
                            <i class='bx bxs-dashboard'></i>
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a href="../view/managechores.php">
                        <i class='bx bxs-briefcase'></i>
                    <span>Manage chores</span>
                </a>
            </li>
            <li class="../login/Logout_view.php">
                <a href="../login/Logout_view.php">
                    <i class='bx bx-log-out'></i>
                <span>Logout</span>
            </a>
        </li>
    </ul>

</div>



<div class="main">
    <div class="header-wrapper">
        <div class="header-title">
            <span>Welcome</span>
        <h2>Dashboard</h2>
        </div>

        <div class="user-info">
        <?php
           // session_start();

            

            if (isset($_SESSION['user_id'])) {
                $id = $_SESSION['user_id'];
                $query = "SELECT * FROM People WHERE pid = '$id'";
                $result = mysqli_query($connection, $query);
                $row = mysqli_fetch_assoc($result);

                echo '<h3>Welcome '. $row['fname'].' '. $row['lname']. '</h3>';

                
                
            } else {
                // Handle the case when user information is not available
                echo "<span>Welcome</span>";
            }

            

            ?>
    </div>
    </div>


    <div class="statistics-container">
        <h3 class="main-title">Chore statistics</h3>
        <div class="statistics-wrapper">
            
            <a href="managechores.html" style="text-decoration: none;"><div class="progress">
                <div class="progress-header">
                    <div class="stats-value">
                        <span class="title"><strong>In Progress</strong></span>
                    </div> 
                    <span class="value"><strong><?php 
                    
                    echo count($var_inprogress_chores_data); ?></strong></span>   
                    <!--where i am supposed to put the icon--> 
                </div>
              </div></a>
            


              <a href="managechores.html" style="text-decoration: none;"><div class="incomplete">
                <div class="incomplete-header">
                    <div class="incomplete-value">
                        <span class="title"><strong>Incomplete</strong></span>
                    </div> 
                    <span class="value"><strong><?php 
                    
                    
                    echo count($var_incomplete_chores_data); ?></strong></span>   
                    <!--where i am supposed to put the icon--> 
                </div>
            </div>
            </a>
         



            <a href="managechores.html" style="text-decoration: none;"><div class="complete">
                <div class="complete-header">
                    <div class="complete-value">
                        <span class="title"><strong>Complete</strong></span>
                    </div> 
                    <span class="value"><strong><?php 
                    
                    echo count($var_complete_chores_data); ?></strong></span>   
                    <!--where i am supposed to put the icon--> 
                </div>
            </div>
            </a> 
             
        </div>
    </div>






         <!--Displaying the recently assigned chores table-->

         <?php
        if ($var_recent_chores_data !== null){

            

      echo ' <div class="tabular-wrapper">

            <h3 class="main-title">Recently assigned chores</h3>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                          <th>Chore type</th>
                          <th>Assigned to</th>
                          <th>Date assigned</th>
                          <th>Date completed</th>
                          

                        </tr>
                        <tbody>';
                        $outerArrayLength = count($var_recent_chores_data);
                        
                        for ($i = 0; $i < $outerArrayLength; $i++){
                            $current_assignment = $var_data[$i];
                            //Retrieving the chorename using the cid attribute from the row variable
                            $cid=$current_assignment['cid'];
                             $chorenamequery = "SELECT chorename FROM Chores where cid = $cid";
                             $chorenameresult = mysqli_query($connection, $chorenamequery);
                             $row = mysqli_fetch_assoc($chorenameresult);
                             $chorename = $row['chorename'];


                             //Finding who it has been assigned to
                             $aid=$current_assignment['assignmentid'];

                             $query = "SELECT * FROM Assigned_people WHERE assignmentid = '$aid'";
                             $result = mysqli_query($connection, $query);
                             $row = mysqli_fetch_assoc($result);
                             $pid = $row['pid'];


                             //Retrieving the fname and lname from people table using the pid attribute from the row variable
                             $fnamequery = "SELECT fname FROM People where pid =  $pid";
                             $fnameresult = mysqli_query($connection, $fnamequery);
                             $row = mysqli_fetch_assoc($fnameresult);
                             $fname = $row['fname'];


                             //Retrieving the fname and lname from people table using the pid attribute from the row variable
                            $lnamequery = "SELECT lname FROM People where pid =  $pid";
                             $lnameresult = mysqli_query($connection, $lnamequery);
                             $row = mysqli_fetch_assoc($lnameresult);
                            $lname = $row['lname'];



                            


                            

                            echo '<tr>
                            <td>'. $chorename. '</td>
                            <td>'. $fname.' '. $lname. '</td>
                            <td>'. $current_assignment['date_assign']. '</td>
                            <td>'. $current_assignment['date_due']. '</td>
                                
                            </tr>';
                        }
                        echo '</tbody>
                        

                    </thead>
                </table>

            </div>

        </div>
</div>';
        }

?>






    


        

    </body>
</html>