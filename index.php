<?php require_once('header-db.php'); ?>

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
	<a href="#" class="import-design">Import Report</a>	
	<button id="createDesignBtn" class="btn btn-primary btn-sm">Create New Report</button>
		
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
                                <a title="Add New Country">
                                    <i id="addCountry" class="fas fa-plus-circle"></i>
                                </a>
                            </th>
                            <th>Field
                                <a title="Add New Field">
                                    <i id="addField" class="fas fa-plus-circle"></i>
                                </a>
                            </th>
                            <th>Site
                                <a title="Add New Site">
                                    <i id="addSite" class="fas fa-plus-circle"></i>
                                </a>
                            </th>
                            <th>Well
                                <a title="Add New Well">
                                    <i id="addWell" class="fas fa-plus-circle"></i>
                                </a>
                            </th>
                            <th>Wellbore
                                <a href="#" title="Add New Wellbore">
                                    <i class="fas fa-plus-circle"></i>
                                </a>
                            </th>
                            <th>Report
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
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
                            <td>Brazil</td>
                            <td>Sao Paulo</td>
                            <td>Site D</td>
                            <td>Well 4</td>
                            <td>Wellbore 4</td>
                            <td>Report 4</td>
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
// Get elements
var addWellBtn = document.getElementById("addWell");
var addSiteBtn = document.getElementById("addSite");
var addFieldBtn = document.getElementById("addField");
var addCountryBtn = document.getElementById("addCountry");
var btn = document.getElementById("createDesignBtn");
// The similarity start here
var modal = document.getElementById("myModal");
var span = document.getElementsByClassName("close")[0];
var dynamicContent = document.getElementById("dynamic-content");
var loader = document.getElementById("loader");

addWellBtn.onclick = function() {
    modal.style.display = "block";
    loader.style.display = "block";
    dynamicContent.innerHTML = "";

    var xhr = new XMLHttpRequest();
    xhr.open("GET", "add_well.php", true);
    xhr.onreadystatechange = function() {
        console.log("Request state: " + xhr.readyState + ", Status: " + xhr.status);
        if (xhr.readyState === 4 && xhr.status === 200) {
            loader.style.display = "none";
            dynamicContent.innerHTML = xhr.responseText;
            setupWellFormSubmission(); // Setup form submission for site
        } else if (xhr.readyState === 4) {
            console.error("Error at onreadystatechange: " + xhr.status);
        }
    };
    xhr.send();
};

addSiteBtn.onclick = function() {
    modal.style.display = "block";
    loader.style.display = "block";
    dynamicContent.innerHTML = "";

    var xhr = new XMLHttpRequest();
    xhr.open("GET", "add_site.php", true);
    xhr.onreadystatechange = function() {
        console.log("Request state: " + xhr.readyState + ", Status: " + xhr.status);
        if (xhr.readyState === 4 && xhr.status === 200) {
            loader.style.display = "none";
            dynamicContent.innerHTML = xhr.responseText;
            setupSiteFormSubmission(); // Setup form submission for site
        } else if (xhr.readyState === 4) {
            console.error("Error at onreadystatechange: " + xhr.status);
        }
    };
    xhr.send();
};


span.onclick = function() {
    modal.style.display = "none";
}

// Function to open the modal
addCountryBtn.onclick = function() {
    modal.style.display = "block";
    loader.style.display = "block";
    dynamicContent.innerHTML = ""; // Clear previous content

    // Load the content from the add_country.php file
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "add_country.php", true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            loader.style.display = "none";
            dynamicContent.innerHTML = xhr.responseText;
            setupFormSubmission(); // Call this to setup the AJAX form submission
        }
    };
    xhr.send();
};

// Inside the function to open the modal
addFieldBtn.onclick = function() {
    modal.style.display = "block";
    loader.style.display = "block";
    dynamicContent.innerHTML = ""; // Clear previous content

    // Load the content from the add_field.php file
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "add_field.php", true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            loader.style.display = "none";
            dynamicContent.innerHTML = xhr.responseText;
            setupFieldForm(); // Call this to setup the AJAX form submission
        }
    };
    xhr.send();
};

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
};

function setupFieldForm() {
    var fieldForm = document.getElementById("fieldForm");
    var countrySelect = document.getElementById("countrySelect");

    // Load country options for the dropdown
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "get_countries.php", true); // PHP script to fetch countries
    xhr.onload = function() {
        if (xhr.status === 200) {
            var countries = JSON.parse(xhr.responseText);
            countries.forEach(function(country) {
                var option = document.createElement("option");
                option.value = country.country_id;
                option.text = country.country_name;
                countrySelect.add(option);
            });
        }
    };
    xhr.send();
    fieldForm.onsubmit = function(event) {
        event.preventDefault(); // Prevent default form submission

        var formData = new FormData(fieldForm);
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "process_add_field.php", true); // PHP script to process field addition
        xhr.onload = function() {
            if (xhr.status === 200) {
                alert("Field added successfully!");
            } else {
                alert("Error: " + xhr.responseText);
            }
            modal.style.display = "none"; // Close the modal
        };

        xhr.onerror = function() {
            alert("Error: Failed to send the request. Please try again.");
            modal.style.display = "none"; // Close the modal
        };
        xhr.send(formData);
    };
}

window.onclick = function(event) {
    if (event.target == siteModal) {
        siteModal.style.display = "none";
    }
}

function setupWellFormSubmission() {
    console.log("setupWellFormSubmission called");
    var wellForm = document.getElementById("wellForm");
    if (!wellForm) {
        console.error("wellForm not found");
        return;
    }
    console.log("wellForm found");

    // Load country options for the dropdown
    var countrySelect = document.getElementById("countrySelect");
    var xhrCountries = new XMLHttpRequest();
    xhrCountries.open("GET", "get_countries.php", true);
    xhrCountries.onload = function() {
        if (xhrCountries.status === 200) {
            try {
                var countries = JSON.parse(xhrCountries.responseText);
                countries.forEach(function(country) {
                    var option = document.createElement("option");
                    option.value = country.country_id;
                    option.text = country.country_name;
                    countrySelect.add(option);
                });
            } catch (e) {
                console.error("Error parsing countries JSON: ", e);
            }
        } else {
            console.error("Error loading countries: " + xhrCountries.status);
        }
    };
    xhrCountries.send();

    // Handle country selection to load corresponding fields
    countrySelect.onchange = function() {
        var selectedCountryId = countrySelect.value;
        if (!selectedCountryId) {
            console.log("No country selected");
            return;
        }

        var fieldSelect = document.getElementById("fieldSelect");
        fieldSelect.innerHTML = '<option value="">Select a Field</option>'; // Reset field options

        var xhrFields = new XMLHttpRequest();
        xhrFields.open("GET", "get_fields.php?countryId=" + selectedCountryId, true);
        xhrFields.onload = function() {
        if (xhrFields.status === 200) {
            try {
                var response = JSON.parse(xhrFields.responseText);
                console.log("Fields response: ", response); // Log the entire response
                if (response.status === "success" && Array.isArray(response.data)) {
                    var fields = response.data;
                    fields.forEach(function(field) {
                        var option = document.createElement("option");
                        option.value = field.field_id;
                        option.text = field.field_name;
                        fieldSelect.add(option);
                    });
                } else {
                    console.error("Fields response is not an array or status is not success");
                }
            } catch (e) {
                console.error("Error parsing fields JSON: ", e);
            }
        } else {
            console.error("Error loading fields: " + xhrFields.status);
        }
    };

        xhrFields.send();
    };

    // Handle Field selection to load corresponding sites
    fieldSelect.onchange = function() {
        var selectedFieldId = fieldSelect.value;
        if (!selectedFieldId) {
            console.log("No Field selected");
            return;
        }

        var siteSelect = document.getElementById("siteSelect");
        siteSelect.innerHTML = '<option value="">Select a site</option>'; // Reset site options

        var xhrsites = new XMLHttpRequest();
        xhrsites.open("GET", "get_sites.php?fieldId=" + selectedFieldId, true);
            xhrsites.onload = function() {
        if (xhrsites.status === 200) {
            try {
                var responseText = xhrsites.responseText;
                // Optional: Check if response starts with '<' to identify HTML
                if (responseText.trim().startsWith('<')) {
                    console.error("Unexpected HTML response: ", responseText);
                    return;
                }

                var response = JSON.parse(responseText);
                console.log("Sites response: ", response); // Log the entire response
                if (response.status === "success" && Array.isArray(response.data)) {
                    var sites = response.data;
                    siteSelect.innerHTML = ''; // Clear existing options if needed
                    sites.forEach(function(site) {
                        var option = document.createElement("option");
                        option.value = site.site_id;
                        option.text = site.site_name;
                        siteSelect.add(option);
                    });
                } else {
                    console.error("Response status is not 'success' or data is not an array.");
                }
            } catch (e) {
                console.error("Error parsing JSON response: ", e);
            }
        } else {
            console.error("Error loading sites: Status " + xhrsites.status);
        }
    };


        xhrsites.send();
    };

    wellForm.onsubmit = function(event) {
        event.preventDefault(); // Prevent default form submission
        var formData = new FormData(wellForm);
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "process_add_well.php", true); // Update to your processing PHP file
        xhr.onload = function() {
            if (xhr.status === 200) {
                alert(xhr.responseText);
            } else {
                alert("Error: " + xhr.responseText); // Include server response in the alert
            }
            modal.style.display = "none"; // Close the modal
        };
        xhr.onerror = function() {
            alert("Error: Failed to send the request. Please try again.");
            modal.style.display = "none"; // Close the modal
        };
        xhr.send(formData);
    };
}

function setupSiteFormSubmission() {
    console.log("setupSiteFormSubmission called");
    var siteForm = document.getElementById("siteForm");
    if (!siteForm) {
        console.error("siteForm not found");
        return;
    }
    console.log("siteForm found");

    // Load country options for the dropdown
    var countrySelect = document.getElementById("countrySelect");
    var xhrCountries = new XMLHttpRequest();
    xhrCountries.open("GET", "get_countries.php", true);
    xhrCountries.onload = function() {
        if (xhrCountries.status === 200) {
            try {
                var countries = JSON.parse(xhrCountries.responseText);
                countries.forEach(function(country) {
                    var option = document.createElement("option");
                    option.value = country.country_id;
                    option.text = country.country_name;
                    countrySelect.add(option);
                });
            } catch (e) {
                console.error("Error parsing countries JSON: ", e);
            }
        } else {
            console.error("Error loading countries: " + xhrCountries.status);
        }
    };
    xhrCountries.send();

    // Handle country selection to load corresponding fields
    countrySelect.onchange = function() {
        var selectedCountryId = countrySelect.value;
        if (!selectedCountryId) {
            console.log("No country selected");
            return;
        }

        var fieldSelect = document.getElementById("fieldSelect");
        fieldSelect.innerHTML = '<option value="">Select a Field</option>'; // Reset field options

        var xhrFields = new XMLHttpRequest();
        xhrFields.open("GET", "get_fields.php?countryId=" + selectedCountryId, true);
        xhrFields.onload = function() {
        if (xhrFields.status === 200) {
            try {
                var response = JSON.parse(xhrFields.responseText);
                console.log("Fields response: ", response); // Log the entire response
                if (response.status === "success" && Array.isArray(response.data)) {
                    var fields = response.data;
                    fields.forEach(function(field) {
                        var option = document.createElement("option");
                        option.value = field.field_id;
                        option.text = field.field_name;
                        fieldSelect.add(option);
                    });
                } else {
                    console.error("Fields response is not an array or status is not success");
                }
            } catch (e) {
                console.error("Error parsing fields JSON: ", e);
            }
        } else {
            console.error("Error loading fields: " + xhrFields.status);
        }
    };

        xhrFields.send();
    };

    siteForm.onsubmit = function(event) {
        event.preventDefault(); // Prevent default form submission
        var formData = new FormData(siteForm);
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "process_add_site.php", true); // Update to your processing PHP file
        xhr.onload = function() {
            if (xhr.status === 200) {
                alert(xhr.responseText);
            } else {
                alert("Error: " + xhr.responseText); // Include server response in the alert
            }
            modal.style.display = "none"; // Close the modal
        };
        xhr.onerror = function() {
            alert("Error: Failed to send the request. Please try again.");
            modal.style.display = "none"; // Close the modal
        };
        xhr.send(formData);
    };
}

// Setup AJAX form submission
function setupFormSubmission() {
    var countryForm = document.getElementById("countryForm");
    countryForm.onsubmit = function(event) {
        event.preventDefault(); // Prevent default form submission
        var formData = new FormData(countryForm);
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "process_add_country.php", true); // Update to your processing PHP file
        xhr.onload = function() {
            if (xhr.status === 200) {
                alert("Country added successfully!");
            } else {
                alert("" + xhr.responseText); // Include server response in the alert
            }
            modal.style.display = "none"; // Close the modal
        };
        xhr.onerror = function() {
            alert("Error: Failed to send the request. Please try again.");
            modal.style.display = "none"; // Close the modal
        };
        xhr.send(formData);
    };
}

// Function to close the modal
span.onclick = function() {
    modal.style.display = "none";
};

// Close modal if user clicks outside of it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
};

$(document).ready(function() {
    $(".breadcrumb a").click(function(e) {
        e.preventDefault(); // Prevent the default link behavior

        // Hide all sections
        $(".dashboard-section").hide();

        // Get the target section from the data-target attribute
        var target = $(this).data("target");

        // Show the selected section
        $("#" + target).show();
    });
});

</script>

<?php require_once('footer.php'); ?>