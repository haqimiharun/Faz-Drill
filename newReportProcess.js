document.addEventListener("DOMContentLoaded", function () {
	const countrySelect = document.getElementById("countrySelect");
	const newCountryDropdown = document.getElementById("newCountryDropdown");

	countrySelect.addEventListener("change", function () {
		if (countrySelect.value === "addNewCountry") {
			newCountryDropdown.style.display = "block";
		} else {
			newCountryDropdown.style.display = "none";
		}
	});

	// Function to populate new country dropdown options
	function populateNewCountryOptions() {
		// Replace this with AJAX call to fetch countries from tbl_country
		const newCountrySelect = document.getElementById("newCountrySelect");
		// Example: newCountrySelect.innerHTML = '<option value="1">Country A</option><option value="2">Country B</option>';
	}

	// Call populateNewCountryOptions when needed
	populateNewCountryOptions();
});
