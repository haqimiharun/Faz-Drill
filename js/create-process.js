// Get elements
var addReportBtn = document.getElementById("addReport");
var addWellboreBtn = document.getElementById("addWellbore");
var addWellBtn = document.getElementById("addWell");
var addSiteBtn = document.getElementById("addSite");
var addFieldBtn = document.getElementById("addField");
var addCountryBtn = document.getElementById("addCountry");
var btn = document.getElementById("addNewReport");
var modal = document.getElementById("myModal");
var span = document.getElementsByClassName("close")[0];
var dynamicContent = document.getElementById("dynamic-content");
var loader = document.getElementById("loader");

// Close the modal when clicking outside of it
window.onclick = function (event) {
	if (event.target == modal) {
		modal.style.display = "none";
	}
};

// Function to fetch data from server
function fetchData(url, callback) {
	const xhr = new XMLHttpRequest();
	xhr.open("GET", url, true);
	xhr.onreadystatechange = function () {
		if (xhr.readyState === 4) {
			if (xhr.status === 200) {
				try {
					const data = JSON.parse(xhr.responseText);
					callback(data);
				} catch (e) {
					console.error("Failed to parse JSON:", e);
				}
			} else {
				console.error("Error fetching data:", xhr.status);
			}
		}
	};
	xhr.send();
}

// Fetch fields based on country ID
function fetchFields(countryId, callback) {
	fetchData(`get_fields.php?countryId=${countryId}`, callback);
}

// Fetch sites based on field ID
function fetchSites(fieldId, callback) {
	fetchData(`get_sites.php?fieldId=${fieldId}`, callback);
}

// Fetch wells based on site ID
function fetchWells(siteId, callback) {
	fetchData(`get_wells.php?siteId=${siteId}`, callback);
}

// Fetch wellbores based on well ID
function fetchWellbores(wellId, callback) {
	fetchData(`get_wellbores.php?wellId=${wellId}`, callback);
}

// Setup form with selected data
function setupFormWithSelectedData() {
	const selectedData = JSON.parse(sessionStorage.getItem("selectedData"));

	if (selectedData) {
		console.log("Selected data:", selectedData); // Debugging statement
		const countrySelect = document.getElementById("countrySelect");
		const fieldSelect = document.getElementById("fieldSelect");
		const siteSelect = document.getElementById("siteSelect");
		const wellSelect = document.getElementById("wellSelect");
		const wellboreSelect = document.getElementById("wellboreSelect");
		const reportSelect = document.getElementById("reportSelect");

		if (countrySelect) {
			countrySelect.value = selectedData.country || "";
			fetchFields(selectedData.country || "", (fields) => {
				populateDropdown(fieldSelect, fields);
				if (selectedData.field) {
					fieldSelect.value = selectedData.field;
					fetchSites(selectedData.field, (sites) => {
						populateDropdown(siteSelect, sites);
						if (selectedData.site) {
							siteSelect.value = selectedData.site;
							fetchWells(selectedData.site, (wells) => {
								populateDropdown(wellSelect, wells);
								if (selectedData.well) {
									wellSelect.value = selectedData.well;
									fetchWellbores(selectedData.well, (wellbores) => {
										populateDropdown(wellboreSelect, wellbores);
										if (selectedData.wellbore) {
											wellboreSelect.value = selectedData.wellbore;
										}
									});
								}
							});
						}
					});
				}
			});
		}

		if (reportSelect) {
			reportSelect.value = selectedData.report || "";
		}
	} else {
		console.error("No selected data found in sessionStorage");
	}
}

// Function to open modal and load form into it
function openModal(url, setupFunction) {
	modal.style.display = "block";
	loader.style.display = "block";
	dynamicContent.innerHTML = "";

	var xhr = new XMLHttpRequest();
	xhr.open("GET", url, true);
	xhr.onreadystatechange = function () {
		if (xhr.readyState === 4 && xhr.status === 200) {
			loader.style.display = "none";
			dynamicContent.innerHTML = xhr.responseText;
			console.log("Modal content loaded");

			// Ensure the modal content is loaded before calling setupFunction
			setTimeout(function () {
				if (typeof setupFunction === "function") {
					setupFunction();
				} else {
					console.error("setupFunction is not a valid function");
				}
			}, 500); // Increase delay if necessary
		} else if (xhr.readyState === 4) {
			console.error("Error at onreadystatechange: " + xhr.status);
		}
	};
	xhr.send();
}

// Function to open modal and load Report form
btn.onclick = function () {
	openModal("add_report.php", setupReportFormSubmission);
};

// Function to open modal and load Report form
addReportBtn.onclick = function () {
	openModal("add_report.php", setupReportFormSubmission);
};

// Function to open modal and load Wellbore form
addWellboreBtn.onclick = function () {
	openModal("add_wellbore.php", setupWellboreFormSubmission);
};

// Function to open modal and load Well form
addWellBtn.onclick = function () {
	openModal("add_well.php", setupWellFormSubmission);
};

// Function to open modal and load Site form
addSiteBtn.onclick = function () {
	openModal("add_site.php", setupSiteFormSubmission);
};

// Function to open modal and load Field form
addFieldBtn.onclick = function () {
	openModal("add_field.php", setupFieldFormSubmission);
};

// Function to open modal and load Country form
addCountryBtn.onclick = function () {
	openModal("add_country.php", setupCountryFormSubmission);
};

// Function to setup Report Form Submission
function setupReportFormSubmission() {
	var reportForm = document.getElementById("reportForm");
	if (!reportForm) {
		console.error("reportForm not found");
		return;
	}

	var countrySelect = document.getElementById("countrySelect");
	loadDropdownOptions(
		"get_countries.php",
		countrySelect,
		"country_id",
		"country_name"
	);

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

	reportForm.onsubmit = function (event) {
		event.preventDefault();
		submitForm(reportForm, "process_add_report.php");
	};
}

// Function to setup Wellbore Form Submission
function setupWellboreFormSubmission() {
	var wellboreForm = document.getElementById("wellboreForm");
	if (!wellboreForm) {
		console.error("wellboreForm not found");
		return;
	}

	var countrySelect = document.getElementById("countrySelect");
	loadDropdownOptions(
		"get_countries.php",
		countrySelect,
		"country_id",
		"country_name"
	);

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

	wellboreForm.onsubmit = function (event) {
		event.preventDefault();
		submitForm(wellboreForm, "process_add_wellbore.php");
	};
}

// Function to setup Well Form Submission
function setupWellFormSubmission() {
	var wellForm = document.getElementById("wellForm");
	if (!wellForm) {
		console.error("wellForm not found");
		return;
	}

	var countrySelect = document.getElementById("countrySelect");
	loadDropdownOptions(
		"get_countries.php",
		countrySelect,
		"country_id",
		"country_name"
	);

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

	wellForm.onsubmit = function (event) {
		event.preventDefault();
		submitForm(wellForm, "process_add_well.php");
	};
}

// Function to setup Site Form Submission
function setupSiteFormSubmission() {
	console.log("Setting up Site Form Submission");

	// Retrieve data from sessionStorage
	const savedData = sessionStorage.getItem("selectedData");
	const selectedData = savedData ? JSON.parse(savedData) : null;
	const countryId = selectedData ? selectedData.country : null;
	const fieldId = selectedData ? selectedData.field : null;

	console.log("Country ID:", countryId);
	console.log("Field ID:", fieldId);

	var siteForm = document.getElementById("siteForm");
	if (!siteForm) {
		console.error("siteForm not found");
		return;
	}

	var countrySelect = document.getElementById("countrySelect");
	var fieldSelect = document.getElementById("fieldSelect");

	if (!countrySelect) {
		console.error("countrySelect not found");
		return;
	}

	if (!fieldSelect) {
		console.error("fieldSelect not found");
		return;
	}

	// Fetch countries and set up the country select element
	if (countryId) {
		fetch(`get_countries.php?id=${countryId}`)
			.then((response) => response.json())
			.then((data) => {
				if (data && data.name) {
					var option = document.createElement("option");
					option.value = countryId;
					option.text = data.name; // Set the country name here
					option.selected = true;
					countrySelect.appendChild(option);
				} else {
					console.error("Country name not found for ID:", countryId);
				}
			})
			.catch((error) => console.error("Error fetching country name:", error));
	}

	// Fetch field name based on fieldId
	if (fieldId) {
		fetch(`get_fields.php?id=${fieldId}`)
			.then((response) => response.json())
			.then((data) => {
				if (data && data.field_name) {
					var option = document.createElement("option");
					option.value = fieldId;
					option.text = data.field_name; // Set the field name here
					option.selected = true;
					fieldSelect.appendChild(option);
				} else {
					console.error("Field name not found for ID:", fieldId);
				}
			})
			.catch((error) => console.error("Error fetching field name:", error));
	}

	siteForm.onsubmit = function (event) {
		event.preventDefault();
		submitForm(siteForm, "process_add_site.php");
	};
}

// Function to setup Field Form Submission
function setupFieldFormSubmission() {
	console.log("Setting up Field Form Submission");

	// Retrieve data from sessionStorage
	const savedData = sessionStorage.getItem("selectedData");

	// Parse the JSON string back to an object
	const selectedData = savedData ? JSON.parse(savedData) : null;

	// Extract the country data
	const countryId = selectedData ? selectedData.country : null;

	console.log("Country ID:", countryId);

	var fieldForm = document.getElementById("fieldForm");
	if (!fieldForm) {
		console.error("fieldForm not found");
		return;
	}

	var countrySelect = document.getElementById("countrySelect");
	if (!countrySelect) {
		console.error("countrySelect not found");
		return;
	}

	// Fetch the country name from the server
	if (countryId) {
		fetch(`get_countries.php?id=${countryId}`)
			.then((response) => response.json())
			.then((data) => {
				if (data && data.name) {
					var option = document.createElement("option");
					option.value = countryId;
					option.text = data.name; // Set the country name here
					option.selected = true;
					countrySelect.appendChild(option);
				} else {
					console.error("Country name not found for ID:", countryId);
				}
			})
			.catch((error) => console.error("Error fetching country name:", error));
	}

	// Save selected country to sessionStorage on change
	countrySelect.addEventListener("change", function () {
		sessionStorage.setItem("selectedCountryId", this.value);
	});

	fieldForm.onsubmit = function (event) {
		event.preventDefault();
		submitForm(fieldForm, "process_add_field.php");
	};
}

// Function to setup Country Form Submission
function setupCountryFormSubmission() {
	var countryForm = document.getElementById("countryForm");
	if (!countryForm) {
		console.error("countryForm not found");
		return;
	}

	countryForm.onsubmit = function (event) {
		event.preventDefault();
		submitForm(countryForm, "process_add_country.php");
	};
}

// Function to submit the form
function submitForm(form, url) {
	var formData = new FormData(form);

	var xhr = new XMLHttpRequest();
	xhr.open("POST", url, true);
	xhr.onreadystatechange = function () {
		if (xhr.readyState === 4 && xhr.status === 200) {
			console.log("Form submitted successfully");
			modal.style.display = "none"; // Close the modal
		} else if (xhr.readyState === 4) {
			console.error("Error submitting form: " + xhr.status);
		}
	};
	xhr.send(formData);
}

// Close modal when clicking the close button
span.onclick = function () {
	modal.style.display = "none";
};
