<!-- reportViewerPopup.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Input</title>
    <link rel="stylesheet" href="../../css/report_info/well-data.css">

</head>
<body>
    <div class="content">
        <section id="report-header">
             <?php 
            // Get the field from the URL
            $field = isset($_GET['field']) ? $_GET['field'] : '';

            // Include the relevant section based on the field value
            if ($field === "wellInfo") {
                include '../../View/well-data.php'; 
            } elseif ($field === "depthDay") {
                include '../../View/depth_days.php'; 
            } elseif ($field === "costInfo") {
                include '../../View/costInfo.php'; 
            } elseif ($field === "status") {
                include '../../View/status.php'; 
            } elseif ($field === "operationSum") {
                include '../../View/operationSumm.php'; 
            } elseif ($field === "bitData") {
                include '../../View/bit-data.php'; 
            } elseif ($field === "mudCheck") {
                include '../../View/mud-check.php'; 
            } elseif ($field === "BHA") {
                include '../../View/BHA-data.php'; 
            } elseif ($field === "assemblyComp") {
                include '../../View/bha_component.php'; 
            } elseif ($field === "GasRead") {
                include '../../View/gas-reading.php'; 
            } elseif ($field === "MudVol") {
                include '../../View/mud-vol.php'; 
            } elseif ($field === "pumpHydraulic") {
                include '../../View/pump-hydraulics.php'; 
            } elseif ($field === "PipeData") {
                include '../../View/pipe-data.php'; 
            } elseif ($field === "annVelo") {
                include '../../View/annVelocities.php'; 
            } elseif ($field === "shaker") {
                include '../../View/shaker.php'; 
            } elseif ($field === "centrifuge") {
                include '../../View/centrifuge.php'; 
            } elseif ($field === "hydrocyclone") {
                include '../../View/hydrocyclone.php'; 
            } elseif ($field === "LotFit") {
                include '../../View/LOT-FIT.php'; 
            } elseif ($field === "formData") {
                include '../../View/formData.php'; 
            } elseif ($field === "supportCraft") {
                include '../../View/supportCraft.php'; 
            } elseif ($field === "bulks") {
                include '../../View/bulks.php'; 
            } elseif ($field === "weather") {
                include '../../View/weather.php'; 
            } elseif ($field === "safetyCards") {
                include '../../View/safetyCard.php'; 
            } elseif ($field === "personnel") {
                include '../../View/personnel.php'; 
            } elseif ($field === "anchorTension") {
                include '../../View/anchorTension.php'; 
            } elseif ($field === "safety") {
                include '../../View/safety.php'; 
            } elseif ($field === "surveys") {
                include '../../View/survey.php'; 
            } else {
                echo "<p>Invalid field specified.</p>";
            }
            ?>
        </section>
        <div class="button-container">
            <button id="submitButton" type="button">Submit</button>
            <button id="nextButton" type="button">Next & Submit</button>
            <button id="backButton" type="button">Back</button>
        </div>
    </div>

    <script>
        // Get the field from the URL
        const urlParams = new URLSearchParams(window.location.search);
        const field = urlParams.get('field');

        // Display the field in the form
        document.getElementById('field-name').innerText = `Field: ${field}`;
        document.getElementById('field-display').innerText = field;

        // Handle form submission
        document.getElementById('dataForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const inputData = document.getElementById('dataInput').value;

            // Log or use the input data
            console.log(`Data for ${field}: ${inputData}`);

            // Send data back to the main window or process as needed
            if (window.opener) {
                window.opener.handleData(field, inputData); // Send data back to the parent window
            }

            window.close(); // Close the popup after submission
        });
    </script>
</body>
</html>
