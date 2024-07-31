
<!DOCTYPE html>
<html lang="en">
    <head><meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="chore icon.png">
        <title>Ashesi Judicial Management System</title>
        <link rel="stylesheet" href="../css/admin.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>


    <body>
        <div class="sidebar">
        <div class="logo">
        <img src="../images/ASHLOGO.jpeg" >
    </div>

            
                <ul class="menu">
                    <li>
                        <a href="../view/studentdashboard.php">
                            <i class='bx bxs-dashboard'></i>
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a href="../view/report.php">
                        <i class='bx bxs-briefcase'></i>
                    <span>Report Cases</span>
                </a>
            </li>
            <li>
                <a href="../view/cases.php">
                    <i class='bx bxs-briefcase'></i>
                <span>Cases</span>
            </a>
        </li>

        
            <li class="logout">
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
            session_start();

            //include "../settings/connection.php";

            if (isset($_SESSION['user_id'])) {
                $id = $_SESSION['user_id'];
                $query = "SELECT * FROM People WHERE pid = '$id'";
                $result = mysqli_query($connection, $query);
                $row = mysqli_fetch_assoc($result);

                echo '<h3>Welcome '. $row['fname'].''. $row['lname']. '</h3>';

                
                
            } else {
                // Handle the case when user information is not available
                echo "<span>Welcome</span>";
            }

            

            ?>
    </div>
    </div>


    <div class="statistics-container">
        <h3 class="main-title">School policy</h3>
        <div class="statistics-wrapper">
            

            
             
        </div>
    </div>





            <!--Displaying the recently assigned chores table-->

    </body>
</html>