<?php
ob_start();
session_start();
include("inc/config.php");
include("inc/functions.php");
include("inc/CSRF_Protect.php");
$csrf = new CSRF_Protect();
$error_message = '';
$success_message = '';
$error_message1 = '';
$success_message1 = '';
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Check if the user is logged in or not
if(!isset($_SESSION['user'])) {
	header('location: login.php');
	exit;
}

$reportId = $_SESSION['reportId'];

if ($reportId) {
    try {
        // Prepare and execute SQL query to get the report name
        $stmt = $pdo->prepare('SELECT report_name FROM tbl_report WHERE report_id = :reportId');
        $stmt->execute(['reportId' => $reportId]);
        $report = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($report) {
            $reportName = $report['report_name'];
        } else {
            $reportName = 'Unknown Report Name';
        }
    } catch (PDOException $e) {
        $reportName = 'Error fetching report name';
        error_log('Database query error: ' . $e->getMessage());
    }
} else {
    $reportName = 'No Report Selected';
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>FAZ DRILL</title>

	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/ionicons.min.css">
	<link rel="stylesheet" href="css/datepicker3.css">
	<link rel="stylesheet" href="css/select2.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.css">
	<link rel="stylesheet" href="css/jquery.fancybox.css">
	<link rel="stylesheet" href="css/AdminLTE.min.css">
	<link rel="stylesheet" href="css/_all-skins.min.css">
	<link rel="stylesheet" href="css/on-off-switch.css"/>
	<link rel="stylesheet" href="css/summernote.css">
	<link rel="stylesheet" href="css/style.css">


</head>

<!-- Popup Structure -->
<div id="iadcPopup" class="popup" style="display:none; position:fixed; z-index:10000; left:0; top:0; width:100%; height:100%; background-color:rgba(0, 0, 0, 0.5);">
    <div class="popup-content" style="background-color:white; margin:5% auto; padding:20px; border:1px solid #888; width:70%; max-height:90%; overflow-y:auto;">
        <span class="close-btn" onclick="closePopup()" style="float:right; font-size:20px; font-weight:bold; color:#aaa; cursor:pointer;">&times;</span>
        <h3>IADC Dull Bit Grading</h3>
        <div style="display:flex; flex-wrap:wrap; justify-content:space-between;">
            <!-- Inner Section -->
            <div style="width:30%; margin-bottom:20px;">
                <h4>Inner</h4>
                <label><input type="radio" name="inner" value="1"> 1</label><br>
                <label><input type="radio" name="inner" value="2"> 2</label><br>
                <label><input type="radio" name="inner" value="3"> 3</label><br>
                <label><input type="radio" name="inner" value="4"> 4</label><br>
                <label><input type="radio" name="inner" value="5"> 5</label><br>
                <label><input type="radio" name="inner" value="6"> 6</label><br>
                <label><input type="radio" name="inner" value="7"> 7</label><br>
                <label><input type="radio" name="inner" value="8"> 8</label><br>
                <p>Scale of 0 - 8 based on loss of tooth height 0 no loss 8 total loss</p>
            </div>

            <!-- Outer Section -->
            <div style="width:30%; margin-bottom:20px;">
                <h4>Outer</h4>
                <label><input type="radio" name="outer" value="1"> 1</label><br>
                <label><input type="radio" name="outer" value="2"> 2</label><br>
                <label><input type="radio" name="outer" value="3"> 3</label><br>
                <label><input type="radio" name="outer" value="4"> 4</label><br>
                <label><input type="radio" name="outer" value="5"> 5</label><br>
                <label><input type="radio" name="outer" value="6"> 6</label><br>
                <label><input type="radio" name="outer" value="7"> 7</label><br>
                <label><input type="radio" name="outer" value="8"> 8</label><br>
                <p>Scale of 0 - 8 based on loss of tooth height 0 no loss 8 total loss</p>
            </div>

            <!-- Location Section -->
            <div style="width:30%; margin-bottom:20px;">
                <h4>Location</h4>
                <label><input type="radio" name="location" value="N"> N - Nose row</label><br>
                <label><input type="radio" name="location" value="M"> M - Middle row</label><br>
                <label><input type="radio" name="location" value="G"> G - Gauge row</label><br>
                <label><input type="radio" name="location" value="C"> C - Cone</label><br>
                <label><input type="radio" name="location" value="S"> S - Shoulder</label><br>
                <label><input type="radio" name="location" value="T"> T - Taper</label><br>
                <label><input type="radio" name="location" value="A"> A - All areas</label>
            </div>

            <!-- Dull Characteristics Section -->
            <div style="width:30%; margin-bottom:20px;">
                <h4>Dull Characteristics</h4>
                <label><input type="radio" name="dull_char" value="BC"> BC - Broken cone</label><br>
                <label><input type="radio" name="dull_char" value="BF"> BF - Bond failure</label><br>
                <label><input type="radio" name="dull_char" value="BT"> BT - Broken teeth</label><br>
                <label><input type="radio" name="dull_char" value="BU"> BU - Balled up bit</label><br>
                <label><input type="radio" name="dull_char" value="CC"> CC - Cracked cone</label><br>
                <label><input type="radio" name="dull_char" value="CD"> CD - Cone dragged</label><br>
				<label><input type="radio" name="dull_char" value="CD"> CI - Cone interference</label><br>
				<label><input type="radio" name="dull_char" value="CD"> CR - Cored</label><br>
				<label><input type="radio" name="dull_char" value="CD"> CT - Chipped Teeth & cutters</label><br>
				<label><input type="radio" name="dull_char" value="CD"> ER - Erosion</label><br>
				<label><input type="radio" name="dull_char" value="CD"> FC - Flat crest wear</label><br>
				<label><input type="radio" name="dull_char" value="CD"> HC - Heat checking</label><br>
				<label><input type="radio" name="dull_char" value="CD"> JD - Junk damage</label><br>
				<label><input type="radio" name="dull_char" value="CD"> LC - Lost cone</label><br>
				<label><input type="radio" name="dull_char" value="CD"> LN - Lost nozzle</label><br>
				<label><input type="radio" name="dull_char" value="CD"> LT - Lost teeth and cutters</label><br>
				<label><input type="radio" name="dull_char" value="CD"> OC - Off centre wear</label><br>
				<label><input type="radio" name="dull_char" value="CD"> PB - Pinched bit</label><br>
				<label><input type="radio" name="dull_char" value="CD"> PN - Plugged nozzle or flow areas</label><br>
				<label><input type="radio" name="dull_char" value="CD"> RG - Rounded gauge</label><br>
				<label><input type="radio" name="dull_char" value="CD"> RO - Ring out</label><br>
				<label><input type="radio" name="dull_char" value="CD"> SD - Shirttail damage</label><br>
				<label><input type="radio" name="dull_char" value="CD"> SS - Shelf sharping wear</label><br>
				<label><input type="radio" name="dull_char" value="CD"> TR - Cone tracking</label><br>
				<label><input type="radio" name="dull_char" value="CD"> WO - Wash out</label><br>
				<label><input type="radio" name="dull_char" value="CD"> WT - Worn teeth or cutters</label><br>
				<label><input type="radio" name="dull_char" value="CD"> NO - No dull characteristics</label>
                <!-- Add more dull characteristics as needed -->
            </div>

    <!-- Reason Pulled Section -->
            <div style="width:30%; margin-bottom:20px;">
                <h4>Reason Pulled</h4>
                <label><input type="radio" name="reason_pulled" value="BHA"> BHA - Change</label><br>
                <label><input type="radio" name="reason_pulled" value="DMF"> DMF - Downhole motor failure</label><br>
                <label><input type="radio" name="reason_pulled" value="DTF"> DTF - Downhole tool failure</label><br>
                <label><input type="radio" name="reason_pulled" value="DSF"> DSF - Drill string failure</label><br>
                <label><input type="radio" name="reason_pulled" value="DST"> DST - Drill stem test</label><br>
                <label><input type="radio" name="reason_pulled" value="DP"> DP - Drill Plug</label><br>
				<label><input type="radio" name="reason_pulled" value="CM"> CM - Condition mud</label><br>
				<label><input type="radio" name="reason_pulled" value="CP"> CP - Core Point</label><br>
				<label><input type="radio" name="reason_pulled" value="FM"> FM - Formation change</label><br>
				<label><input type="radio" name="reason_pulled" value="HP"> HP - Hole Problem</label><br>
				<label><input type="radio" name="reason_pulled" value="HR"> HR - Hours on bit</label><br>
				<label><input type="radio" name="reason_pulled" value="LOG"> LOG - Run Logs</label><br>
				<label><input type="radio" name="reason_pulled" value="PP"> PP - Pump Pressure</label><br>
				<label><input type="radio" name="reason_pulled" value="PR"> PR - Penetration rate</label><br>
				<label><input type="radio" name="reason_pulled" value="Rig"> Rig - Rig Repair</label><br>
				<label><input type="radio" name="reason_pulled" value="TD"> TD - Total Depth</label><br>
				<label><input type="radio" name="reason_pulled" value="TW"> TW - Twist Off </label><br>
				<label><input type="radio" name="reason_pulled" value="TQ"> TQ - Torque </label><br>
				<label><input type="radio" name="reason_pulled" value="TD"> TD - Total Depth</label><br>
				<label><input type="radio" name="reason_pulled" value="WC"> WC - Weather Condition</label>
                <!-- Add more reasons as needed -->
            </div>

            <!-- Gauge Section -->
            <div style="width:30%; margin-bottom:20px;">
                <h4>Gauge</h4>
                <label><input type="radio" name="gauge" value="x"> x - in gauge</label><br>
                <label><input type="radio" name="gauge" value="1/16"> 1/16"out</label><br>
                <label><input type="radio" name="gauge" value="1/8"> 1/8"out</label><br>
                <label><input type="radio" name="gauge" value="3/16"> 3/16"out</label><br>
                <label><input type="radio" name="gauge" value="5/16"> 5/16"out</label><br>
                <label><input type="radio" name="gauge" value="3/8"> 3/8"out</label><br>
                <label><input type="radio" name="gauge" value="7/16"> 7/16"out</label><br>
				<label><input type="radio" name="gauge" value="1/2"> 1/2"out</label><br>
				<label><input type="radio" name="gauge" value="9/16"> 9/16"out</label><br>
				<label><input type="radio" name="gauge" value="5/8"> 5/8"out</label><br>
				<label><input type="radio" name="gauge" value="3/4"> 3/4"out</label>
            </div>

            <!-- Bearing Seals Section -->
            <div style="width:30%; margin-bottom:20px;">
                <h4>Bearings Seals</h4>
                <label>Non Sealed Bearing (Scale of 0 - 8)</label><br>
				<label>(8 = 100% Life Used) Scale <input type="text" name="bearing_scale" style="width:50px;"></label>
                <label><input type="radio" name="bearing_seals" value="E"> E - Seals effective</label><br>
                <label><input type="radio" name="bearing_seals" value="F"> F - Seals failed</label><br>
                <label><input type="radio" name="bearing_seals" value="N"> N - Not able to grade</label><br>
                <label><input type="radio" name="bearing_seals" value="X"> X - Fixed cutter bit</label>
            </div>

            <!-- Other Dull Characteristics Section -->
            <div style="width:30%; margin-bottom:20px;">
                <h4>Other Dull Characteristics</h4>
                <label>Other Refer to Dull Char: <input type="text" name="other_dull_char"></label>
            </div>
        </div>
        <button onclick="confirm_data()" style="background-color:#42C3FC; color:white; border:none; padding:10px 20px; cursor:pointer;">Confirm</button>
    </div>
</div>

<body class="hold-transition fixed skin-blue sidebar-mini">
	<div class="wrapper">
<header class="main-header">
    <a href="index.php" class="logo">
        <span class="logo-lg">FAZ-DRILL</span>
    </a>
    <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>        
    <!-- Breadcrumb Navigation -->
    <nav aria-label="bc" class="bc-nav">
        <ol class="bc" id="breadcrumb">
            <li class="bc-item"><a href="#" id="breadcrumb-report-name"><?php echo htmlspecialchars($reportName); ?></a></li>>
            <li class="bc-item"><a href="#" id="breadcrumb-main-menu"></a></li>
        </ol>
    </nav>
        <!-- Top Bar ... User Information .. Login/Log out Area-->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-footer">
                            <div>
                                <a href="profile-edit.php" class="btn btn-default btn-flat">Edit Profile</a>
                            </div>
                            <div>
                                <a href="logout.php" class="btn btn-default btn-flat">Log out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>

<script>

  document.addEventListener('DOMContentLoaded', function() {
    // Get the page title element
    var titleElement = document.getElementById('page-title');
    
    // Function to update the title
    function updateTitle(title) {
      if (titleElement) {
        titleElement.textContent = title;
      }
    }
    
    // Check the URL to determine the title
    var url = window.location.href;
    
    if (url.includes('index.php')) {
      updateTitle('Dashboard');
    } else if (url.includes('report-header.php')) {
      // Extract reportId from the URL
      var params = new URLSearchParams(window.location.search);
      var reportId = params.get('reportId');
      
      if (reportId) {
        // Fetch report name via an API call or predefined list
        // For example purposes, we use a placeholder text
        var reportName = 'Report ' + reportId; // Replace with actual report name retrieval logic
        updateTitle(reportName);
      } else {
        updateTitle('Report'); // Default title if no reportId is found
      }
    } else {
      updateTitle('Page Title'); // Default title for other pages
    }
  });
</script>

<style>
    .sidebar-menu a.active {
        background-color: #2BAAE1; /* Active link background */
        color: white; /* Active link text color */
    }

</style>
  	<?php $cur_page = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1); ?>
<!-- Side Bar to Manage Shop Activities -->
<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="treeview <?php if( ($cur_page == 'report-header.php') ) {echo 'active';} ?>">
                <a href="#report-header">
                    <i class="fa fa-file-text-o"></i> <span>Report Header</span>
                </a>
            </li>
            <li class="treeview <?php if( ($cur_page == 'well-data.php') ) {echo 'active';} ?>">
                <a href="#well-data">
                    <i class="fa fa-file-text-o"></i> <span>Well Data</span>
                </a>
            </li>
            <li class="treeview <?php if( ($cur_page == 'depth_days.php') ) {echo 'active';} ?>">
                <a href="#depth-days">
                    <i class="fa fa-file-text-o"></i> <span>Depth Days</span>
                </a>
            </li>
            <li class="treeview <?php if( ($cur_page == 'costInfo.php') ) {echo 'active';} ?>">
                <a href="#costInfo">
                    <i class="fa fa-file-text-o"></i> <span>Cost Information</span>
                </a>
            </li>
            <li class="treeview <?php if( ($cur_page == 'status.php') ) {echo 'active';} ?>">
                <a href="#status">
                    <i class="fa fa-file-text-o"></i> <span>Status</span>
                </a>
            </li>
            <li class="treeview <?php if( ($cur_page == 'operationSumm.php') ) {echo 'active';} ?>">
                <a href="#operationSumm">
                    <i class="fa fa-file-text-o"></i> <span>Operation Summary</span>
                </a>
            </li>
            <li class="treeview <?php if( ($cur_page == 'bit-data.php') ) {echo 'active';} ?>">
                <a href="#bit-data">
                    <i class="fa fa-file-text-o"></i> <span>Bit Data</span>
                </a>
            </li>
            <li class="treeview <?php if( ($cur_page == 'mud-check.php') ) {echo 'active';} ?>">
                <a href="#mud-check">
                    <i class="fa fa-file-text-o"></i> <span>Mud Check</span>
                </a>
            </li>
            <li class="treeview <?php if( ($cur_page == 'BHA-data.php') ) {echo 'active';} ?>">
                <a href="#BHA-data">
                    <i class="fa fa-file-text-o"></i> <span>BHA Data</span>
                </a>
            </li>
            <li class="treeview <?php if( ($cur_page == 'bha_component.php') ) {echo 'active';} ?>">
                <a href="#BHA-compoment">
                    <i class="fa fa-file-text-o"></i> <span>BHA Component</span>
                </a>
            </li>
            <li class="treeview <?php if( ($cur_page == 'gas-reading.php') ) {echo 'active';} ?>">
                <a href="#gas-reading">
                    <i class="fa fa-file-text-o"></i> <span>Gas Reading</span>
                </a>
            </li>
            <li class="treeview <?php if( ($cur_page == 'mud-vol.php') ) {echo 'active';} ?>">
                <a href="#mud-vol">
                    <i class="fa fa-file-text-o"></i> <span>Mud Volume</span>
                </a>
            </li>
            <li class="treeview <?php if( ($cur_page == 'pump-hydraulics.php') ) {echo 'active';} ?>">
                <a href="#pumpHydraulics">
                    <i class="fa fa-file-text-o"></i> <span>Pump Hydraulics</span>
                </a>
            </li>
            <li class="treeview <?php if( ($cur_page == 'pipe-data.php') ) {echo 'active';} ?>">
                <a href="#pipe-data">
                    <i class="fa fa-file-text-o"></i> <span>Pipe Data</span>
                </a>
            </li>
            <li class="treeview <?php if( ($cur_page == 'annVelocities.php') ) {echo 'active';} ?>">
                <a href="#annVelo">
                    <i class="fa fa-file-text-o"></i> <span>Annular Velocities</span>
                </a>
            </li>
            <li class="treeview <?php if($cur_page == 'shaker.php') { echo 'active'; } ?>">
                <a href="#shaker">
                    <i class="fa fa-sticky-note"></i> <span>Shaker</span>
                </a>
            </li>
            <li class="treeview <?php if($cur_page == 'centrifuge.php') { echo 'active'; } ?>">
                <a href="#centrifuge">
                    <i class="fa fa-sticky-note"></i> <span>Centrifuge</span>
                </a>
            </li>
            <li class="treeview <?php if($cur_page == 'hydrocyclone.php') { echo 'active'; } ?>">
                <a href="#hydrocyclone">
                    <i class="fa fa-sticky-note"></i> <span>Hydrocyclone</span>
                </a>
            </li>
            <li class="treeview <?php if($cur_page == 'LOT-FIT.php') { echo 'active'; } ?>">
                <a href="#LotFit">
                    <i class="fa fa-sticky-note"></i> <span>LOT-FIT</span>
                </a>
            </li>
            <li class="treeview <?php if($cur_page == 'formData.php') { echo 'active'; } ?>">
                <a href="#formData">
                    <i class="fa fa-sticky-note"></i> <span>Formation Data</span>
                </a>
            </li>
            <li class="treeview <?php if($cur_page == 'supportCraft.php') { echo 'active'; } ?>">
                <a href="#supportCraft">
                    <i class="fa fa-sticky-note"></i> <span>Support Craft</span>
                </a>
            </li>
            <li class="treeview <?php if($cur_page == 'bulks.php') { echo 'active'; } ?>">
                <a href="#bulks">
                    <i class="fa fa-sticky-note"></i> <span>Bulks</span>
                </a>
            </li>
            <li class="treeview <?php if($cur_page == 'weather.php') { echo 'active'; } ?>">
                <a href="#weather">
                    <i class="fa fa-sticky-note"></i> <span>Weather</span>
                </a>
            </li>
            <li class="treeview <?php if($cur_page == 'safetyCard.php') { echo 'active'; } ?>">
                <a href="#safetyCard">
                    <i class="fa fa-sticky-note"></i> <span>Safety Cards</span>
                </a>
            </li>
            <li class="treeview <?php if($cur_page == 'personnel.php') { echo 'active'; } ?>">
                <a href="#personnel">
                    <i class="fa fa-sticky-note"></i> <span>Personnel</span>
                </a>
            </li>
            <li class="treeview <?php if($cur_page == 'anchorTension.php') { echo 'active'; } ?>">
                <a href="#anchorTension">
                    <i class="fa fa-sticky-note"></i> <span>Anchor Tension</span>
                </a>
            </li>
            <li class="treeview <?php if($cur_page == 'safety.php') { echo 'active'; } ?>">
                <a href="#safety">
                    <i class="fa fa-sticky-note"></i> <span>Safety</span>
                </a>
            </li>
            <li class="treeview <?php if($cur_page == 'survey.php') { echo 'active'; } ?>">
                <a href="#survey">
                    <i class="fa fa-sticky-note"></i> <span>Survey</span>
                </a>
            </li>
        </ul>
    </section>
</aside>
  		<div class="content-wrapper">
</body>

<script>
       document.addEventListener('DOMContentLoaded', function () {
    const sections = document.querySelectorAll("section[id], div[id]");
    const breadcrumbMainMenu = document.querySelector('#breadcrumb li:nth-child(2) a');
    const sidebarLinks = document.querySelectorAll('.sidebar-menu a');

    const menuStructure = {
        "report-header": "Report Header",
        "well-data": "Well Info",
        "depth-days": "Depth Days",
        "costInfo": "Cost Information",
        "status": "Status",
        "operationSumm": "Operation Summary",
        "bit-data": "Bit Data",
        "mud-check": "Mud Check",
        "BHA-data": "BHA Data",
        "BHA-compoment": "BHA Component",
        "gas-reading": "Gas Reading",
        "mud-vol": "Mud Volume",
        "pump-hydraulics": "Pump/Hydraulics",
        "pipe-data": "Pipe Data",
        "annVelo": "Annular Velocities",
        "shaker": "Shaker",
        "centrifuge": "Centrifuge",
        "hydrocyclone": "Hydrocyclone",
        "LotFit": "LOT-FIT",
        "formData": "Formation Data",
        "supportCraft": "Support Craft",
        "bulks": "Bulks",
        "weather": "Weather",
        "safetyCard": "Safety Card",
        "personnel": "Personnel",
        "anchorTension": "Anchor Tension",
        "safety": "Safety",
        "survey-sum": "Survey Summary"
    };

    // Smooth scrolling for sidebar links
    sidebarLinks.forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });

    window.addEventListener('scroll', () => {
        let currentSection = '';

        // Loop through sections to find the one currently in view
        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.offsetHeight;
            if (window.pageYOffset >= sectionTop - 60 && window.pageYOffset < sectionTop + sectionHeight) {
                currentSection = section.getAttribute('id');
            }
        });

        // Update breadcrumb if current section exists in menuStructure
        if (currentSection && menuStructure[currentSection]) {
            breadcrumbMainMenu.textContent = menuStructure[currentSection];
        }

        // Update sidebar links active state
        sidebarLinks.forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href') === `#${currentSection}`) {
                link.classList.add('active');
            }
        });
    });
});

</script>
