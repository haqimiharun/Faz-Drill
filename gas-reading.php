<?php require_once('header.php'); ?>

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
    <h1 style="text-align: center;">Gas Reading</h1>
        <div class="row1">
            <div class="container">
                <!-- <h2></h2> -->
                <form action="process-drill-fluids.php" method="post">
                    <div class="form-group">
                        <label for="mudType">Gas Type</label>
                        <input type="text" id="mudType" name="mudType" placeholder="Enter Mud Type">
                    </div>
                    <div class="form-group">
                        <label for="mudWeight">Depth Interval</label>
                        <input type="text" id="mudWeight" name="mudWeight" placeholder="Enter Mud Weight">
                    </div>
                    <div class="form-group">
                        <label for="mudViscosity">Gas Volume</label>
                        <input type="text" id="mudViscosity" name="mudViscosity" placeholder="Enter Mud Viscosity">
                    </div>
                    <div class="form-group">
                        <label for="mudPV">Gas/Oil Ratio (GOR)</label>
                        <input type="text" id="mudPV" name="mudPV" placeholder="Enter Mud PV">
                    </div>
                    <div class="form-group">
                        <label for="mudYP">Show Time</label>
                        <input type="text" id="mudYP" name="mudYP" placeholder="Enter Mud YP">
                    </div>
                </form>
            </div>

            <div class="container">
                <form>
                    <div class="form-group">
                        <label for="mudGels10sec">Gas chromatograph (GC) Analysis</label>
                        <input type="text" id="mudGels10sec" name="mudGels10sec" placeholder="Enter 10 Sec Gels">
                    </div>
                    <div class="form-group">
                        <label for="mudGels30min">Hydrocarbon potential</label>
                        <input type="text" id="mudGels30min" name="mudGels30min" placeholder="Enter 30 Min Gels">
                    </div>
                    <div class="form-group">
                        <label for="mudAPI_WL">Correlation With Other Data:</label>
                        <input type="text" id="mudAPI_WL" name="mudAPI_WL" placeholder="Enter API WL">
                    </div>
                    <div class="form-group">
                        <label for="mudHTHP">Environmental Concerns</label>
                        <input type="text" id="mudHTHP" name="mudHTHP" placeholder="Enter HTHP 300 Degree">
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