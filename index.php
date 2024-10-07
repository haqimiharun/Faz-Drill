<?php require_once('header-db.php'); ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<?php
// Database connection settings
$dbhost = 'localhost';
$dbname = 'fazdrill';
$dbuser = 'postgres';
$dbpass = 'ftsb@123';

$countries = []; // Initialize the countries array

try {
    // Establish the database connection
    $pdo = new PDO("pgsql:host={$dbhost};dbname={$dbname}", $dbuser, $dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch distinct countries available in tbl_report
    $stmt = $pdo->query("
        SELECT DISTINCT c.country_id, c.country_name 
        FROM tbl_country c 
        JOIN tbl_field r ON c.country_id = r.country_id
    ");
    $countries = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $exception) {
    echo "Error: " . htmlspecialchars($exception->getMessage());
}

?>

    <style>
	.import-design {
        margin-right: 10px;
        text-decoration: none;
        color: #007bff;
		background: none;
        outline: none;
    }

    .import-design:hover {
        text-decoration: underline;
    }
        .table th {
            position: relative;
            padding-right: 20px; /* Adjust padding to ensure space for the icon */
        }

        .table th a {
            position: absolute;
             /* Adjust to position the icon */
            color: lightgray;
            text-decoration: none;
        }

        .table th a:hover {
            color: darkgray;
        }

		    /* Modal styling */
    .modal {
        display: none;
        position: fixed;
        z-index: 810;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0,0,0,0.4);
        padding-top: 60px;
    }

    .modal-content {
        background-color: #fefefe;
        margin: 5% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 60%;
        border-radius: 10px;
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    /* Loader style */
    .loader {
        border: 16px solid #f3f3f3;
        border-radius: 50%;
        border-top: 16px solid #3498db;
        width: 120px;
        height: 120px;
        animation: spin 2s linear infinite;
        margin: auto;
        display: none;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
    .selected-cell {
        background-color: #a0c1ff; /* Slightly darker blue for selected cells */
    }

    .disabled-link {
        pointer-events: none;
        opacity: 0.5; /* Makes the icon look disabled */
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<section class="content">

<ul class="breadcrumb">
  <li><a href="#" id="browse-link" data-target="browse-content">Browse</a></li>
  <li><a href="#" id="recent-link" data-target="recent-content">Recent</a></li>
  <li><a href="#" id="my-design-link" data-target="my-design-content">My Design</a></li>
  <li><a href="#" id="orphaned-design-link" data-target="orphaned-design-content">Orphaned Design</a></li>
</ul>

<section class="content-header">
	<div class="content-header-left">
		<h1>All Design</h1>
	</div>
	<div class="content-header-right">
	<a href="#" class="import-design">Import Report</a>	
	<button id="addNewReport" class="btn btn-primary btn-sm">Create New Report</button>
		
	</div>

</section>

<div class="col-md-12">
    <div class="box box-info">
        <div class="box-body table-responsive">
            <div id="browse-content" class="dashboard-section"> <!-- BROWSE CONTENT -->
                <table id="example1" class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Country
                                <a title="Add New Country" id="addCountryLink" class="disabled-link" style="right: 18px;">
                                    <i id="addCountry" class="fas fa-plus-circle"></i>
                                </a>
                            </th>
                            <th>Field
                                <a title="Add New Field" style="right: 18px;">
                                    <i id="addField" class="fas fa-plus-circle"></i>
                                </a>
                                <a title="Edit Field" style="right: 40px;">
                                    <i id="updateField" class="fas fa-pencil-alt"></i>
                                </a>
                            </th>
                            <th>Site
                                <a title="Add New Site" style="right: 18px;">
                                    <i id="addSite" class="fas fa-plus-circle"></i>
                                </a>
                                <a title="Edit Site" style="right: 40px;">
                                    <i id="updateSite" class="fas fa-pencil-alt"></i>
                                </a>
                            </th>
                            <th>Well
                                <a title="Add New Well" style="right: 18px;">
                                    <i id="addWell" class="fas fa-plus-circle"></i>
                                </a>
                                <a title="Edit Well" style="right: 40px;">
                                    <i id="updateWell" class="fas fa-pencil-alt"></i>
                                </a>
                            </th>
                            <th>Wellbore
                                <a title="Add New Wellbore" style="right: 18px;">
                                    <i id="addWellbore" class="fas fa-plus-circle"></i>
                                </a>
                                <a title="Edit Wellbore" style="right: 40px;">
                                    <i id="updateWellbore" class="fas fa-pencil-alt"></i>
                                </a>
                            </th>
                            <th>Report
                                <a title="Add New Report" style="right: 18px;">
                                    <i id="addReport" class="fas fa-plus-circle"></i>
                                </a>
                                <a title="Edit New Report" style="right: 40px;">
                                    <i id="updateNewReport" class="fas fa-pencil-alt"></i>
                                </a>
                            </th>
                        </tr>
                    </thead>
                     <tbody id="reportTableBody">
                            <?php if (!empty($countries)): ?>
                                <?php foreach ($countries as $country): ?>
                                    <tr>
                                        <td class="country-row" data-country-id="<?= htmlspecialchars($country['country_id']); ?>">
                                            <?= htmlspecialchars($country['country_name']); ?>
                                        </td>
                                        <td class="field-data"></td>
                                        <td class="site-data"></td>
                                        <td class="well-data"></td>
                                        <td class="wellbore-data"></td>
                                        <td class="report-data"></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6">No countries available.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                </table>
            </div>
            <div id="recent-content" class="dashboard-section" style="display:none;"> <!-- RECENT CONTENT -->
                <table id="example3" class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Design</th>
                            <th>Country</th>
                            <th>Field</th>
                            <th>Site</th>
                            <th>Well</th>
                            <th>Wellbore</th>
                            <th>User</th>
                            <th>Modified By</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Design A</td>
                            <td>USA</td>
                            <td>Texas</td>
                            <td>Site A</td>
                            <td>Well 1</td>
                            <td>Wellbore 1</td>
                            <td>John Doe</td>
                            <td>Jane Smith</td>
                        </tr>
                        <tr>
                            <td>Design B</td>
                            <td>Canada</td>
                            <td>Alberta</td>
                            <td>Site B</td>
                            <td>Well 2</td>
                            <td>Wellbore 2</td>
                            <td>Mary Johnson</td>
                            <td>James Brown</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div id="my-design-content" class="dashboard-section" style="display:none;">
                <h3>My Design</h3>
                <table id="example4" class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Well</th>
                            <th>Field</th>
                            <th>Site</th>
                            <th>Last Edited</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Well 1</td>
                            <td>Texas</td>
                            <td>Site A</td>
                            <td>2024-08-20</td>
                        </tr>
                        <tr>
                            <td>Well 2</td>
                            <td>Alberta</td>
                            <td>Site B</td>
                            <td>2024-08-19</td>
                        </tr>
                    </tbody>
                </table>

                <h3>Design Trial</h3>
                <table id="example6" class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th colspan="2">Section</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Section 1</td>
                            <td>Description A</td>
                            <td>Complete</td>
                            <td><a href="#" class="btn btn-link">View</a></td>
                        </tr>
                        <tr>
                            <td>Section 2</td>
                            <td>Description B</td>
                            <td>Pending</td>
                            <td><a href="#" class="btn btn-link">View</a></td>
                        </tr>
                    </tbody>
                </table>

                <h3>Change Log</h3>
                <table id="example7" class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Change</th>
                            <th>Modified By</th>
                            <th>Using</th>
                            <th>Operation</th>
                            <th>Time</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Added new report</td>
                            <td>Jane Smith</td>
                            <td>Report 1</td>
                            <td>Create</td>
                            <td>2024-08-20 10:00 AM</td>
                            <td><a href="#" class="btn btn-link">Details</a></td>
                        </tr>
                        <tr>
                            <td>Updated site details</td>
                            <td>John Doe</td>
                            <td>Site A</td>
                            <td>Update</td>
                            <td>2024-08-19 02:30 PM</td>
                            <td><a href="#" class="btn btn-link">Details</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div id="orphaned-design-content" class="dashboard-section" style="display:none;">
                <table id="example5" class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Country
                                <a href="#" title="Add New Country">
                                    <i class="fas fa-plus-circle"></i>
                                </a>
                            </th>
                            <th>Field
                                <a href="#" title="Add New Field">
                                    <i class="fas fa-plus-circle"></i>
                                </a>
                            </th>
                            <th>Site
                                <a href="#" title="Add New Site">
                                    <i class="fas fa-plus-circle"></i>
                                </a>
                            </th>
                            <th>Well
                                <a href="#" title="Add New Well">
                                    <i class="fas fa-plus-circle"></i>
                                </a>
                            </th>
                            <th>Wellbore
                                <a href="#" title="Add New Wellbore">
                                    <i class="fas fa-plus-circle"></i>
                                </a>
                            </th>
                            <th>Report
                                <a href="#" title="Add New Report">
                                    <i class="fas fa-plus-circle"></i>
                                </a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Australia</td>
                            <td>Queensland</td>
                            <td>Site C</td>
                            <td>Well 3</td>
                            <td>Wellbore 3</td>
                            <td>Report 3</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Report 4</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Well 4</td>
                            <td>Wellbore 4</td>
                            <td>Report 4</td>
                        </tr>
                        <tr>
                            <td>Malaysia</td>
                            <td>Katakuri</td>
                            <td>Site D4</td>
                            <td>Well D1</td>
                            <td>Wellbore D1</td>
                            <td>Report D1</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</section>

<!-- The Modal -->
<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <div id="modal-body">
            <div class="loader" id="loader"></div>
            <div id="dynamic-content"></div>
        </div>
    </div>
</div>

<?php require_once('footer.php'); ?>

<script src="Controller/respones.js"></script>
<script src="Controller/create-process.js"></script>
<script src="Controller/edit-process.js"></script>
<script src="Controller/newReportProcess.js"></script>