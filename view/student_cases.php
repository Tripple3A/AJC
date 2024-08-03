<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
            background: url('/ashesiuni.jpeg') no-repeat center center fixed;
            color: #333;
            display: flex;
            font-size: 20px;
        }
        .sidebar {
            position: sticky;
            top: 0;
            left: 0;
            bottom: 0;
            width: 110px;
            height: 100vh;
            padding: 0 1.7rem 0 0;
            color: #fff;
            overflow: hidden;
            transition: all 0.5s linear;
            background: #800020;
        }
        .sidebar:hover {
            width: 240px;
            transition: 0.5s;
        }
        .logo {
            height: 80px;
            padding: 16px;
            text-align: center;
            width: 100px;
            margin: 0 auto;
        }
        .logo img {
            max-width: 100%;
            height: auto;
            max-height: 100%;
        }
        .menu {
            height: 88%;
            position: relative;
            list-style: none;
            padding: 0;
        }
        .menu li {
            padding: 1rem;
            margin: 8px 0;
            border-radius: 8px;
            transition: all 0.5s ease-in-out;
        }
        .menu li:hover,
        .active {
            background: #e0e0e058;
        }
        .menu a {
            color: #fff;
            font-size: 14px;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }
        .menu a span {
            overflow: hidden;
        }
        .menu a i {
            font-size: 1.2rem;
        }
        .main-content {
            padding: 20px;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            margin: 20px;
            flex-grow: 1;
            overflow-y: auto;
        }
        .table th {
            background-color: #722f37;
            color: #ffffff;
        }
        .search-bar {
            margin-bottom: 20px;
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
                <a href="../view/student_home.php">
                    <i class='bx bxs-dashboard'></i>
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a href="../view/report.php">
                    <i class='bx bxs-briefcase'></i>
                    <span>Report Case</span>
                </a>
            </li>
            <li>
                <a href="../view/student_cases.php">
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

    <div class="main-content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="welcome-msg">
                <h2>Cases</h2>
            </div>
        </div>

        <div class="search-bar">
            <input type="text" id="searchInput" class="form-control" placeholder="Search for cases...">
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Case ID</th>
                    <th scope="col">Case Description</th>
                    <th scope="col">Date Reported</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody id="casesTable">
                <?php
                // Include the database connection file
                include '../functions/get_all_cases.php'; 

                

                    // Display cases in the table
                    foreach ($cases as $case) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($case['case_id']) . "</td>";
                        echo "<td>" . htmlspecialchars($case['case_description']) . "</td>";
                        echo "<td>" . htmlspecialchars($case['report_date']) . "</td>";
                        echo "<td>" . htmlspecialchars($case['status']) . "</td>";
                        echo "</tr>";
                    }
                

               
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // JavaScript for search functionality
        document.getElementById('searchInput').addEventListener('keyup', function() {
            var input = this.value.toLowerCase();
            var rows = document.getElementById('casesTable').getElementsByTagName('tr');
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
    </script>
</body>
</html>
