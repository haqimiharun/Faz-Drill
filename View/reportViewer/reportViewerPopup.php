<!-- reportViewerPopup.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Input</title>
    <link rel="stylesheet" href="http://localhost/Faz-Drill//css/report_info/well-data.css">
</head>
<body>
    <div class="content">
        <section id="report-header">
            <form action="">
            <?php 
            // Get the field and reportId from the URL
            $field = isset($_GET['field']) ? $_GET['field'] : '';
            $reportId = isset($_GET['reportId']) ? $_GET['reportId'] : '';

            // Include the relevant section based on the field value
            $includeFile = '';
            switch ($field) {
                case "wellInfo":
                    $includeFile = '../../View/well-data.php';
                    break;
                case "depthDay":
                    $includeFile = '../../View/depth_days.php';
                    break;
                case "costInfo":
                    $includeFile = '../../View/costInfo.php';
                    break;
                case "status":
                    $includeFile = '../../View/status.php';
                    break;
                case "operationSum":
                    $includeFile = '../../View/operationSumm.php';
                    break;
                case "bitData":
                    $includeFile = '../../View/bit-data.php';
                    break;
                case "mudCheck":
                    $includeFile = '../../View/mud-check.php';
                    break;
                case "BHA":
                    $includeFile = '../../View/BHA-data.php';
                    break;
                case "assemblyComp":
                    $includeFile = '../../View/bha_component.php';
                    break;
                case "GasRead":
                    $includeFile = '../../View/gas-reading.php';
                    break;
                case "MudVol":
                    $includeFile = '../../View/mud-vol.php';
                    break;
                case "pumpHydraulic":
                    $includeFile = '../../View/pump-hydraulics.php';
                    break;
                case "PipeData":
                    $includeFile = '../../View/pipe-data.php';
                    break;
                case "annVelo":
                    $includeFile = '../../View/annVelocities.php';
                    break;
                case "shaker":
                    $includeFile = '../../View/shaker.php';
                    break;
                case "centrifuge":
                    $includeFile = '../../View/centrifuge.php';
                    break;
                case "hydrocyclone":
                    $includeFile = '../../View/hydrocyclone.php';
                    break;
                case "LotFit":
                    $includeFile = '../../View/LOT-FIT.php';
                    break;
                case "formData":
                    $includeFile = '../../View/formData.php';
                    break;
                case "supportCraft":
                    $includeFile = '../../View/supportCraft.php';
                    break;
                case "bulks":
                    $includeFile = '../../View/bulks.php';
                    break;
                case "weather":
                    $includeFile = '../../View/weather.php';
                    break;
                case "safetyCards":
                    $includeFile = '../../View/safetyCard.php';
                    break;
                case "personnel":
                    $includeFile = '../../View/personnel.php';
                    break;
                case "anchorTension":
                    $includeFile = '../../View/anchorTension.php';
                    break;
                case "safety":
                    $includeFile = '../../View/safety.php';
                    break;
                case "surveys":
                    $includeFile = '../../View/survey.php';
                    break;
                default:
                    error_log("Invalid field specified: " . htmlspecialchars($field)); // Log the invalid field
                    echo "<p>Invalid field specified.</p>";
                    break;
            }

            // Only include if a valid file is set and exists
            if ($includeFile && file_exists($includeFile)) {
                include_once $includeFile;
            } else {
                echo "<p>Unable to load the requested data. Please try again.</p>";
            }
            ?>
        </form>
        </section>
    </div>

    <script src="http://localhost/Faz-Drill/Controller/reportInformation/well-data.js" defer></script>
    <script>
        // Get the field from the URL
        const urlParams = new URLSearchParams(window.location.search);
        const field = urlParams.get('field');
        const reportId = urlParams.get('reportId');

    </script>
</body>
</html>
