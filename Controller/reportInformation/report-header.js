document.addEventListener("DOMContentLoaded", () => {
	const wellInput = document.getElementById("Well");
	const wellboreInput = document.getElementById("Wellbore-No");
	const reportNoInput = document.getElementById("Report-No");
	const reportDateInput = document.getElementById("Report-Date");
	const wellInputViewer = document.getElementById("wellDisplay");
	const wellboreInputViewer = document.getElementById("wellboreDisplay");
	const reportNoInputViewer = document.getElementById("reportNoDisplay");
	const reportDateInputViewer = document.getElementById("reportDateDisplay");

	function getReportIdFromUrl() {
		const params = new URLSearchParams(window.location.search);
		return params.get("reportId"); // This retrieves the reportId parameter
	}

	// Simulated function to fetch data from the server/database
	function fetchDataFromDatabase() {
		const reportId = getReportIdFromUrl(); // Get dynamic report ID
		const url = `http://localhost/Faz-Drill/Model/reportViewerDatabase/reportHeaderConn.php?report_id=${reportId}`;
		console.log("Fetching data from:", url); // Log the URL for debugging
		return fetch(url)
			.then((response) => {
				if (!response.ok) {
					throw new Error(`HTTP error! Status: ${response.status}`);
				}
				return response.json();
			})
			.then((data) => {
				if (data.error) {
					console.error("Error fetching data:", data.error);
				} else {
					// Populate fields with fetched data
					if (wellInput) wellInput.value = data.well; // Populate well name
					if (wellboreInput) wellboreInput.value = data.wellbore; // Populate wellbore number
					if (reportNoInput) reportNoInput.value = data.reportno; // Populate report number
					if (reportDateInput) reportDateInput.value = data.reportdate; // Populate report date

					if (wellInputViewer)
						wellInputViewer.textContent = `Well: ${data.well}`; // Display "Well: wellname"
					if (wellboreInputViewer)
						wellboreInputViewer.textContent = `Wellbore: ${data.wellbore}`; // Display "Wellbore: wellborenumber"
					if (reportNoInputViewer)
						reportNoInputViewer.textContent = `Report No: ${data.reportno}`; // Display "Report No: reportnumber"
					if (reportDateInputViewer)
						reportDateInputViewer.textContent = `Report Date: ${data.reportdate}`; // Display "Report Date: reportdate`
				}
			})
			.catch((error) => console.error("Fetch Error:", error));
	}

	// Call fetchDataFromDatabase on page load
	fetchDataFromDatabase();

	// Example form submission handler (if needed)
	const form = document.querySelector("form");
	if (form) {
		form.addEventListener("submit", (event) => {
			event.preventDefault(); // Prevent default form submission

			const reportData = {
				well: wellInput ? wellInput.value : null,
				wellbore: wellboreInput ? wellboreInput.value : null,
				reportNo: reportNoInput ? reportNoInput.value : null,
				reportDate: reportDateInput ? reportDateInput.value : null,
			};

			console.log("Submitted Data:", reportData); // Handle the data (send to server, etc.)
		});
	}
});
