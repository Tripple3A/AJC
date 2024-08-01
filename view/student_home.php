<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="chore icon.png">
    <title>Chore Management System - Student</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        body {
            background-color: #f8f9fa;
            margin: 0;
            display: flex;
            background-image: url("ashesiuni.jpeg");
        }
        .sidebar {
            position: sticky;
            top: 0;
            left: 0;
            height: 100vh;
            width: 100px;
            background-color: #722f37; /* Wine color */
            padding-top: 20px;
            z-index: 1000;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }
        .sidebar a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 18px;
            color: #ffffff;
            display: block;
        }
        .sidebar a:hover {
            background-color: #575757;
            color: white;
        }
        .content-wrapper {
            flex: 1;
            margin-left: 100px;
            padding: 20px;
        }
        .search-bar {
            margin-bottom: 20px;
        }
        .welcome-msg {
            color: #722f37; /* Wine color */
        }
        .navbar {
            background-color: #722f37; /* Wine color */
            color: #ffffff;
        }
        .navbar a {
            color: #ffffff;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .card-title {
            color: #722f37;
        }
        .card-text {
            color: #575757;
        }
    </style>
</head>
<body>

    <div class="content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <a class="navbar-brand" href="#">Dashboard</a>
        </nav>

        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="search-bar"><br>
                    <input type="text" class="form-control" id="searchInput" placeholder="Search for policies or cases...">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="card" data-type="policy">
                        <div class="card-body">
                            <h5 class="card-title">School Policies</h5>
                            <p class="card-text">Information about school policies goes here.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="card" data-type="case">
                        <div class="card-body">
                            <h5 class="card-title">Recent Cases</h5>
                            <p class="card-text">Overview of recent cases reported by students.</p>
                        </div>
                    </div>
                </div>
                <!-- Additional cards can be added here -->
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // JavaScript for search functionality
        document.getElementById('searchInput').addEventListener('keyup', function() {
            var input = this.value.toLowerCase();
            var cards = document.getElementsByClassName('card');
            for (var i = 0; i < cards.length; i++) {
                var card = cards[i];
                var text = card.innerText.toLowerCase();
                card.style.display = text.includes(input) ? '' : 'none';
            }
        });
    </script>
</body>
</html>
