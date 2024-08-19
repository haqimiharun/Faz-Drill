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

// Check if the user is logged in or not
if(!isset($_SESSION['user'])) {
	header('location: login.php');
	exit;
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

				<!-- <span style="float:left;line-height:50px;color:#000;padding-left:15px;font-size:18px;">Admin Panel</span> -->
    <!-- Top Bar ... User Information .. Login/Log out Area -->
				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<li class="dropdown user user-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<!-- <img src="../assets/uploads/<?php echo $_SESSION['user']['photo']; ?>" class="user-image" alt="User Image">
								<span class="hidden-xs"><?php echo $_SESSION['user']['full_name']; ?></span> -->
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

  		<?php $cur_page = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1); ?>
<!-- Side Bar to Manage Shop Activities -->
  		<aside class="main-sidebar">
    		<section class="sidebar">
      
      			<ul class="sidebar-menu">

			        <li class="treeview <?php if($cur_page == 'index.php') {echo 'active';} ?>">
			          <a href="index.php">
			            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
			          </a>
			        </li>

					
			        <li class="treeview <?php if( ($cur_page == 'report-header.php') ) {echo 'active';} ?>">
			          <a href="report-header.php">
			            <i class="fa fa-file-text-o"></i> <span>Report Header</span>
			          </a>
			        </li>

					<li class="treeview <?php if(in_array($cur_page, ['well-data.php', 'LOT-FIT.php', 'formation-data.php','gas-reading.php'])) { echo 'active'; } ?>">
						<a href="#">
							<i class="fa fa-database"></i>
							<span>Well Info</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="well-data.php"><i class="fa fa-circle-o"></i> Well Data</a></li>
							<li><a href="LOT-FIT.php"><i class="fa fa-circle-o"></i> LOT/FIT</a></li>
							<li><a href="formation-data.php"><i class="fa fa-circle-o"></i> Formation Data</a></li>
							<li><a href="gas-reading.php"><i class="fa fa-circle-o"></i> Gas Reading</a></li>
						</ul>
					</li>

					<li class="treeview <?php if(in_array($cur_page, ['rig-info.php'])) { echo 'active'; } ?>">
						<a href="rig-info.php">
							<i class="fa fa-industry"></i> <span>Rig Information</span>
						</a>
					</li>

					<li class="treeview <?php if(in_array($cur_page, ['consumables.php', 'bulk-material.php', 'weather_anchor.php','pob.php','vessels.php'])) { echo 'active'; } ?>">
						<a href="#">
							<i class="fa fa-truck"></i>
							<span>Logistics & Material</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="consumables.php"><i class="fa fa-circle-o"></i> Consumables</a></li>
							<li><a href="bulk-material.php"><i class="fa fa-circle-o"></i> Bulk & Liquid Material</a></li>
							<li><a href="weather_anchor.php"><i class="fa fa-circle-o"></i> Weather + Anchor</a></li>
							<li><a href="pob.php"><i class="fa fa-circle-o"></i> Personnel On Board</a></li>
							<li><a href="vessels.php"><i class="fa fa-circle-o"></i> Vessels</a></li>
						</ul>
					</li>

					<li class="treeview <?php if(in_array($cur_page, ['pipe-data.php', 'BHA-data.php', 'bit-data.php','survey.php','Operation-sum.php','solidCtrlEquipment.php','safety.php', 'mud-data.php', 'mud-vol.php','mud-log.php','formation-eva.php','velocities.php'])) { echo 'active'; } ?>">
						<a href="#">
							<i class="fa fa-gears"></i>
							<span>Operation</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="pipe-data.php"><i class="fa fa-circle-o"></i> Pipe Data</a></li>
							<li><a href="BHA-data.php"><i class="fa fa-circle-o"></i> BHA Data</a></li>
							<li><a href="bit-data.php"><i class="fa fa-circle-o"></i> Bit Data</a></li>
							<li><a href="survey.php"><i class="fa fa-circle-o"></i> Survey</a></li>
							<li><a href="safety.php"><i class="fa fa-circle-o"></i> Safety</a></li>
							<li><a href="solidCtrlEquipment.php"><i class="fa fa-circle-o"></i> Solid Control Equipment</a></li>
							<li><a href="mud-data.php"><i class="fa fa-circle-o"></i> Mud Data</a></li>
							<li><a href="mud-vol.php"><i class="fa fa-circle-o"></i> Mud Volumes</a></li>
							<li><a href="mud-log.php"><i class="fa fa-circle-o"></i> Mud Log</a></li>
							<li><a href="formation-eva.php"><i class="fa fa-circle-o"></i> Formation Evaluation</a></li>
							<li><a href="velocities.php"><i class="fa fa-circle-o"></i> Velocities</a></li>
							<li><a href="Operation-sum.php"><i class="fa fa-circle-o"></i> Operation Summary</a></li>
						</ul>
					</li>

					<li class="treeview <?php if(in_array($cur_page, ['AFE-cost.php', 'daily-cost.php'])) { echo 'active'; } ?>">
						<a href="#">
							<i class="fa fa-truck"></i>
							<span>Cost</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="AFE-cost.php"><i class="fa fa-circle-o"></i> AFE Cost</a></li>
							<li><a href="daily-cost.php"><i class="fa fa-circle-o"></i> Daily Cost</a></li>
						</ul>
					</li>

					<li class="treeview <?php if(in_array($cur_page, ['reports.php', 'reports-add.php', 'reports-edit.php'])) { echo 'active'; } ?>">
						<a href="reports.php">
							<i class="fa fa-file-text"></i> <span>Reports</span>
						</a>
					</li>

					<li class="treeview <?php if($cur_page == 'unit-mngmt.php') { echo 'active'; } ?>">
						<a href="unit-mngmt.php">
							<i class="fa fa-sticky-note"></i> <span>Units Management</span>
						</a>
					</li>


      			</ul>
    		</section>
  		</aside>

  		<div class="content-wrapper">

