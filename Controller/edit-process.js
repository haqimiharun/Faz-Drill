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

// Function to open modal and load Report form
editReportBtn.onclick = function () {
	openModal("View/add_report.php", setupReportFormSubmission);
};

// Function to open modal and load Wellbore form
editWellboreBtn.onclick = function () {
	openModal("View/add_wellbore.php", setupWellboreFormSubmission);
};

// Function to open modal and load Well form
editWellBtn.onclick = function () {
	openModal("View/add_well.php", setupWellFormSubmission);
};

// Function to open modal and load Site form
editSiteBtn.onclick = function () {
	openModal("View/add_site.php", setupSiteFormSubmission);
};

// Function to open modal and load Field form
editFieldBtn.onclick = function () {
	openModal("View/add_field.php", setupFieldFormSubmission);
};

function setupReportFormSubmission() {
	var form = document.querySelector("#reportForm"); // Adjust selector as needed

	form.onsubmit = function (event) {
		event.preventDefault();

		var formData = new FormData(form);

		var xhr = new XMLHttpRequest();
		xhr.open("POST", "Model/edit_report.php", true); // Update URL as needed
		xhr.onload = function () {
			if (xhr.status === 200) {
				var response = JSON.parse(xhr.responseText);
				if (response.status === "success") {
					updateTableRow(response.item); // Define this function to update the table
					modal.style.display = "none";
				} else {
					console.error("Error:", response.message);
				}
			} else {
				console.error("Request failed:", xhr.status);
			}
		};
		xhr.send(formData);
	};
}

function updateTableRow(item) {
	// Adjust the selector and updating logic as needed
	var row = document.querySelector(`tr[data-id='${item.id}']`);
	if (row) {
		row.querySelector(".name").textContent = item.name;
		row.querySelector(".description").textContent = item.description;
		// Update other fields as needed
	}
}

function setupReportFormSubmission() {
	// Fetch existing data (e.g., based on URL parameters or session storage)
	var reportId = getParameterByName("id"); // Define this function to extract parameters
	if (reportId) {
		fetchData(`Model/get_report.php?id=${reportId}`, function (data) {
			if (data.status === "success") {
				populateReportForm(data.item);
			} else {
				console.error("Error fetching report data:", data.message);
			}
		});
	}

	// Form submission handling
	var form = document.querySelector("#reportForm");
	form.onsubmit = function (event) {
		event.preventDefault();

		var formData = new FormData(form);

		var xhr = new XMLHttpRequest();
		xhr.open("POST", "Model/edit_report.php", true);
		xhr.onload = function () {
			if (xhr.status === 200) {
				var response = JSON.parse(xhr.responseText);
				if (response.status === "success") {
					updateTableRow(response.item);
					modal.style.display = "none";
				} else {
					console.error("Error:", response.message);
				}
			} else {
				console.error("Request failed:", xhr.status);
			}
		};
		xhr.send(formData);
	};
}

function setupWellboreFormSubmission() {
	// Get the wellbore ID from URL parameters or any other source
	var wellboreId = getParameterByName("id"); // Define this function to extract parameters

	if (wellboreId) {
		// Fetch existing wellbore data
		fetchData(`Model/get_wellbore.php?id=${wellboreId}`, function (data) {
			if (data.status === "success") {
				populateWellboreForm(data.item);
			} else {
				console.error("Error fetching wellbore data:", data.message);
			}
		});
	}

	// Form submission handling
	var form = document.querySelector("#wellboreForm"); // Adjust selector as needed
	form.onsubmit = function (event) {
		event.preventDefault();

		var formData = new FormData(form);

		var xhr = new XMLHttpRequest();
		xhr.open("POST", "Model/edit_wellbore.php", true); // Update URL as needed
		xhr.onload = function () {
			if (xhr.status === 200) {
				var response = JSON.parse(xhr.responseText);
				if (response.status === "success") {
					updateTableRow(response.item); // Update the table or list
					modal.style.display = "none";
				} else {
					console.error("Error:", response.message);
				}
			} else {
				console.error("Request failed:", xhr.status);
			}
		};
		xhr.send(formData);
	};
}

// Function to populate the wellbore form with existing data
function populateWellboreForm(item) {
	var form = document.querySelector("#wellboreForm");
	form.querySelector("[name='name']").value = item.name;
	form.querySelector("[name='description']").value = item.description;
	form.querySelector("[name='depth']").value = item.depth; // Adjust as needed
	form.querySelector("[name='status']").value = item.status; // Adjust as needed
	// Populate other fields as needed
}

function populateReportForm(item) {
	var form = document.querySelector("#reportForm");
	form.querySelector("[name='name']").value = item.name;
	form.querySelector("[name='description']").value = item.description;
	// Populate other fields as needed
}
