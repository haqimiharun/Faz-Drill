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

    .table-wrapper {
        overflow-x: auto;
    }
    .table-custom {
        width: auto;
    }

        .add-row, .delete-row {
        border: none;
        background-color: #007bff;
        color: white;
        font-size: 16px;
        width: 24px;
        height: 24px;
        border-radius: 50%;
        text-align: center;
        line-height: 20px;
        cursor: pointer;
        margin-right: 5px;
    }

    .add-row {
            border: none;
            background-color: #007bff;
            color: white;
            font-size: 16px;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            text-align: center;
            line-height: 20px;
            cursor: pointer;
            margin-right: 5px;
        }

        .add-row:disabled {
            background-color: #cccccc;
            cursor: not-allowed;
        }

        .add-row:hover:enabled {
            opacity: 0.8;
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
        <h1 style="text-align: center;">Well Data</h1>
        <div class="row">
            <div class="container">
                <h2>Well Data</h2>
                <form action="#" method="post">
                    <div class="form-group">
                        <label for="fieldName">Field Name</label>
                        <input type="text" id="fieldName" name="fieldName" placeholder="Enter Field Name">
                    </div>
                    <div class="form-group">
                        <label for="wellName">Well Name</label>
                        <input type="text" id="wellName" name="wellName" placeholder="Enter Well Name">
                    </div>
                    <div class="form-group">
                        <label for="wellbore">Wellbore</label>
                        <input type="text" id="wellbore" name="wellbore" placeholder="Enter Wellbore">
                    </div>
                    <div class="form-group">
                        <label for="mudPV">Well Type</label>
                        <select id="mudPV" name="mudPV">
                            <option value="" disabled selected>Select Well Type</option>
                            <option value="type1">Wildcat</option>
                            <option value="type2">Exploration</option>
                            <option value="type3">Development</option>
                            <option value="type3">Infill</option>
                            <option value="type3">Injection</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="wellLoc">Well Location</label>
                        <div>
                            <input type="radio" id="useLatLong" name="locationType" value="latlong">
                            <label for="useLatLong">Use Longitude and Latitude</label>
                        </div>
                        <div>
                            <input type="radio" id="useNorthingEasting" name="locationType" value="northingeasting">
                            <label for="useNorthingEasting">Use Northing and Easting</label>
                        </div>
                        <input type="text" id="wellLoc" name="wellLoc" placeholder="Enter Well Location">
                    </div>
                    <div class="form-group">
                        <label for="TVD-planDepth">Plan Depth (TVD)</label>
                        <input type="text" id="TVD-planDepth" name="TVD-planDepth" placeholder="Enter Plan Depth (TVD)">
                    </div>
                    <div class="form-group">
                        <label for="MD-planDepth">Plan Depth (MD)</label>
                        <input type="text" id="MD-planDepth" name="MD-planDepth" placeholder="Enter Plan Depth (MD)">
                    </div>
                    <div class="form-group">
                        <label for="date-time">Date & Time</label>
                        <input type="datetime-local" id="date-time" name="date-time" placeholder="Enter Date and Time">
                    </div>
                </form>
            </div>

            <div class="container">
                <h2>Target Formation</h2>

            </div>
        </div>

        <div class="row">
            <div class="container">
                <h2>Well Trajectory</h2>
                <form action="process.php" method="POST">
                    <div class="table-wrapper">
                    <form action="process.php" method="POST">
                        <div class="table-wrapper">
                            <table class="table-custom" id="inputTable">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Measured Depth</th>
                                        <th>Closure</th>
                                        <th>Inclination</th>
                                        <th>Azimuth</th>
                                        <th>True Vertical Depth</th>
                                        <th>Coordinates</th>
                                        <th>V.Sec</th>
                                        <th>Dogleg</th>
                                        <th>Toolface</th>
                                        <th>Build</th>
                                        <th>Turn</th>
                                        <th>Section Type</th>
                                        <th>Target</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Start with one row -->
                                    <tr>
                                        <td>
                                            <button type="button" class="add-row" onclick="addRow(this)">+</button>
                                        </td>
                                        <td><input type="text" name="input_1_1" /></td>
                                        <td><input type="text" name="input_1_2" /></td>
                                        <td><input type="text" name="input_1_3" /></td>
                                        <td><input type="text" name="input_1_4" /></td>
                                        <td><input type="text" name="input_1_5" /></td>
                                        <td><input type="text" name="input_1_6" /></td>
                                        <td><input type="text" name="input_1_7" /></td>
                                        <td><input type="text" name="input_1_8" /></td>
                                        <td><input type="text" name="input_1_9" /></td>
                                        <td><input type="text" name="input_1_10" /></td>
                                        <td><input type="text" name="input_1_11" /></td>
                                        <td><input type="text" name="input_1_12" /></td>
                                        <td><input type="text" name="input_1_13" /></td>
                                    </tr>
                                </tbody>
                            </table>
                            
                        </div>
                    </form>

                    <script>
                        let rowCount = 1;

                        function addRow(button) {
                            const currentRow = button.parentElement.parentElement;
                            const inputs = currentRow.querySelectorAll('input[type="text"]');
                            let allFilled = true;

                            // Check if all input fields are filled in the current row
                            inputs.forEach(input => {
                                if (input.value.trim() === '') {
                                    allFilled = false;
                                }
                            });

                            if (allFilled) {
                                rowCount++;
                                const table = document.getElementById("inputTable").getElementsByTagName('tbody')[0];
                                const newRow = table.insertRow();

                                for (let i = 0; i < 14; i++) {
                                    const newCell = newRow.insertCell(i);
                                    if (i === 0) {
                                        newCell.innerHTML = `
                                            <button type="button" class="add-row" onclick="addRow(this)">+</button>
                                        `;
                                    } else {
                                        newCell.innerHTML = `<input type="text" name="input_${rowCount}_${i}" />`;
                                    }
                                }

                                // Disable the "Add" button of the current row
                                button.disabled = true;
                            } else {
                                alert("Please fill in all fields before adding a new row.");
                            }
                        }

                        // Disable the add button if all fields are filled and prevent adding another row
                        document.querySelectorAll('tbody tr').forEach(row => {
                            const addButton = row.querySelector('.add-row');
                            const inputs = row.querySelectorAll('input[type="text"]');
                            
                            let allFilled = true;
                            inputs.forEach(input => {
                                if (input.value.trim() === '') {
                                    allFilled = false;
                                }
                            });

                            if (allFilled) {
                                addButton.disabled = true;
                            }
                        });
                    </script>
            </div>
        </div>
    </div>
        <div class="btn-group">
            <button type="submit">Submit</button>
        </div>
</body>
</html>
    <?php require_once('footer.php'); ?>

