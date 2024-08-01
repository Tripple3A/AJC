<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="chore icon.png">
    <title>Chore Management System - Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        body {
            background-color: #f8f9fa;
            background-image: url('../images/ashesiuni.jpeg'); 
            align-content: center;
        }

        .main-content {
            margin-left: 50px;
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
            margin-bottom: 20px;
        }
        .card-header {
            background-color: #722f37; /* Wine color */
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
        .modal-header, .modal-body {
            background-color: #f8f9fa;
        }
        .modal-title {
            color: #722f37; /* Wine color */
        }
    </style>
</head>
<body>

    <div class="main-content">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <a class="navbar-brand" href="#">University Policies</a>
        </nav>

        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="search-bar"><br>
                    <input type="text" class="form-control" id="searchInput" placeholder="Search for a policy...">
                </div>
                <button class="btn btn-wine" data-toggle="modal" data-target="#addPolicyModal">
                    <i class='bx bx-plus'></i> Add Policy
                </button>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Policy List</h5>
                        </div>
                        <ul class="list-group list-group-flush" id="policyList">
                            <!-- Policy list items will be dynamically loaded here -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Policy Modal -->
        <div class="modal fade" id="addPolicyModal" tabindex="-1" role="dialog" aria-labelledby="addPolicyModalLabel" aria-hidden="true">
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
                                <input type="text" class="form-control" id="policyTitle" required>
                            </div>
                            <div class="form-group">
                                <label for="policyDescription">Policy Description</label>
                                <textarea class="form-control" id="policyDescription" rows="3" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-wine">Add Policy</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Mock data for policies
        const policies = [
            { id: 1, title: 'Attendance Policy', description: 'Policy regarding student attendance.' },
            { id: 2, title: 'Disciplinary Actions', description: 'Policy for handling student discipline.' },
            { id: 3, title: 'Academic Integrity', description: 'Policy on academic honesty and integrity.' }
        ];

        // Render policies
        function renderPolicies() {
            const policyList = document.getElementById('policyList');
            policyList.innerHTML = '';
            policies.forEach(policy => {
                const policyItem = `
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <h5>${policy.title}</h5>
                            <p>${policy.description}</p>
                        </div>
                        <div>
                            <button class="btn btn-wine btn-sm btn-icon" onclick="updatePolicy(${policy.id})">
                                <i class='bx bx-edit'></i> Update
                            </button>
                            <button class="btn btn-danger btn-sm btn-icon ml-2" onclick="deletePolicy(${policy.id})">
                                <i class='bx bx-trash'></i> Delete
                            </button>
                        </div>
                    </li>
                `;
                policyList.innerHTML += policyItem;
            });
        }

        // Call renderPolicies initially
        renderPolicies();

        // Search functionality
        document.getElementById('searchInput').addEventListener('keyup', function() {
            var input = this.value.toLowerCase();
            var items = document.getElementsByClassName('list-group-item');
            for (var i = 0; i < items.length; i++) {
                var item = items[i];
                var text = item.innerText.toLowerCase();
                item.style.display = text.includes(input) ? '' : 'none';
            }
        });

        // Functions for Admin actions
        function updatePolicy(id) {
            alert(`Update functionality for policy ID ${id} not implemented.`);
        }

        function deletePolicy(id) {
            if (confirm(`Are you sure you want to delete policy ID ${id}?`)) {
                // Remove policy from the list
                const index = policies.findIndex(policy => policy.id === id);
                if (index > -1) {
                    policies.splice(index, 1);
                    renderPolicies();
                }
            }
        }

        document.getElementById('addPolicyForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const title = document.getElementById('policyTitle').value;
            const description = document.getElementById('policyDescription').value;

            // Add new policy to the list
            const newPolicy = {
                id: policies.length + 1,
                title: title,
                description: description
            };
            policies.push(newPolicy);
            renderPolicies();
            $('#addPolicyModal').modal('hide');
        });
    </script>
</body>
</html>
