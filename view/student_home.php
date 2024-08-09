<?php
include '../settings/core.php';
include '../actions/fetch_policies.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="chore icon.png">
    <title>AJMS</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        body {
            background-color: #f8f9fa;
            margin-left: 0;
            display: flex;
            background-image: url("ashesiuni.jpeg");
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

        .content-wrapper {
            flex: 0.9;
            margin-left: 0px;
            padding: 20px;
        }

        .search-bar {
            margin-bottom: 20px;
        }

        .welcome-msg {
            color: #722f37;
        }

        .navbar {
            background-color: #722f37;
            color: #ffffff;
        }

        .navbar a {
            color: #ffffff;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            background: #fff;
            color: #333;
        }

        .card-title {
            color: #722f37;
        }

        .card-text {
            color: #575757;
        }

        .quote-container {
            background: linear-gradient(to bottom right, #800020, #000);
            color: #fff;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            position: relative;
            margin-bottom: 20px;
        }

        .quote-container h5 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .quote-container p {
            font-size: 18px;
            margin: 0;
        }
    </style>
</head>
<body>
<div class="sidebar">
    <div class="logo">
        <img src="../images/ASHLOGO.jpeg">
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

        <div class="quote-container" id="quoteContainer">
            <h5 id="quoteText">"Speak up, even if your voice shakes."</h5>
            <p id="quoteAuthor">- Maggie Kuhn</p>
        </div>

        <div class="row mt-4">
            <div class="col-md-6 mb-3">
                <div class="card" data-type="policy">
                    <div class="card-body">
                        <h5 class="card-title">School Policies</h5>
                        <p class="card-text">Information about school policies goes here.</p>
                        <ul id="policyList" class="list-group list-group-flush">
                            <!-- Policies will be dynamically loaded here -->
                            <?php 
                            $policies = getPolicies();
                            foreach ($policies as $policy): ?>
                                <li class="list-group-item">
                                    <h6><?php echo htmlspecialchars($policy['policy_title']); ?></h6>
                                    <p><?php echo htmlspecialchars($policy['policy_description']); ?></p>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <a href="https://www.ashesi.edu.gh/judicial-council-records/" class="btn btn-wine mt-3">More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="card" data-type="events">
                    <div class="card-body">
                        <h5 class="card-title">Upcoming Events</h5>
                        <p class="card-text">Stay updated with upcoming events and important dates.</p>
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
    // Quotes array
    const quotes = [
        {
            text: "Speak up, even if your voice shakes.",
            author: "- Maggie Kuhn"
        },
        {
            text: "Your silence gives consent.",
            author: "- Plato"
        },
        {
            text: "The only thing necessary for the triumph of evil is for good people to do nothing.",
            author: "- Edmund Burke"
        },
        {
            text: "Never be afraid to raise your voice for honesty and truth and compassion against injustice and lying and greed.",
            author: "- William Faulkner"
        },
        {
            text: "Raise your words, not voice. It is rain that grows flowers, not thunder.",
            author: "- Rumi"
        },
        {
            text: "Courage is what it takes to stand up and speak; courage is also what it takes to sit down and listen.",
            author: "- Winston Churchill"
        },
        {
            text: "To sin by silence, when we should protest, makes cowards out of men.",
            author: "- Ella Wheeler Wilcox"
        },
        {
            text: "The greatest glory in living lies not in never falling, but in rising every time we fall.",
            author: "- Nelson Mandela"
        },
        {
            text: "In the end, we will remember not the words of our enemies, but the silence of our friends.",
            author: "- Martin Luther King Jr."
        },
        {
            text: "If you see something that is not right, not fair, not just, you have a moral obligation to say something. To do something.",
            author: "- John Lewis"
        }
    ];

    let currentQuoteIndex = 0;

    // Function to update quote
    function updateQuote() {
        const quoteContainer = document.getElementById('quoteContainer');
        const quoteText = document.getElementById('quoteText');
        const quoteAuthor = document.getElementById('quoteAuthor');

        currentQuoteIndex = (currentQuoteIndex + 1) % quotes.length;
        quoteText.innerHTML = quotes[currentQuoteIndex].text;
        quoteAuthor.innerHTML = quotes[currentQuoteIndex].author;
    }

    // Update quote every 30 seconds
    setInterval(updateQuote, 3000);

    $(document).ready(function () {
        // Fetch policies from the server
        $.ajax({
            url: '../actions/fetch_policies.php',
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                var policyList = $('#policyList');
                policyList.empty(); // Clear any existing items
                data.forEach(function (policy) {
                    var policyItem = `
                        <li class="list-group-item">
                            <h6>${policy.title}</h6>
                            <p>${policy.description}</p>
                        </li>
                    `;
                    policyList.append(policyItem);
                });
            },
            error: function (error) {
                console.log('Error fetching policies:', error);
            }
        });

        // Search functionality
        $('#searchInput').on('keyup', function () {
            var input = $(this).val().toLowerCase();
            $('#policyList li').filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(input) > -1);
            });
        });
    });
</script>
</body>
</html>
