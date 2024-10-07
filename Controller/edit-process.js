// Get elements
var editReportBtn = document.getElementById("updateReport");
var editWellboreBtn = document.getElementById("updateWellbore");
var editWellBtn = document.getElementById("updateWell");
var editSiteBtn = document.getElementById("updateSite");
var editFieldBtn = document.getElementById("updateField");
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

// Modal trigger functions
editReportBtn.onclick = () => openModal("View/add_report.php", editReport);
editWellboreBtn.onclick = () =>
	openModal("View/add_wellbore.php", editWellbore);
editWellBtn.onclick = () => openModal("View/add_well.php", editWell);
editSiteBtn.onclick = () => openModal("View/add_site.php", editSite);
editFieldBtn.onclick = () => openModal("View/edit_field.php", editField);

// Edit field form logic
function editField() {
	const savedData = sessionStorage.getItem("selectedData");
	const selectedData = savedData ? JSON.parse(savedData) : null;

	const countryId = selectedData ? selectedData.country : null;
	const fieldId = selectedData ? selectedData.field : null;

	const editFieldForm = document.getElementById("editFieldForm");
	if (!editFieldForm) {
		console.error("editFieldForm not found");
		return;
	}

	const countrySelect = document.getElementById("countrySelect");
	const fieldNameInput = document.getElementById("fieldName");

	if (!countrySelect || !fieldNameInput) {
		console.error("One or more form elements not found");
		return;
	}

	if (countryId) {
		fetch(`Model/get_countries.php?id=${countryId}`)
			.then((response) => response.json())
			.then((data) => {
				if (data && data.name) {
					const option = new Option(data.name, countryId, true);
					countrySelect.add(option);
					countrySelect.value = countryId;
					countrySelect.disabled = true; // Disable selection
				} else {
					console.error("Country name not found for ID:", countryId);
				}
			})
			.catch((error) => console.error("Error fetching country name:", error));
	} else {
		const option = new Option(
			"Choose or Create a Country First",
			"",
			true,
			true
		);
		option.disabled = true;
		countrySelect.add(option);
	}

	if (fieldId) {
		fetch(`Model/get_fields.php?id=${fieldId}`)
			.then((response) => response.json())
			.then((fieldData) => {
				if (fieldData && fieldData.field_name) {
					fieldNameInput.value = fieldData.field_name; // Pre-fill field name
				} else {
					console.error("Field data not found for ID:", fieldId);
				}
			})
			.catch((error) => console.error("Error fetching field data:", error));
	}
	editFieldForm.onsubmit = function (event) {
		event.preventDefault();
		submitForm(editFieldForm, "Model/process_edit_field.php");
	};
}

// Submit form data
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
