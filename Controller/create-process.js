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
	fetchData(`Model/get_fields.php?countryId=${countryId}`, callback);
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

// Function to dynamically load a JavaScript file
function loadScript(src, callback) {
	let script = document.createElement("script");
	script.src = src;
	script.async = true;

	script.onload = function () {
		console.log(`${src} loaded successfully.`);
		if (callback) callback();
	};

	script.onerror = function () {
		console.error(`Error loading script: ${src}`);
	};

	document.head.appendChild(script);
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
	openModal(
		"View/addPopupModal/add_NewReport.php",
		setupNewReportFormSubmission
	);
};

// Function to open modal and load Report form
addReportBtn.onclick = function () {
	openModal("View/addPopupModal/add_report.php", setupReportFormSubmission);
};

// Function to open modal and load Wellbore form
addWellboreBtn.onclick = function () {
	openModal("View/addPopupModal/add_wellbore.php", setupWellboreFormSubmission);
};

// Function to open modal and load Well form
addWellBtn.onclick = function () {
	openModal("View/addPopupModal/add_well.php", setupWellFormSubmission);
};

// Function to open modal and load Site form
addSiteBtn.onclick = function () {
	openModal("View/addPopupModal/add_site.php", setupSiteFormSubmission);
};

// Function to open modal and load Field form
addFieldBtn.onclick = function () {
	openModal("View/addPopupModal/add_field.php", setupFieldFormSubmission);
};

// Function to open modal and load Country form
addCountryBtn.onclick = function () {
	openModal("View/addPopupModal/add_country.php", setupCountryFormSubmission);
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
		fetch(`Model/get_countries.php?id=${countryId}`)
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
		fetch(`Model/get_fields.php?id=${fieldId}`)
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
		fetch(`Model/get_sites.php?id=${siteId}`)
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
		fetch(`Model/get_wells.php?id=${wellId}`)
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
		fetch(`Model/get_wellbores.php?id=${wellboreId}`)
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
		submitForm(reportForm, "Model/process_add_report.php");
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
		fetch(`Model/get_countries.php?id=${countryId}`)
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
		fetch(`Model/get_fields.php?id=${fieldId}`)
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
		fetch(`Model/get_sites.php?id=${siteId}`)
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
		fetch(`Model/get_wells.php?id=${wellId}`)
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
		submitForm(wellboreForm, "Model/process_add_wellbore.php");
	};
}

// Function to setup Well Form Submission
function setupWellFormSubmission() {
	console.log("Setting up Well Form Submission");

	// Load any necessary scripts after content is loaded
	loadScript(
		"Controller/reportProfileSetup/reportProfileSetupWell.js",
		function () {
			console.log("Script loaded and executed.");
			if (typeof setupFunction === "function") {
				setupFunction();
			}
		}
	);

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
		fetch(`Model/get_countries.php?id=${countryId}`)
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
		fetch(`Model/get_fields.php?id=${fieldId}`)
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
		fetch(`Model/get_sites.php?id=${siteId}`)
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
		submitForm(wellForm, "Model/process_add_well.php");
	};
}

// Function to setup Site Form Submission
function setupSiteFormSubmission() {
	console.log("Setting up Site Form Submission");
	// Load any necessary scripts after content is loaded
	loadScript(
		"Controller/reportProfileSetup/reportProfileSetupSite.js",
		function () {
			console.log("Script loaded and executed.");
			if (typeof setupFunction === "function") {
				setupFunction();
			}
		}
	);
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
		fetch(`Model/get_countries.php?id=${countryId}`)
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
		fetch(`Model/get_fields.php?id=${fieldId}`)
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
		submitForm(siteForm, "Model/process_add_site.php");
	};
}

// Function to setup Field Form Submission
function setupFieldFormSubmission() {
	// Load any necessary scripts after content is loaded
	loadScript(
		"Controller/reportProfileSetup/reportProfileSetupField.js",
		function () {
			console.log("Script loaded and executed.");
			if (typeof setupFunction === "function") {
				setupFunction();
			}
		}
	);

	const savedData = sessionStorage.getItem("selectedData");
	const selectedData = savedData ? JSON.parse(savedData) : null;
	const countryId = selectedData ? selectedData.country : null;
	const regionId = selectedData ? selectedData.region : null;
	const blockId = selectedData ? selectedData.block : null;

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
		fetch(`Model/get_countries.php?id=${countryId}`)
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

					// Fetch regions based on the selected country
					fetchRegions(
						regionId,
						countryId,
						document.getElementById("fieldRegionName")
					);
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

	// Region and Block Select Elements
	var regionSelect = document.getElementById("fieldRegionName");
	var blockSelect = document.getElementById("fieldBlockName");

	if (!regionSelect || !blockSelect) {
		console.error("regionSelect or blockSelect not found");
		return;
	}

	// Set up event listener for region change
	regionSelect.addEventListener("change", function () {
		var selectedRegionId = this.value;

		// Fetch block data based on selected region
		fetchBlocks(selectedRegionId, blockSelect);

		// Save selected region to sessionStorage
		sessionStorage.setItem("selectedRegionId", selectedRegionId);
	});

	// Restore selected region and block
	if (regionId) {
		regionSelect.value = regionId; // Set selected region
		fetchBlocks(regionId, blockSelect, blockId); // Fetch blocks for the region and set blockId
	}

	// Save selected block to sessionStorage on change
	blockSelect.addEventListener("change", function () {
		sessionStorage.setItem("selectedBlockId", this.value);
	});

	// Form Submission
	fieldForm.onsubmit = function (event) {
		event.preventDefault();

		// Ensure both region and block are selected before submission
		if (!regionSelect.value || !blockSelect.value) {
			alert("Please select both a region and block.");
			return;
		}

		submitForm(fieldForm, "Model/process_add_field.php");
	};

	// Function to fetch and populate regions based on country ID
	function fetchRegions(selectedRegionId, countryId, regionSelect) {
		fetch(`Model/get_regions.php?country_id=${countryId}`)
			.then((response) => response.json())
			.then((data) => {
				if (data && data.regions) {
					regionSelect.innerHTML = ""; // Clear previous options

					// Add an initial option
					var initialOption = document.createElement("option");
					initialOption.value = ""; // No value for the initial option
					initialOption.text = "Select a Region"; // Text displayed for the initial option
					initialOption.disabled = true; // Disable this option to prevent selection
					initialOption.selected = true; // Set this option as selected
					regionSelect.appendChild(initialOption); // Append it to the select

					// Populate regions
					data.regions.forEach((region) => {
						var option = document.createElement("option");
						option.value = region.lib_region_id;
						option.text = `${region.lib_region_name} (${region.lib_region_code})`;
						option.selected = region.lib_region_id == selectedRegionId;
						regionSelect.appendChild(option);
					});

					// If a region is selected, fetch its blocks
					if (selectedRegionId) {
						fetchBlocks(selectedRegionId, blockSelect); // Fetch blocks for the selected region
					}
				} else {
					console.error("No region data found.");
				}
			})
			.catch((error) => console.error("Error fetching regions:", error));
	}

	// Function to fetch and populate blocks based on region
	function fetchBlocks(regionId, blockSelect, selectedBlockId = null) {
		fetch(`Model/get_blocks.php?lib_region_id=${regionId}`)
			.then((response) => response.json())
			.then((data) => {
				if (data && data.blocks) {
					blockSelect.innerHTML = ""; // Clear previous options
					data.blocks.forEach((block) => {
						const option = document.createElement("option");
						option.value = block.lib_block_id; // Use lib_block_id from the response
						option.text = block.lib_block_name; // Use lib_block_name from the response
						option.selected = block.lib_block_id == selectedBlockId; // Compare with selectedBlockId
						blockSelect.appendChild(option);
					});
					blockSelect.disabled = false; // Enable block select after loading options
				} else {
					console.error("No block data found for region:", regionId);
				}
			})
			.catch((error) => console.error("Error fetching blocks:", error));
	}
}

// Function to setup Country Form Submission
function setupCountryFormSubmission() {
	// Load any necessary scripts after content is loaded
	loadScript(
		"Controller/reportProfileSetup/reportProfileSetupCountry.js",
		function () {
			console.log("Script loaded and executed.");
			if (typeof setupFunction === "function") {
				setupFunction();
			}
		}
	);

	var countryForm = document.getElementById("countryForm");
	if (!countryForm) {
		console.error("countryForm not found");
		return;
	}

	countryForm.onsubmit = function (event) {
		event.preventDefault();
		submitForm(countryForm, "Modal/process_add_country.php");
	};
}

function submitForm(form, url) {
	var formData = new FormData(form);

	// Create an object to store form data for logging
	var formDataObject = {};
	formData.forEach((value, key) => {
		formDataObject[key] = value;
	});

	// Log form data to console
	console.log("Submitting form with data:", formDataObject);

	var xhr = new XMLHttpRequest();
	xhr.open("POST", url, true);
	xhr.onreadystatechange = function () {
		if (xhr.readyState === 4 && xhr.status === 200) {
			console.log("Form submitted successfully");
			console.log("Server response:", xhr.responseText);
			modal.style.display = "none"; // Close the modal
		} else if (xhr.readyState === 4) {
			console.error("Error submitting form: " + xhr.status);
		}
	};
	xhr.send(formData);
}
