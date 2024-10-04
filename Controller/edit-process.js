// Get elements
const editReportBtn = document.getElementById("updateNewReport");
const editWellboreBtn = document.getElementById("updateWellbore");
const editWellBtn = document.getElementById("updateWell");
const editSiteBtn = document.getElementById("updateSite");
const editFieldBtn = document.getElementById("updateField");

// Close modal functionality
span.onclick = () => (modal.style.display = "none");
window.onclick = (event) =>
	event.target === modal && (modal.style.display = "none");

// Fetch data helper function
function fetchData(url, callback) {
	const xhr = new XMLHttpRequest();
	xhr.open("GET", url, true);
	xhr.onreadystatechange = () => {
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

// Fetch country and field data
function fetchFields(countryId, callback) {
	fetchData(`Model/get_fields.php?countryId=${countryId}`, callback);
}

// Open modal and load content
function openModal(url, setupFunction) {
	modal.style.display = "block";
	loader.style.display = "block";
	dynamicContent.innerHTML = "";

	const xhr = new XMLHttpRequest();
	xhr.open("GET", url, true);
	xhr.onreadystatechange = () => {
		if (xhr.readyState === 4 && xhr.status === 200) {
			loader.style.display = "none";
			dynamicContent.innerHTML = xhr.responseText;
			console.log("Modal content loaded");

			setTimeout(() => {
				if (typeof setupFunction === "function") {
					setupFunction();
				} else {
					console.error("setupFunction is not a valid function");
				}
			}, 500);
		} else if (xhr.readyState === 4) {
			console.error("Error loading modal content:", xhr.status);
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
