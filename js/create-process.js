// Get elements
var addWellboreBtn = document.getElementById("addWellbore");
var addWellBtn = document.getElementById("addWell");
var addSiteBtn = document.getElementById("addSite");
var addFieldBtn = document.getElementById("addField");
var addCountryBtn = document.getElementById("addCountry");
var btn = document.getElementById("addNewReport");
// The similarity start here
var modal = document.getElementById("myModal");
var span = document.getElementsByClassName("close")[0];
var dynamicContent = document.getElementById("dynamic-content");
var loader = document.getElementById("loader");

btn.onclick = function () {
	modal.style.display = "block";
	loader.style.display = "block";
	dynamicContent.innerHTML = "";

	var xhr = new XMLHttpRequest();
	xhr.open("GET", "add_report.php", true);
	xhr.onreadystatechange = function () {
		console.log("Request state: " + xhr.readyState + ", Status: " + xhr.status);
		if (xhr.readyState === 4 && xhr.status === 200) {
			loader.style.display = "none";
			dynamicContent.innerHTML = xhr.responseText;
			setupReportFormSubmission(); // Setup form submission for wellbore
		} else if (xhr.readyState === 4) {
			console.error("Error at onreadystatechange: " + xhr.status);
		}
	};
	xhr.send();
};

addWellboreBtn.onclick = function () {
	modal.style.display = "block";
	loader.style.display = "block";
	dynamicContent.innerHTML = "";

	var xhr = new XMLHttpRequest();
	xhr.open("GET", "add_wellbore.php", true);
	xhr.onreadystatechange = function () {
		console.log("Request state: " + xhr.readyState + ", Status: " + xhr.status);
		if (xhr.readyState === 4 && xhr.status === 200) {
			loader.style.display = "none";
			dynamicContent.innerHTML = xhr.responseText;
			setupWellboreFormSubmission(); // Setup form submission for wellbore
		} else if (xhr.readyState === 4) {
			console.error("Error at onreadystatechange: " + xhr.status);
		}
	};
	xhr.send();
};

addWellBtn.onclick = function () {
	modal.style.display = "block";
	loader.style.display = "block";
	dynamicContent.innerHTML = "";

	var xhr = new XMLHttpRequest();
	xhr.open("GET", "add_well.php", true);
	xhr.onreadystatechange = function () {
		console.log("Request state: " + xhr.readyState + ", Status: " + xhr.status);
		if (xhr.readyState === 4 && xhr.status === 200) {
			loader.style.display = "none";
			dynamicContent.innerHTML = xhr.responseText;
			setupWellFormSubmission(); // Setup form submission for well
		} else if (xhr.readyState === 4) {
			console.error("Error at onreadystatechange: " + xhr.status);
		}
	};
	xhr.send();
};

addSiteBtn.onclick = function () {
	modal.style.display = "block";
	loader.style.display = "block";
	dynamicContent.innerHTML = "";

	var xhr = new XMLHttpRequest();
	xhr.open("GET", "add_site.php", true);
	xhr.onreadystatechange = function () {
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

span.onclick = function () {
	modal.style.display = "none";
};

// Function to open the modal
addCountryBtn.onclick = function () {
	modal.style.display = "block";
	loader.style.display = "block";
	dynamicContent.innerHTML = ""; // Clear previous content

	// Load the content from the add_country.php file
	var xhr = new XMLHttpRequest();
	xhr.open("GET", "add_country.php", true);
	xhr.onreadystatechange = function () {
		if (xhr.readyState === 4 && xhr.status === 200) {
			loader.style.display = "none";
			dynamicContent.innerHTML = xhr.responseText;
			setupFormSubmission(); // Call this to setup the AJAX form submission
		}
	};
	xhr.send();
};

// Inside the function to open the modal
addFieldBtn.onclick = function () {
	modal.style.display = "block";
	loader.style.display = "block";
	dynamicContent.innerHTML = ""; // Clear previous content

	// Load the content from the add_field.php file
	var xhr = new XMLHttpRequest();
	xhr.open("GET", "add_field.php", true);
	xhr.onreadystatechange = function () {
		if (xhr.readyState === 4 && xhr.status === 200) {
			loader.style.display = "none";
			dynamicContent.innerHTML = xhr.responseText;
			setupFieldForm(); // Call this to setup the AJAX form submission
		}
	};
	xhr.send();
};

function setupFieldForm() {
	var fieldForm = document.getElementById("fieldForm");
	var countrySelect = document.getElementById("countrySelect");
	var fieldSelect = document.getElementById("fieldSelect");

	// Load country options for the dropdown
	var xhr = new XMLHttpRequest();
	xhr.open("GET", "get_countries.php", true); // PHP script to fetch countries
	xhr.onload = function () {
		if (xhr.status === 200) {
			var countries = JSON.parse(xhr.responseText);
			countries.forEach(function (country) {
				var option = document.createElement("option");
				option.value = country.country_id;
				option.text = country.country_name;
				countrySelect.add(option);
			});
		}
	};
	xhr.send();

	fieldForm.onsubmit = function (event) {
		event.preventDefault(); // Prevent default form submission

		var formData = new FormData(fieldForm);
		var xhr = new XMLHttpRequest();
		xhr.open("POST", "process_add_field.php", true); // PHP script to process field addition
		xhr.onload = function () {
			if (xhr.status === 200) {
				alert("Field added successfully!");
			} else {
				alert("Error: " + xhr.responseText);
			}
			modal.style.display = "none"; // Close the modal
		};

		xhr.onerror = function () {
			alert("Error: Failed to send the request. Please try again.");
			modal.style.display = "none"; // Close the modal
		};
		xhr.send(formData);
	};
}

window.onclick = function (event) {
	if (event.target == siteModal) {
		siteModal.style.display = "none";
	}
};

//STARTING HERE BROOOOOOOOOO, REMAKEEEEEEEE
function setupWellboreFormSubmission() {
	console.log("setupWellboreFormSubmission called");
	var wellboreForm = document.getElementById("wellboreForm");
	if (!wellboreForm) {
		console.error("wellboreForm not found");
		return;
	}
	console.log("wellboreForm found");

	// Load country options for the dropdown
	var countrySelect = document.getElementById("countrySelect");
	var xhrCountries = new XMLHttpRequest();
	xhrCountries.open("GET", "get_countries.php", true);
	xhrCountries.onload = function () {
		if (xhrCountries.status === 200) {
			try {
				var countries = JSON.parse(xhrCountries.responseText);
				countries.forEach(function (country) {
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
	countrySelect.onchange = function () {
		var selectedCountryId = countrySelect.value;
		if (!selectedCountryId) {
			console.log("No country selected");
			return;
		}
		var fieldSelect = document.getElementById("fieldSelect");
		fieldSelect.innerHTML = '<option value="">Select a Field</option>'; // Reset field options

		var xhrFields = new XMLHttpRequest();
		xhrFields.open(
			"GET",
			"get_fields.php?countryId=" + selectedCountryId,
			true
		);
		xhrFields.onload = function () {
			if (xhrFields.status === 200) {
				try {
					var response = JSON.parse(xhrFields.responseText);
					console.log("Fields response: ", response); // Log the entire response
					if (response.status === "success" && Array.isArray(response.data)) {
						var fields = response.data;
						fields.forEach(function (field) {
							var option = document.createElement("option");
							option.value = field.field_id;
							option.text = field.field_name;
							fieldSelect.add(option);
						});
					} else {
						console.error(
							"Fields response is not an array or status is not success"
						);
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
	fieldSelect.onchange = function () {
		var selectedFieldId = fieldSelect.value;
		if (!selectedFieldId) {
			console.log("No Field selected");
			return;
		}

		var siteSelect = document.getElementById("siteSelect");
		siteSelect.innerHTML = '<option value="">Select a site</option>'; // Reset site options

		var xhrsites = new XMLHttpRequest();
		xhrsites.open("GET", "get_sites.php?fieldId=" + selectedFieldId, true);
		xhrsites.onload = function () {
			if (xhrsites.status === 200) {
				try {
					var responseText = xhrsites.responseText;
					// Optional: Check if response starts with '<' to identify HTML
					if (responseText.trim().startsWith("<")) {
						console.error("Unexpected HTML response: ", responseText);
						return;
					}

					var response = JSON.parse(responseText);
					console.log("Sites response: ", response); // Log the entire response
					if (response.status === "success" && Array.isArray(response.data)) {
						var sites = response.data;
						//siteSelect.innerHTML = ''; // Clear existing options if needed
						sites.forEach(function (site) {
							var option = document.createElement("option");
							option.value = site.site_id;
							option.text = site.site_name;
							siteSelect.add(option);
						});
					} else {
						console.error(
							"Response status is not 'success' or data is not an array."
						);
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

	// Handle Site selection to load corresponding wells
	siteSelect.onchange = function () {
		var selectedSiteId = siteSelect.value;
		if (!selectedSiteId) {
			console.log("No Site selected");
			return;
		}

		var wellSelect = document.getElementById("wellSelect");
		wellSelect.innerHTML = '<option value="">Select a site</option>'; // Reset site options

		var xhrWells = new XMLHttpRequest();
		xhrWells.open("GET", "get_wells.php?siteId=" + selectedSiteId, true);
		xhrWells.onload = function () {
			if (xhrWells.status === 200) {
				try {
					var responseText = xhrWells.responseText;
					// Optional: Check if response starts with '<' to identify HTML
					if (responseText.trim().startsWith("<")) {
						console.error("Unexpected HTML response: ", responseText);
						return;
					}

					var response = JSON.parse(responseText);
					console.log("Wells response: ", response); // Log the entire response
					if (response.status === "success" && Array.isArray(response.data)) {
						var wells = response.data;
						//wellSelect.innerHTML = ''; // Clear existing options if needed
						wells.forEach(function (well) {
							var option = document.createElement("option");
							option.value = well.well_id;
							option.text = well.well_name;
							wellSelect.add(option);
						});
					} else {
						console.error(
							"Response status is not 'success' or data is not an array."
						);
					}
				} catch (e) {
					console.error("Error parsing JSON response: ", e);
				}
			} else {
				console.error("Error loading sites: Status " + xhrWells.status);
			}
		};
		xhrWells.send();
	};

	wellboreForm.onsubmit = function (event) {
		event.preventDefault(); // Prevent default form submission
		var formData1 = new FormData(wellboreForm);
		var xhr = new XMLHttpRequest();
		xhr.open("POST", "process_add_wellbore.php", true); // Update to your processing PHP file
		xhr.onload = function () {
			if (xhr.status === 200) {
				alert(xhr.responseText);
			} else {
				alert("Error: " + xhr.responseText); // Include server response in the alert
			}
			modal.style.display = "none"; // Close the modal
		};
		xhr.onerror = function () {
			alert("Error: Failed to send the request. Please try again.");
			modal.style.display = "none"; // Close the modal
		};
		xhr.send(formData1);
	};
}

// Function to setup Well Form Submission
function setupWellFormSubmission() {
	console.log("setupWellFormSubmission called");
	var wellForm = document.getElementById("wellForm");
	if (!wellForm) {
		console.error("wellForm not found");
		return;
	}

	// Load country options for the dropdown
	var countrySelect = document.getElementById("countrySelect");
	loadDropdownOptions(
		"get_countries.php",
		countrySelect,
		"country_id",
		"country_name"
	);

	// Handle country selection to load corresponding fields
	countrySelect.onchange = function () {
		var selectedCountryId = countrySelect.value;
		if (!selectedCountryId) return;
		var fieldSelect = document.getElementById("fieldSelect");
		fieldSelect.innerHTML = '<option value="">Select a Field</option>';
		loadDropdownOptions(
			"get_fields.php?countryId=" + selectedCountryId,
			fieldSelect,
			"field_id",
			"field_name"
		);
	};

	// Handle Field selection to load corresponding sites
	document.getElementById("fieldSelect").onchange = function () {
		var selectedFieldId = this.value;
		if (!selectedFieldId) return;
		var siteSelect = document.getElementById("siteSelect");
		siteSelect.innerHTML = '<option value="">Select a Site</option>';
		loadDropdownOptions(
			"get_sites.php?fieldId=" + selectedFieldId,
			siteSelect,
			"site_id",
			"site_name"
		);
	};

	// Handle form submission
	wellForm.onsubmit = function (event) {
		event.preventDefault();
		submitForm(wellForm, "process_add_well.php");
	};
}

// Function to setup Site Form Submission
function setupSiteFormSubmission() {
	console.log("setupSiteFormSubmission called");
	var siteForm = document.getElementById("siteForm");
	if (!siteForm) {
		console.error("siteForm not found");
		return;
	}

	// Load country options for the dropdown
	var countrySelect = document.getElementById("countrySelect");
	loadDropdownOptions(
		"get_countries.php",
		countrySelect,
		"country_id",
		"country_name"
	);

	// Handle country selection to load corresponding fields
	countrySelect.onchange = function () {
		var selectedCountryId = countrySelect.value;
		if (!selectedCountryId) return;
		var fieldSelect = document.getElementById("fieldSelect");
		fieldSelect.innerHTML = '<option value="">Select a Field</option>';
		loadDropdownOptions(
			"get_fields.php?countryId=" + selectedCountryId,
			fieldSelect,
			"field_id",
			"field_name"
		);
	};

	// Handle Field selection to load corresponding sites
	document.getElementById("fieldSelect").onchange = function () {
		var selectedFieldId = this.value;
		if (!selectedFieldId) return;
		var siteSelect = document.getElementById("siteSelect");
		siteSelect.innerHTML = '<option value="">Select a Site</option>';
		loadDropdownOptions(
			"get_sites.php?fieldId=" + selectedFieldId,
			siteSelect,
			"site_id",
			"site_name"
		);
	};

	// Handle form submission
	siteForm.onsubmit = function (event) {
		event.preventDefault();
		submitForm(siteForm, "process_add_site.php");
	};
}

// Function to setup Form Submission for Country
function setupFormSubmission() {
	console.log("setupFormSubmission called");
	var countryForm = document.getElementById("countryForm");
	if (!countryForm) {
		console.error("countryForm not found");
		return;
	}

	// Handle form submission
	countryForm.onsubmit = function (event) {
		event.preventDefault();
		submitForm(countryForm, "process_add_country.php");
	};
}

// Function to setup Report Form Submission
function setupReportFormSubmission() {
	console.log("setupReportFormSubmission called");
	var reportForm = document.getElementById("reportForm");
	if (!reportForm) {
		console.error("reportForm not found");
		return;
	}

	// Load country options for the dropdown
	var countrySelect = document.getElementById("countrySelect");
	loadDropdownOptions(
		"get_countries.php",
		countrySelect,
		"country_id",
		"country_name"
	);

	// Handle country selection to load corresponding fields
	countrySelect.onchange = function () {
		var selectedCountryId = countrySelect.value;
		if (!selectedCountryId) return;
		var fieldSelect = document.getElementById("fieldSelect");
		fieldSelect.innerHTML = '<option value="">Select a Field</option>';
		loadDropdownOptions(
			"get_fields.php?countryId=" + selectedCountryId,
			fieldSelect,
			"field_id",
			"field_name"
		);
	};

	// Handle Field selection to load corresponding sites
	document.getElementById("fieldSelect").onchange = function () {
		var selectedFieldId = this.value;
		if (!selectedFieldId) return;
		var siteSelect = document.getElementById("siteSelect");
		siteSelect.innerHTML = '<option value="">Select a Site</option>';
		loadDropdownOptions(
			"get_sites.php?fieldId=" + selectedFieldId,
			siteSelect,
			"site_id",
			"site_name"
		);
	};

	// Handle Site selection to load corresponding wells
	document.getElementById("siteSelect").onchange = function () {
		var selectedSiteId = this.value;
		if (!selectedSiteId) return;
		var wellSelect = document.getElementById("wellSelect");
		wellSelect.innerHTML = '<option value="">Select a Well</option>';
		loadDropdownOptions(
			"get_wells.php?siteId=" + selectedSiteId,
			wellSelect,
			"well_id",
			"well_name"
		);
	};

	// Handle Well selection to load corresponding wellbores
	document.getElementById("wellSelect").onchange = function () {
		var selectedWellId = this.value;
		if (!selectedWellId) return;
		var wellboreSelect = document.getElementById("wellboreSelect");
		wellboreSelect.innerHTML = '<option value="">Select a Wellbore</option>';
		loadDropdownOptions(
			"get_wellbores.php?wellId=" + selectedWellId,
			wellboreSelect,
			"wellbore_id",
			"wellbore_name"
		);
	};

	// Handle form submission
	reportForm.onsubmit = function (event) {
		event.preventDefault();
		submitForm(reportForm, "process_add_report.php");
	};
}

// Function to load dropdown options
document.addEventListener("DOMContentLoaded", function () {
	// You need to make sure `selectedCountryId` is defined or passed correctly
	var selectedCountryId = window.selectedCountryId || null; // Or fetch it dynamically as needed
	setupFieldForm(selectedCountryId);
});

function setupFieldForm(selectedCountryId = null) {
	var fieldForm = document.getElementById("fieldForm");
	var countrySelect = document.getElementById("countrySelect");

	if (!fieldForm || !countrySelect) {
		console.error("Form or country select element not found.");
		return;
	}

	console.log("Selected Country ID:", selectedCountryId); // Debugging line

	// Load country options for the dropdown
	var xhr = new XMLHttpRequest();
	xhr.open("GET", "get_countries.php", true); // PHP script to fetch countries
	xhr.onload = function () {
		if (xhr.status === 200) {
			var countries = JSON.parse(xhr.responseText);
			console.log("Countries fetched:", countries); // Debugging line

			countrySelect.innerHTML = ""; // Clear existing options

			countries.forEach(function (country) {
				var option = document.createElement("option");
				option.value = country.country_id;
				option.text = country.country_name;
				countrySelect.add(option);

				// Pre-select the country if it matches the selectedCountryId
				if (selectedCountryId && country.country_id == selectedCountryId) {
					countrySelect.value = selectedCountryId;
				}
			});

			// Ensure the selected value is set after options are added
			if (selectedCountryId && countrySelect.value != selectedCountryId) {
				console.error("Failed to set selected country value.");
			}
		} else {
			console.error("Failed to load countries. Status:", xhr.status);
		}
	};
	xhr.onerror = function () {
		console.error("Error fetching countries.");
	};
	xhr.send();

	fieldForm.onsubmit = function (event) {
		event.preventDefault(); // Prevent default form submission

		var formData = new FormData(fieldForm);
		var xhr = new XMLHttpRequest();
		xhr.open("POST", "process_add_field.php", true); // PHP script to process field addition
		xhr.onload = function () {
			if (xhr.status === 200) {
				alert("Field added successfully!");
			} else {
				alert("Error: " + xhr.responseText);
			}
			// Close the modal or perform other actions
		};

		xhr.onerror = function () {
			alert("Error: Failed to send the request. Please try again.");
			// Close the modal or perform other actions
		};
		xhr.send(formData);
	};
}

// Function to submit forms
function submitForm(form, url) {
	var formData = new FormData(form);
	var xhr = new XMLHttpRequest();
	xhr.open("POST", url, true);
	xhr.onload = function () {
		if (xhr.status === 200) {
			alert(xhr.responseText);
		} else {
			alert("Error: " + xhr.responseText);
		}
		// Assuming 'modal' is defined elsewhere
		if (typeof modal !== "undefined") {
			modal.style.display = "none"; // Close the modal
		}
	};
	xhr.onerror = function () {
		alert("Error: Failed to send the request. Please try again.");
		if (typeof modal !== "undefined") {
			modal.style.display = "none"; // Close the modal
		}
	};
	xhr.send(formData);
}

function fetchCountries() {
	var xhrCountries = new XMLHttpRequest();
	xhrCountries.open("GET", "get_countries.php", true);
	xhrCountries.onload = function () {
		if (xhrCountries.status === 200) {
			console.log("Raw response text: ", xhrCountries.responseText); // Log raw response

			try {
				var response = JSON.parse(xhrCountries.responseText);
				console.log("Parsed response: ", response);

				if (response.status === "success" && Array.isArray(response.data)) {
					// Process countries
				} else {
					console.error("Unexpected response format or status: ", response);
				}
			} catch (e) {
				console.error("Error parsing JSON response: ", e);
				console.error("Response text: ", xhrCountries.responseText); // Log raw response
			}
		} else {
			console.error("Error loading countries: Status " + xhrCountries.status);
			console.error("Response text: ", xhrCountries.responseText); // Log raw response
		}
	};
	xhrCountries.send();
}

// End Process add report

// Function to close the modal
span.onclick = function () {
	modal.style.display = "none";
};

// Close modal if user clicks outside of it
window.onclick = function (event) {
	if (event.target == modal) {
		modal.style.display = "none";
	}
};

$(document).ready(function () {
	$(".breadcrumb a").click(function (e) {
		e.preventDefault(); // Prevent the default link behavior

		// Hide all sections
		$(".dashboard-section").hide();

		// Get the target section from the data-target attribute
		var target = $(this).data("target");

		// Show the selected section
		$("#" + target).show();
	});
});
