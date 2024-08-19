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
    <h1 style="text-align: center;">Mud Volumes</h1>
        <div class="row">
            <div class="container">
                <!-- <h2></h2> -->
                <form action="#" method="post">
                    <div class="form-group">
                        <label for="surface_Mud_Vol">Surface Mud Volume</label>
                        <input type="text" id="surface_Mud_Vol" name="surface_Mud_Vol" placeholder="Enter Surface Mud Volume">
                    </div>
                    <div class="form-group">
                        <label for="act_mud_vol">Active Mud Volume</label>
                        <input type="text" id="act_mud_vol" name="act_mud_vol" placeholder="Enter Active Mud Volume">
                    </div>
                    <div class="form-group">
                        <label for="res_mud_vol">Reserve Mud Volume</label>
                        <input type="text" id="res_mud_vol" name="res_mud_vol" placeholder="Enter Reserve Mud Volume">
                    </div>
                    <div class="form-group">
                        <label for="mud_inflow">Mud Inflow Volume</label>
                        <input type="text" id="mud_inflow" name="mud_inflow" placeholder="Enter Mud Inflow Volume">
                    </div>
                </form>
            </div>

            <div class="container">
                <form>
                    <div class="form-group">
                        <label for="mud_outflow">Mud Outflow Volume</label>
                        <input type="text" id="mud_outflow" name="mud_outflow" placeholder="Enter Mud Outflow Volume">
                    </div>
                    <div class="form-group">
                        <label for="trip_tank_vol">Trip Tank Volume</label>
                        <input type="text" id="trip_tank_vol" name="trip_tank_vol" placeholder="Enter Trip Tank Volume">
                    </div>
                    <div class="form-group">
                        <label for="circ_vol">Circulating Volume</label>
                        <input type="text" id="circ_vol" name="circ_vol" placeholder="Enter Circulating Volume">
                    </div>
                    <div class="form-group">
                        <label for="mudInHole">Mud In Hole</label>
                        <input type="text" id="mudInHole" name="mudInHole" placeholder="Enter Mud In Hole">
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