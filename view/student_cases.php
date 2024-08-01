<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="chore icon.png">
    <title>Case Management System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        body {
            background-image: url('images/ashesiuni.jpeg'); 
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
        }

        .main-content {
            padding: 20px;
            background: rgba(255, 255, 255, 0.8); /* White background with opacity */
            border-radius: 10px;
            margin: 20px;
        }

        .table th {
            background-color: #722f37; /* Wine color */
            color: #ffffff;
        }

        .search-bar {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
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
                <!-- Sample rows -->
                <tr>
                    <td>1</td>
                    <td>Missing item in dorm</td>
                    <td>2024-07-21</td>
                    <td>Pending</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Roommate conflict</td>
                    <td>2024-07-19</td>
                    <td>Completed</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Noise complaint</td>
                    <td>2024-07-18</td>
                    <td>Pending</td>
                </tr>
                <!-- Additional rows can be added here -->
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
