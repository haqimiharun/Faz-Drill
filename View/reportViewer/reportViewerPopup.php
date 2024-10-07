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
