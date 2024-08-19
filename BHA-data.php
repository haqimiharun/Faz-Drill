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

        .table-custom {
    border-collapse: collapse;
    width: 100%;
}

.table-custom th, .table-custom td {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: center;
    font-size: 14px;
}

.table-custom th {
    background-color: #f4f6f8;
    color: #333;
    font-weight: bold;
}

.table-custom td {
    background-color: #ffffff;
}

.table-custom input[type="text"] {
    width: calc(100% - 10px);
    padding: 6px;
    border-radius: 4px;
    border: 1px solid #ddd;
    box-sizing: border-box;
}

.table-wrapper {
    overflow-x: auto;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    font-weight: bold;
    display: block;
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

    .table-wrapper {
        overflow-x: auto;
    }
    .table-custom {
        width: auto;
    }
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <h1 style="text-align: center;">Bottom Hole Assembly (BHA)</h1>
        <div class="row">
            <div class="container">
                <form action="process.php" method="POST">
                    <div class="table-wrapper">
                        <table class="table-custom">
                            <thead>
                                <tr>
                                    <th></th> <!-- Empty top-left corner cell -->
                                    <th>Outside Diameter (OD)</th>
                                    <th>Inside Diameter (ID)</th>
                                    <th>Weight</th>
                                    <th>Length</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>Drill Collar 1(Top)</th>
                                    <td><input type="text" name="input_1_1" /></td>
                                    <td><input type="text" name="input_1_2" /></td>
                                    <td><input type="text" name="input_1_3" /></td>
                                    <td><input type="text" name="input_1_4" /></td>
                                </tr>
                                <tr>
                                    <th>(Updated DC1) XO</th>
                                    <td><input type="text" name="input_2_1" /></td>
                                    <td><input type="text" name="input_2_2" /></td>
                                    <td></td>
                                    <td><input type="text" name="input_2_3" /></td>
                                </tr>
                                <tr>
                                    <th>Drill Collar 2</th>
                                    <td><input type="text" name="input_3_1" /></td>
                                    <td><input type="text" name="input_3_2" /></td>
                                    <td><input type="text" name="input_3_3" /></td>
                                    <td><input type="text" name="input_3_4" /></td>
                                </tr>
                                <tr>
                                    <th>(Updated DC2) XO</th>
                                    <td><input type="text" name="input_4_1" /></td>
                                    <td><input type="text" name="input_4_2" /></td>
                                    <td></td>
                                    <td><input type="text" name="input_4_3" /></td>
                                </tr>
                                <tr>
                                    <th>Drill Collar 3(Bottom)</th>
                                    <td><input type="text" name="input_5_1" /></td>
                                    <td><input type="text" name="input_5_2" /></td>
                                    <td><input type="text" name="input_5_3" /></td>
                                    <td><input type="text" name="input_5_4" /></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </form>
            <br>
                <form action="process.php" method="POST">
                    <div class="table-wrapper">
                        <table class="table-custom">
                            <thead>
                                <tr>
                                    <th></th> <!-- Empty top-left corner cell -->
                                    <th>Hours</th>
                                    <th>Serial No:</th>
                                    <th>Manufacturer</th>
                                    <th>IBS Days</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>Jars</th>
                                    <td><input type="text" name="input_1_1" /></td>
                                    <td><input type="text" name="input_1_2" /></td>
                                    <td><input type="text" name="input_1_3" /></td>
                                    <td><input type="text" name="input_1_4" /></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </form>
            <br>
                <form action="process.php" method="POST">
                    <div class="table-wrapper">
                        <table class="table-custom">
                            <thead>
                                <tr>
                                    <th></th> <!-- Empty top-left corner cell -->
                                    <th>Distance from bit</th>
                                    <th>Serial No/Type</th>
                                    <th>Gamma Placement</th>
                                    <th>Other</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>MWD</th>
                                    <td><input type="text" name="input_1_1" /></td>
                                    <td><input type="text" name="input_1_2" /></td>
                                    <td><input type="text" name="input_1_3" /></td>
                                    <td><input type="text" name="input_1_4" /></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                <br>
                    <div class="form-group">
                        <label for="DDC">Directional Drilling Contractor</label>
                        <input type="text" id="DDC" name="DDC" placeholder="Enter Directional Drilling Contractor">
                    </div>
                    <div class="form-group" style="display: flex; align-items: center;">
                        <label for="daily_cost">Daily Cost:</label>
                        <input type="text" id="daily_cost" name="daily_cost" placeholder="Enter Daily Cost" style="margin-right: 7px;">

                        <label for="dol">Days on Location:</label>
                        <input type="text" id="dol" name="dol" placeholder="Days on Location" style="margin-right: 10px;">

                        <label for="cost_ttl">Total Cost:</label>
                        <input type="text" id="cost_ttl" name="cost_ttl" placeholder="Total Cost" readonly>
                    </div>
                </form>
            </div>

            <div class="container">
                <form action="process.php" method="POST">
                    <div class="table-wrapper">
                        <table class="table-custom">
                            <thead>
                                <tr>
                                    <th>Ancilery Equiqment</th> <!-- Empty top-left corner cell -->
                                    <th>Fishing Neck</th>
                                    <th>Inside Diameter (ID)</th>
                                    <th>Length</th>
                                    <th>Serial No:</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>X-Over</th>
                                    <td><input type="text" name="input_1_1" /></td>
                                    <td><input type="text" name="input_1_2" /></td>
                                    <td><input type="text" name="input_1_3" /></td>
                                    <td><input type="text" name="input_1_4" /></td>
                                </tr>
                                <tr>
                                    <th>Spacer Joint</th>
                                    <td><input type="text" name="input_2_1" /></td>
                                    <td><input type="text" name="input_2_2" /></td>
                                    <td><input type="text" name="input_2_3" /></td>
                                    <td><input type="text" name="input_2_4" /></td>
                                </tr>
                                <tr>
                                    <th>Jar Intensifier</th>
                                    <td><input type="text" name="input_3_1" /></td>
                                    <td><input type="text" name="input_3_2" /></td>
                                    <td><input type="text" name="input_3_3" /></td>
                                    <td><input type="text" name="input_3_4" /></td>
                                </tr>
                                <tr>
                                    <th>Earth Quakers</th>
                                    <td><input type="text" name="input_3_1" /></td>
                                    <td><input type="text" name="input_3_2" /></td>
                                    <td><input type="text" name="input_3_3" /></td>
                                    <td><input type="text" name="input_3_4" /></td>
                                </tr>
                                <tr>
                                    <th>Jars</th>
                                    <td><input type="text" name="input_3_1" /></td>
                                    <td><input type="text" name="input_3_2" /></td>
                                    <td><input type="text" name="input_3_3" /></td>
                                    <td><input type="text" name="input_3_4" /></td>
                                </tr>
                                <tr>
                                    <th>Earth Quakers</th>
                                    <td><input type="text" name="input_3_1" /></td>
                                    <td><input type="text" name="input_3_2" /></td>
                                    <td><input type="text" name="input_3_3" /></td>
                                    <td><input type="text" name="input_3_4" /></td>
                                </tr>
                                <tr>
                                    <th>Stabaliser/Rmr</th>
                                    <td><input type="text" name="input_3_1" /></td>
                                    <td><input type="text" name="input_3_2" /></td>
                                    <td><input type="text" name="input_3_3" /></td>
                                    <td><input type="text" name="input_3_4" /></td>
                                </tr>
                                <tr>
                                    <th>Redback Roller</th>
                                    <td><input type="text" name="input_3_1" /></td>
                                    <td><input type="text" name="input_3_2" /></td>
                                    <td><input type="text" name="input_3_3" /></td>
                                    <td><input type="text" name="input_3_4" /></td>
                                </tr>
                                <tr>
                                    <th>Stabaliser/Rmr</th>
                                    <td><input type="text" name="input_3_1" /></td>
                                    <td><input type="text" name="input_3_2" /></td>
                                    <td><input type="text" name="input_3_3" /></td>
                                    <td><input type="text" name="input_3_4" /></td>
                                </tr>
                                <tr>
                                    <th>0</th>
                                    <td><input type="text" name="input_3_1" /></td>
                                    <td><input type="text" name="input_3_2" /></td>
                                    <td><input type="text" name="input_3_3" /></td>
                                    <td><input type="text" name="input_3_4" /></td>
                                </tr>
                                <tr>
                                    <th>Other</th>
                                    <td><input type="text" name="input_3_1" /></td>
                                    <td><input type="text" name="input_3_2" /></td>
                                    <td><input type="text" name="input_3_3" /></td>
                                    <td><input type="text" name="input_3_4" /></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>

        <div class="btn-group">
            <button type="submit">Submit</button>
        </div>
    </div>

</body>

<script>
    document.getElementById('daily_cost').addEventListener('input', calculateTotalCost);
    document.getElementById('dol').addEventListener('input', calculateTotalCost);

    function calculateTotalCost() {
        const dailyCost = parseFloat(document.getElementById('daily_cost').value) || 0;
        const daysOnLocation = parseInt(document.getElementById('dol').value) || 0;
        const totalCost = dailyCost * daysOnLocation;
        document.getElementById('cost_ttl').value = totalCost.toFixed(2); // Display with 2 decimal places
    }
</script>

</html>
    <?php require_once('footer.php'); ?>