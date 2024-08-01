<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="chore icon.png">
    <title>Admin Case Management System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        body {
            background-image: url('/images/ashesiuni.jpeg'); /* Replace with your image URL */
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
    </style>
</head>
<body>
    <div class="main-content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="welcome-msg">
                <h2>Admin Cases Management</h2>
            </div>
            <button class="btn btn-wine" data-toggle="modal" data-target="#addCaseModal">Add Case</button>
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
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody id="casesTable">
                <!-- Sample rows -->
                <tr>
                    <td>1</td>
                    <td>Missing item in dorm</td>
                    <td>2024-07-21</td>
                    <td>
                        <select class="form-control" onchange="updateStatus(this)">
                            <option value="Pending">Pending</option>
                            <option value="Completed">Completed</option>
                        </select>
                    </td>
                    <td>
                        <button class="btn btn-warning btn-sm" onclick="editCase(this)">Edit</button>
                        <button class="btn btn-danger btn-sm" onclick="deleteCase(this)">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Roommate conflict</td>
                    <td>2024-07-19</td>
                    <td>
                        <select class="form-control" onchange="updateStatus(this)">
                            <option value="Pending">Pending</option>
                            <option value="Completed" selected>Completed</option>
                        </select>
                    </td>
                    <td>
                        <button class="btn btn-warning btn-sm" onclick="editCase(this)">Edit</button>
                        <button class="btn btn-danger btn-sm" onclick="deleteCase(this)">Delete</button>
                    </td>
                </tr>
                <!-- Additional rows can be added here -->
            </tbody>
        </table>
    </div>

    <!-- Add Case Modal -->
    <div class="modal fade" id="addCaseModal" tabindex="-1" aria-labelledby="addCaseModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCaseModalLabel">Add New Case</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addCaseForm">
                        <div class="form-group">
                            <label for="caseDescription">Case Description</label>
                            <input type="text" class="form-control" id="caseDescription" required>
                        </div>
                        <div class="form-group">
                            <label for="dateReported">Date Reported</label>
                            <input type="date" class="form-control" id="dateReported" required>
                        </div>
                        <div class="form-group">
                            <label for="caseStatus">Status</label>
                            <select class="form-control" id="caseStatus">
                                <option value="Pending">Pending</option>
                                <option value="Completed">Completed</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-wine">Add Case</button>
                    </form>
                </div>
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

        // JavaScript functions to handle case actions
        function updateStatus(selectElement) {
            var status = selectElement.value;
            console.log("Status updated to: " + status);
            // Implement your status update logic here
        }

        function editCase(button) {
            var row = button.parentElement.parentElement;
            var caseId = row.cells[0].innerText;
            var description = row.cells[1].innerText;
            var dateReported = row.cells[2].innerText;
            var status = row.cells[3].children[0].value;

            // Implement your edit logic here
            console.log("Editing case:", caseId, description, dateReported, status);
        }

        function deleteCase(button) {
            var row = button.parentElement.parentElement;
            row.remove();
            // Implement your delete logic here
            console.log("Case deleted");
        }

        // Handle add case form submission
        document.getElementById('addCaseForm').addEventListener('submit', function(e) {
            e.preventDefault();
            var description = document.getElementById('caseDescription').value;
            var dateReported = document.getElementById('dateReported').value;
            var status = document.getElementById('caseStatus').value;

            // Add new case to the table
            var newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td></td>
                <td>${description}</td>
                <td>${dateReported}</td>
                <td>
                    <select class="form-control" onchange="updateStatus(this)">
                        <option value="Pending"${status === 'Pending' ? ' selected' : ''}>Pending</option>
                        <option value="Completed"${status === 'Completed' ? ' selected' : ''}>Completed</option>
                    </select>
                </td>
                <td>
                    <button class="btn btn-warning btn-sm" onclick="editCase(this)">Edit</button>
                    <button class="btn btn-danger btn-sm" onclick="deleteCase(this)">Delete</button>
                </td>
            `;
            document.getElementById('casesTable').appendChild(newRow);

            // Close the modal
            $('#addCaseModal').modal('hide');

            // Reset the form
            this.reset();

            // Update case IDs
            updateCaseIds();
        });

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
