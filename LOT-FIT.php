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
        <h1 style="text-align: center;">LOT / FIT</h1>
        <div class="row">
            <div class="container">
                <h2>Leaks Of Test</h2>
                <form action="#" method="post">
                    <div class="form-group">
                        <label for="date-time-LOT">Date & Time</label>
                        <input type="datetime-local" id="date-time-LOT" name="date-time-LOT" placeholder="Enter Date and Time">
                    </div>
                    <div class="form-group">
                        <label for="depth-LOT">Depth of LOT</label>
                        <input type="text" id="depth-LOT" name="depth-LOT" placeholder="Enter Depth of LOT">
                    </div>
                    <h3>Test Parameter</h3>
                    <div class="form-group">
                        <label for="TP-pumprate">Pump rate during test</label>
                        <input type="text" id="TP-pumprate" name="TP-pumprate" placeholder="Enter Pump Rate during test">
                    </div>
                    <div class="form-group">
                        <label for="TP-maxSurfacePres">Maximum surface pressure achieved</label>
                        <input type="text" id="TP-maxSurfacePres" name="TP-maxSurfacePres" placeholder="Enter Maximum surface pressure achieved">
                    </div>
                    <div class="form-group">
                        <label for="TP-volPumped">Volume pumped before leak-off</label>
                        <input type="text" id="TP-volPumped" name="TP-volPumped" placeholder="Enter Volume pumped before leak-off">
                    </div>
                    <div class="form-group">
                        <label for="leakOff-pres">Leak-off Pressure</label>
                        <input type="text" id="leakOff-pres" name="leakOff-pres" placeholder="Enter Leak-off Pressure">
                    </div>
                </form>
            </div>

            <div class="container">
                <h2>Formation Intergrity Test</h2>
                <form action="#" method="post">
                    <div class="form-group">
                        <label for="date-time-FIT">Date & Time</label>
                        <input type="datetime-local" id="date-time-FIT" name="date-time-FIT" placeholder="Enter Date and Time">
                    </div>
                    <div class="form-group">
                        <label for="depth-FIT">Depth of FIT</label>
                        <input type="text" id="depth-FIT" name="depth-FIT" placeholder="Enter Depth of FIT">
                    </div>
                    <h3>Test Parameter</h3>
                    <div class="form-group">
                        <label for="minPressFIT">Minimum Pressure of FIT</label>
                        <input type="text" id="minPressFIT" name="minPressFIT" placeholder="Enter Pump Rate during test">
                    </div>
                    <div class="form-group">
                        <label for="maxPressFIT">Maximum Pressure of FIT</label>
                        <input type="text" id="maxPressFIT" name="maxPressFIT" placeholder="Enter Maximum surface pressure achieved">
                    </div>
                    <div class="form-group">
                        <label for="testDurationFIT">Test Duration for FIT</label>
                        <input type="text" id="testDurationFIT" name="testDurationFIT" placeholder="Enter Test Duration for FIT">
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