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
    <h1 style="text-align: center;">Mud Data</h1>
        <div class="row">
            <div class="container">
                <!-- <h2></h2> -->
                <form action="process-drill-fluids.php" method="post">
                    <div class="form-group">
                        <label for="mudType">Mud Type</label>
                        <input type="text" id="mudType" name="mudType" placeholder="Enter Mud Type">
                    </div>
                    <div class="form-group">
                        <label for="mudWeight">Mud Weight</label>
                        <input type="text" id="mudWeight" name="mudWeight" placeholder="Enter Mud Weight">
                    </div>
                    <div class="form-group">
                        <label for="mudViscosity">Mud Viscosity</label>
                        <input type="text" id="mudViscosity" name="mudViscosity" placeholder="Enter Mud Viscosity">
                    </div>
                    <div class="form-group">
                        <label for="mudPV">PV</label>
                        <input type="text" id="mudPV" name="mudPV" placeholder="Enter Mud PV">
                    </div>
                    <div class="form-group">
                        <label for="mudYP">YP</label>
                        <input type="text" id="mudYP" name="mudYP" placeholder="Enter Mud YP">
                    </div>
                    <div class="form-group">
                        <label for="mudGels10sec">10 Sec Gels</label>
                        <input type="text" id="mudGels10sec" name="mudGels10sec" placeholder="Enter 10 Sec Gels">
                    </div>
                    <div class="form-group">
                        <label for="mudGels30min">30 Min Gels</label>
                        <input type="text" id="mudGels30min" name="mudGels30min" placeholder="Enter 30 Min Gels">
                    </div>
                    <div class="form-group">
                        <label for="mudAPI_WL">API WL</label>
                        <input type="text" id="mudAPI_WL" name="mudAPI_WL" placeholder="Enter API WL">
                    </div>
                </form>
            </div>

            <div class="container">
                <!-- <h2>HTHP 300 Degree</h2> -->
                <form>
                    <div class="form-group">
                        <label for="mudHTHP">HTHP 300 Degree</label>
                        <input type="text" id="mudHTHP" name="mudHTHP" placeholder="Enter HTHP 300 Degree">
                    </div>
                    <div class="form-group">
                        <label for="mudSolid">Solid%</label>
                        <input type="text" id="mudSolid" name="mudSolid" placeholder="Enter Mud Solid">
                    </div>
                    <div class="form-group">
                        <label for="mudSan">San%</label>
                        <input type="text" id="mudSan" name="mudSan" placeholder="Enter Mud San">
                    </div>
                    <div class="form-group">
                        <label for="mudMBT">MBT</label>
                        <input type="text" id="mudMBT" name="mudMBT" placeholder="Enter Mud MBT">
                    </div>
                    <div class="form-group">
                        <label for="mudPH">PH</label>
                        <input type="text" id="mudPH" name="mudPH" placeholder="Enter Mud PH">
                    </div>
                    <div class="form-group">
                        <label for="mudPM">PM</label>
                        <input type="text" id="mudPM" name="mudPM" placeholder="Enter Mud PM">
                    </div>
                    <div class="form-group">
                        <label for="mudMF">MF</label>
                        <input type="text" id="mudMF" name="mudMF" placeholder="Enter Mud MF">
                    </div>
                    <div class="form-group">
                        <label for="mudChorides">Chorides</label>
                        <input type="text" id="mudChorides" name="mudChorides" placeholder="Enter Mud Chorides">
                    </div>
                </form>
            </div>

            <div class="container">
                <!-- <h2>Oil %</h2> -->
                <form>
                    <div class="form-group">
                        <label for="mudOil">Oil%</label>
                        <input type="text" id="mudOil" name="mudOil" placeholder="Enter Mud Oil">
                    </div>
                    <div class="form-group">
                        <label for="mudWater">Water%</label>
                        <input type="text" id="mudWater" name="mudWater" placeholder="Enter Mud Water">
                    </div>
                    <div class="form-group">
                        <label for="mudCalcium">Calcium</label>
                        <input type="text" id="mudCalcium" name="mudCalcium" placeholder="Enter Calcium">
                    </div>
                    <div class="form-group">
                        <label for="mudHGS">HGS%</label>
                        <input type="text" id="mudHGS" name="mudHGS" placeholder="Enter Mud HGS">
                    </div>
                    <div class="form-group">
                        <label for="mudPitVol">Pit Volume</label>
                        <input type="text" id="mudPitVol" name="mudPitVol" placeholder="Enter Pit Volume">
                    </div>
                    <div class="form-group">
                        <label for="mudHoleVol">Hole Volume</label>
                        <input type="text" id="mudPM" name="mudPM" placeholder="Enter Hole Volume">
                    </div>
                    <div class="form-group">
                        <label for="mudTimeChk">Time Mud Check (hour:minute)</label>
                        <input type="text" id="mudTimeChk" name="mudTimeChk" placeholder="Enter Time Mud Check">
                    </div>
                    <div class="form-group">
                        <label for="mudLostInHole">Mud Lost In Hole</label>
                        <input type="text" id="mudLostInHole" name="mudLostInHole" placeholder="Enter Mud Lost In Hole">
                    </div>
                </form>
            </div>

            <div class="container">
                <!-- <h2>Surface Losses</h2> -->
                <form>
                    <div class="form-group">
                        <label for="mudSurfaceLoss">Surface Losses</label>
                        <input type="text" id="mudSurfaceLoss" name="mudSurfaceLoss" placeholder="Enter Surface Losses">
                    </div>
                    <div class="form-group">
                        <label for="mudLoseHr">Mud Losses (hour)</label>
                        <input type="text" id="mudLoseHr" name="mudLoseHr" placeholder="Enter Mud Losses">
                    </div>
                    <div class="form-group">
                        <label for="ttl_day_lose">Total Daily Losses</label>
                        <input type="text" id="ttl_day_lose" name="ttl_day_lose" placeholder="Enter Total Daily Losses">
                    </div>
                    <div class="form-group">
                        <label for="day_mud_cost">Daily Mud Cost</label>
                        <input type="text" id="day_mud_cost" name="day_mud_cost" placeholder="Enter Daily Mud Cost">
                    </div>
                    <div class="form-group">
                        <label for="ttl_mud">Total Mud</label>
                        <input type="text" id="ttl_mud" name="ttl_mud" placeholder="Enter Total Mud">
                    </div>
                </form>
            </div>
        </div>
    <div class="table-wrapper">
        <table class="table-custom">
            <thead>
                <tr>
                    <th></th> <!-- Empty top-left corner cell -->
                    <th>Lobe</th>
                    <th>Stage</th>
                    <th>Output</th>
                    <th>Motor bend*</th>
                    <th>Hours</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Mud Motor</th>
                    <td><input type="text" name="input_1_1" /></td>
                    <td><input type="text" name="input_1_2" /></td>
                    <td><input type="text" name="input_1_3" /></td>
                    <td><input type="text" name="input_1_4" /></td>
                    <td><input type="text" name="input_1_5" /></td>
                    <td><input type="text" name="input_1_6" /></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="btn-group">
        <button type="submit">Submit</button>
    </div>
    </div>
</body>
</html>

<?php require_once('footer.php'); ?>