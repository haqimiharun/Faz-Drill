document.addEventListener("DOMContentLoaded", function () {
	// Function to retrieve reportId from the URL
	function getReportIdFromUrl() {
		const params = new URLSearchParams(window.location.search);
		return params.get("reportId"); // This retrieves the report_id parameter
	}

	const reportId = getReportIdFromUrl(); // Retrieve reportId from URL
	if (reportId) {
		fetchWellData(reportId); // Fetch well data using the retrieved reportId
	} else {
		console.error("Report ID not found in URL.");
	}

	// Call the functions to load event descriptions and rig names
	loadEventDescriptions();
	loadRigNames();
});

// Function to fetch well data from the server/database
function fetchWellData(reportId) {
	const url = `http://localhost/Faz-Drill/Model/reportViewerDatabase/wellDataConn.php?reportId=${reportId}`; // Changed to reportId
	console.log("Fetching data from:", url); // Log the URL for debugging

	return fetch(url)
		.then((response) => {
			return response.text().then((text) => {
				console.log("Raw response text:", text); // Log the raw text
				if (!response.ok) {
					throw new Error(`HTTP error! Status: ${response.status}`);
				}
				return JSON.parse(text); // Try parsing the response as JSON
			});
		})
		.then((data) => {
			populateReadOnlyFields(data); // Populate the form fields with fetched data
		})
		.catch((error) => {
			console.error(
				"There has been a problem with your fetch operation:",
				error
			);
		});
}

// Function to populate the read-only fields with data
function populateReadOnlyFields(data) {
	document.getElementById("company").value = data.companyName || "N/A";
	document.getElementById("country").value = data.countryName || "N/A";
	document.getElementById("region").value = data.regionName || "N/A";
	document.getElementById("block").value = data.blockName || "N/A";
	document.getElementById("field").value = data.fieldName || "N/A"; // Adjust if the field data is available
}

// Function to fetch event data and populate the dropdown
function loadEventDescriptions() {
	fetch(
		"http://localhost/Faz-Drill/Model/reportViewerDatabase/libraryEventCaller.php"
	) // Replace with the actual path to your PHP script
		.then((response) => response.json())
		.then((data) => {
			const eventDescSelect = document.getElementById("eventDesc");

			// Check if the data contains error
			if (data.error) {
				console.error("Error:", data.error);
				return;
			}

			// Clear existing options (except the first one)
			eventDescSelect.length = 1;

			// Populate the select with options from the database
			data.forEach((event) => {
				let option = document.createElement("option");
				option.value = event.event_code; // Set value as event_code
				option.textContent = `${event.event_code} - ${event.event_desc}`; // Display full details
				eventDescSelect.appendChild(option);
			});
		})
		.catch((error) =>
			console.error("Error fetching event descriptions:", error)
		);
}

// Function to fetch rig data and populate the dropdown
function loadRigNames() {
	fetch(
		"http://localhost/Faz-Drill/Model/reportViewerDatabase/libraryRigCaller.php"
	) // Replace with the actual path to your PHP script
		.then((response) => response.json())
		.then((data) => {
			const rigSelect = document.getElementById("rigName");

			// Check if the data contains error
			if (data.error) {
				console.error("Error:", data.error);
				return;
			}

			// Clear existing options (except the first one)
			rigSelect.length = 1;

			// Populate the select with options from the database
			data.forEach((rig) => {
				let option = document.createElement("option");
				option.value = rig.rig_name2; // Set value as rig_name2
				option.textContent = `${rig.rig_name2} - ${rig.rig_type}`; // Display rig_name2 and rig_type
				rigSelect.appendChild(option);
			});
		})
		.catch((error) => console.error("Error fetching rig names:", error));
}

document.addEventListener("DOMContentLoaded", function () {
	document.getElementById("WDclearButton").onclick = function () {
		// Prompt for confirmation
		var confirmClear = confirm("Are you sure you want to clear all fields?");

		// If the user confirms, clear the fields
		if (confirmClear) {
			document.getElementById("eventDesc").value = "";
			document.getElementById("rigName").value = "";
			document.getElementById("platform").value = "";
			document.getElementById("waterDepth").value = "";
			document.getElementById("objective").value = "";
			document.getElementById("afeNo").value = "";
			document.getElementById("startDate").value = "";
			document.getElementById("spudDate").value = "";
			document.getElementById("endDate").value = "";
			document.getElementById("leadDS").value = "";
			document.getElementById("nightDS").value = "";
			document.getElementById("pcsbEng").value = "";
		}
	};

	document.getElementById("WDsaveButton").onclick = function () {
		// Logic for saving data, e.g., using AJAX
		alert("Data saved successfully!");
	};

	document.getElementById("WDnextButton").onclick = function () {
		// Get the current field from the URL
		const urlParams = new URLSearchParams(window.location.search);
		const field = urlParams.get("field");
		const reportId = urlParams.get("reportId");

		// Determine the next page based on the current field
		let nextPage = "";

		switch (field) {
			case "wellInfo":
				nextPage = "depth_days.php"; // Next step for wellInfo
				break;
			case "depthDay":
				nextPage = "costInfo.php"; // Next step for depthDay
				break;
			// Add more cases for other fields
			case "costInfo":
				nextPage = "status.php"; // Next step for costInfo
				break;
			// Continue as necessary for other fields...
			default:
				alert("No next step defined for the current field.");
				return; // Exit if no next step is defined
		}

		// Redirect to the next page with the reportId
		if (nextPage) {
			window.location.href = `http://localhost/Faz-Drill/View/${nextPage}?reportId=${reportId}`;
		}
	};
});
