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
function setupNewReportFormSubmission() {
	console.log("Setting up New Report Form Submission");

	var reportForm = document.getElementById("reportForm");

	var countrySelect = document.getElementById("countrySelect");
	var fieldSelect = document.getElementById("fieldSelect");
	var siteSelect = document.getElementById("siteSelect");
	var wellSelect = document.getElementById("wellSelect");
	var wellboreSelect = document.getElementById("wellboreSelect");
	var newCountryDropdown = document.getElementById("newCountryDropdown");
	var newCountrySelect = document.getElementById("newCountrySelect");

	// Add placeholder options
	function addPlaceholder(selectElement, placeholderText) {
		selectElement.innerHTML = ""; // Clear previous options
		var placeholderOption = document.createElement("option");
		placeholderOption.value = "";
		placeholderOption.text = placeholderText;
		placeholderOption.disabled = true;
		placeholderOption.selected = true;
		selectElement.appendChild(placeholderOption);
	}

	// Fetch all countries and populate the country select element
	fetch("get_SelectedCountry.php")
		.then((response) => response.json())
		.then((data) => {
			if (data.error) {
				console.error(data.error);
			} else {
				data.forEach((country) => {
					var option = document.createElement("option");
					option.value = country.country_id;
					option.text = country.country_name;
					countrySelect.appendChild(option);
				});
				// Add "Add New Country" option
				var addNewCountryOption = document.createElement("option");
				addNewCountryOption.value = "addNewCountry";
				addNewCountryOption.text = "Add New Country";
				countrySelect.appendChild(addNewCountryOption);
			}
		})
		.catch((error) => console.error("Error fetching countries:", error));

	// Handle "Add New" option for Country
	countrySelect.addEventListener("change", function () {
		if (countrySelect.value === "addNewCountry") {
			// Show the new country dropdown
			newCountryDropdown.style.display = "block";
			// Fetch the list of countries to populate the new country dropdown
			fetch("get_AllCountries.php")
				.then((response) => response.json())
				.then((data) => {
					if (data.error) {
						console.error(data.error);
					} else {
						addPlaceholder(newCountrySelect, "Select a Country");
						data.forEach((country) => {
							var option = document.createElement("option");
							option.value = country.country_id;
							option.text = country.country_name;
							newCountrySelect.appendChild(option);
						});
					}
				})
				.catch((error) =>
					console.error("Error fetching all countries:", error)
				);
		} else {
			// Hide the new country dropdown if not adding a new country
			newCountryDropdown.style.display = "none";
		}

		// Fetch fields when a country is selected
		if (countrySelect.value !== "addNewCountry") {
			// fieldSelect.innerHTML = ""; // Clear previous options
			siteSelect.innerHTML = ""; // Clear site options
			wellSelect.innerHTML = ""; // Clear well options
			wellboreSelect.innerHTML = ""; // Clear wellbore options
			// addPlaceholder(fieldSelect, "Select a Field");
			addPlaceholder(siteSelect, "Select a Site");
			addPlaceholder(wellSelect, "Select a Well");
			addPlaceholder(wellboreSelect, "Select a Wellbore");

			fetch(`get_AllFields.php?countryId=${countrySelect.value}`)
				.then((response) => response.json())
				.then((data) => {
					if (data.status === "success" && data.data.length > 0) {
						data.data.forEach((field) => {
							var option = document.createElement("option");
							option.value = field.field_id; // Ensure to use the correct key for field ID
							option.text = field.field_name; // Ensure to use the correct key for field name
							fieldSelect.appendChild(option);
						});
						// Add "Add New Field" option
						var addNewFieldOption = document.createElement("option");
						addNewFieldOption.value = "addNewField";
						addNewFieldOption.text = "Add New Field";
						fieldSelect.appendChild(addNewFieldOption);
					} else {
						addPlaceholder(fieldSelect, "No fields available");
					}
				})
				.catch((error) => console.error("Error fetching fields:", error));
		}
	});

	// Handle "Add New" option for Field
	fieldSelect.addEventListener("change", function () {
		if (fieldSelect.value === "addNewField") {
			document.getElementById("newFieldDropdown").style.display = "block";
		} else {
			document.getElementById("newFieldDropdown").style.display = "none";
		}

		// Fetch sites when a field is selected
		if (fieldSelect.value !== "addNewField") {
			siteSelect.innerHTML = ""; // Clear previous options
			wellSelect.innerHTML = ""; // Clear well options
			wellboreSelect.innerHTML = ""; // Clear wellbore options
			addPlaceholder(siteSelect, "Select a Site");
			addPlaceholder(wellSelect, "Select a Well");
			addPlaceholder(wellboreSelect, "Select a Wellbore");

			fetch(`get_AllSites.php?fieldId=${fieldSelect.value}`)
				.then((response) => response.json())
				.then((data) => {
					if (data.status === "success" && data.data.length > 0) {
						data.data.forEach((site) => {
							var option = document.createElement("option");
							option.value = site.site_id; // Ensure to use the correct key for site ID
							option.text = site.site_name; // Ensure to use the correct key for site name
							siteSelect.appendChild(option);
						});
						// Add "Add New Site" option
						var addNewSiteOption = document.createElement("option");
						addNewSiteOption.value = "addNewSite";
						addNewSiteOption.text = "Add New Site";
						siteSelect.appendChild(addNewSiteOption);
					} else {
						addPlaceholder(siteSelect, "No sites available");
					}
				})
				.catch((error) => console.error("Error fetching sites:", error));
		}
	});

	// Handle "Add New" option for Site
	siteSelect.addEventListener("change", function () {
		if (siteSelect.value === "addNewSite") {
			document.getElementById("newSiteDropdown").style.display = "block";
		} else {
			document.getElementById("newSiteDropdown").style.display = "none";
		}

		// Fetch wells when a site is selected
		if (siteSelect.value !== "addNewSite") {
			wellSelect.innerHTML = ""; // Clear previous options
			wellboreSelect.innerHTML = ""; // Clear wellbore options
			addPlaceholder(wellSelect, "Select a Well");
			addPlaceholder(wellboreSelect, "Select a Wellbore");

			fetch(`get_AllWells.php?siteId=${siteSelect.value}`)
				.then((response) => response.json())
				.then((data) => {
					if (data.status === "success" && data.data.length > 0) {
						data.data.forEach((well) => {
							var option = document.createElement("option");
							option.value = well.well_id; // Ensure to use the correct key for well ID
							option.text = well.well_name; // Ensure to use the correct key for well name
							wellSelect.appendChild(option);
						});
						// Add "Add New Well" option
						var addNewWellOption = document.createElement("option");
						addNewWellOption.value = "addNewWell";
						addNewWellOption.text = "Add New Well";
						wellSelect.appendChild(addNewWellOption);
					} else {
						addPlaceholder(wellSelect, "No wells available");
					}
				})
				.catch((error) => console.error("Error fetching wells:", error));
		}
	});

	// Handle "Add New" option for Well
	wellSelect.addEventListener("change", function () {
		if (wellSelect.value === "addNewWell") {
			document.getElementById("newWellDropdown").style.display = "block";
		} else {
			document.getElementById("newWellDropdown").style.display = "none";
		}

		// Fetch wellbores when a well is selected
		if (wellSelect.value !== "addNewWell") {
			wellboreSelect.innerHTML = ""; // Clear previous options
			addPlaceholder(wellboreSelect, "Select a Wellbore");

			fetch(`get_AllWellbores.php?wellId=${wellSelect.value}`)
				.then((response) => response.json())
				.then((data) => {
					if (data.status === "success" && data.data.length > 0) {
						data.data.forEach((wellbore) => {
							var option = document.createElement("option");
							option.value = wellbore.wellbore_id; // Ensure to use the correct key for wellbore ID
							option.text = wellbore.wellbore_name; // Ensure to use the correct key for wellbore name
							wellboreSelect.appendChild(option);
						});
						// Add "Add New Wellbore" option
						var addNewWellboreOption = document.createElement("option");
						addNewWellboreOption.value = "addNewWellbore";
						addNewWellboreOption.text = "Add New Wellbore";
						wellboreSelect.appendChild(addNewWellboreOption);
					} else {
						addPlaceholder(wellboreSelect, "No wellbores available");
					}
				})
				.catch((error) => console.error("Error fetching wellbores:", error));
		}
	});

	// Handle "Add New" option for Wellbore
	wellboreSelect.addEventListener("change", function () {
		if (wellboreSelect.value === "addNewWellbore") {
			document.getElementById("newWellboreDropdown").style.display = "block";
		} else {
			document.getElementById("newWellboreDropdown").style.display = "none";
		}
	});

	// Handle form submission
	reportForm.onsubmit = function (event) {
		event.preventDefault();

		let formData = new FormData(reportForm);

		// Prepare data for submission
		let data = {
			countryId: formData.get("countryId"),
			fieldId: formData.get("fieldId"),
			siteId: formData.get("siteId"),
			wellId: formData.get("wellId"),
			wellboreId: formData.get("wellboreId"),
			reportName: formData.get("reportName"),
		};

		// Check if any "Add New" option was selected
		if (data.countryId === "addNewCountry") {
			data.countryId = formData.get("newCountryId");
		}
		if (data.fieldId === "addNewField") {
			data.newFieldName = formData.get("newFieldName");
		}
		if (data.siteId === "addNewSite") {
			data.newSiteName = formData.get("newSiteName");
		}
		if (data.wellId === "addNewWell") {
			data.newWellName = formData.get("newWellName");
		}
		if (data.wellboreId === "addNewWellbore") {
			data.newWellboreName = formData.get("newWellboreName");
		}

		// Log data to check
		console.log("Form Data:", data);

		// Send data to the server
		fetch("process_add_NewReport.php", {
			method: "POST",
			body: JSON.stringify(data),
			headers: {
				"Content-Type": "application/json",
			},
		})
			.then((response) => response.json())
			.then((result) => {
				console.log("Server Response:", result);
				// Handle the server response, e.g., show a success message
			})
			.catch((error) => console.error("Error:", error));
	};
}

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
				if (data && data.name) {
					var option = document.createElement("option");
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
	}

	// Fetch field name based on fieldId and set up the field select element
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

					// Set the hidden input value
					fieldIdHidden.value = fieldId;

					// Disable the field select to prevent changes
					fieldSelect.disabled = true;
				} else {
					console.error("Field name not found for ID:", fieldId);
				}
			})
			.catch((error) => console.error("Error fetching field name:", error));
	}

	// Fetch site name based on siteId and set up the site select element
	if (siteId) {
		fetch(`get_sites.php?id=${siteId}`)
			.then((response) => response.json())
			.then((data) => {
				if (data && data.site_name) {
					var option = document.createElement("option");
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
	}

	// Fetch well name based on wellId and set up the well select element
	if (wellId) {
		fetch(`get_wells.php?id=${wellId}`)
			.then((response) => response.json())
			.then((data) => {
				if (data && data.well_name) {
					var option = document.createElement("option");
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
	}

	// Fetch wellbore name based on wellboreId and set up the wellbore select element
	if (wellboreId) {
		fetch(`get_wellbores.php?id=${wellboreId}`)
			.then((response) => response.json())
			.then((data) => {
				if (data && data.wellbore_name) {
					var option = document.createElement("option");
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
				if (data && data.name) {
					var option = document.createElement("option");
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
	}

	// Fetch field name based on fieldId and set up the field select element
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

					// Set the hidden input value
					fieldIdHidden.value = fieldId;

					// Disable the field select to prevent changes
					fieldSelect.disabled = true;
				} else {
					console.error("Field name not found for ID:", fieldId);
				}
			})
			.catch((error) => console.error("Error fetching field name:", error));
	}

	// Fetch site name based on siteId and set up the site select element
	if (siteId) {
		fetch(`get_sites.php?id=${siteId}`)
			.then((response) => response.json())
			.then((data) => {
				if (data && data.site_name) {
					var option = document.createElement("option");
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
	}

	// Fetch well name based on wellId and set up the well select element
	if (wellId) {
		fetch(`get_wells.php?id=${wellId}`)
			.then((response) => response.json())
			.then((data) => {
				if (data && data.well_name) {
					var option = document.createElement("option");
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
				if (data && data.name) {
					var option = document.createElement("option");
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
	}

	// Fetch field name based on fieldId and set up the field select element
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

					// Set the hidden input value
					fieldIdHidden.value = fieldId;

					// Disable the field select to prevent changes
					fieldSelect.disabled = true;
				} else {
					console.error("Field name not found for ID:", fieldId);
				}
			})
			.catch((error) => console.error("Error fetching field name:", error));
	}

	// Fetch site name based on siteId and set up the site select element
	if (siteId) {
		fetch(`get_sites.php?id=${siteId}`)
			.then((response) => response.json())
			.then((data) => {
				if (data && data.site_name) {
					var option = document.createElement("option");
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
				if (data && data.name) {
					var option = document.createElement("option");
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
	}

	// Fetch field name based on fieldId and set up the field select element
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

					// Set the hidden input value
					fieldIdHidden.value = fieldId;

					// Disable the field select to prevent changes
					fieldSelect.disabled = true;
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

					// Set the hidden input value
					countryIdHidden.value = countryId;

					// Disable the country select to prevent changes
					countrySelect.disabled = true;
				} else {
					console.error("Country name not found for ID:", countryId);
				}
			})
			.catch((error) => console.error("Error fetching country name:", error));
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
