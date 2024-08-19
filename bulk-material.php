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
    <h1 style="text-align: center;">Bulk and Liquid Material</h1>
        <div class="row">
            <div class="container">
                <h2>Bulk</h2>
                <form action="#" method="post">
                    <div class="form-group">
                        <label for="barite">Barite</label>
                        <input type="text" id="barite" name="barite" placeholder="Enter Barite">
                    </div>
                    <div class="form-group">
                        <label for="bentonite">Bentonite</label>
                        <input type="text" id="bentonite" name="bentonite" placeholder="Enter Bentonite">
                    </div>
                    <div class="form-group">
                        <label for="sand">Sand</label>
                        <input type="text" id="sand" name="sand" placeholder="Enter Sand">
                    </div>
                    <div class="form-group">
                        <label for="lime">Lime</label>
                        <input type="text" id="lime" name="lime" placeholder="Enter Lime">
                    </div>
                    <div class="form-group">
                        <label for="lcm">Lost Circulation Material (LCM)</label>
                        <input type="text" id="lcm" name="lcm" placeholder="Enter Lost Circulation Material (LCM)">
                    </div>
                    <div class="form-group">
                        <label for="cement">Cement</label>
                        <input type="text" id="cement" name="cement" placeholder="Enter Cement">
                    </div>
                    <div class="form-group">
                        <label for="cal_carbo">Calcium Carbonate</label>
                        <input type="text" id="cal_carbo" name="cal_carbo" placeholder="Enter Calcium Carbonate">
                    </div>
                    <div class="form-group">
                        <label for="silica_flour">Silica Flour</label>
                        <input type="text" id="silica_flour" name="silica_flour" placeholder="Enter Silica Flour">
                    </div>
                    <div class="form-group">
                        <label for="fib_mat">Fibrous Materials</label>
                        <input type="text" id="fib_mat" name="fib_mat" placeholder="Enter Fibrous Materials">
                    </div>
                </form>
            </div>

            <div class="container">
            <h2>Liquid</h2>
                <form>
                    <div class="form-group">
                        <label for="drill_mud">Drilling Mud</label>
                        <input type="text" id="drill_mud" name="drill_mud" placeholder="Enter Drilling Mud">
                    </div>
                    <div class="form-group">
                        <label for="water">Water</label>
                        <input type="text" id="water" name="water" placeholder="Enter Water">
                    </div>
                    <div class="form-group">
                        <label for="diesel">Diesel</label>
                        <input type="text" id="diesel" name="diesel" placeholder="Enter Diesel">
                    </div>
                    <div class="form-group">
                        <label for="base_oil">Base Oil</label>
                        <input type="text" id="base_oil" name="base_oil" placeholder="Enter Base Oil">
                    </div>
                    <div class="form-group">
                        <label for="chem_add">Chemical Additives</label>
                        <input type="text" id="chem_add" name="chem_add" placeholder="Enter Chemical Additives">
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