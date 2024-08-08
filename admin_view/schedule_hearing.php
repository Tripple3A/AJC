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
            overflow: auto; /* Allow scrolling on the body */
            font-size: 12px;
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



        .container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 1000px;
            width: 100%;
            max-height: 90vh; /* Set max height */
            overflow: auto; /* Allow scrolling within the container */
            margin: 20px;
            text-align: center;
        }
        h1 {
            color: #800020; /* Wine color */
            margin-bottom: 10px;
        }
        #clock {
            font-size: 25 px;
            color: #800020; /* Wine color */
            margin-bottom: 30px;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        form input, form button {
            padding: 10px;
            margin: 10px 0;
            width: calc(50% - 20px);
            box-sizing: border-box;
            font-size: 12px;
        }
        form button {
            background-color: #800020; /* Wine color */
            color: white;
            border: none;
            cursor: pointer;
            width: 100%;
        }
        form button:hover {
            background-color: #660018; /* Darker wine color */
        }
        .email-group {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: center; /* Center align the email fields */
        }
        .email-group div {
            display: flex;
            align-items: center;
            gap: 5px;
            width: 100%;
            max-width: 600px; /* Ensure no overflow */
        }
        .email-group input {
            width: calc(100% - 40px);
        }
        .email-group button {
            width: auto;
            padding: 0 10px;
            background-color: #800020; /* Wine color */
            color: white;
            border: none;
            cursor: pointer;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            table-layout: fixed; /* Ensure the table fits within the container */
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    



    
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


        </script>


<script>

       

        document.getElementById('meetingForm').addEventListener('submit', function(e) {
            e.preventDefault(); // Prevent the default form submission
            var formData = new FormData(this);

var inchargeNames = Array.from(document.getElementsByClassName('incharge')).map(input => input.value);
var inchargeEmails = Array.from(document.getElementsByClassName('inchargeEmail')).map(input => input.value);

formData.append('inchargeNames', JSON.stringify(inchargeNames));
formData.append('inchargeEmails', JSON.stringify(inchargeEmails));

// Print form data to the console
formData.forEach((value, key) => {
    console.log(`${key}: ${value}`);
});

fetch('../actions/schedule_hearing_action.php', {
    method: 'POST',
    body: formData
})
.then(response => response.text()) // Get response as text
.then(text => {
    console.log('Response Text:', text); // Log the raw response text
        try {
        const data = JSON.parse(text); // Attempt to parse JSON
        if (data.status === 'success') {
            alert(data.message);
            document.getElementById('meetingForm').reset();



        } else {
            alert(data.message);
        }
    } catch (error) {
        console.error('Failed to parse JSON:', error);
        alert('An error occurred while processing the response.');
    }
})
.catch(error => {
    console.error('Error:', error);
    alert('An error occurred while scheduling the hearing.');
});
            
           
        });
    </script>
    <!-- Include EmailJS SDK -->
    
</body>
</html>
