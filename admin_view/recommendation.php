<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJMS - Integrated Chatbot Verdict System</title>
    <style>
        /* ... (previous styles remain the same) ... */
          body {
            font-family: 'Helvetica Neue', Arial, sans-serif;
            margin: 0;
           /* background: url('/images/ashesiuni.jpeg') ;*/
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
            margin-bottom: 20px;
            font-size: 50px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group select, .form-group input, .form-group textarea {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            background-color: #800020; /* Wine color */
            color: #fff;
            cursor: pointer;
        }
        button:hover {
            background-color: #660018; /* Darker wine color */
        }
        .verdicts {
            margin-top: 20px;
            text-align: left;
        }
        .verdict-item {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        .verdict-item:last-child {
            border-bottom: none;
        }



        .chatbot-container {
            margin-top: 20px;
            width: 100%;
            height: 500px; /* Adjust the height as needed */
            max-height: 70vh; /* Ensure it fits within the viewport */
            overflow: auto; /* Allow scrolling within the container */
        }

        .chatbot-container iframe {
            width: 100%;
            height: 100%;
            border: none; /* Remove the border */
        }

        .chatbot-input {
            margin-top: 20px;
            width: 100%;
        }

        .chatbot-response {
            margin-top: 20px;
            padding: 10px;
            background-color: #f0f0f0;
            border-radius: 4px;
        }

        #loading {
            display: none;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <!-- ... (sidebar code remains the same) ... -->
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
        <h1>Case Verdict Recommendation System</h1>
        
        <div class="chatbot-container">
            <iframe
                id="chatbotFrame"
                src="https://www.chatbase.co/chatbot-iframe/hK6YRJwYHvFKGzxrUa2v4"
            ></iframe>
        </div>
        <div class="chatbot-response" id="chatbotResponse"></div>
    </div>

    <script>
        const debounce = (func, wait) => {
            let timeout;
            return (...args) => {
                clearTimeout(timeout);
                timeout = setTimeout(() => func.apply(this, args), wait);
            };
        };

        const sendToChatbot = debounce(() => {
            const caseDetails = document.getElementById('caseDetails').value;
            const message = `Case Details: ${caseDetails}\n\nPlease provide a detailed analysis and verdict prediction for this case.`;
            const chatbotFrame = document.getElementById('chatbotFrame');
            chatbotFrame.contentWindow.postMessage({ type: 'chat-message', message: message }, '*');
        }, 1000);

        document.getElementById('caseDetails').addEventListener('input', sendToChatbot);

        window.addEventListener('message', (event) => {
            if (event.origin === 'https://www.chatbase.co') {
                const data = event.data;
                if (data.type === 'chat-response') {
                    const chatbotResponse = document.getElementById('chatbotResponse');
                    chatbotResponse.innerHTML = data.message;
                }
            }
        });
    </script>
</body>
</html>