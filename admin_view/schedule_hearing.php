<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Case Hearing Schedule</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Arial, sans-serif;
            margin: 0;
            background: url('/images/ashesiuni.jpeg') no-repeat center center fixed;
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
                        <a href="../admin_view/admin.php">
                            <i class='bx bxs-dashboard'></i>
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a href="../admin_view/cases.php">
                        <i class='bx bxs-briefcase'></i>
                    <span>Cases</span>
                </a>
            </li>
            <li>
                <a href="../admin_view/schedule_hearing.php">
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
            <input type="text" id="meetingTitle" placeholder="Meeting Title" required>
            <div class="email-group" id="emailGroup">
                <div>
                    <input type="text" class="incharge" placeholder="Person in Charge" required>
                    <input type="email" class="inchargeEmail" placeholder="Person in Charge Email" required>
                    <button type="button" onclick="removeEmailField(this)">-</button>
                </div>
            </div>
            <button type="button" onclick="addEmailField()">Add Person in Charge</button>
            <input type="text" id="studentName" placeholder="Name of Student" required>
            <input type="email" id="studentEmail" placeholder="Student Email" required>
            <input type="text" id="roomNumber" placeholder="Conference Room Number" required>
            <input type="date" id="meetingDate" placeholder="Date" required>
            <input type="time" id="meetingTime" placeholder="Time" required>
            <button type="submit">Add Meeting</button>
        </form>

        <table id="meetingTable">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Person in Charge</th>
                    <th>Person in Charge Email</th>
                    <th>Student Name</th>
                    <th>Student Email</th>
                    <th>Conference Room Number</th>
                    <th>Date</th>
                    <th>Time</th>
                </tr>
            </thead>
            <tbody>
                <!-- Meetings will be added here -->
            </tbody>
        </table>
    </div>

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

        // Function to send email notifications (uses EmailJS)
        function sendEmail(toEmail, subject, body) {
            emailjs.send("YOUR_SERVICE_ID", "YOUR_TEMPLATE_ID", {
                to_email: toEmail,
                subject: subject,
                message: body
            }).then(function(response) {
                console.log("Email sent successfully!", response.status, response.text);
            }, function(error) {
                console.error("Failed to send email", error);
            });
        }

        document.getElementById('meetingForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get form values
            var title = document.getElementById('meetingTitle').value;
            var studentName = document.getElementById('studentName').value;
            var studentEmail = document.getElementById('studentEmail').value;
            var roomNumber = document.getElementById('roomNumber').value;
            var date = document.getElementById('meetingDate').value;
            var time = document.getElementById('meetingTime').value;

            // Get all persons in charge and their emails
            var inchargeNames = Array.from(document.getElementsByClassName('incharge')).map(input => input.value);
            var inchargeEmails = Array.from(document.getElementsByClassName('inchargeEmail')).map(input => input.value);

            // Create a new row and cells
            var table = document.getElementById('meetingTable').getElementsByTagName('tbody')[0];
            var newRow = table.insertRow();
            var cell1 = newRow.insertCell(0);
            var cell2 = newRow.insertCell(1);
            var cell3 = newRow.insertCell(2);
            var cell4 = newRow.insertCell(3);
            var cell5 = newRow.insertCell(4);
            var cell6 = newRow.insertCell(5);
            var cell7 = newRow.insertCell(6);
            var cell8 = newRow.insertCell(7);

            // Add values to cells
            cell1.innerHTML = title;
            cell2.innerHTML = inchargeNames.join(', ');
            cell3.innerHTML = inchargeEmails.join(', ');
            cell4.innerHTML = studentName;
            cell5.innerHTML = studentEmail;
            cell6.innerHTML = roomNumber;
            cell7.innerHTML = date;
            cell8.innerHTML = time;

            // Clear form
            document.getElementById('meetingForm').reset();
        });
    </script>
    <!-- Include EmailJS SDK -->
    <script type="text/javascript" src="https://cdn.emailjs.com/dist/email.min.js"></script>
    <script type="text/javascript">
        (function(){
            emailjs.init("YOUR_USER_ID"); // Replace with your EmailJS user ID
        })();
    </script>
</body>
</html>
