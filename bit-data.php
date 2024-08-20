<?php require_once('header.php'); ?>

<?php require_once('header.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
    <div class="wrapper">
    <h1 style="text-align: center;">Bit Data</h1>
        <div class="row1">
            <div class="container">
                <h2>New Bit</h2>
                <form action="#" method="post">
                    <div class="table-wrapper">
                        <table class="table-custom">
                            <thead>
                                <tr>
                                    <th></th> <!-- Empty top-left corner cell -->
                                    <th></th>
                                    <th>Jets</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>Run#</th>
                                    <td><input type="text" name="input_1_1" /></td>
                                    <td><input type="text" name="input_1_2" /></td>
                                </tr>
                                <tr>
                                    <th>Bit Size</th>
                                    <td><input type="text" name="input_1_1" /></td>
                                    <td><input type="text" name="input_1_2" /></td>
                                </tr>
                                <tr>
                                    <th>Manufacturer</th>
                                    <td><input type="text" name="input_1_1" /></td>
                                    <td><input type="text" name="input_1_2" /></td>
                                </tr>
                                <tr>
                                    <th>Bit Type</th>
                                    <td><input type="text" name="input_1_1" /></td>
                                    <td><input type="text" name="input_1_2" /></td>
                                </tr>
                                <tr>
                                    <th>IADC
                                    <button type="button" class="info-btn" onclick="openPopup()">?</button>
                                    </th>
                                    <td><input type="text" name="input_1_1" /></td>
                                    <td><input type="text" name="input_1_2" /></td>
                                </tr>
                                <tr>
                                    <th>Bit Serial</th>
                                    <td><input type="text" name="input_1_1" /></td>
                                    <td><input type="text" name="input_1_2" /></td>
                                </tr>
                                <tr>
                                    <th>TFA</th>
                                    <td><input type="text" name="input_1_1" /></td>
                                    <td><input type="text" name="input_1_2" /></td>
                                </tr>
                                <tr>
                                    <th>Nozzle Vel ft sec</th>
                                    <td><input type="text" name="input_1_1" /></td>
                                    <td><input type="text" name="input_1_2" /></td>
                                </tr>
                                <tr>
                                    <th>Depth In</th>
                                    <td><input type="text" name="input_1_1" /></td>
                                    <td><input type="text" name="input_1_2" /></td>
                                </tr>
                                <tr>
                                    <th>Depth Out</th>
                                    <td><input type="text" name="input_1_1" /></td>
                                    <td><input type="text" name="input_1_2" /></td>
                                </tr>
                                <tr>
                                    <th>Drilled</th>
                                    <td><input type="text" name="input_1_1" /></td>
                                    <td><input type="text" name="input_1_2" /></td>
                                </tr>
                                <tr>
                                    <th>Total Hours</th>
                                    <td><input type="text" name="input_1_1" /></td>
                                    <td><input type="text" name="input_1_2" /></td>
                                </tr>
                                <tr>
                                    <th>Rotating Hours</th>
                                    <td><input type="text" name="input_1_1" /></td>
                                    <td><input type="text" name="input_1_2" /></td>
                                </tr>
                                <tr>
                                    <th>WOB</th>
                                    <td><input type="text" name="input_1_1" /></td>
                                    <td><input type="text" name="input_1_2" /></td>
                                </tr>
                                <tr>
                                    <th>Torque</th>
                                    <td><input type="text" name="input_1_1" /></td>
                                    <td><input type="text" name="input_1_2" /></td>
                                </tr>
                                <tr>
                                    <th>RPM</th>
                                    <td><input type="text" name="input_1_1" /></td>
                                    <td><input type="text" name="input_1_2" /></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>

            <div class="container">
                <h2>Dull Bit Grinding</h2>
                <form>
                    <div class="form-group">
                        <label for="Inner">Inner</label>
                        <input type="text" id="Inner" name="Inner" placeholder="Enter Inner">
                    </div>
                    <div class="form-group">
                        <label for="Outer">Outer</label>
                        <input type="text" id="Outer" name="Outer" placeholder="Enter Outer">
                    </div>
                    <div class="form-group">
                        <label for="dull_char">Dull char</label>
                        <input type="text" id="dull_char" name="dull_char" placeholder="Enter Dull char">
                    </div>
                    <div class="form-group">
                        <label for="Location">Location</label>
                        <input type="text" id="Location" name="Location" placeholder="Enter Location">
                    </div>
                    <div class="form-group">
                        <label for="bearing">Bearing Selas</label>
                        <input type="text" id="bearing" name="bearing" placeholder="Enter Bearing Selas">
                    </div>
                    <div class="form-group">
                        <label for="Gauge">Gauge</label>
                        <input type="text" id="Gauge" name="Gauge" placeholder="Enter Gauge">
                    </div>
                    <div class="form-group">
                        <label for="Other">Other</label>
                        <input type="text" id="Other" name="Other" placeholder="Enter Others">
                    </div>
                    <div class="form-group">
                        <label for="Reason">Reason</label>
                        <input type="text" id="Reason" name="Reason" placeholder="Enter Reason">
                    </div>
                    <div class="form-group">
                        <label for="com_sec">Comment Section</label>
                        <input type="text" id="com_sec" name="com_sec" placeholder="Enter Comments">
                    </div>
                </form>
            </div>

            <div class="container">
                <h2>ReRun Bit</h2>
                <form>
                    <div class="table-wrapper">
                        <table class="table-custom">
                            <thead>
                                <tr>
                                    <th>Run#</th> 
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>Bit Size</th>
                                    <td><input type="text" name="input_1" /></td>
                                </tr>
                                <tr>
                                    <th>Manufacturer</th>
                                    <td><input type="text" name="input_2" /></td>
                                </tr>
                                <tr>
                                    <th>Bit Type</th>
                                    <td><input type="text" name="input_3" /></td>
                                </tr>
                                <tr>
                                    <th>IADC</th>
                                    <td><input type="text" name="input_4" /></td>
                                </tr>
                                <tr>
                                    <th>Bit Serial</th>
                                    <td><input type="text" name="input_5" /></td>
                                </tr>
                                <tr>
                                    <th>TFA</th>
                                    <td><input type="text" name="input_6" /></td>
                                </tr>
                                <tr>
                                    <th>Nozzle Vel ft sec</th>
                                    <td><input type="text" name="input_7" /></td>
                                </tr>
                                <tr>
                                    <th>Depth In</th>
                                    <td><input type="text" name="input_8" /></td>
                                </tr>
                                <tr>
                                    <th>Depth Out</th>
                                    <td><input type="text" name="input_9" /></td>
                                </tr>
                                <tr>
                                    <th>Drilled</th>
                                    <td><input type="text" name="input_10" /></td>
                                </tr>
                                <tr>
                                    <th>Total Hours</th>
                                    <td><input type="text" name="input_11" /></td>

                                </tr>
                                <tr>
                                    <th>Rotating Hours</th>
                                    <td><input type="text" name="input_12" /></td>
                                </tr>
                                <tr>
                                    <th>WOB</th>
                                    <td><input type="text" name="input_13" /></td>
                                </tr>
                                <tr>
                                    <th>Torque</th>
                                    <td><input type="text" name="input_14" /></td>
                                </tr>
                                <tr>
                                    <th>RPM</th>
                                    <td><input type="text" name="input_15" /></td>
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
function openPopup() {
    document.getElementById("iadcPopup").style.display = "block";
}

function closePopup() {
    document.getElementById("iadcPopup").style.display = "none";
}

// Close popup if user clicks outside of content
window.onclick = function(event) {
    if (event.target == document.getElementById("iadcPopup")) {
        document.getElementById("iadcPopup").style.display = "none";
    }
}

</script>

</html>

<?php require_once('footer.php'); ?>