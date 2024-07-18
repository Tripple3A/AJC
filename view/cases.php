
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
    
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    outline: none;
    border:none;
    font-family:"Poppins",sans-serif;
}


body{
    display: flex;
    
}
.table-wrapper {
width: 1000px;
margin: 30px auto;
background: #fff;
padding: 20px;
box-shadow: 0 1px 1px rgba(0,0,0,.05);

}
.table-title {
padding-bottom: 10px;
margin: 0 0 10px;
}
.table-title h2 {
margin: 6px 0 0;
font-size: 22px;
}
.table-title .assign-chore {
float: right;
height: 30px;
font-weight: bold;
font-size: 12px;
text-shadow: none;
min-width: 100px;
border-radius: 50px;
line-height: 13px;
}
.table-title .assign-chore i {
margin-right: 4px;
}
table.table {
table-layout: fixed;
}
table.table tr th, table.table tr td {
border-color: #e9e9e9;
}
table.table th i {
font-size: 13px;
margin: 0 5px;
cursor: pointer;
}
table.table th:last-child {
width: 100px;
}
table.table td a {
cursor: pointer;
display: inline-block;
margin: 0 5px;
min-width: 24px;
}
table.table td a.add {
color: #27C46B;
}
table.table td a.edit {
color: #FFC107;
}
table.table td a.delete {
color: #E34724;
}
table.table td i {
font-size: 19px;
}
table.table td a.add i {
font-size: 24px;
margin-right: -1px;
position: relative;
top: 3px;
}
table.table .form-control {
height: 32px;
line-height: 32px;
box-shadow: none;
border-radius: 2px;
}
table.table .form-control.error {
border-color: #f50000;
}
table.table td .add {
display: none;
}


.sidebar{
    position:sticky;
    top:0;
    left:0;
    bottom:0;
    width:110px;
    height:100vh;
    padding: 0 1.7rem;
    color:#fff;
    overflow:hidden;
    transition:all 0.5s linear;
    
    background:rgba(113,99,186,255);
}


.sidebar:hover{
    width:240px;
    transition:0.5s;
}


.logo{
    height:80px;
    padding:16px;
}

.menu{
    height:88%;
    position:relative;
    list-style: none;
 
    padding:0;
}


.menu li{
    padding:1rem;
    margin:8px 0;
    border-radius: 8px;
    transition: all 0.5s ease-in-out;
}


.menu li:hover,
.active{
    background:#e0e0e058;

    
}


.menu a {
    color:#fff;
    font-size:14px;
    text-decoration: none;
    display:flex;
    align-items:center;
    gap:1.5rem;
}


.menu a span{
    overflow:hidden;

}


.menu a i{
    font-size:1.2rem;
}


.logout{
    position:absolute;
    bottom:0;
    left:0;
    width:100%;
}



</style>





<!--Javascript for showing assign chore form-->
<script type="text/javascript">
$(document).ready(function() {

    // Show and hide the form
    $(".assign-chore").click(function(){
        $(".wrapper").show();
    });

    // Submit form using AJAX when the Assign Chore button is clicked
    $("#assignchore").click(function(){
        var cid = $("#chores").val();
        var pid = $("#familyperson").val();
        var duedate = $("#duedate").val();

        $.ajax({
            url: "../actions/assign_a_chore_action.php",
            method: "POST",
            data: {chores: cid, familyperson: pid, duedate: duedate},
            success: function(data){
                console.log(data);
                var result = JSON.parse(data);

                if(result.success){
                    alert("Chore has been assigned successfully!");

                    // Update the table with the new chore details
                    $("table tbody").append('<tr><td>'+ result.chorename + ' ' + result.fname + ' ' + result.lname + ' ' +
                        result.date_assign + ' ' + result.date_due + ' ' + result.statusname + '</td>...</tr>');

                    // Hide the form after assignment
                    $(".wrapper").hide();

                    // Clear the form fields
                    $("#assignchoreform")[0].reset();

                } else {
                    alert("Chore already exists!");
                }
            },
            error: function(){
                alert("Error adding chore. Please try again.");
            }
        });
    });

});
</script> 
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
                    <a href="">
                        <i class='bx bxs-briefcase'></i>
                    <span>Report cases</span>
                </a>
            </li>

            <li>
                <a href="../view/cases.php">
                    <i class='bx bxs-user-plus'></i>
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



<!-- The chore list table -->
<?php
    if ($var_data !== null) {
        echo '<div class="container">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-8"><h2><b>Chore list</b></h2></div>
                            
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Chore name</th>
                                <th>Assigned by</th>
                                
                                <th>Date Assigned</th>
                                <th>Date due</th>
                                <th>Chore status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>';

        // Determine the length of the outer array
        $outerArrayLength = count($var_data);

        // Use a for loop to access the first element in the outer array
        for ($i = 0; $i < $outerArrayLength; $i++) {
        // Access the current assignment in the outer array
        $current_assignment = $var_data[$i];
            //Retrieving the chorename using the cid attribute from the row variable
            $cid=$current_assignment['cid'];
            $chorenamequery = "SELECT chorename FROM Chores where cid = $cid";
            $chorenameresult = mysqli_query($connection, $chorenamequery);
            $row = mysqli_fetch_assoc($chorenameresult);
            $chorename = $row['chorename'];

           
            

            $sid = $current_assignment['sid'];

            //Retrieving the status name from status table using the sid from the row variable
            $statusquery = "SELECT sname FROM Status where sid = $sid";
            $statusresult = mysqli_query($connection, $statusquery);
            $row = mysqli_fetch_assoc($statusresult);
            $statusname = $row['sname'];


            //retrieving details of the person who assigned the chore
            $assignedby=$current_assignment['who_assigned'];


            //Retrieving the fname and lname from people table using the pid attribute from the row variable
            $namequery = "SELECT fname FROM People where pid =  $assignedby";
            $nameresult = mysqli_query($connection, $namequery);
            $ow = mysqli_fetch_assoc($nameresult);
            $first_name = $ow['fname'];


            //Retrieving the fname and lname from people table using the pid attribute from the row variable
            $last_namequery = "SELECT lname FROM People where pid =  $assignedby";
            $last_nameresult = mysqli_query($connection, $last_namequery);
            $row = mysqli_fetch_assoc($last_nameresult);
            $last_name = $row['lname'];

        echo '<tr>
                <td>'. $chorename. '</td>
                <td>'. $first_name.' '. $last_name. '</td>
                
                <td>'. $current_assignment['date_assign']. '</td>
                <td>'. $current_assignment['date_due']. '</td>
                <td>'. $statusname. '</td>

                <td>
                    
                <a class="incomplete" title="incomplete" data-toggle="tooltip" href="../actions/incomplete_assignment_action.php?id=' .  $current_assignment['assignmentid'] . '"><i class="material-icons">incomplete_circle</i></a>
                        <a class="complete" title="Complete" data-toggle="tooltip" href="../actions/complete_assignment_action.php?id=' .  $current_assignment['assignmentid'] . '"><i class="material-icons">done</i></a>
                    </td>
                </tr>';
        }

        echo '</tbody>
                    </table>
                </div>
            </div>';
    }
    ?>





    </body>
</html>



