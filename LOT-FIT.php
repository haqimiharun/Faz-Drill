<?php require_once('header.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Well Info Input</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f7f9fc;
            color: #333;
            padding: 20px;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            flex-direction: column;
        }

        .wrapper {
            display: flex;
            flex-direction: column; /* Stack rows vertically */
            gap: 25px; /* Space between rows */
            width: 100%;
            max-width: 1800px;
        }

        .row {
            display: flex;
            gap: 25px; /* Space between containers in a row */
            flex-wrap: wrap; /* Ensure wrapping on smaller screens */
        }

        .container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            padding: 25px;
            flex: 1;
            min-width: 350px;
            box-sizing: border-box;
        }

        .container h2 {
            margin-bottom: 30px;
            color: #42C3FC;
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            font-weight: bold;
            /* display: block; */
            margin-bottom: 5px;
        }

        .form-group input[type="text"],
        .form-group input[type="number"],
        .form-group select {
            width: calc(100% - 20px);
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ddd;
            box-sizing: border-box;
        }

        .personnel-group input[type="number"] {
            width: 100%;
            margin-bottom: 10px;
        }

        .form-group .checkbox-group,
        .form-group .radio-group {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .checkbox-group label,
        .radio-group label {
            flex: 1;
            min-width: 120px;
        }

        .form-group input[type="checkbox"],
        .form-group input[type="radio"] {
            margin-right: 5px;
        }

            .btn-group {
            text-align: center;
            margin-top: 20px;
        }

        .btn-group button {
            padding: 10px 20px;
            background-color: #42C3FC;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .btn-group button:hover {
            background-color: #005E88;
        }

    @media (max-width: 768px) {
        body {
            padding: 10px;
        }

        .wrapper {
            flex-direction: column; /* Stack rows vertically on small screens */
        }

        .row {
            flex-direction: column; /* Stack containers vertically in each row on small screens */
        }

        .container {
            flex: 1 1 100%;
            min-width: 100%;
        }

        }

            /* General styling for datetime-local input */
        input[type="datetime-local"] {
            width: calc(100% - 20px);
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ddd;
            box-sizing: border-box;
            background-color: #ffffff;
            color: #333;
            font-size: 14px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Hover effect */
        input[type="datetime-local"]:hover {
            border-color: #42C3FC;
        }

        /* Focus effect */
        input[type="datetime-local"]:focus {
            border-color: #42C3FC;
            outline: none;
            box-shadow: 0 0 5px rgba(66, 195, 252, 0.5);
        }

        /* Disabled state */
        input[type="datetime-local"]:disabled {
            background-color: #f0f0f0;
            color: #999;
            border-color: #ddd;
            cursor: not-allowed;
        }

        /* Placeholder styling (not all browsers support this for datetime-local) */
        input[type="datetime-local"]::placeholder {
            color: #999;
            opacity: 1; /* Ensures placeholder is visible */
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <h1 style="text-align: center;">LOT / FIT</h1>
        <div class="row">
            <div class="container">
                <h2>Leaks Of Test</h2>
                <form action="#" method="post">
                    <div class="form-group">
                        <label for="date-time-LOT">Date & Time</label>
                        <input type="datetime-local" id="date-time-LOT" name="date-time-LOT" placeholder="Enter Date and Time">
                    </div>
                    <div class="form-group">
                        <label for="depth-LOT">Depth of LOT</label>
                        <input type="text" id="depth-LOT" name="depth-LOT" placeholder="Enter Depth of LOT">
                    </div>
                    <h3>Test Parameter</h3>
                    <div class="form-group">
                        <label for="TP-pumprate">Pump rate during test</label>
                        <input type="text" id="TP-pumprate" name="TP-pumprate" placeholder="Enter Pump Rate during test">
                    </div>
                    <div class="form-group">
                        <label for="TP-maxSurfacePres">Maximum surface pressure achieved</label>
                        <input type="text" id="TP-maxSurfacePres" name="TP-maxSurfacePres" placeholder="Enter Maximum surface pressure achieved">
                    </div>
                    <div class="form-group">
                        <label for="TP-volPumped">Volume pumped before leak-off</label>
                        <input type="text" id="TP-volPumped" name="TP-volPumped" placeholder="Enter Volume pumped before leak-off">
                    </div>
                    <div class="form-group">
                        <label for="leakOff-pres">Leak-off Pressure</label>
                        <input type="text" id="leakOff-pres" name="leakOff-pres" placeholder="Enter Leak-off Pressure">
                    </div>
                </form>
            </div>

            <div class="container">
                <h2>Formation Intergrity Test</h2>
                <form action="#" method="post">
                    <div class="form-group">
                        <label for="date-time-FIT">Date & Time</label>
                        <input type="datetime-local" id="date-time-FIT" name="date-time-FIT" placeholder="Enter Date and Time">
                    </div>
                    <div class="form-group">
                        <label for="depth-FIT">Depth of FIT</label>
                        <input type="text" id="depth-FIT" name="depth-FIT" placeholder="Enter Depth of FIT">
                    </div>
                    <h3>Test Parameter</h3>
                    <div class="form-group">
                        <label for="minPressFIT">Minimum Pressure of FIT</label>
                        <input type="text" id="minPressFIT" name="minPressFIT" placeholder="Enter Pump Rate during test">
                    </div>
                    <div class="form-group">
                        <label for="maxPressFIT">Maximum Pressure of FIT</label>
                        <input type="text" id="maxPressFIT" name="maxPressFIT" placeholder="Enter Maximum surface pressure achieved">
                    </div>
                    <div class="form-group">
                        <label for="testDurationFIT">Test Duration for FIT</label>
                        <input type="text" id="testDurationFIT" name="testDurationFIT" placeholder="Enter Test Duration for FIT">
                    </div>
                </form>
            </div>
        </div>
                <div class="btn-group">
            <button type="submit">Submit</button>
        </div>
    </div>

</body>
</html>

<?php require_once('footer.php'); ?>