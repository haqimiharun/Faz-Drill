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
    <h1 style="text-align: center;">Consumables</h1>
        <div class="row">
            <div class="container">
                <h2>Land Rig Consumables Input</h2>
                <form action="process-report-header.php" method="post">
                    <div class="form-group">
                        <label for="diesel_rig">Diesel at Rig</label>
                        <input type="text" id="diesel_rig" name="diesel_rig" placeholder="Enter Diesel at Rig">
                    </div>
                    <div class="form-group">
                        <label for="diesel_camp">Diesel at Camp</label>
                        <input type="text" id="diesel_camp" name="diesel_camp" placeholder="Enter Diesel at Camp">
                    </div>
                    <div class="form-group">
                        <label for="gasoline">Gasoline</label>
                        <input type="text" id="gasoline" name="gasoline" placeholder="Enter Gasoline">
                    </div>
                    <div class="form-group">
                        <label for="IWater_rig">Industrial Water at Rig</label>
                        <input type="text" id="IWater_rig" name="IWater_rig" placeholder="Enter Industrial Water at Rig">
                    </div>
                    <div class="form-group">
                        <label for="IWater_camp">Industrial Water at Camp</label>
                        <input type="text" id="IWater_camp" name="IWater_camp" placeholder="Enter Industrial Water at Camp">
                    </div>
                    <div class="form-group">
                        <label for="PWater_rig">Portable Water at Rig</label>
                        <input type="text" id="PWater_rig" name="PWater_rig" placeholder="Enter Portable Water at Rig">
                    </div>
                    <div class="form-group">
                        <label for="PWater_camp">Portable Water at Camp</label>
                        <input type="text" id="PWater_camp" name="PWater_camp" placeholder="Enter Portable Water at Camp">
                    </div>
                </form>
            </div>

            <div class="container">
                <h2>Offshore Rig Consumables Input</h2>
                <form>
                    <div class="form-group personnel-group">
                        <label for="fuel_board">Fuel On Board</label>
                        <input type="text" id="fuel_board" name="fuel_board" placeholder="Enter Fuel On Board">
                    </div>
                    <div class="form-group personnel-group">
                        <label for="PWater_board">Portable Water On Board</label>
                        <input type="text" id="PWater_board" name="PWater_board" placeholder="Enter Portable Water On Board">
                    </div>
                    <div class="form-group personnel-group">
                        <label for="DWater_board">Drilling Water On Board</label>
                        <input type="text" id="DWater_board" name="DWater_board" placeholder="Enter Drilling Water On Board">
                    </div>
                    <div class="form-group personnel-group">
                        <label for="Barite_board">Barite On Board</label>
                        <input type="text" id="Barite_board" name="Barite_board" placeholder="Enter Barite On Board">
                    </div>
                    <div class="form-group personnel-group">
                        <label for="Bentonite_board">Bentonite On Board</label>
                        <input type="text" id="Bentonite_board" name="Bentonite_board" placeholder="Enter Bentonite On Board">
                    </div>
                    <div class="form-group">
                        <label for="Cement_board">Cements On Board</label>
                        <input type="text" id="Cement_board" name="Cement_board" placeholder="Enter Cements On Board">
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="container">
                <h3>Fluids Unit Of Measurement</h3>
                <div class="form-group radio-group">
                    <label><input type="radio" name="fluids" value="US_Galone"> US Galone</label>
                    <label><input type="radio" name="fluids" value="Bbls"> Bbls</label>
                    <label><input type="radio" name="fluids" value="Litres"> Litres</label>
                    <label><input type="radio" name="fluids" value="M3"> M<sup>3</sup></label>
                </div>
            </div>

            <div class="container">
                <h3>Cements</h3>
                <div class="form-group radio-group">
                    <label><input type="radio" name="cements" value="C_100lbsx"> Cmt 100 lb sx</label>
                    <label><input type="radio" name="cements" value="C_50KGsx"> Cmt 50 KG sx</label>
                    <label><input type="radio" name="cements" value="CuFt_sack"> Cu/Ft Sack</label>
                    <label><input type="radio" name="cements" value="C_M3"> M<sup>3</sup></label>
                    <label><input type="radio" name="cements" value="Tons"> Tons</label>
                </div>
            </div>
        </div>
    <div class="btn-group">
        <button type="submit">Submit</button>
    </div>
    </div>
</body>
</html>

<?php require_once('footer.php'); ?>