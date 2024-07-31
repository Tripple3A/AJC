<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ashesi Judicial System Report</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Arial, sans-serif;
            margin: 0;
            background: url('/ashesiuni.jpeg') no-repeat center center fixed;
            background-size: cover;
            color: #333;
            display: flex;
            /*justify-content: center;*/
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
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            text-align: left; /* Align text to the left for form fields */
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        form input, form textarea, form select, form button {
            padding: 10px;
            margin: 10px 0;
            box-sizing: border-box;
            font-size: 16px; /* Adjusted font size for better readability */
        }
        .form-group input, .form-group textarea, .form-group select {
            width: 100%;
        }
        form button {
            background-color: #800020; /* Wine color */
            color: white;
            border: none;
            cursor: pointer;
            width: 15%;
        }
        form button:hover {
            background-color: #660018; /* Darker wine color */
        }
        .contact-group {
            display: flex;
            gap: 10px;
        }
        .contact-group .form-group {
            flex: 1;
            min-width: 0; /* Prevent overflow */
        }
        .contact-group input {
            width: 100%; /* Full width within the column */
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
                        <a href="../view/studentdashboard.php">
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
                <a href="../view/cases.php">
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
        <form id="reportForm" onsubmit="submitReport(event)">
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
                <select id="caseType">
                    <option value="criminal">Criminal</option>
                    <option value="civil">Civil</option>
                    <option value="family">Family</option>
                    <option value="property">Property</option>
                </select>
            </div>
            <div class="form-group">
                <label for="caseDetails">Case Details:</label>
                <textarea id="caseDetails" rows="4" placeholder="Provide details about the case"></textarea>
            </div>
            <div class="form-group">
                <label for="evidence">Upload Evidence (optional)</label>
                <input type="file" id="evidence" name="evidence">
            </div>
            <button type="submit">Submit Report</button>
        </form>
    </div>

    <script>
        // Function to handle form submission
        function submitReport(event) {
            event.preventDefault(); // Prevent the default form submission

            const studentName = document.getElementById('studentName').value;
            const caseTitle = document.getElementById('caseTitle').value;
            const caseType = document.getElementById('caseType').value;
            const caseDetails = document.getElementById('caseDetails').value;
            const phoneNumber = document.getElementById('phoneNumber').value;
            const email = document.getElementById('email').value;
            const evidence = document.getElementById('evidence').files[0];

            // Normally, here you would send the data to the server using AJAX or fetch API
            // For demonstration purposes, we will just log the values
            console.log({
                studentName,
                caseTitle,
                caseType,
                caseDetails,
                phoneNumber,
                email,
                evidence: evidence ? evidence.name : 'No file uploaded'
            });

            // Display confirmation message (optional)
            alert('Report submitted successfully!');

            // Clear the form
            document.getElementById('reportForm').reset();
        }
    </script>

</body>
</html>
