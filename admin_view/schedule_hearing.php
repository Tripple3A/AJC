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
            /*background: url('/images/ashesiuni.jpeg') no-repeat center center fixed;*/
            background-size: cover;
            color: #333;
            display: flex;
            /* justify-content: center;*/
            align-items: center;
            height: 100vh;
            overflow: auto;
            /* Allow scrolling on the body */
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



        .container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 1000px;
            width: 100%;
            max-height: 90vh;
            /* Set max height */
            overflow: auto;
            /* Allow scrolling within the container */
            margin: 20px;
            text-align: center;
        }

        h1 {
            color: #800020;
            /* Wine color */
            margin-bottom: 10px;
        }

        #clock {
            font-size: 25 px;
            color: #800020;
            /* Wine color */
            margin-bottom: 30px;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        form input,
        form button {
            padding: 10px;
            margin: 10px 0;
            width: calc(50% - 20px);
            box-sizing: border-box;
            font-size: 12px;
        }

        form button {
            background-color: #800020;
            /* Wine color */
            color: white;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        form button:hover {
            background-color: #660018;
            /* Darker wine color */
        }

        .email-group {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: center;
            /* Center align the email fields */
        }

        .email-group div {
            display: flex;
            align-items: center;
            gap: 5px;
            width: 100%;
            max-width: 600px;
            /* Ensure no overflow */
        }

        .email-group input {
            width: calc(100% - 40px);
        }

        .email-group button {
            width: auto;
            padding: 0 10px;
            background-color: #800020;
            /* Wine color */
            color: white;
            border: none;
            cursor: pointer;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            table-layout: fixed;
            /* Ensure the table fits within the container */
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
            /* Ensure long words break properly */
        }

        th {
            background-color: #800020;
            /* Wine color */
            color: white;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>

<body>

    <div class="sidebar">
        <div class="logo">
            <img src="../images/ASHLOGO.jpeg" alt="Logo">
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

    <div class="container">
        <h1 style="font-size: 50px;">Schedule Case Hearing</h1>
        <p style="color: #800020;">Current Time</p>
        <div id="clock"></div>

        <form id="meetingForm">
            <input type="text" id="meetingTitle" name="meetingTitle" placeholder="Meeting Title" required>
            <div class="email-group" id="emailGroup">
                <div>
                    <input type="text" class="incharge" class="incharge" placeholder="Person in Charge" required>
                    <input type="email" class="inchargeEmail" placeholder="Person in Charge Email" required>
                    <button type="button" onclick="removeEmailField(this)">-</button>
                </div>
            </div>
            <button type="button" onclick="addEmailField()">Add Person in Charge</button>
            <input type="text" name="studentName" id="studentName" placeholder="Name of Student" required>
            <input type="email" name="studentEmail" id="studentEmail" placeholder="Student Email" required>
            <input type="text" name="roomNumber" id="roomNumber" placeholder="Conference Room Number" required>
            <input type="date" name="meetingDate" id="meetingDate" placeholder="Date" required>
            <input type="time" name="meetingTime" id="meetingTime" placeholder="Time" required>
            <button type="submit">Add Meeting</button>

        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Update the clock
        function updateClock() {
            const clock = document.getElementById('clock');
            const now = new Date();
            clock.innerHTML = now.toLocaleTimeString();
        }

        // Update clock every second
        setInterval(updateClock, 1000);
        // Initialize clock
        updateClock();

        // Function to add a new email field
        function addEmailField() {
            const emailGroup = document.getElementById('emailGroup');
            const div = document.createElement('div');
            div.innerHTML = `
            <input type="text" class="incharge" placeholder="Person in Charge" required>
            <input type="email" class="inchargeEmail" placeholder="Person in Charge Email" required>
            <button type="button" onclick="removeEmailField(this)">-</button>
        `;
            emailGroup.appendChild(div);
        }

        // Function to remove an email field
        function removeEmailField(button) {
            const emailGroup = document.getElementById('emailGroup');
            emailGroup.removeChild(button.parentNode);
        }

        // Function to validate form inputs
        function validateForm() {
            const studentName = document.getElementById('studentName').value;
            const studentEmail = document.getElementById('studentEmail').value;
            const roomNumber = document.getElementById('roomNumber').value;
            const meetingDate = document.getElementById('meetingDate').value;
            const meetingTime = document.getElementById('meetingTime').value;
            const inchargeNames = Array.from(document.getElementsByClassName('incharge')).map(input => input.value);
            const inchargeEmails = Array.from(document.getElementsByClassName('inchargeEmail')).map(input => input.value);

            // Add validation similar to the report form validation

            return true; // Return true if all validations pass
        }

        $('#meetingForm').submit(function(event) {
            event.preventDefault(); // Prevent the default form submission

            if (validateForm()) {
                var formDataObj = {};

                const studentName = document.getElementById('studentName').value;
                const studentEmail = document.getElementById('studentEmail').value;
                const roomNumber = document.getElementById('roomNumber').value;
                const meetingDate = document.getElementById('meetingDate').value;
                const meetingTime = document.getElementById('meetingTime').value;
                const inchargeNames = Array.from(document.getElementsByClassName('incharge')).map(input => input.value);
                const inchargeEmails = Array.from(document.getElementsByClassName('inchargeEmail')).map(input => input.value);

                formDataObj['meetingTitle'] = document.getElementById('meetingTitle').value;
                formDataObj['studentEmail'] = studentEmail;
                formDataObj['roomNumber'] = roomNumber;
                formDataObj['studentName'] = studentName;
                formDataObj['meetingDate'] = meetingDate;
                formDataObj['meetingTime'] = meetingTime;
                formDataObj['inchargeNames'] = inchargeNames;
                formDataObj['inchargeEmails'] = inchargeEmails;

                // var formData = new FormData(this); // Create FormData object from the form

                // formData.forEach(function(value, key) {
                //     formDataObj[key] = value;
                // });
                var jsonString = JSON.stringify(formDataObj);
                console.log(jsonString); // Log the JSON string

                $.ajax({
                    type: "POST",
                    url: "../actions/schedule_hearing_action.php",
                    data: jsonString,
                    contentType: "application/json",
                    processData: false, // Important: Tell jQuery not to process the data
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        if (response.status === 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: response.message,
                            }).then(() => {
                                $('#meetingForm')[0].reset(); // Reset the form
                            });
                        } else {
                            // Handle errors
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: response.message,
                            });
                        }
                    },
                    error: function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Error scheduling hearing. Please try again.',
                        });
                    }
                });
            }
        });
    </script>
    <!-- Include EmailJS SDK if needed -->
</body>

</html>