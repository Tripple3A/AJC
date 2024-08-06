<?php

include '../settings/core.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="chore icon.png">
    <title>AJMS</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        body {
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
           /* margin: 0;*/
            /*background: url('/ashesiuni.jpeg') no-repeat center center fixed;*/
            
            color: #333;
            display: flex;
            /*justify-content: center;*/
            /*align-items: center;*/
           /* height: 100vh;*/
           /* overflow: auto; /* Allow scrolling on the body */
            font-size: 20px;
        }

        .sidebar {
    position: sticky;
    top: 0;
    left: 0;
    bottom: 0;
    width: 110px;
    height: 100vh;
    padding: 0 1.7rem 0 0; /* Removed left padding */
    color: #fff;
    overflow: hidden;
    transition: all 0.5s linear;
    background: #800020;
}



.sidebar:hover{
    width:240px;
    transition:0.5s;
}


.logo {
            height: 80px;
            padding: 16px;
            text-align: center; /* Center the logo */
            width: 100px; /* Set a fixed width */
            margin: 0 auto; /* Center horizontally */
        }

        .logo img {
            max-width: 100%;
            height: auto;
            max-height: 100%; /* Ensure the logo fits within the container */
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

        .main-content {
            padding: 20px;
            background: rgba(255, 255, 255, 0.8); /* White background with opacity */
            border-radius: 10px;
            margin: 20px;
            flex-grow:1;
            overflow-y: auto;
        }

        .table th {
            background-color: #722f37; /* Wine color */
            color: #ffffff;
        }

        .search-bar {
            margin-bottom: 20px;
        }

        .modal-content {
            background-color: #fff;
        }

        .btn-wine {
            background-color: #722f37;
            color: #fff;
        }

        .btn-wine:hover {
            background-color: #5a232d;
            color: #fff;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            /*table-layout: fixed; /* Ensure the table fits within the container */
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
            word-wrap: break-word; /* Ensure long words break properly */
        }
        th {
            background-color: #800020; /* Wine color */
            color: white;
        }
    </style>
</head>
<body>

<div class="sidebar">
        <div class="logo">
        <img src="../images/ASHLOGO.jpeg" >
    </div>

            
                <ul class="menu">
                    <li>
                        <a href="../admin_view/home_admin.php">
                            <i class='bx bxs-dashboard'></i>
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a href="../admin_view/admin_case.php">
                        <i class='bx bxs-briefcase'></i>
                    <span>Cases</span>
                </a>
            </li>
            <li>
                <a href="../admin_view/schedule_hearing.php">
                    <i class='bx bxs-briefcase'></i>
                <span>Schedule Hearings</span>
            </a>
        </li>

        <li>
                <a href="../admin_view/hearings.php">
                    <i class='bx bxs-briefcase'></i>
                <span>Hearings</span>
            </a>
        </li>

        <li>
            <a href="../admin_view/recommendation.php">
                <i class='bx bxs-briefcase'></i>
            <span>Recommend verdict</span>
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

    <div class="main-content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="welcome-msg">
                <h2>Scheduled hearings</h2>
            </div>
            
        </div>

        <div class="search-bar">
            <input type="text" id="searchInput" class="form-control" placeholder="Search for hearings...">
        </div>

        <table id="meetingTable">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Person in Charge</th>
                    <th>Person in Charge Email</th>
                    <th>Student Name</th>
                    <th>Student Email</th>
                    <th>Conference Room Number</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th >Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            include '../functions/get_all_hearings.php';
            foreach ($hearings as $hearing): ?>
            <tr>
                <td><?php echo htmlspecialchars($hearing['title']); ?></td>
                <td><?php echo htmlspecialchars($hearing['person_in_charge']); ?></td>
                <td><?php echo htmlspecialchars($hearing['person_in_charge_email']); ?></td>
                <td><?php echo htmlspecialchars($hearing['student_name']); ?></td>
                <td><?php echo htmlspecialchars($hearing['student_email']); ?></td>
                <td><?php echo htmlspecialchars($hearing['conference_room_number']); ?></td>
                <td><?php echo htmlspecialchars($hearing['date']); ?></td>
                <td><?php echo htmlspecialchars($hearing['time']); ?></td>

                <td>
            <?php echo '<button class="btn btn-warning btn-sm" onclick="editCase(this, ' . htmlspecialchars($hearing['hearing_id']) . ')">Done</button>'; ?>
            <?php echo '<button class="btn btn-danger btn-sm" onclick="deleteCase(this, ' . htmlspecialchars($hearing['hearing_id']) . ')">Delete</button>'; ?>
        </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        </table>
    </div>

    <!-- Add Case Modal -->
    

   <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<!-- Popper.js (necessary for Bootstrap 4) -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // JavaScript for search functionality
        document.getElementById('searchInput').addEventListener('keyup', function() {
            var input = this.value.toLowerCase();
            var rows = document.getElementById('meetingTable').getElementsByTagName('tr');
            for (var i = 0; i < rows.length; i++) {
                var cells = rows[i].getElementsByTagName('td');
                var found = false;
                for (var j = 0; j < cells.length; j++) {
                    if (cells[j].innerText.toLowerCase().includes(input)) {
                        found = true;
                        break;
                    }
                }
                rows[i].style.display = found ? '' : 'none';
            }
        });

       // JavaScript functions to handle case actions
       function updateStatus(selectElement, caseId) {
            var status = selectElement.value;
            $.ajax({
                url: '../actions/update_cases.php',
                type: 'POST',
                data: {
                    action: 'update_status',
                    case_id: caseId,
                    status: status
                },
                success: function(response) {
                    alert('Case status updated successfully');
                },
                error: function(xhr, status, error) {
                    alert('An error occurred while updating the case status');
                }
            });
        }

        function deleteCase(button, caseId) {
            var row = button.parentElement.parentElement;
            $.ajax({
                url: '../actions/update_cases.php',
                type: 'POST',
                data: {
                    action: 'delete_case',
                    case_id: caseId
                },
                success: function(response) {
                    row.remove();
                    alert('Case deleted successfully');
                },
                error: function(xhr, status, error) {
                    alert('An error occurred while deleting the case');
                }
            });
        }

        
        // Function to update case IDs
        function updateCaseIds() {
            var rows = document.getElementById('casesTable').getElementsByTagName('tr');
            for (var i = 0; i < rows.length; i++) {
                rows[i].cells[0].innerText = i + 1;
            }
        }
    </script>
</body>
</html>
