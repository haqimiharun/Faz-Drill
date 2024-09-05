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

// Close modal when clicking the close button
span.onclick = function () {
	modal.style.display = "none";
};

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
	openModal("add_NewReport.php", setupNewReportFormSubmission);
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
	console.log("Setting up Report Form Submission");

	// Retrieve data from sessionStorage
	const savedData = sessionStorage.getItem("selectedData");
	const selectedData = savedData ? JSON.parse(savedData) : null;
	const countryId = selectedData ? selectedData.country : null;
	const fieldId = selectedData ? selectedData.field : null;
	const siteId = selectedData ? selectedData.site : null;
	const wellId = selectedData ? selectedData.well : null;
	const wellboreId = selectedData ? selectedData.wellbore : null;

	var reportForm = document.getElementById("reportForm");
	if (!reportForm) {
		console.error("reportForm not found");
		return;
	}

	var countrySelect = document.getElementById("countrySelect");
	var fieldSelect = document.getElementById("fieldSelect");
	var siteSelect = document.getElementById("siteSelect");
	var wellSelect = document.getElementById("wellSelect");
	var wellboreSelect = document.getElementById("wellboreSelect");
	var countryIdHidden = document.getElementById("countryIdHidden");
	var fieldIdHidden = document.getElementById("fieldIdHidden");
	var siteIdHidden = document.getElementById("siteIdHidden");
	var wellIdHidden = document.getElementById("wellIdHidden");
	var wellboreIdHidden = document.getElementById("wellboreIdHidden");

	if (
		!countrySelect ||
		!fieldSelect ||
		!siteSelect ||
		!wellSelect ||
		!wellboreSelect ||
		!countryIdHidden ||
		!fieldIdHidden ||
		!siteIdHidden ||
		!wellIdHidden ||
		!wellboreIdHidden
	) {
		console.error("One or more form elements not found");
		return;
	}

	// Fetch country name and set up the country select element
	if (countryId) {
		fetch(`get_countries.php?id=${countryId}`)
			.then((response) => response.json())
			.then((data) => {
				var option = document.createElement("option");

				if (data && data.name) {
					option.value = countryId;
					option.text = data.name; // Set the country name here
					option.selected = true;
					countrySelect.appendChild(option);

					// Set the hidden input value
					countryIdHidden.value = countryId;

					// Disable the country select to prevent changes
					countrySelect.disabled = true;
				} else {
					console.error("Country name not found for ID:", countryId);
				}
			})
			.catch((error) => console.error("Error fetching country name:", error));
	} else {
		// If no country is chosen, set default text
		var option = document.createElement("option");
		option.text = "Choose or Create a Country First";
		option.disabled = true;
		option.selected = true;
		countrySelect.appendChild(option);
	}

	// Fetch field name based on fieldId and set up the field select element
	if (fieldId) {
		fetch(`get_fields.php?id=${fieldId}`)
			.then((response) => response.json())
			.then((data) => {
				var option = document.createElement("option");

				if (data && data.field_name) {
					option.value = fieldId;
					option.text = data.field_name; // Set the field name here
					option.selected = true;
					fieldSelect.appendChild(option);

					// Set the hidden input value
					fieldIdHidden.value = fieldId;

					// Disable the field select to prevent changes
					fieldSelect.disabled = true;
				} else {
					console.error("Field name not found for ID:", fieldId);
				}
			})
			.catch((error) => console.error("Error fetching field name:", error));
	} else {
		// If no field is chosen, set default text
		var option = document.createElement("option");
		option.text = "Choose or Create a Field First";
		option.disabled = true;
		option.selected = true;
		fieldSelect.appendChild(option);
	}

	// Fetch site name based on siteId and set up the site select element
	if (siteId) {
		fetch(`get_sites.php?id=${siteId}`)
			.then((response) => response.json())
			.then((data) => {
				var option = document.createElement("option");

				if (data && data.site_name) {
					option.value = siteId;
					option.text = data.site_name; // Set the site name here
					option.selected = true;
					siteSelect.appendChild(option);

					// Set the hidden input value
					siteIdHidden.value = siteId;

					// Disable the site select to prevent changes
					siteSelect.disabled = true;
				} else {
					console.error("Site name not found for ID:", siteId);
				}
			})
			.catch((error) => console.error("Error fetching site name:", error));
	} else {
		// If no site is chosen, set default text
		var option = document.createElement("option");
		option.text = "Choose or Create a Site First";
		option.disabled = true;
		option.selected = true;
		siteSelect.appendChild(option);
	}

	// Fetch well name based on wellId and set up the well select element
	if (wellId) {
		fetch(`get_wells.php?id=${wellId}`)
			.then((response) => response.json())
			.then((data) => {
				var option = document.createElement("option");

				if (data && data.well_name) {
					option.value = wellId;
					option.text = data.well_name; // Set the well name here
					option.selected = true;
					wellSelect.appendChild(option);

					// Set the hidden input value
					wellIdHidden.value = wellId;

					// Disable the well select to prevent changes
					wellSelect.disabled = true;
				} else {
					console.error("Well name not found for ID:", wellId);
				}
			})
			.catch((error) => console.error("Error fetching well name:", error));
	} else {
		// If no well is chosen, set default text
		var option = document.createElement("option");
		option.text = "Choose or Create a Well First";
		option.disabled = true;
		option.selected = true;
		wellSelect.appendChild(option);
	}

	// Fetch wellbore name based on wellboreId and set up the wellbore select element
	if (wellboreId) {
		fetch(`get_wellbores.php?id=${wellboreId}`)
			.then((response) => response.json())
			.then((data) => {
				var option = document.createElement("option");

				if (data && data.wellbore_name) {
					option.value = wellboreId;
					option.text = data.wellbore_name; // Set the wellbore name here
					option.selected = true;
					wellboreSelect.appendChild(option);

					// Set the hidden input value
					wellboreIdHidden.value = wellboreId;

					// Disable the wellbore select to prevent changes
					wellboreSelect.disabled = true;
				} else {
					console.error("Wellbore name not found for ID:", wellboreId);
				}
			})
			.catch((error) => console.error("Error fetching wellbore name:", error));
	} else {
		// If no wellbore is chosen, set default text
		var option = document.createElement("option");
		option.text = "Choose or Create a Wellbore First";
		option.disabled = true;
		option.selected = true;
		wellboreSelect.appendChild(option);
	}

	reportForm.onsubmit = function (event) {
		event.preventDefault();
		submitForm(reportForm, "process_add_report.php");
	};
}

// Function to setup Wellbore Form Submission
function setupWellboreFormSubmission() {
	console.log("Setting up Wellbore Form Submission");

	// Retrieve data from sessionStorage
	const savedData = sessionStorage.getItem("selectedData");
	const selectedData = savedData ? JSON.parse(savedData) : null;
	const countryId = selectedData ? selectedData.country : null;
	const fieldId = selectedData ? selectedData.field : null;
	const siteId = selectedData ? selectedData.site : null;
	const wellId = selectedData ? selectedData.well : null;

	var wellboreForm = document.getElementById("wellboreForm");
	if (!wellboreForm) {
		console.error("wellboreForm not found");
		return;
	}

	var countrySelect = document.getElementById("countrySelect");
	var fieldSelect = document.getElementById("fieldSelect");
	var siteSelect = document.getElementById("siteSelect");
	var wellSelect = document.getElementById("wellSelect");
	var countryIdHidden = document.getElementById("countryIdHidden");
	var fieldIdHidden = document.getElementById("fieldIdHidden");
	var siteIdHidden = document.getElementById("siteIdHidden");
	var wellIdHidden = document.getElementById("wellIdHidden");

	if (
		!countrySelect ||
		!fieldSelect ||
		!siteSelect ||
		!wellSelect ||
		!countryIdHidden ||
		!fieldIdHidden ||
		!siteIdHidden ||
		!wellIdHidden
	) {
		console.error("One or more form elements not found");
		return;
	}

	// Fetch country name and set up the country select element
	if (countryId) {
		fetch(`get_countries.php?id=${countryId}`)
			.then((response) => response.json())
			.then((data) => {
				var option = document.createElement("option");

				if (data && data.name) {
					option.value = countryId;
					option.text = data.name; // Set the country name here
					option.selected = true;
					countrySelect.appendChild(option);

					// Set the hidden input value
					countryIdHidden.value = countryId;

					// Disable the country select to prevent changes
					countrySelect.disabled = true;
				} else {
					console.error("Country name not found for ID:", countryId);
				}
			})
			.catch((error) => console.error("Error fetching country name:", error));
	} else {
		// If no country is chosen, set default text
		var option = document.createElement("option");
		option.text = "Choose or Create a Country First";
		option.disabled = true;
		option.selected = true;
		countrySelect.appendChild(option);
	}

	// Fetch field name based on fieldId and set up the field select element
	if (fieldId) {
		fetch(`get_fields.php?id=${fieldId}`)
			.then((response) => response.json())
			.then((data) => {
				var option = document.createElement("option");

				if (data && data.field_name) {
					option.value = fieldId;
					option.text = data.field_name; // Set the field name here
					option.selected = true;
					fieldSelect.appendChild(option);

					// Set the hidden input value
					fieldIdHidden.value = fieldId;

					// Disable the field select to prevent changes
					fieldSelect.disabled = true;
				} else {
					console.error("Field name not found for ID:", fieldId);
				}
			})
			.catch((error) => console.error("Error fetching field name:", error));
	} else {
		// If no field is chosen, set default text
		var option = document.createElement("option");
		option.text = "Choose or Create a Field First";
		option.disabled = true;
		option.selected = true;
		fieldSelect.appendChild(option);
	}

	// Fetch site name based on siteId and set up the site select element
	if (siteId) {
		fetch(`get_sites.php?id=${siteId}`)
			.then((response) => response.json())
			.then((data) => {
				var option = document.createElement("option");

				if (data && data.site_name) {
					option.value = siteId;
					option.text = data.site_name; // Set the site name here
					option.selected = true;
					siteSelect.appendChild(option);

					// Set the hidden input value
					siteIdHidden.value = siteId;

					// Disable the site select to prevent changes
					siteSelect.disabled = true;
				} else {
					console.error("Site name not found for ID:", siteId);
				}
			})
			.catch((error) => console.error("Error fetching site name:", error));
	} else {
		// If no site is chosen, set default text
		var option = document.createElement("option");
		option.text = "Choose or Create a Site First";
		option.disabled = true;
		option.selected = true;
		siteSelect.appendChild(option);
	}

	// Fetch well name based on wellId and set up the well select element
	if (wellId) {
		fetch(`get_wells.php?id=${wellId}`)
			.then((response) => response.json())
			.then((data) => {
				var option = document.createElement("option");

				if (data && data.well_name) {
					option.value = wellId;
					option.text = data.well_name; // Set the well name here
					option.selected = true;
					wellSelect.appendChild(option);

					// Set the hidden input value
					wellIdHidden.value = wellId;

					// Disable the well select to prevent changes
					wellSelect.disabled = true;
				} else {
					console.error("Well name not found for ID:", wellId);
				}
			})
			.catch((error) => console.error("Error fetching well name:", error));
	} else {
		// If no well is chosen, set default text
		var option = document.createElement("option");
		option.text = "Choose or Create a Well First";
		option.disabled = true;
		option.selected = true;
		wellSelect.appendChild(option);
	}

	wellboreForm.onsubmit = function (event) {
		event.preventDefault();
		submitForm(wellboreForm, "process_add_wellbore.php");
	};
}

// Function to setup Well Form Submission
function setupWellFormSubmission() {
	console.log("Setting up Well Form Submission");

	// Retrieve data from sessionStorage
	const savedData = sessionStorage.getItem("selectedData");
	const selectedData = savedData ? JSON.parse(savedData) : null;
	const countryId = selectedData ? selectedData.country : null;
	const fieldId = selectedData ? selectedData.field : null;
	const siteId = selectedData ? selectedData.site : null;

	var wellForm = document.getElementById("wellForm");
	if (!wellForm) {
		console.error("wellForm not found");
		return;
	}

	var countrySelect = document.getElementById("countrySelect");
	var fieldSelect = document.getElementById("fieldSelect");
	var siteSelect = document.getElementById("siteSelect");
	var countryIdHidden = document.getElementById("countryIdHidden");
	var fieldIdHidden = document.getElementById("fieldIdHidden");
	var siteIdHidden = document.getElementById("siteIdHidden");

	if (
		!countrySelect ||
		!fieldSelect ||
		!siteSelect ||
		!countryIdHidden ||
		!fieldIdHidden ||
		!siteIdHidden
	) {
		console.error("One or more form elements not found");
		return;
	}
	// Fetch country name and set up the country select element
	if (countryId) {
		fetch(`get_countries.php?id=${countryId}`)
			.then((response) => response.json())
			.then((data) => {
				var option = document.createElement("option");

				if (data && data.name) {
					option.value = countryId;
					option.text = data.name; // Set the country name here
					option.selected = true;
					countrySelect.appendChild(option);

					// Set the hidden input value
					countryIdHidden.value = countryId;

					// Disable the country select to prevent changes
					countrySelect.disabled = true;
				} else {
					console.error("Country name not found for ID:", countryId);
				}
			})
			.catch((error) => console.error("Error fetching country name:", error));
	} else {
		// If no country is chosen, set default text
		var option = document.createElement("option");
		option.text = "Choose or Create a Country First";
		option.disabled = true;
		option.selected = true;
		countrySelect.appendChild(option);
	}

	// Fetch field name based on fieldId and set up the field select element
	if (fieldId) {
		fetch(`get_fields.php?id=${fieldId}`)
			.then((response) => response.json())
			.then((data) => {
				var option = document.createElement("option");

				if (data && data.field_name) {
					option.value = fieldId;
					option.text = data.field_name; // Set the field name here
					option.selected = true;
					fieldSelect.appendChild(option);

					// Set the hidden input value
					fieldIdHidden.value = fieldId;

					// Disable the field select to prevent changes
					fieldSelect.disabled = true;
				} else {
					console.error("Field name not found for ID:", fieldId);
				}
			})
			.catch((error) => console.error("Error fetching field name:", error));
	} else {
		// If no field is chosen, set default text
		var option = document.createElement("option");
		option.text = "Choose or Create a Field First";
		option.disabled = true;
		option.selected = true;
		fieldSelect.appendChild(option);
	}

	// Fetch site name based on siteId and set up the site select element
	if (siteId) {
		fetch(`get_sites.php?id=${siteId}`)
			.then((response) => response.json())
			.then((data) => {
				var option = document.createElement("option");

				if (data && data.site_name) {
					option.value = siteId;
					option.text = data.site_name; // Set the site name here
					option.selected = true;
					siteSelect.appendChild(option);

					// Set the hidden input value
					siteIdHidden.value = siteId;

					// Disable the site select to prevent changes
					siteSelect.disabled = true;
				} else {
					console.error("Site name not found for ID:", siteId);
				}
			})
			.catch((error) => console.error("Error fetching site name:", error));
	} else {
		// If no site is chosen, set default text
		var option = document.createElement("option");
		option.text = "Choose or Create a Site First";
		option.disabled = true;
		option.selected = true;
		siteSelect.appendChild(option);
	}

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

	var siteForm = document.getElementById("siteForm");
	if (!siteForm) {
		console.error("siteForm not found");
		return;
	}

	var countrySelect = document.getElementById("countrySelect");
	var fieldSelect = document.getElementById("fieldSelect");
	var countryIdHidden = document.getElementById("countryIdHidden");
	var fieldIdHidden = document.getElementById("fieldIdHidden");

	if (!countrySelect || !fieldSelect || !countryIdHidden || !fieldIdHidden) {
		console.error("One or more form elements not found");
		return;
	}

	// Fetch country name and set up the country select element
	if (countryId) {
		fetch(`get_countries.php?id=${countryId}`)
			.then((response) => response.json())
			.then((data) => {
				var option = document.createElement("option");

				if (data && data.name) {
					option.value = countryId;
					option.text = data.name; // Set the country name here
					option.selected = true;
					countrySelect.appendChild(option);

					// Set the hidden input value
					countryIdHidden.value = countryId;

					// Disable the country select to prevent changes
					countrySelect.disabled = true;
				} else {
					console.error("Country name not found for ID:", countryId);
				}
			})
			.catch((error) => console.error("Error fetching country name:", error));
	} else {
		// If no country is chosen, set default text
		var option = document.createElement("option");
		option.text = "Choose or Create a Country First";
		option.disabled = true;
		option.selected = true;
		countrySelect.appendChild(option);
	}

	// Fetch field name based on fieldId and set up the field select element
	if (fieldId) {
		fetch(`get_fields.php?id=${fieldId}`)
			.then((response) => response.json())
			.then((data) => {
				var option = document.createElement("option");

				if (data && data.field_name) {
					option.value = fieldId;
					option.text = data.field_name; // Set the field name here
					option.selected = true;
					fieldSelect.appendChild(option);

					// Set the hidden input value
					fieldIdHidden.value = fieldId;

					// Disable the field select to prevent changes
					fieldSelect.disabled = true;
				} else {
					console.error("Field name not found for ID:", fieldId);
				}
			})
			.catch((error) => console.error("Error fetching field name:", error));
	} else {
		// If no field is chosen, set default text
		var option = document.createElement("option");
		option.text = "Choose or Create a Field First";
		option.disabled = true;
		option.selected = true;
		fieldSelect.appendChild(option);
	}

	siteForm.onsubmit = function (event) {
		event.preventDefault();
		submitForm(siteForm, "process_add_site.php");
	};
}

// Function to setup Field Form Submission
function setupFieldFormSubmission() {
	// Retrieve data from sessionStorage
	const savedData = sessionStorage.getItem("selectedData");

	// Parse the JSON string back to an object
	const selectedData = savedData ? JSON.parse(savedData) : null;

	// Extract the country data
	const countryId = selectedData ? selectedData.country : null;

	var fieldForm = document.getElementById("fieldForm");
	if (!fieldForm) {
		console.error("fieldForm not found");
		return;
	}

	var countrySelect = document.getElementById("countrySelect");
	var countryIdHidden = document.getElementById("countryIdHidden");
	if (!countrySelect || !countryIdHidden) {
		console.error("countrySelect or countryIdHidden not found");
		return;
	}

	// Fetch country name and set up the country select element
	if (countryId) {
		fetch(`get_countries.php?id=${countryId}`)
			.then((response) => response.json())
			.then((data) => {
				var option = document.createElement("option");

				if (data && data.name) {
					option.value = countryId;
					option.text = data.name; // Set the country name here
					option.selected = true;
					countrySelect.appendChild(option);

					// Set the hidden input value
					countryIdHidden.value = countryId;

					// Disable the country select to prevent changes
					countrySelect.disabled = true;
				} else {
					console.error("Country name not found for ID:", countryId);
				}
			})
			.catch((error) => console.error("Error fetching country name:", error));
	} else {
		// If no country is chosen, set default text
		var option = document.createElement("option");
		option.text = "Choose or Create a Country First";
		option.disabled = true;
		option.selected = true;
		countrySelect.appendChild(option);
	}

	// Save selected country to sessionStorage on change
	countrySelect.addEventListener("change", function () {
		sessionStorage.setItem("selectedCountryId", this.value);
		countryIdHidden.value = this.value;
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
