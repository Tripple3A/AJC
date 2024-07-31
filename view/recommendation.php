<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Case Verdict Recommendation</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Arial, sans-serif;
            margin: 0;
            background: url('/images/ashesiuni.jpeg') no-repeat center center fixed;
            background-size: cover;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: auto; /* Allow scrolling on the body */
            font-size: 12px;
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
    </style>
</head>
<body>

    <div class="container">
        <h1>Case Verdict Recommendation System</h1>
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
            <label for="caseSeverity">Select Case Severity:</label>
            <select id="caseSeverity">
                <option value="minor">Minor</option>
                <option value="moderate">Moderate</option>
                <option value="major">Major</option>
                <option value="critical">Critical</option>
            </select>
        </div>
        <div class="form-group">
            <label for="caseDetails">Case Details:</label>
            <textarea id="caseDetails" rows="4" placeholder="Provide details about the case"></textarea>
        </div>
        <button onclick="getVerdictions()">Get Verdict Recommendations</button>
        <div id="verdicts" class="verdicts">
            <!-- Verdicts will be displayed here -->
        </div>
    </div>

    <script>
        const verdictsData = {
            criminal: [
                { severity: "minor", verdict: "Probation" },
                { severity: "moderate", verdict: "Community Service" },
                { severity: "major", verdict: "Imprisonment" },
                { severity: "critical", verdict: "Extended Imprisonment" }
            ],
            civil: [
                { severity: "minor", verdict: "Monetary Compensation" },
                { severity: "moderate", verdict: "Injunction" },
                { severity: "major", verdict: "Contract Revision" },
                { severity: "critical", verdict: "Settlement Agreement" }
            ],
            family: [
                { severity: "minor", verdict: "Custody Arrangement" },
                { severity: "moderate", verdict: "Child Support" },
                { severity: "major", verdict: "Alimony" },
                { severity: "critical", verdict: "Permanent Custody" }
            ],
            property: [
                { severity: "minor", verdict: "Property Repair Order" },
                { severity: "moderate", verdict: "Property Value Adjustment" },
                { severity: "major", verdict: "Eviction" },
                { severity: "critical", verdict: "Property Transfer" }
            ]
        };

        function getVerdictions() {
            const caseType = document.getElementById('caseType').value;
            const caseSeverity = document.getElementById('caseSeverity').value;
            const caseDetails = document.getElementById('caseDetails').value;
            const verdictsDiv = document.getElementById('verdicts');

            // Filter verdicts based on the selected case type and severity
            let items = verdictsData[caseType] || [];
            let verdict = items.find(item => item.severity === caseSeverity);

            // Generate HTML for verdicts
            const verdictHtml = verdict 
                ? `<div class="verdict-item">
                    <strong>Case Type:</strong> ${caseType}<br>
                    <strong>Severity:</strong> ${caseSeverity}<br>
                    <strong>Recommended Verdict:</strong> ${verdict.verdict}<br>
                    <strong>Case Details:</strong> ${caseDetails}
                </div>`
                : 'No verdict recommendations available for the selected case type and severity.';

            verdictsDiv.innerHTML = verdictHtml;
        }
    </script>

</body>
</html>
