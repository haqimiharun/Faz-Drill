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
    <h1 style="text-align: center;">Mud Log</h1>
        <div class="row">
            <div class="container">
                <!-- <h2></h2> -->
                <form action="#" method="post">
                    <div class="form-group">
                        <label for="for_lithology">Formation Lithology</label>
                        <input type="text" id="for_lithology" name="for_lithology" placeholder="Enter Formation Lithology">
                    </div>
                    <div class="form-group">
                        <label for="shale_dens">Shale Density</label>
                        <input type="text" id="shale_dens" name="shale_dens" placeholder="Enter Shale Density">
                    </div>
                    <div class="form-group">
                        <label for="est_pore_press">Est Pore Press</label>
                        <input type="text" id="est_pore_press" name="est_pore_press" placeholder="Enter Est Pore Press">
                    </div>
                    <div class="form-group">
                        <label for="gas_read">Gas Readings</label>
                        <input type="text" id="gas_read" name="gas_read" placeholder="Enter Gas Readings">
                    </div>
                    <div class="form-group">
                        <label for="cut_desc">Cutting Description</label>
                        <input type="text" id="cut_desc" name="cut_desc" placeholder="Enter Cutting Description">
                    </div>
                    <div class="form-group">
                        <label for="mud_prop">Mud Properties</label>
                        <input type="text" id="mud_prop" name="mud_prop" placeholder="Enter Mud Properties">
                    </div>
                    <div class="form-group">
                        <label for="hydr_indicator">Hydrocarbon Indicator</label>
                        <input type="text" id="hydr_indicator" name="hydr_indicator" placeholder="Enter Hydrocarbon Indicator">
                    </div>
                    <div class="form-group">
                        <label for="max_avg_rop">Max | Avg ROP</label>
                        <input type="text" id="max_avg_rop" name="max_avg_rop" placeholder="Enter Max | Avg ROP">
                    </div>

                </form>
            </div>

            <div class="container">
                <form>
                    <div class="form-group">
                        <label for="gmma_ray">Gamma Ray</label>
                        <input type="text" id="gmma_ray" name="gmma_ray" placeholder="Enter Gamma Ray">
                    </div>
                    <div class="form-group">
                        <label for="max_min_BGgas">Max | Min BG Gas</label>
                        <input type="text" id="max_min_BGgas" name="max_min_BGgas" placeholder="Enter Max | Min BG Gas">
                    </div>
                    <div class="form-group">
                        <label for="conn_gas">Conn Gas</label>
                        <input type="text" id="conn_gas" name="conn_gas" placeholder="Enter Conn Gas">
                    </div>
                    <div class="form-group">
                        <label for="trip_gas">Trip Gas</label>
                        <input type="text" id="trip_gas" name="trip_gas" placeholder="Enter Trip Gas">
                    </div>
                    <div class="form-group">
                        <label for="resistivity">Resistivity</label>
                        <input type="text" id="resistivity" name="resistivity" placeholder="Enter Resistivity">
                    </div>
                    <div class="form-group">
                        <label for="sp">Spotaneous Potential (SP)</label>
                        <input type="text" id="sp" name="sp" placeholder="Enter Active Mud Volume">
                    </div>
                    <div class="form-group">
                        <label for="pore_press_est">Pore Pressure Estimates</label>
                        <input type="text" id="pore_press_est" name="pore_press_est" placeholder="Enter Pore Pressure Estimates">
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