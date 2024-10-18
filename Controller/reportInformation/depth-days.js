document.addEventListener("DOMContentLoaded", function () {
	document.getElementById("DDclearButton").onclick = function () {
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

	document.getElementById("DDbackButton").onclick = function () {
		// Get the current field from the URL
		const urlParams = new URLSearchParams(window.location.search);
		const field = urlParams.get("field");
		const reportId = urlParams.get("reportId");

		// Determine the next page based on the current field
		let lastPage = "";

		switch (field) {
			case "depthDay":
				lastPage = "well-data.php"; // Next step for wellInfo
				break;
			case "costInfo":
				lastPage = "depth-days.php"; // Next step for depthDay
				break;
			default:
				alert("No next step defined for the current field.");
				return; // Exit if no next step is defined
		}

		// Redirect to the next page with the reportId
		if (lastPage) {
			window.location.href = `http://localhost/Faz-Drill/View/${lastPage}?reportId=${reportId}`;
		}
	};

	document.getElementById("DDsaveButton").onclick = function () {
		// Logic for saving data, e.g., using AJAX
		alert("Data saved successfully!");
	};

	document.getElementById("DDnextButton").onclick = function () {
		// Logic for going to the next section
		// e.g., redirect to another page or show the next section
	};
});
