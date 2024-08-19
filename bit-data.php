<?php require_once('header.php'); ?>

<?php require_once('header.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

.info-btn {
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 50%;
    width: 20px;
    height: 20px;
    text-align: center;
    font-size: 14px;
    cursor: pointer;
    margin-left: 5px;
}

.popup {
    display: none; /* Hidden by default */
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.4); /* Black background with opacity */
}

.popup-content {
    background-color: #fefefe;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 50%; /* Set a width for the popup */
}

.close-btn {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close-btn:hover,
.close-btn:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
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
    <h1 style="text-align: center;">Bit Data</h1>
        <div class="row">
            <div class="container">
                <h2>New Bit</h2>
                <form action="#" method="post">
                    <div class="table-wrapper">
                        <table class="table-custom">
                            <thead>
                                <tr>
                                    <th></th> <!-- Empty top-left corner cell -->
                                    <th></th>
                                    <th>Jets</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>Run#</th>
                                    <td><input type="text" name="input_1_1" /></td>
                                    <td><input type="text" name="input_1_2" /></td>
                                </tr>
                                <tr>
                                    <th>Bit Size</th>
                                    <td><input type="text" name="input_1_1" /></td>
                                    <td><input type="text" name="input_1_2" /></td>
                                </tr>
                                <tr>
                                    <th>Manufacturer</th>
                                    <td><input type="text" name="input_1_1" /></td>
                                    <td><input type="text" name="input_1_2" /></td>
                                </tr>
                                <tr>
                                    <th>Bit Type</th>
                                    <td><input type="text" name="input_1_1" /></td>
                                    <td><input type="text" name="input_1_2" /></td>
                                </tr>
                                <tr>
                                    <th>IADC
                                    <button type="button" class="info-btn" onclick="openPopup()">?</button>
                                    </th>
                                    <td><input type="text" name="input_1_1" /></td>
                                    <td><input type="text" name="input_1_2" /></td>
                                </tr>
                                <tr>
                                    <th>Bit Serial</th>
                                    <td><input type="text" name="input_1_1" /></td>
                                    <td><input type="text" name="input_1_2" /></td>
                                </tr>
                                <tr>
                                    <th>TFA</th>
                                    <td><input type="text" name="input_1_1" /></td>
                                    <td><input type="text" name="input_1_2" /></td>
                                </tr>
                                <tr>
                                    <th>Nozzle Vel ft sec</th>
                                    <td><input type="text" name="input_1_1" /></td>
                                    <td><input type="text" name="input_1_2" /></td>
                                </tr>
                                <tr>
                                    <th>Depth In</th>
                                    <td><input type="text" name="input_1_1" /></td>
                                    <td><input type="text" name="input_1_2" /></td>
                                </tr>
                                <tr>
                                    <th>Depth Out</th>
                                    <td><input type="text" name="input_1_1" /></td>
                                    <td><input type="text" name="input_1_2" /></td>
                                </tr>
                                <tr>
                                    <th>Drilled</th>
                                    <td><input type="text" name="input_1_1" /></td>
                                    <td><input type="text" name="input_1_2" /></td>
                                </tr>
                                <tr>
                                    <th>Total Hours</th>
                                    <td><input type="text" name="input_1_1" /></td>
                                    <td><input type="text" name="input_1_2" /></td>
                                </tr>
                                <tr>
                                    <th>Rotating Hours</th>
                                    <td><input type="text" name="input_1_1" /></td>
                                    <td><input type="text" name="input_1_2" /></td>
                                </tr>
                                <tr>
                                    <th>WOB</th>
                                    <td><input type="text" name="input_1_1" /></td>
                                    <td><input type="text" name="input_1_2" /></td>
                                </tr>
                                <tr>
                                    <th>Torque</th>
                                    <td><input type="text" name="input_1_1" /></td>
                                    <td><input type="text" name="input_1_2" /></td>
                                </tr>
                                <tr>
                                    <th>RPM</th>
                                    <td><input type="text" name="input_1_1" /></td>
                                    <td><input type="text" name="input_1_2" /></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>

            <div class="container">
                <h2>Dull Bit Grinding</h2>
                <form>
                    <div class="form-group">
                        <label for="Inner">Inner</label>
                        <input type="text" id="Inner" name="Inner" placeholder="Enter Inner">
                    </div>
                    <div class="form-group">
                        <label for="Outer">Outer</label>
                        <input type="text" id="Outer" name="Outer" placeholder="Enter Outer">
                    </div>
                    <div class="form-group">
                        <label for="dull_char">Dull char</label>
                        <input type="text" id="dull_char" name="dull_char" placeholder="Enter Dull char">
                    </div>
                    <div class="form-group">
                        <label for="Location">Location</label>
                        <input type="text" id="Location" name="Location" placeholder="Enter Location">
                    </div>
                    <div class="form-group">
                        <label for="bearing">Bearing Selas</label>
                        <input type="text" id="bearing" name="bearing" placeholder="Enter Bearing Selas">
                    </div>
                    <div class="form-group">
                        <label for="Gauge">Gauge</label>
                        <input type="text" id="Gauge" name="Gauge" placeholder="Enter Gauge">
                    </div>
                    <div class="form-group">
                        <label for="Other">Other</label>
                        <input type="text" id="Other" name="Other" placeholder="Enter Others">
                    </div>
                    <div class="form-group">
                        <label for="Reason">Reason</label>
                        <input type="text" id="Reason" name="Reason" placeholder="Enter Reason">
                    </div>
                    <div class="form-group">
                        <label for="com_sec">Comment Section</label>
                        <input type="text" id="com_sec" name="com_sec" placeholder="Enter Comments">
                    </div>
                </form>
            </div>

            <div class="container">
                <h2>ReRun Bit</h2>
                <form>
                    <div class="table-wrapper">
                        <table class="table-custom">
                            <thead>
                                <tr>
                                    <th>Run#</th> 
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>Bit Size</th>
                                    <td><input type="text" name="input_1" /></td>
                                </tr>
                                <tr>
                                    <th>Manufacturer</th>
                                    <td><input type="text" name="input_2" /></td>
                                </tr>
                                <tr>
                                    <th>Bit Type</th>
                                    <td><input type="text" name="input_3" /></td>
                                </tr>
                                <tr>
                                    <th>IADC</th>
                                    <td><input type="text" name="input_4" /></td>
                                </tr>
                                <tr>
                                    <th>Bit Serial</th>
                                    <td><input type="text" name="input_5" /></td>
                                </tr>
                                <tr>
                                    <th>TFA</th>
                                    <td><input type="text" name="input_6" /></td>
                                </tr>
                                <tr>
                                    <th>Nozzle Vel ft sec</th>
                                    <td><input type="text" name="input_7" /></td>
                                </tr>
                                <tr>
                                    <th>Depth In</th>
                                    <td><input type="text" name="input_8" /></td>
                                </tr>
                                <tr>
                                    <th>Depth Out</th>
                                    <td><input type="text" name="input_9" /></td>
                                </tr>
                                <tr>
                                    <th>Drilled</th>
                                    <td><input type="text" name="input_10" /></td>
                                </tr>
                                <tr>
                                    <th>Total Hours</th>
                                    <td><input type="text" name="input_11" /></td>

                                </tr>
                                <tr>
                                    <th>Rotating Hours</th>
                                    <td><input type="text" name="input_12" /></td>
                                </tr>
                                <tr>
                                    <th>WOB</th>
                                    <td><input type="text" name="input_13" /></td>
                                </tr>
                                <tr>
                                    <th>Torque</th>
                                    <td><input type="text" name="input_14" /></td>
                                </tr>
                                <tr>
                                    <th>RPM</th>
                                    <td><input type="text" name="input_15" /></td>
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
function openPopup() {
    document.getElementById("iadcPopup").style.display = "block";
}

function closePopup() {
    document.getElementById("iadcPopup").style.display = "none";
}

// Close popup if user clicks outside of content
window.onclick = function(event) {
    if (event.target == document.getElementById("iadcPopup")) {
        document.getElementById("iadcPopup").style.display = "none";
    }
}

</script>

</html>

<?php require_once('footer.php'); ?>