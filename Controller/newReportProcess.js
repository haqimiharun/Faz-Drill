function setupNewReportFormSubmission() {
	console.log("Setting up New Report Form Submission");

	var reportForm = document.getElementById("reportForm");
	var countrySelect = document.getElementById("countrySelect");
	var fieldSelect = document.getElementById("fieldSelect");
	var siteSelect = document.getElementById("siteSelect");
	var wellSelect = document.getElementById("wellSelect");
	var wellboreSelect = document.getElementById("wellboreSelect");
	var newCountryDropdown = document.getElementById("newCountryDropdown");
	var newCountrySelect = document.getElementById("newCountrySelect");

	// Add placeholder options
	function addPlaceholder(selectElement, placeholderText) {
		selectElement.innerHTML = ""; // Clear previous options
		var placeholderOption = document.createElement("option");
		placeholderOption.value = "";
		placeholderOption.text = placeholderText;
		placeholderOption.disabled = true;
		placeholderOption.selected = true;
		selectElement.appendChild(placeholderOption);
	}

	// Fetch all countries and populate the country select element
	fetch("Model/get_SelectedCountry.php")
		.then((response) => response.json())
		.then((data) => {
			if (data.error) {
				console.error(data.error);
			} else {
				data.forEach((country) => {
					var option = document.createElement("option");
					option.value = country.country_id;
					option.text = country.country_name;
					countrySelect.appendChild(option);
				});
				// Add "Add New Country" option
				var addNewCountryOption = document.createElement("option");
				addNewCountryOption.value = "addNewCountry";
				addNewCountryOption.text = "Add New Country";
				countrySelect.appendChild(addNewCountryOption);
			}
		})
		.catch((error) => console.error("Error fetching countries:", error));

	// Handle "Add New" option and cascading reset for Country
	countrySelect.addEventListener("change", function () {
		// Hide the new country dropdown if not adding a new country
		newCountryDropdown.style.display = "none";

		// Reset field and other dependent dropdowns
		resetDropdown(fieldSelect, "Select a Field");
		resetDropdown(siteSelect, "Select a Site");
		resetDropdown(wellSelect, "Select a Well");
		resetDropdown(wellboreSelect, "Select a Wellbore");
		if (countrySelect.value === "addNewCountry") {
			// Show the new country dropdown
			newCountryDropdown.style.display = "block";

			// Step 1: Fetch selected countries
			fetch("Model/get_SelectedCountry.php")
				.then((response) => response.json())
				.then((selectedCountries) => {
					if (selectedCountries.error) {
						console.error(selectedCountries.error);
					} else {
						// Step 2: Fetch all countries
						fetch("Model/get_AllCountries.php")
							.then((response) => response.json())
							.then((allCountries) => {
								if (allCountries.error) {
									console.error(allCountries.error);
								} else {
									// Step 3: Filter out countries already selected
									let selectedCountryIds = selectedCountries.map(
										(country) => country.country_id
									);

									let availableCountries = allCountries.filter(
										(country) =>
											!selectedCountryIds.includes(country.country_id)
									);
									// Step 4: Populate the new country dropdown
									addPlaceholder(newCountrySelect, "Select a Country");
									availableCountries.forEach((country) => {
										var option = document.createElement("option");
										option.value = country.country_id;
										option.text = country.country_name;
										newCountrySelect.appendChild(option);
									});
								}
							})
							.catch((error) =>
								console.error("Error fetching all countries:", error)
							);
					}
				})
				.catch((error) =>
					console.error("Error fetching selected countries:", error)
				);

			// Manually add "Add New Field" option when adding a new country
			resetDropdown(fieldSelect, "Select a Field");
			var addNewFieldOption = document.createElement("option");
			addNewFieldOption.value = "addNewField";
			addNewFieldOption.text = "Add New Field";
			fieldSelect.appendChild(addNewFieldOption);
			fieldSelect.disabled = false;
		} else {
			// Hide the new country dropdown if not adding a new country
			newCountryDropdown.style.display = "none";
			document.getElementById("newFieldDropdown").style.display = "none";
			document.getElementById("newSiteDropdown").style.display = "none";
			document.getElementById("newWellDropdown").style.display = "none";
			document.getElementById("newWellboreDropdown").style.display = "none";
		}

		// Reset all dependent dropdowns when country changes
		resetDropdown(siteSelect, "Select a Site");
		resetDropdown(wellSelect, "Select a Well");
		resetDropdown(wellboreSelect, "Select a Wellbore");

		if (countrySelect.value !== "addNewCountry") {
			// Fetch fields for the selected country
			fetchFields(countrySelect.value);
		}
	});

	// Handle cascading reset for Field
	fieldSelect.addEventListener("change", function () {
		if (fieldSelect.value === "addNewField") {
			document.getElementById("newFieldDropdown").style.display = "block";

			// Enable the site dropdown and add "Add New Site" option
			resetDropdown(siteSelect, "Select a Site");
			var addNewSiteOption = document.createElement("option");
			addNewSiteOption.value = "addNewSite";
			addNewSiteOption.text = "Add New Site";
			siteSelect.appendChild(addNewSiteOption);
			siteSelect.disabled = false; // Enable the site dropdown

			// Reset dependent dropdowns for wells and wellbores
			resetDropdown(wellSelect, "Select a Well");
			resetDropdown(wellboreSelect, "Select a Wellbore");
		} else {
			document.getElementById("newFieldDropdown").style.display = "none";
			document.getElementById("newSiteDropdown").style.display = "none";
			document.getElementById("newWellDropdown").style.display = "none";
			document.getElementById("newWellboreDropdown").style.display = "none";

			// Reset site, well, and wellbore dropdowns
			resetDropdown(siteSelect, "Select a Site");
			resetDropdown(wellSelect, "Select a Well");
			resetDropdown(wellboreSelect, "Select a Wellbore");

			if (fieldSelect.value !== "") {
				// Fetch sites for the selected field
				fetchSites(fieldSelect.value);
			}
		}
	});

	// Handle cascading reset for Site
	siteSelect.addEventListener("change", function () {
		if (siteSelect.value === "addNewSite") {
			document.getElementById("newSiteDropdown").style.display = "block";

			// Enable the well dropdown and add "Add New Well" option
			resetDropdown(wellSelect, "Select a Well");
			var addNewWellOption = document.createElement("option");
			addNewWellOption.value = "addNewWell";
			addNewWellOption.text = "Add New Well";
			wellSelect.appendChild(addNewWellOption);
			wellSelect.disabled = false; // Enable the well dropdown

			// Reset the wellbore dropdown
			resetDropdown(wellboreSelect, "Select a Wellbore");
		} else {
			document.getElementById("newSiteDropdown").style.display = "none";
			document.getElementById("newWellDropdown").style.display = "none";
			document.getElementById("newWellboreDropdown").style.display = "none";

			// Reset the well and wellbore dropdowns
			resetDropdown(wellSelect, "Select a Well");
			resetDropdown(wellboreSelect, "Select a Wellbore");

			if (siteSelect.value !== "") {
				// Fetch wells for the selected site
				fetchWells(siteSelect.value);
			}
		}
	});

	// Handle cascading reset for Well
	wellSelect.addEventListener("change", function () {
		if (wellSelect.value === "addNewWell") {
			document.getElementById("newWellDropdown").style.display = "block";

			// Enable the wellbore dropdown and add "Add New Wellbore" option
			resetDropdown(wellboreSelect, "Select a Wellbore");
			var addNewWellboreOption = document.createElement("option");
			addNewWellboreOption.value = "addNewWellbore";
			addNewWellboreOption.text = "Add New Wellbore";
			wellboreSelect.appendChild(addNewWellboreOption);
			wellboreSelect.disabled = false; // Enable the wellbore dropdown
		} else {
			document.getElementById("newSiteDropdown").style.display = "none";
			document.getElementById("newWellDropdown").style.display = "none";

			// Reset the wellbore dropdown
			resetDropdown(wellboreSelect, "Select a Wellbore");

			if (wellSelect.value !== "") {
				// Fetch wellbores for the selected well
				fetchWellbores(wellSelect.value);
			}
		}
	});

	// Handle cascading reset for Wellbore
	wellboreSelect.addEventListener("change", function () {
		if (wellboreSelect.value === "addNewWellbore") {
			document.getElementById("newWellboreDropdown").style.display = "block";
		} else {
			document.getElementById("newWellboreDropdown").style.display = "none";
		}
	});

	// Helper function to reset dropdowns
	function resetDropdown(dropdown, placeholderText) {
		dropdown.innerHTML = "";
		addPlaceholder(dropdown, placeholderText);
		dropdown.disabled = true; // Disable dropdown until data is loaded
	}

	// Example fetch functions
	function fetchFields(countryId) {
		fetch(`Model/get_AllFields.php?countryId=${countryId}`)
			.then((response) => response.json())
			.then((data) => {
				if (data.status === "success" && data.data.length > 0) {
					data.data.forEach((field) => {
						var option = document.createElement("option");
						option.value = field.field_id;
						option.text = field.field_name;
						fieldSelect.appendChild(option);
					});
					var addNewFieldOption = document.createElement("option");
					addNewFieldOption.value = "addNewField";
					addNewFieldOption.text = "Add New Field";
					fieldSelect.appendChild(addNewFieldOption);
					fieldSelect.disabled = false;
				} else {
					addPlaceholder(fieldSelect, "No fields available");
				}
			})
			.catch((error) => console.error("Error fetching fields:", error));
	}

	function fetchSites(fieldId) {
		fetch(`Model/get_AllSites.php?fieldId=${fieldId}`)
			.then((response) => response.json())
			.then((data) => {
				if (data.status === "success" && data.data.length > 0) {
					data.data.forEach((site) => {
						var option = document.createElement("option");
						option.value = site.site_id;
						option.text = site.site_name;
						siteSelect.appendChild(option);
						siteSelect.disabled = false;
					});
					var addNewSiteOption = document.createElement("option");
					addNewSiteOption.value = "addNewSite";
					addNewSiteOption.text = "Add New Site";
					siteSelect.appendChild(addNewSiteOption);
				} else {
					var addNewSiteOption = document.createElement("option");
					addNewSiteOption.value = "addNewSite";
					addNewSiteOption.text = "Add New Site";
					siteSelect.appendChild(addNewSiteOption);
					addPlaceholder(siteSelect, "No sites available");
					siteSelect.disabled = false;
				}
			})
			.catch((error) => console.error("Error fetching sites:", error));
	}

	function fetchWells(siteId) {
		fetch(`Model/get_AllWells.php?siteId=${siteId}`)
			.then((response) => response.json())
			.then((data) => {
				if (data.status === "success" && data.data.length > 0) {
					data.data.forEach((well) => {
						var option = document.createElement("option");
						option.value = well.well_id;
						option.text = well.well_name;
						wellSelect.appendChild(option);
					});
					var addNewWellOption = document.createElement("option");
					addNewWellOption.value = "addNewWell";
					addNewWellOption.text = "Add New Well";
					wellSelect.appendChild(addNewWellOption);
					wellSelect.disabled = false;
				} else {
					addPlaceholder(wellSelect, "No wells available");
					var addNewWellOption = document.createElement("option");
					addNewWellOption.value = "addNewWell";
					addNewWellOption.text = "Add New Well";
					wellSelect.appendChild(addNewWellOption);
					wellSelect.disabled = false;
				}
			})
			.catch((error) => console.error("Error fetching wells:", error));
	}

	function fetchWellbores(wellId) {
		fetch(`Model/get_AllWellbores.php?wellId=${wellId}`)
			.then((response) => response.json())
			.then((data) => {
				if (data.status === "success" && data.data.length > 0) {
					data.data.forEach((wellbore) => {
						var option = document.createElement("option");
						option.value = wellbore.wellbore_id;
						option.text = wellbore.wellbore_name;
						wellboreSelect.appendChild(option);
					});
					var addNewWellboreOption = document.createElement("option");
					addNewWellboreOption.value = "addNewWellbore";
					addNewWellboreOption.text = "Add New Wellbore";
					wellboreSelect.appendChild(addNewWellboreOption);
					wellboreSelect.disabled = false;
				} else {
					addPlaceholder(wellboreSelect, "No wellbores available");
				}
			})
			.catch((error) => console.error("Error fetching wellbores:", error));
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
			if (xhr.readyState === 4) {
				if (xhr.status === 200) {
					console.log("Form submitted successfully");
					console.log("Server response:", xhr.responseText);
					modal.style.display = "none"; // Close the modal

					// Optionally, reset the form
					form.reset();

					// Provide feedback to the user (you can customize this)
					alert("Form submitted successfully!"); // Or use a more sophisticated method
				} else {
					console.error("Error submitting form: " + xhr.status);
					alert("There was an error submitting the form. Please try again."); // Notify user of error
				}
			}
		};
		xhr.send(formData);
	}
}
