<?php

include '../settings/core.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="chore icon.png">
    <title>AJMS</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Helvetica Neue', Arial, sans-serif;
            color: #333;
            display: flex;
            height: 100vh;
            overflow: auto;
            /* Allow scrolling on the body */
        }

        .sidebar {
            position: sticky;
            top: 0;
            left: 0;
            bottom: 0;
            width: 110px;
            height: 100vh;
            padding: 0 1.7rem 0 0;
            /* Removed left padding */
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
            /* Center the logo */
            width: 100px;
            /* Set a fixed width */
            margin: 0 auto;
            /* Center horizontally */
        }

        .logo img {
            max-width: 100%;
            height: auto;
            max-height: 100%;
            /* Ensure the logo fits within the container */
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
            margin-left: 30px;
            padding: 20px;
            flex-grow: 1;
            overflow-y: auto;
        }

        .search-bar {
            margin-bottom: 20px;
        }

        .welcome-msg {
            color: #722f37;
            /* Wine color */
        }

        .navbar {
            background-color: #722f37;
            /* Wine color */
            color: #ffffff;
        }

        .navbar a {
            color: #ffffff;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .card-header {
            background-color: #722f37;
            /* Wine color */
            color: white;
            font-weight: bold;
        }

        .btn-wine {
            background-color: #722f37;
            color: white;
        }

        .btn-wine:hover {
            background-color: #5a2329;
        }

        .list-group-item {
            border: none;
            border-bottom: 1px solid #ddd;
            border-radius: 0;
        }

        .list-group-item:last-child {
            border-bottom: none;
        }

        .btn-icon {
            font-size: 1.2rem;
        }

        .btn-icon:hover {
            opacity: 0.8;
        }

        .modal-header,
        .modal-body {
            background-color: #f8f9fa;
        }

        .modal-title {
            color: #722f37;
            /* Wine color */
        }

        .content-section {
            display: none;
        }

        .active {
            display: block;
        }
    </style>

<script>
    function showSection(sectionId) {
        const sections = document.getElementsByClassName('content-section');
        for (let i = 0; i < sections.length; i++) {
            sections[i].classList.remove('active');
        }
        document.getElementById(sectionId).classList.add('active');
    }
</script>


</head>

<body>
    <div class="sidebar">
        <div class="logo">
            <img src="../images/ASHLOGO.jpeg">
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
        <nav class="navbar navbar-expand-lg navbar-dark">
            <a class="navbar-brand" href="#">Dashboard</a>
        </nav>
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="search-bar">
                    <br>
                    <input type="text" class="form-control" id="searchInput" placeholder="Search for a policy...">
                </div>
                <button id="addPolicyButton" class="btn btn-wine" data-toggle="modal" data-target="#addPolicyModal">
                    <i class='bx bx-plus'></i> Add Policy
                </button>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="list-group" id="menu">
                        <button class="list-group-item list-group-item-action"
                            onclick="showSection('policyListSection')">Policy List</button>
                        <button class="list-group-item list-group-item-action"
                            onclick="showSection('reportSection')">Generate Report</button>
                    </div>
                </div>
                <div class="col-md-9">
                    <div id="policyListSection" class="content-section active">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">Policy List</h5>
                            </div>
                            <ul class="list-group list-group-flush" id="policyList">
                                <?php
                                include "../actions/fetch_policies.php";
                                $policyList = getPolicies();
                                foreach ($policyList as $policy) {
                                    echo "
                                        <li class='list-group-item'>
                                            <div>
                                                <h5>{$policy['policy_title']}</h5>
                                                <p>{$policy['policy_description']}</p>
                                            </div>
                                            <div class='d-flex justify-content-end'>
                                                <button class='btn btn-wine btn-sm btn-icon' onclick='updatePolicy({$policy['policy_id']})'>
                                                    <i class='bx bx-edit'></i> Update
                                                </button>
                                                <button class='btn btn-danger btn-sm btn-icon ml-2' onclick='deletePolicy({$policy['policy_id']})'>
                                                    <i class='bx bx-trash'></i> Delete
                                                </button>
                                            </div>
                                        </li>";
                                }
                                ?>
                            </ul>
                        </div>
                    </div>

                    <div id="reportSection" class="content-section">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">Generate Report</h5>
                            </div>
                            <div class="card-body">
                                <button class="btn btn-wine" onclick="generateReport()">Generate Report</button>
                                <div id="reportContent" class="mt-3">
                                    <canvas id="reportChart"></canvas>
                                    <table class="table table-bordered mt-3">
                                        <thead>
                                            <tr>
                                                <th>Case Category</th>
                                                <th>Number of Cases</th>
                                                <th>Pending Cases</th>
                                                <th>Under Investigation Cases</th>
                                                <th>Closed Cases</th>
                                                <th>Completed Cases</th>
                                            </tr>
                                        </thead>
                                        <tbody id="reportTableBody">
                                            <!-- Table rows will be dynamically added here -->
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Policy Modal -->
        <div class="modal fade" id="addPolicyModal" tabindex="-1" role="dialog" aria-labelledby="addPolicyModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addPolicyModalLabel">Add New Policy</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="addPolicyForm">
                            <div class="form-group">
                                <label for="policyTitle">Policy Title</label>
                                <input type="text" class="form-control" name="policyTitle" id="policyTitle" required>
                            </div>
                            <div class="form-group">
                                <label for="policyDescription">Policy Description</label>
                                <textarea class="form-control" name="policyDescription" id="policyDescription" rows="3"
                                    required></textarea>
                            </div>
                            <button type="submit" class="btn btn-wine">Add Policy</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Update Policy Modal -->
        <div class="modal fade" id="updatePolicyModal" tabindex="-1" role="dialog"
            aria-labelledby="updatePolicyModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updatePolicyModalLabel">Update Policy</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="updatePolicyForm">
                            <input type="hidden" name="policy_id" id="updatePolicyId">
                            <div class="form-group">
                                <label for="updatePolicyTitle">Policy Title</label>
                                <input type="text" class="form-control" name="policyTitle" id="updatePolicyTitle"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="updatePolicyDescription">Policy Description</label>
                                <textarea class="form-control" name="policyDescription" id="updatePolicyDescription"
                                    rows="3" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-wine">Update Policy</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
    document.getElementById('addPolicyButton').addEventListener('click', function() {
        $('#addPolicyModal').modal('show');
    });
</script>

   

    <script>
        document.getElementById('addPolicyForm').addEventListener('submit', function (event) {
            event.preventDefault();
            var formElement = this;
            var formData = new FormData(formElement);

            const policyTitle = document.getElementById('policyTitle').value;
            const policyDescription = document.getElementById('policyDescription').value;

            // Validation rules
            const titleRegex = /^[a-zA-Z ]+$/;

            if (!titleRegex.test(policyTitle)) {
                alert("Policy Title can only contain letters and spaces.");
                return false;
            }
            if (!titleRegex.test(policyDescription)) {
                alert("Policy Description can only contain letters, numbers, and spaces.");
                return false;
            }
            if (policyTitle.trim() === "") {
                alert("Policy Title cannot be empty.");
                return false;
            }

            if (policyDescription.trim() === "") {
                alert("Policy Description cannot be empty.");
                return false;
            }

            $.ajax({
                type: "POST",
                url: "../actions/add_policy.php",
                data: formData,
                processData: false,
                contentType: false,
                dataType: "json",
                success: function (response) {
                    if (response.success) {
                        $('#addPolicyModal').modal('hide');
                        alert(response.success);
                        location.reload(); // Reload the page to see the new policy
                    } else {
                        $('#addPolicyModal').modal('hide');
                        alert('An error occurred while adding policy');
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log('AJAX Error:', textStatus, errorThrown);
                }
            });
        });

        document.getElementById('searchInput').addEventListener('keyup', function () {
            var input = this.value.toLowerCase();
            var items = document.getElementsByClassName('list-group-item');
            for (var i = 0; i < items.length; i++) {
                var item = items[i];
                var text = item.innerText.toLowerCase();
                item.style.display = text.includes(input) ? '' : 'none';
            }
        });

        function updatePolicy(id) {
            $.ajax({
                type: "GET",
                url: "../actions/get_policy.php",
                data: { policy_id: id },
                dataType: "json",
                success: function (response) {
                    if (response.error) {
                        alert(response.error);
                    } else {
                        $('#updatePolicyId').val(response.policy_id);
                        $('#updatePolicyTitle').val(response.policy_title);
                        $('#updatePolicyDescription').val(response.policy_description);
                        $('#updatePolicyModal').modal('show');
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log('AJAX Error:', textStatus, errorThrown);
                }
            });
        }

        document.getElementById('updatePolicyForm').addEventListener('submit', function (event) {
            event.preventDefault();
            var formElement = this;
            var formData = new FormData(formElement);

            $.ajax({
                type: "POST",
                url: "../actions/update_policy.php",
                data: formData,
                processData: false,
                contentType: false,
                dataType: "json",
                success: function (response) {
                    if (response.success) {
                        $('#updatePolicyModal').modal('hide');
                        alert(response.success);
                        location.reload(); // Reload the page to see the changes
                    } else {
                        alert(response.error);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log('AJAX Error:', textStatus, errorThrown);
                }
            });
        });

        function deletePolicy(id) {
            if (confirm('Are you sure you want to delete this policy?')) {
                $.ajax({
                    type: "POST",
                    url: "../actions/delete_policy.php",
                    data: { policy_id: id },
                    dataType: "json",
                    success: function (response) {
                        if (response.success) {
                            alert(response.success);
                            location.reload(); // Reload the page to see the changes
                        } else {
                            alert(response.error);
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log('AJAX Error:', textStatus, errorThrown);
                    }
                });
            }
        }

        function generateReport() {
            const reportContent = document.getElementById('reportContent');
            const reportTableBody = document.getElementById('reportTableBody');
            const ctx = document.getElementById('reportChart').getContext('2d');

            // Fetch data from the server
            fetch('../actions/generate_report.php')
                .then(response => response.json())
                .then(cases => {
                    const categories = {};
                    const pendingCases = {};
                    const underInvestigation = {};
                    const closed = {};
                    const completedCases = {};

                    cases.forEach(c => {
                        if (!categories[c.category]) {
                            categories[c.category] = 0;
                            pendingCases[c.category] = 0;
                            underInvestigation[c.category] = 0;
                            closed[c.category] = 0;
                            completedCases[c.category] = 0;
                        }

                        categories[c.category]++;

                        // Categorize based on status
                        if (c.status === 'Completed') {
                            completedCases[c.category]++;
                        } else if (c.status === 'Under Investigation') {
                            underInvestigation[c.category]++;
                        } else if (c.status === 'Closed') {
                            closed[c.category]++;
                        } else {
                            // Default to Pending if none of the above statuses match
                            pendingCases[c.category]++;
                        }
                    });

                    // Clear previous content
                    reportTableBody.innerHTML = '';

                    // Populate the table
                    for (const category in categories) {
                        const row = `
                    <tr>
                        <td>${category}</td>
                        <td>${categories[category]}</td>
                        <td>${pendingCases[category]}</td>
                        <td>${underInvestigation[category]}</td>
                        <td>${closed[category]}</td>
                        <td>${completedCases[category]}</td>
                    </tr>
                `;
                        reportTableBody.innerHTML += row;
                    }

                    // Generate chart
                    const chartData = {
                        labels: Object.keys(categories),
                        datasets: [
                            {
                                label: 'Total Cases',
                                data: Object.values(categories),
                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1
                            },
                            {
                                label: 'Pending Cases',
                                data: Object.values(pendingCases),
                                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                borderColor: 'rgba(255, 99, 132, 1)',
                                borderWidth: 1
                            },
                            {
                                label: 'Under Investigation Cases',
                                data: Object.values(underInvestigation),
                                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                borderColor: 'rgba(54, 162, 235, 1)',
                                borderWidth: 1
                            },
                            {
                                label: 'Closed Cases',
                                data: Object.values(closed),
                                backgroundColor: 'rgba(255, 206, 86, 0.2)',
                                borderColor: 'rgba(255, 206, 86, 1)',
                                borderWidth: 1
                            },
                            {
                                label: 'Completed Cases',
                                data: Object.values(completedCases),
                                backgroundColor: 'rgba(153, 102, 255, 0.2)',
                                borderColor: 'rgba(153, 102, 255, 1)',
                                borderWidth: 1
                            }
                        ]
                    };

                    new Chart(ctx, {
                        type: 'bar',
                        data: chartData,
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                })
                .catch(error => {
                    console.error('Error fetching report data:', error);
                });
        }

        

    </script>
</body>

</html>