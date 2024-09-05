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
    <h1 style="text-align: center;">Formation Evaluation</h1>
        <div class="row1">
            <div class="container">
                <!-- <h2></h2> -->
                <form action="#" method="post">
                    <div class="form-group">
                        <label for="core_recovery">Core Recovery</label>
                        <input type="text" id="core_recovery" name="core_recovery" placeholder="Enter Core Recovery">
                    </div>
                    <div class="form-group">
                        <label for="core_desc">Core Description</label>
                        <input type="text" id="core_desc" name="core_desc" placeholder="Enter Core Description">
                    </div>
                    <div class="form-group">
                        <label for="hydrocrbon_shows">Hydrocarbon shows</label>
                        <input type="text" id="hydrocrbon_shows" name="hydrocrbon_shows" placeholder="Enter Hydrocarbon shows">
                    </div>
                </form>
            </div>

            <div class="container">
                <form>
                    <div class="form-group">
                        <label for="form_pressure">Formation Pressure</label>
                        <input type="text" id="form_pressure" name="form_pressure" placeholder="Enter Formation Pressure">
                    </div>
                    <div class="form-group">
                        <label for="fluid_sample">Fluid Sample</label>
                        <input type="text" id="fluid_sample" name="fluid_sample" placeholder="Enter Fluid Sample">
                    </div>
                    <div class="form-group">
                        <label for="water_saturation">Water Saturation (Sw)</label>
                        <input type="text" id="water_saturation" name="water_saturation" placeholder="Enter Water Saturation (Sw)">
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