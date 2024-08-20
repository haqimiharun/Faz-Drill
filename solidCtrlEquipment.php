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
        <h1 style="text-align: center;">Solid Control Equipment</h1>
        <div class="row">
            <div class="container">
                <h2>Pump Data</h2>
                <form action="process.php" method="POST">
                    <div class="table-wrapper">
                        <table class="table-custom">
                            <thead>
                                <tr>
                                    <th></th> <!-- Empty top-left corner cell -->
                                    <th>Stroke Length</th>
                                    <th>Liner Size</th>
                                    <th>SPM</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>Pump Number #</th>
                                    <td><input type="text" name="input_1_1" /></td>
                                    <td><input type="text" name="input_1_2" /></td>
                                    <td><input type="text" name="input_1_3" /></td>
                                </tr>
                                <tr>
                                    <th>Pump Number #</th>
                                    <td><input type="text" name="input_2_1" /></td>
                                    <td><input type="text" name="input_2_2" /></td>
                                    <td><input type="text" name="input_2_3" /></td>
                                </tr>
                                <tr>
                                    <th>Pump Number #</th>
                                    <td><input type="text" name="input_3_1" /></td>
                                    <td><input type="text" name="input_3_2" /></td>
                                    <td><input type="text" name="input_3_3" /></td>
                                </tr>
                                <tr>
                                    <th>Pump Number #</th>
                                    <td><input type="text" name="input_4_1" /></td>
                                    <td><input type="text" name="input_4_2" /></td>
                                    <td><input type="text" name="input_4_3" /></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <br>
                     <div class="form-group">
                        <label for="effiPump">Efficiency Pump</label>
                        <input type="text" id="effiPump" name="effiPump" placeholder="Enter Efficiency Pump">
                    </div>
                     <div class="form-group">
                        <label for="maxPressurePump">Max Pressure Pump</label>
                        <input type="text" id="maxPressurePump" name="maxPressurePump" placeholder="Enter Max Pressure Pump">
                    </div>
                     <div class="form-group">
                        <label for="spipePressure">Standpipe Pressure</label>
                        <input type="text" id="spipePressure" name="spipePressure" placeholder="Enter Standpipe Pressure">
                    </div>
                     <div class="form-group">
                        <label for="pumpType">Pump Type</label>
                        <input type="text" id="pumpType" name="pumpType" placeholder="Enter Pump Type">
                    </div>
                </form>
            </div>

            <div class="container">
                <h2>Centrifuge</h2>
                <div class="table-wrapper">
                        <table class="table-custom">
                            <thead>
                                <tr>
                                    <th></th> <!-- Empty top-left corner cell -->
                                    <th>Wt in</th>
                                    <th>Wt out</th>
                                    <th>Hours run</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>Centrifuge Low Solids</th>
                                    <td><input type="text" name="input_1_1" /></td>
                                    <td><input type="text" name="input_1_2" /></td>
                                    <td><input type="text" name="input_1_3" /></td>
                                </tr>
                                <tr>
                                    <th>Centrifuge High Solids</th>
                                    <td><input type="text" name="input_1_1" /></td>
                                    <td><input type="text" name="input_1_2" /></td>
                                    <td><input type="text" name="input_1_3" /></td>
                                </tr>
                                <tr>
                                    <th>Desander</th>
                                    <td><input type="text" name="input_1_1" /></td>
                                    <td><input type="text" name="input_1_2" /></td>
                                    <td><input type="text" name="input_1_3" /></td>
                                </tr>
                                <tr>
                                    <th>Desilter</th>
                                    <td><input type="text" name="input_1_1" /></td>
                                    <td><input type="text" name="input_1_2" /></td>
                                    <td><input type="text" name="input_1_3" /></td>
                                </tr>
                                <tr>
                                    <th>Degaser</th>
                                    <td><input type="text" name="input_1_1" /></td>
                                    <td><input type="text" name="input_1_2" /></td>
                                    <td><input type="text" name="input_1_3" /></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>

        <div class="row">
            <div class="container">
                <h2>Shakers</h2>
                <form action="process.php" method="POST">
                    <div class="table-wrapper">
                        <table class="table-custom">
                            <thead>
                                <tr>
                                    <th>Shaker</th> <!-- Empty top-left corner cell -->
                                    <th>Top screen</th>
                                    <th>Mid screen</th>
                                    <th>Bottom Screen</th>
                                    <th>Flow Over</th>
                                    <th>Flow Under</th>
                                    <th>Hours Run</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>M/Cleaner</th>
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
<br>
                    <div class="table-wrapper">
                        <table class="table-custom">
                            <thead>
                                <tr>
                                    <th></th> <!-- Empty top-left corner cell -->
                                    <th>Location</th>
                                    <th>Hours Used</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>Debs Transporter</th>
                                    <td><input type="text" name="input_1_1" /></td>
                                    <td><input type="text" name="input_1_2" /></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>

            <div class="container">
                <h2>Hydro-clone</h2>
                <form action="process.php" method="POST">
                     <div class="form-group">
                        <label for="type_hydrocyclone">Type of Hydrocyclone</label>
                        <input type="text" id="type_hydrocyclone" name="type_hydrocyclone" placeholder="Enter Type of Hydrocyclone">
                    </div>
                     <div class="form-group">
                        <label for="feed_flow_rate">Feed flow rate</label>
                        <input type="text" id="feed_flow_rate" name="feed_flow_rate" placeholder="Enter Feed flow rate">
                    </div>
                     <div class="form-group">
                        <label for="hydroclone_effi">Hydroclone Efficiency</label>
                        <input type="text" id="hydroclone_effi" name="hydroclone_effi" placeholder="Enter Hydroclone Efficiency">
                    </div>
                     <div class="form-group">
                        <label for="cut_rec">Cutting Recovery</label>
                        <input type="text" id="cut_rec" name="cut_rec" placeholder="Enter Cutting Recovery">
                    </div>
                     <div class="form-group">
                        <label for="solids_content">Underflow | Overflow solids content</label>
                        <input type="text" id="solids_content" name="solids_content" placeholder="Enter solids content">
                    </div>
                     <div class="form-group">
                        <label for="weight_hydroclone">Mud Weight before | after Hydrocyclone</label>
                        <input type="text" id="weight_hydroclone" name="weight_hydroclone" placeholder="Enter Mud Weight">
                    </div>
                     <div class="form-group">
                        <label for="fluid_loss">Fluid Losses</label>
                        <input type="text" id="fluid_loss" name="fluid_loss" placeholder="Enter Fluid Losses">
                    </div>
                     <div class="form-group">
                        <label for="operational_issues">Operational Issues</label>
                        <input type="text" id="operational_issues" name="operational_issues" placeholder="Enter Operational Issues">
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