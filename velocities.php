<?php require_once('header.php'); ?>

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
    gap: 25px; /*  Space between rows */
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
}
    </style>

</head>
<body>
    <div class="wrapper">
    <h1 style="text-align: center;">Velocities</h1>
        <div class="row">
            <div class="container">
                <!-- <h2></h2> -->
                <form action="process-drill-fluids.php" method="post">
                    <div class="form-group">
                        <label for="rate_penetrate">Rate of Penetration</label>
                        <input type="text" id="rate_penetrate" name="rate_penetrate" placeholder="Enter Rate of Penetration">
                    </div>
                    <div class="form-group">
                        <label for="mud_flow_rate">Mud Flow Rate</label>
                        <input type="text" id="mud_flow_rate" name="mud_flow_rate" placeholder="Enter Mud Flow Rate">
                    </div>
                    <div class="form-group">
                        <label for="annular_velo">Annular Velocity</label>
                        <input type="text" id="annular_velo" name="annular_velo" placeholder="Enter Annular Velocity">
                    </div>
                    <div class="form-group">
                        <label for="rotate_speed">Drill String Rotational Speed</label>
                        <input type="text" id="rotate_speed" name="rotate_speed" placeholder="Enter Drill String Rotational Speed">
                    </div>
                    <div class="form-group">
                        <label for="trip_speed">Tripping Speed</label>
                        <input type="text" id="trip_speed" name="trip_speed" placeholder="Enter Tripping Speed">
                    </div>
                </form>
            </div>

            <div class="container">
                <form>
                    <div class="form-group">
                        <label for="penetrate_rate">Penetration Rate</label>
                        <input type="text" id="penetrate_rate" name="penetrate_rate" placeholder="Enter Penetration Rate">
                    </div>
                    <div class="form-group">
                        <label for="cut_velo">Cutting Velocity</label>
                        <input type="text" id="cut_velo" name="cut_velo" placeholder="Enter Cutting Velocity">
                    </div>
                    <div class="form-group">
                        <label for="surface_line_speed">Surface Line Speed</label>
                        <input type="text" id="surface_line_speed" name="surface_line_speed" placeholder="Enter Surface Line Speed">
                    </div>
                    <div class="form-group">
                        <label for="case_run_speed">Casing Running Speed</label>
                        <input type="text" id="case_run_speed" name="case_run_speed" placeholder="Enter Casing Running Speed">
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