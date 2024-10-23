document.addEventListener("DOMContentLoaded", function () {
	const urlParams = new URLSearchParams(window.location.search);
	const reportId = urlParams.get("reportId");
	document.getElementById("reportId").value = reportId; // Set the reportId input value

	// Check if reportId exists in tbl_wellinfo
	checkReportIdInWellInfo(reportId).then((exists) => {
		if (exists) {
			// If reportId exists, fetch and populate all fields
			fetchAllWellData(reportId).then((data) => {
				if (data) {
					populateAllFields(data);
				}
			});
		} else {
			// If reportId does not exist, fetch limited well data and populate read-only fields
			fetchWellData(reportId).then((data) => {
				if (data) {
					populateReadOnlyFields(data);
				}
			});
		}
	});

	function checkReportIdInWellInfo(reportId) {
		const url = `http://localhost/Faz-Drill/Model/reportViewerDatabase/wellData/checkReportId.php?reportId=${reportId}`;
		console.log("Checking report ID existence at:", url); // Log the URL for debugging

		return fetch(url)
			.then((response) => {
				if (!response.ok) {
					console.error(`HTTP error! Status: ${response.status}`);
					return false; // Return false if the response is not okay
				}
				return response.json(); // Assume the response is in JSON format
			})
			.then((data) => {
				return data.exists; // Assuming the response contains a property 'exists' that indicates if the reportId is found
			})
			.catch((error) => {
				console.error("Error checking report ID:", error);
				return false; // Return false if there's an error
			});
	}

	// Function to fetch all well data from the server/database
	function fetchAllWellData(reportId) {
		const url = `http://localhost/Faz-Drill/Model/reportViewerDatabase/wellData/fetchWellInfo.php?reportId=${reportId}`;
		console.log("Fetching All data from:", url); // Log the URL for debugging

		return fetch(url)
			.then((response) => {
				if (!response.ok) {
					console.error(`HTTP error! Status: ${response.status}`);
					return null; // Return null if the response is not okay
				}
				return response.text(); // Retrieve response as text
			})
			.then((text) => {
				console.log("Raw response text:", text); // Log the raw text
				return JSON.parse(text); // Try parsing the response as JSON
			})
			.catch((error) => {
				console.error(
					"There has been a problem with your fetch operation:",
					error
				);
				return null; // Return null if there's an error
			});
	}

	// Function to fetch well certain data from the server/database
	function fetchWellData(reportId) {
		const url = `http://localhost/Faz-Drill/Model/reportViewerDatabase/wellData/wellDataConn.php?reportId=${reportId}`;
		console.log("Fetching data from:", url); // Log the URL for debugging

		return fetch(url)
			.then((response) => {
				if (!response.ok) {
					console.error(`HTTP error! Status: ${response.status}`);
					return null; // Return null if the response is not okay
				}
				return response.text(); // Retrieve response as text
			})
			.then((text) => {
				console.log("Raw response text:", text); // Log the raw text
				return JSON.parse(text); // Try parsing the response as JSON
			})
			.catch((error) => {
				console.error(
					"There has been a problem with your fetch operation:",
					error
				);
				return null; // Return null if there's an error
			});
	}

	// Function to populate the read-only fields with data
	function populateReadOnlyFields(data) {
		loadEventDescriptions();
		loadRigNames();
		document.getElementById("company").value = data.companyName;
		document.getElementById("country").value = data.countryName;
		document.getElementById("region").value = data.regionName;
		document.getElementById("block").value = data.blockName;
		document.getElementById("field").value = data.fieldName; // Adjust if the field data is available
	}

	function populateAllFields(data) {
		loadEventDescriptions().then(() => {
			document.getElementById("eventDesc").value = data.eventId; // Set the event dropdown value based on eventId
		});
		loadRigNames().then(() => {
			document.getElementById("rigName").value = data.rigId; // Set the rig dropdown value based on rigId
		});
		document.getElementById("company").value = data.companyName;
		document.getElementById("country").value = data.countryName;
		document.getElementById("region").value = data.regionName;
		document.getElementById("block").value = data.blockName;
		document.getElementById("field").value = data.fieldName;
		// document.getElementById("eventDesc").value = data.eventDesc;
		// document.getElementById("rigName").value = data.rigName;
		document.getElementById("platform").value = data.wellPlatform;
		document.getElementById("waterDepth").value = data.waterDepth;
		document.getElementById("objective").value = data.wellObj;
		document.getElementById("afeNo").value = data.afeNo;
		document.getElementById("startDate").value = data.startDate;
		document.getElementById("spudDate").value = data.spudDate;
		document.getElementById("endDate").value = data.endDate;
		document.getElementById("leadDS").value = data.leadDs;
		document.getElementById("nightDS").value = data.nightDs;
		document.getElementById("pcsbEng").value = data.engineer;
	}

	// Function to fetch event data and populate the dropdown
	function loadEventDescriptions() {
		return fetch(
			"http://localhost/Faz-Drill/Model/reportViewerDatabase/libraryEventCaller.php"
		)
			.then((response) => response.json())
			.then((data) => {
				const eventDescSelect = document.getElementById("eventDesc");
				eventDescSelect.length = 1; // Clear existing options

				// Populate the dropdown with event options
				data.forEach((event) => {
					let option = document.createElement("option");
					option.value = event.event_id; // Use event_id as the value
					option.textContent = `${event.event_code} - ${event.event_desc}`; // Display event code and description
					eventDescSelect.appendChild(option);
				});
			})
			.catch((error) =>
				console.error("Error fetching event descriptions:", error)
			);
	}

	// Function to fetch rig data and populate the dropdown
	function loadRigNames() {
		return fetch(
			"http://localhost/Faz-Drill/Model/reportViewerDatabase/libraryRigCaller.php"
		)
			.then((response) => response.json())
			.then((data) => {
				const rigSelect = document.getElementById("rigName");
				rigSelect.length = 1; // Clear existing options

				// Populate the dropdown with rig options
				data.forEach((rig) => {
					let option = document.createElement("option");
					option.value = rig.rig_id; // Use rig_id as the value
					option.textContent = `${rig.rig_name2} - ${rig.rig_type}`; // Display rig_name2 and rig_type
					rigSelect.appendChild(option);
				});
			})
			.catch((error) => console.error("Error fetching rig names:", error));
	}

	function handleSubmit(isNext) {
		// Common submission function
		// Optional: Perform validation here
		let allFieldsFilled = true;
		formData.forEach((value) => {
			if (!value) {
				allFieldsFilled = false;
			}
		});

		if (!allFieldsFilled) {
			alert("Please fill in all required fields before saving.");
			return; // Stop the function if any field is empty
		}

		// Submit the form data using fetch
		fetch("wellDataStored.php", {
			method: "POST",
			body: formData,
		})
			.then((response) => {
				if (!response.ok) {
					throw new Error(`HTTP error! Status: ${response.status}`);
				}
				return response.text(); // or response.json() depending on your expected response
			})
			.then((data) => {
				console.log("Form submitted successfully:", data);
				if (isNext) {
					// Redirect to the next page if 'Save and Next' was clicked
					const urlParams = new URLSearchParams(window.location.search);
					const reportId = urlParams.get("reportId");
					window.location.href = `http://localhost/Faz-Drill/View/depth_days.php?reportId=${reportId}`;
				}
			})
			.catch((error) => {
				console.error("Error submitting form:", error);
			});
	}

	// Function to clear form fields
	function clearFormFields() {
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

	// Function to handle the next button click logic
	function handleNextButtonClick() {
		const urlParams = new URLSearchParams(window.location.search);
		const reportId = urlParams.get("reportId");

		// Get values of the specific fields
		const eventDesc = document.getElementById("eventDesc").value;
		const rigName = document.getElementById("rigName").value;
		const platform = document.getElementById("platform").value;
		const waterDepth = document.getElementById("waterDepth").value;
		const objective = document.getElementById("objective").value;
		const afeNo = document.getElementById("afeNo").value;
		const startDate = document.getElementById("startDate").value;
		const spudDate = document.getElementById("spudDate").value;
		const endDate = document.getElementById("endDate").value;
		const leadDS = document.getElementById("leadDS").value;
		const nightDS = document.getElementById("nightDS").value;
		const pcsbEng = document.getElementById("pcsbEng").value;

		// Construct a FormData object
		const formData = new FormData();
		formData.append("eventDesc", eventDesc);
		formData.append("rigName", rigName);
		formData.append("platform", platform);
		formData.append("waterDepth", waterDepth);
		formData.append("objective", objective);
		formData.append("afeNo", afeNo);
		formData.append("startDate", startDate);
		formData.append("spudDate", spudDate);
		formData.append("endDate", endDate);
		formData.append("leadDS", leadDS);
		formData.append("nightDS", nightDS);
		formData.append("pcsbEng", pcsbEng);
		formData.append("reportId", reportId); // Always include the report ID

		handleSubmit(true); // Pass true to handle submission and next action
	}
});
