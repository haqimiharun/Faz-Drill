<?php require_once('header.php'); ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
            right: 30px; /* Adjust to position the icon */
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
        width: 80%;
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
</style>

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
	<a href="#" class="import-design">Import Design</a>	
	<button id="createDesignBtn" class="btn btn-primary btn-sm">Create Design</button>
		
	</div>

</section>

<div class="col-md-12">
    <div class="box box-info">
        <div class="box-body table-responsive">
            <div id="browse-content" class="dashboard-section" > <!-- BROWSE CONTENT -->
                <table id="example1" class="table table-bordered table-hover table-striped">
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
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>
                            
                            </td>
                            <td>
                                
                            </td>
                            <td>
                                
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div id="recent-content" class="dashboard-section" style="display:none;"> <!-- RECENT CONTENT -->
                <table id="example3" class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Design
                                <a href="#">
                            
                                </a>
                            </th>
                            <th>Country
                                <a href="#">
                           
                                </a>
                            </th>
                            <th>Field
                                <a href="#">
                           
                                </a>
                            </th>
                            <th>Site
                                <a href="#">
                           
                                </a>
                            </th>
                            <th>Well
                                <a href="#">
                            
                                </a>
                            </th>
                            <th>Wellbore
                                <a href="#">
                            
                            </a>
                            </th>

                            <th>User
                                <a href="#">
                            
                                </a>
                            </th>
                            <th>Modified By
                                <a href="#">
                            
                                </a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>
                            
                            </td>
                            <td>
                                
                            </td>
                            <td>
                                
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div id="my-design-content" class="dashboard-section" style="display:none;">

            <h3>My Design</h3>
            <table id="example4" class="table table-bordered table-hover table-striped">
                    <thead>
                    <tr>
                        <th>Well
                        <a href="#" title="Add New Country">
                        </a>
                        </th>
                        
                        <th>Field
                        <a href="#" title="Add New Field">
                        </a>
                        </th>

                        <th>Site
                        <a href="#" title="Add New Site">
                        </a>
                        </th>
                        
                        <th>Well
                        <a href="#" title="Add New Well">
                        </a>
                        </th>
                        
                        <th>Last Edited 
                        <a href="#" title="Add New Wellbore">
                        </a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>
                            
                            </td>
                            <td>
                                
                            </td>
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
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><a href="#" class="btn btn-link">View</a></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><a href="#" class="btn btn-link">View</a></td>
                    </tr>
                </tbody>
                </table>

                <h3>Change Log</h3>
            <table id="example7" class="table table-bordered table-hover table-striped">
                    <thead>
                    <tr>
                        <th>Change
                        <a href="#" >
                        </a>
                        </th>
                        
                        <th>Modified By
                        <a href="#" >
                        </a>
                        </th>

                        <th>Using
                        <a href="#" >
                        </a>
                        </th>
                        
                        <th>Operation
                        <a href="#" >
                        </a>
                        </th>
                        
                        <th>Time 
                        <a href="#" >
                        </a>
                        </th>

                        <th> 
                        <a href="#" >
                        </a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>
                            
                            </td>
                            <td>
                                
                            </td>
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
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>
                            
                            </td>
                            <td>
                                
                            </td>
                            <td>
                                
                            </td>
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

<script>
    var modal = document.getElementById("myModal");
    var btn = document.getElementById("createDesignBtn");
    var span = document.getElementsByClassName("close")[0];
    var dynamicContent = document.getElementById("dynamic-content");
    var loader = document.getElementById("loader");

    btn.onclick = function() {
        modal.style.display = "block";
        loader.style.display = "block";
        dynamicContent.innerHTML = ""; // Clear previous content

        // Load content from PHP page using AJAX
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "create-design.php", true); // Update to your PHP file path
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                loader.style.display = "none";
                dynamicContent.innerHTML = xhr.responseText;
            }
        };
        xhr.send();
    }

    span.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    $(document).ready(function() {
    $('.breadcrumb a').click(function(e) {
        e.preventDefault(); // Prevent the default link behavior

        // Hide all sections
        $('.dashboard-section').hide();

        // Get the target section from the data-target attribute
        var target = $(this).data('target');

        // Show the selected section
        $('#' + target).show();
    });
});

</script>


<?php require_once('footer.php'); ?>