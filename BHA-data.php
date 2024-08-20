<?php require_once('header.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Well Info Input</title>

</head>
<body>
    <div class="wrapper">
        <h1 style="text-align: center;">Bottom Hole Assembly (BHA)</h1>
        <div class="row1">
            <div class="container">
                <form action="process.php" method="POST">
                    <div class="table-wrapper">
                        <table class="table-custom">
                            <thead>
                                <tr>
                                    <th></th>
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