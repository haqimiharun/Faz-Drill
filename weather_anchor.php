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
    <h1 style="text-align: center;">Weather and Anchor</h1>
        <div class="row">
            <div class="container">
                <!-- <h2></h2> -->
                <form action="process-drill-fluids.php" method="post">
                    <div class="form-group">
                        <label for="mudType">Sky</label>
                        <input type="text" id="mudType" name="mudType" placeholder="Enter Mud Type">
                    </div>
                    <div class="form-group">
                        <label for="mudWeight">Visability NM</label>
                        <input type="text" id="mudWeight" name="mudWeight" placeholder="Enter Mud Weight">
                    </div>
                    <div class="form-group">
                        <label for="mudViscosity">Temperature</label>
                        <input type="text" id="mudViscosity" name="mudViscosity" placeholder="Enter Mud Viscosity">
                    </div>
                    <div class="form-group">
                        <label for="mudPV">Wind Direction</label>
                        <input type="text" id="mudPV" name="mudPV" placeholder="Enter Mud PV">
                    </div>
                    <div class="form-group">
                        <label for="mudYP">Wind Speed Knots</label>
                        <input type="text" id="mudYP" name="mudYP" placeholder="Enter Mud YP">
                    </div>
                    <div class="form-group">
                        <label for="mudGels10sec">Barometer</label>
                        <input type="text" id="mudGels10sec" name="mudGels10sec" placeholder="Enter 10 Sec Gels">
                    </div>
                    <div class="form-group">
                        <label for="mudGels30min">Swell Height</label>
                        <input type="text" id="mudGels30min" name="mudGels30min" placeholder="Enter 30 Min Gels">
                    </div>
                    <div class="form-group">
                        <label for="mudAPI_WL">Swell Direction</label>
                        <input type="text" id="mudAPI_WL" name="mudAPI_WL" placeholder="Enter API WL">
                    </div>
                </form>
            </div>

            <div class="container">
                <!-- <h2>HTHP 300 Degree</h2> -->
                <form>
                    <div class="form-group">
                        <label for="mudHTHP">Swell Period</label>
                        <input type="text" id="mudHTHP" name="mudHTHP" placeholder="Enter HTHP 300 Degree">
                    </div>
                    <div class="form-group">
                        <label for="mudSolid">Waves Height</label>
                        <input type="text" id="mudSolid" name="mudSolid" placeholder="Enter Mud Solid">
                    </div>
                    <div class="form-group">
                        <label for="mudSan">Waves Direction</label>
                        <input type="text" id="mudSan" name="mudSan" placeholder="Enter Mud San">
                    </div>
                    <div class="form-group">
                        <label for="mudMBT">Waves Period</label>
                        <input type="text" id="mudMBT" name="mudMBT" placeholder="Enter Mud MBT">
                    </div>
                    <div class="form-group">
                        <label for="mudPH">Work Boat Status</label>
                        <input type="text" id="mudPH" name="mudPH" placeholder="Enter Mud PH">
                    </div>
                    <div class="form-group">
                        <label for="mudPM">Diving Operation</label>
                        <input type="text" id="mudPM" name="mudPM" placeholder="Enter Mud PM">
                    </div>
                    <div class="form-group">
                        <label for="mudMF">Heave Height</label>
                        <input type="text" id="mudMF" name="mudMF" placeholder="Enter Mud MF">
                    </div>
                    <div class="form-group">
                        <label for="mudChorides">Heave Seconds</label>
                        <input type="text" id="mudChorides" name="mudChorides" placeholder="Enter Mud Chorides">
                    </div>
                </form>
            </div>

            <div class="container">
                <!-- <h2>Oil %</h2> -->
                <form>
                    <div class="form-group">
                        <label for="mudChorides">Roll Degrees</label>
                        <input type="text" id="mudChorides" name="mudChorides" placeholder="Enter Mud Chorides">
                    </div>
                    <div class="form-group">
                        <label for="mudChorides">Roll Seconds</label>
                        <input type="text" id="mudChorides" name="mudChorides" placeholder="Enter Mud Chorides">
                    </div>
                    <div class="form-group">
                        <label for="mudOil">Pitch Degrees</label>
                        <input type="text" id="mudOil" name="mudOil" placeholder="Enter Mud Oil">
                    </div>
                    <div class="form-group">
                        <label for="mudWater">Pitch Second</label>
                        <input type="text" id="mudWater" name="mudWater" placeholder="Enter Mud Water">
                    </div>
                    <div class="form-group">
                        <label for="mudCalcium">Riser Tension</label>
                        <input type="text" id="mudCalcium" name="mudCalcium" placeholder="Enter Calcium">
                    </div>
                    <div class="form-group">
                        <label for="mudHGS">Riser Angle</label>
                        <input type="text" id="mudHGS" name="mudHGS" placeholder="Enter Mud HGS">
                    </div>
                    <div class="form-group">
                        <label for="mudPitVol">BOP Angle</label>
                        <input type="text" id="mudPitVol" name="mudPitVol" placeholder="Enter Pit Volume">
                    </div>
                    <div class="form-group">
                        <label for="mudHoleVol">Vessel Heading</label>
                        <input type="text" id="mudPM" name="mudPM" placeholder="Enter Hole Volume">
                    </div>
                </form>
            </div>

            <div class="container">
                <h3>Anchor Tension</h3>
                <form>
                    <div class="form-group">
                        <label for="anc1">Anchor 1</label>
                        <input type="text" id="anc1" name="anc1" placeholder="Enter Anchor 1">
                    </div>
                    <div class="form-group">
                        <label for="anc2">Anchor 2</label>
                        <input type="text" id="anc2" name="anc2" placeholder="Enter Anchor 2">
                    </div>
                    <div class="form-group">
                        <label for="anc3">Anchor 3</label>
                        <input type="text" id="anc3" name="anc3" placeholder="Enter Anchor 3">
                    </div>
                    <div class="form-group">
                        <label for="anc4">Anchor 4</label>
                        <input type="text" id="anc4" name="anc4" placeholder="Enter Anchor 4">
                    </div>
                    <div class="form-group">
                        <label for="anc5">Anchor 5</label>
                        <input type="text" id="anc5" name="anc5" placeholder="Enter Anchor 5">
                    </div>
                    <div class="form-group">
                        <label for="anc6">Anchor 6</label>
                        <input type="text" id="anc6" name="anc6" placeholder="Enter Anchor 6">
                    </div>
                    <div class="form-group">
                        <label for="anc7">Anchor 7</label>
                        <input type="text" id="anc7" name="anc7" placeholder="Enter Anchor 7">
                    </div>
                    <div class="form-group">
                        <label for="anc8">Anchor 8</label>
                        <input type="text" id="anc8" name="anc8" placeholder="Enter Anchor 8">
                    </div>
                    <div class="form-group">
                        <label for="max_anchor">Max 24 hrs</label>
                        <input type="text" id="max_anchor" name="max_anchor" placeholder="Enter Max Anchor">
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