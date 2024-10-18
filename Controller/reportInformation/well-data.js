document.addEventListener("DOMContentLoaded", () => {
	const eventDescSelect = document.getElementById("eventDesc");
	const rigNameSelect = document.getElementById("rigName");
	const form = document.querySelector("form");

	const companySelect = document.getElementById("company"); // Assuming an ID for company input
	const countrySelect = document.getElementById("country"); // Assuming an ID for country input
	const fieldSelect = document.getElementById("field"); // Assuming an ID for field input
	const regionSelect = document.getElementById("region");
	const blockSelect = document.getElementById("block");

	const companyId = 1; // Replace with the actual company ID
	const countryId = 1; // Replace with the actual country ID
	const fieldId = 1; // Replace with the actual field ID

	// Fetch data from the server
	function fetchData() {
		fetch(
			`wellDataConn.php?company_id=${companyId}&country_id=${countryId}&field_id=${fieldId}`
		)
			.then((response) => response.json())
			.then((data) => {
				// Populate the fields with the fetched data
				companySelect.value = data.company; // Auto-generate company
				countrySelect.value = data.country; // Auto-generate country
				fieldSelect.value = data.field; // Auto-generate field
				regionSelect.value = data.region; // Auto-generate region
				blockSelect.value = data.block; // Auto-generate block
			})
			.catch((error) => console.error("Error fetching data:", error));
	}

	// Call the fetch function
	fetchData();
	// Event listeners for Well Info and Event Description changes
	eventDescSelect.addEventListener("change", updateRigName);

	// Function to validate required fields
	function validateRequiredFields(fields) {
		let isValid = true;
		fields.forEach((field) => {
			if (!field.value) {
				isValid = false;
				field.classList.add("error");
			} else {
				field.classList.remove("error");
			}
		});
		return isValid;
	}

	// Form submission handler
	form.addEventListener("submit", (event) => {
		const requiredFields = [
			eventDescSelect,
			document.getElementById("waterDepth"),
			document.getElementById("depth"),
			document.getElementById("region"),
			document.getElementById("objective"),
			document.getElementById("afeNo"),
			document.getElementById("startDate"),
			document.getElementById("spudDate"),
			document.getElementById("endDate"),
			document.getElementById("block"),
			document.getElementById("leadDS"),
			document.getElementById("nightDS"),
			document.getElementById("pcsbEng"),
		];

		if (!validateRequiredFields(requiredFields)) {
			event.preventDefault(); // Prevent form submission if there are errors
			alert("Please fill in all required fields."); // Consider UI-based feedback
		}
	});
});
