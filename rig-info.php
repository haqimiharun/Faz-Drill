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
            min-width: 350px; /* Ensures the container won't shrink below this width */
            max-width: 600px; /* Sets a maximum width */
            width: 60%; /* You can set a percentage width or use a fixed width (e.g., 400px) */
            height: auto; /* Automatically adjusts height based on content */
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
        <h1 style="text-align: center;">Rig Information</h1>
        <div class="row">
            <div class="container">
                <form action="#" method="post">
           <div class="form-group">
                <label for="rig-name-1">Rig Name 1</label>
                <select id="rig-name-1" name="rig-name-1">
                    <!-- Options retrieved from database -->
                </select>
            </div>
            <div class="form-group">
                <label for="rig-name-2">Rig Name 2</label>
                <select id="rig-name-2" name="rig-name-2">
                    <!-- Options retrieved from database -->
                </select>
            </div>
            <div class="form-group">
                <label for="rig-type">Rig Type</label>
                <select id="rig-type" name="rig-type">
                    <!-- Options retrieved from database -->
                </select>
            </div>
            <div class="form-group">
                <label for="drilling-contractor">Drilling Contractor</label>
                <select id="drilling-contractor" name="drilling-contractor">
                    <!-- Options retrieved from database -->
                </select>
            </div>
            <div class="form-group">
                <label for="daily-operation-cost">Daily Operation Cost (USD)</label>
                <select id="daily-operation-cost" name="daily-operation-cost">
                    <!-- Options retrieved from database -->
                </select>
            </div>
            <div class="form-group">
                <label for="blue-flag">Blue Flag (USD)</label>
                <select id="blue-flag" name="blue-flag">
                    <!-- Options retrieved from database -->
                </select>
            </div>
            <div class="form-group">
                <label for="yellow-flag">Yellow Flag (USD)</label>
                <select id="yellow-flag" name="yellow-flag">
                    <!-- Options retrieved from database -->
                </select>
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