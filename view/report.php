<?php
include '../settings/core.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJMS</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Arial, sans-serif;
            margin: 0;
            background-size: cover;
            color: #333;
            display: flex;
            align-items: center;
            height: 100vh;
            overflow: auto;
            font-size: 12px;
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

        .container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 1000px;
            width: 100%;
            max-height: 90vh;
            overflow: auto;
            margin: 20px;
            text-align: center;
        }

        h1 {
            color: #800020;
            margin-bottom: 10px;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        form input,
        form textarea,
        form select,
        form button {
            padding: 10px;
            margin: 10px 0;
            box-sizing: border-box;
            font-size: 16px;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
        }

        form button {
            background-color: #800020;
            color: white;
            border: none;
            cursor: pointer;
            width: 15%;
        }

        form button:hover {
            background-color: #660018;
        }

        .contact-group {
            display: flex;
            gap: 10px;
        }

        .contact-group .form-group {
            flex: 1;
            min-width: 0;
        }

        .contact-group input {
            width: 100%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            table-layout: fixed;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            word-wrap: break-word;
        }

        th {
            background-color: #800020;
            color: white;
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

<div class="container">
    <h1>Ashesi Judicial System Report</h1>
    <form id="reportForm">
        <div class="form-group">
            <label for="studentName">Student Name</label>
            <input type="text" id="studentName" name="studentName" required>
        </div>
        <div class="contact-group">
            <div class="form-group">
                <label for="phoneNumber">Phone Number</label>
                <input type="text" id="phoneNumber" name="phoneNumber" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
        </div>
        <div class="form-group">
            <label for="caseTitle">Case Title</label>
            <input type="text" id="caseTitle" name="caseTitle" required>
        </div>
        <div class="form-group">
            <label for="caseType">Select Case Type:</label>
            <select name="caseType" id="caseType">
                <option value="0">Select</option>

                <?php
                include "../functions/select_case_type.php";

                //Looping through the roles to build the options
                foreach ($roles as $role) {
                    echo '<option value="' . $role['case_type_id'] . '">' . $role['case_type_description'] . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="caseDetails">Case Details:</label>
            <textarea id="caseDetails" name="caseDetails" rows="4" placeholder="Provide details about the case"></textarea>
        </div>
        <div class="form-group">
            <label for="evidence">Upload Evidence (optional)</label>
            <input type="file" id="evidence" name="evidence">
        </div>
        <button type="submit">Submit Report</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        function validateForm() {
            const studentName = document.getElementById('studentName').value;
            const phoneNumber = document.getElementById('phoneNumber').value;
            const email = document.getElementById('email').value;
            const caseTitle = document.getElementById('caseTitle').value;
            const caseType = document.getElementById('caseType').value;

            // Validation rules
            const nameRegex = /^[a-zA-Z ]+$/;
            const phoneRegex = /^[0-9]+$/;
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            const titleRegex = /^[a-zA-Z0-9 ]+$/;

            if (!nameRegex.test(studentName)) {
                alert("Student Name can only contain letters and spaces.");
                return false;
            }

            if (!phoneRegex.test(phoneNumber)) {
                alert("Phone Number can only contain numbers.");
                return false;
            }

            if (!emailRegex.test(email)) {
                alert("Invalid Email format.");
                return false;
            }

            if (!titleRegex.test(caseTitle)) {
                alert("Case Title can only contain letters, numbers, and spaces.");
                return false;
            }

            if (caseType === "0") {
                alert("Please select a Case Type.");
                return false;
            }

            return true;
        }

        $('#reportForm').submit(function(event) {
            event.preventDefault(); // Prevent the default form submission

            if (validateForm()) {
                var formData = new FormData(this); // Create FormData object from the form

                $.ajax({
                    type: "POST",
                    url: "../actions/report_case.php",
                    data: formData,
                    processData: false, // Important: Tell jQuery not to process the data
                    contentType: false, // Important: Tell jQuery not to set content type
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        if (response.success) {
                            alert('Report submitted successfully!');
                            $('#reportForm')[0].reset(); // Reset the form
                        } else {
                            // Handle errors
                            alert('Error submitting report. Please try again.');
                        }
                    },
                    error: function() {
                        alert('Error submitting report. Please try again.');
                    }
                });
            }
        });
    });
</script>

</body>
</html>
