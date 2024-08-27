document.addEventListener("DOMContentLoaded", function () {
	// Add click event listeners to country rows
	document.querySelectorAll(".country-row").forEach(function (row) {
		row.addEventListener("click", function () {
			const countryId = this.getAttribute("data-country-id");

			// Make AJAX request to fetch fields for the selected country
			fetch("get_fields.php?countryId=" + encodeURIComponent(countryId))
				.then((response) => response.json())
				.then((data) => {
					console.log("Response data:", data); // Check what data looks like
					if (data.status === "success") {
						const fields = data.data;
						console.log("Fields:", fields); // Check if fields is an array
						if (Array.isArray(fields)) {
							// Update field data in the rows
							updateFieldData(fields);
						} else {
							console.error("Error: Data is not an array");
						}
					} else {
						console.error("Error:", data.message);
					}
				})
				.catch((error) => console.error("Error fetching fields:", error));
		});
	});

	// Add click event listeners to field rows
	document
		.querySelector("#reportTableBody")
		.addEventListener("click", function (event) {
			// Log the event target to check what is being clicked
			console.log("Clicked element:", event.target);

			// Ensure the clicked element is a field-data div
			const fieldElement = event.target.closest(".field-data div");

			if (fieldElement) {
				const fieldId = fieldElement.dataset.fieldId;
				console.log("Field ID:", fieldId); // Log field ID for debugging

				if (fieldId) {
					// Make AJAX request to fetch sites for the selected field
					fetch("get_sites.php?fieldId=" + encodeURIComponent(fieldId))
						.then((response) => response.json())
						.then((data) => {
							console.log("Sites response data:", data); // Check the response data
							if (data.status === "success") {
								const sites = data.data;
								console.log("Sites:", sites); // Check if sites is an array
								if (Array.isArray(sites)) {
									updateSiteData(sites);
								} else {
									console.error("Error: Data is not an array");
								}
							} else {
								console.error("Error:", data.message);
							}
						})
						.catch((error) => console.error("Error fetching sites:", error));
				} else {
					console.error("Error: Field ID is not defined");
				}
			} else {
				console.error("Error: Clicked element is not a field-data div");
			}
		});

	document
		.querySelector("#reportTableBody")
		.addEventListener("click", function (event) {
			console.log("Clicked element:", event.target);

			// Ensure the clicked element is inside a site-data div
			const siteElement = event.target.closest(".site-data div");

			if (siteElement) {
				const siteId = siteElement.dataset.siteId;
				console.log("Site ID:", siteId);

				if (siteId) {
					fetch("get_wells.php?siteId=" + encodeURIComponent(siteId))
						.then((response) => response.json())
						.then((data) => {
							console.log("Wells response data:", data);
							if (data.status === "success") {
								const wells = data.data;
								console.log("Wells:", wells);
								if (Array.isArray(wells)) {
									updateWellData(wells);
								} else {
									console.error("Error: Data is not an array");
								}
							} else {
								console.error("Error:", data.message);
							}
						})
						.catch((error) => console.error("Error fetching wells:", error));
				} else {
					console.error("Error: Site ID is not defined");
				}
			} else {
				console.error("Error: Clicked element is not a site-data div");
			}
		});

	document
		.querySelector("#reportTableBody")
		.addEventListener("click", function (event) {
			console.log("Clicked element:", event.target);

			// Ensure the clicked element is inside a well-data div
			const wellElement = event.target.closest(".well-data div");
			console.log("Well Element:", wellElement);

			if (wellElement) {
				const wellId = wellElement.dataset.wellId; // Correct the attribute name if necessary
				console.log("Well ID:", wellId);

				if (wellId) {
					fetch("get_wellbores.php?wellId=" + encodeURIComponent(wellId))
						.then((response) => response.json())
						.then((data) => {
							console.log("Wellbores response data:", data);
							if (data.status === "success") {
								const wellbores = data.data;
								console.log("Wellbores:", wellbores);
								if (Array.isArray(wellbores)) {
									updateWellboreData(wellbores);
								} else {
									console.error("Error: Data is not an array");
								}
							} else {
								console.error("Error:", data.message);
							}
						})
						.catch((error) =>
							console.error("Error fetching wellbores:", error)
						);
				} else {
					console.error("Error: Well ID is not defined");
				}
			} else {
				console.error("Error: Clicked element is not inside a well-data div");
			}
		});

	function updateWellboreData(wellbores) {
		const tbody = document.querySelector("#reportTableBody");
		const rows = tbody.querySelectorAll("tr");

		const wellboreMap = new Map(
			wellbores.map((wellbore, index) => [index, wellbore])
		);

		if (wellbores.length === 0) {
			rows.forEach((row) => {
				const wellboreCell = row.querySelector(".wellbore-data");
				if (wellboreCell) {
					wellboreCell.innerHTML = "<div>No wellbore found!</div>";
				}
			});
			return;
		}

		rows.forEach((row, index) => {
			const wellboreCell = row.querySelector(".wellbore-data");

			if (wellboreCell) {
				wellboreCell.innerHTML = "";

				if (wellboreMap.has(index)) {
					const wellbore = wellboreMap.get(index);
					const wellboreElement = document.createElement("div");
					wellboreElement.textContent = wellbore.wellbore_name;
					wellboreElement.dataset.wellboreId = wellbore.wellbore_id;

					wellboreCell.appendChild(wellboreElement);
				} else {
					wellboreCell.innerHTML = "";
				}
			} else {
				console.error("Error: Wellbore cell not found in row", row);
			}
		});

		if (wellbores.length > rows.length) {
			for (let i = rows.length; i < wellbores.length; i++) {
				const newRow = document.createElement("tr");
				newRow.innerHTML = `
                <td class="country-row"></td>
                <td class="field-data"></td>
                <td class="site-data"></td>
                <td class="well-data"></td>
                <td class="wellbore-data">
                    <div data-wellbore-id="${wellbores[i].wellbore_id}">${wellbores[i].wellbore_name}</div>
                </td>
                <td class="report-data"></td>
            `;
				tbody.appendChild(newRow);
			}
		} else if (wellbores.length < rows.length) {
			for (let i = rows.length - 1; i >= wellbores.length; i--) {
				// tbody.removeChild(rows[i]);
			}
		}
	}

	function updateWellData(wells) {
		const tbody = document.querySelector("#reportTableBody");
		const rows = tbody.querySelectorAll("tr");

		const wellMap = new Map(wells.map((well, index) => [index, well]));

		if (wells.length === 0) {
			rows.forEach((row) => {
				const wellCell = row.querySelector(".well-data");
				if (wellCell) {
					wellCell.innerHTML = "<div>No well found!</div>";
				}
			});
			return;
		}

		rows.forEach((row, index) => {
			const wellCell = row.querySelector(".well-data");

			if (wellCell) {
				wellCell.innerHTML = "";

				if (wellMap.has(index)) {
					const well = wellMap.get(index);
					const wellElement = document.createElement("div");
					wellElement.textContent = well.well_name;
					wellElement.dataset.wellId = well.well_id; // Ensure the correct attribute is set

					wellCell.appendChild(wellElement);
				} else {
					wellCell.innerHTML = "";
				}
			} else {
				console.error("Error: Well cell not found in row", row);
			}
		});

		if (wells.length > rows.length) {
			for (let i = rows.length; i < wells.length; i++) {
				const newRow = document.createElement("tr");
				newRow.innerHTML = `
                <td class="country-row"></td>
                <td class="field-data"></td>
                <td class="site-data"></td>
                <td class="well-data">${wells[i].well_name}</td>
                <td class="wellbore-data"></td>
                <td class="report-data"></td>
            `;
				tbody.appendChild(newRow);
			}
		} else if (wells.length < rows.length) {
			for (let i = rows.length - 1; i >= wells.length; i--) {
				// tbody.removeChild(rows[i]);
			}
		}
	}

	function updateFieldData(fields) {
		const tbody = document.querySelector("#reportTableBody");
		const rows = tbody.querySelectorAll("tr");

		// Create a map to quickly access the field data by index
		const fieldMap = new Map(fields.map((field, index) => [index, field]));

		// Update existing rows with field data
		rows.forEach((row, index) => {
			const fieldCell = row.querySelector(".field-data");

			if (fieldCell) {
				// Clear previous field data
				fieldCell.innerHTML = "";

				// Display the field if it exists in the fields array
				if (fieldMap.has(index)) {
					const field = fieldMap.get(index);
					const fieldElement = document.createElement("div");
					fieldElement.textContent = field.field_name;
					fieldElement.dataset.fieldId = field.field_id; // Add data-field-id attribute
					fieldCell.appendChild(fieldElement);
				} else {
					// Clear cell if there are no more fields
					fieldCell.innerHTML = "";
				}
			} else {
				console.error("Error: Field cell not found in row", row);
			}
		});

		// Check if additional rows are needed
		if (fields.length > rows.length) {
			// Add extra rows
			for (let i = rows.length; i < fields.length; i++) {
				const newRow = document.createElement("tr");
				newRow.innerHTML = `
                    <td class="country-row"></td>
                    <td class="field-data">${fields[i].field_name}</td>
                    <td class="site-data"></td>
                    <td class="well-data"></td>
                    <td class="wellbore-data"></td>
                    <td class="report-data"></td>
                `;
				tbody.appendChild(newRow);
			}
		} else if (fields.length < rows.length) {
			// Remove extra rows if there are fewer fields
			for (let i = rows.length - 1; i >= fields.length; i--) {
				// tbody.removeChild(rows[i]);
			}
		}
	}

	function updateSiteData(sites) {
		const tbody = document.querySelector("#reportTableBody");
		const rows = tbody.querySelectorAll("tr");

		// Create a map to quickly access the site data by index
		const siteMap = new Map(sites.map((site, index) => [index, site]));

		// Check if sites array is empty
		if (sites.length === 0) {
			// Clear all site data cells and add a "No site found!" message
			rows.forEach((row) => {
				const siteCell = row.querySelector(".site-data");
				if (siteCell) {
					siteCell.innerHTML = "<div>No site found!</div>";
				}
			});
			return; // Exit the function early
		}

		// Update existing rows with site data
		rows.forEach((row, index) => {
			const siteCell = row.querySelector(".site-data");

			if (siteCell) {
				// Clear previous site data
				siteCell.innerHTML = "";

				// Display the site if it exists in the sites array
				if (siteMap.has(index)) {
					const site = siteMap.get(index);
					const siteElement = document.createElement("div");

					// Set the site name and data-site-id attribute
					siteElement.textContent = site.site_name;
					siteElement.dataset.siteId = site.site_id; // Make sure this is set

					siteCell.appendChild(siteElement);
				} else {
					// Clear cell if there are no more sites
					siteCell.innerHTML = "";
				}
			} else {
				console.error("Error: Site cell not found in row", row);
			}
		});

		// Check if additional rows are needed
		if (sites.length > rows.length) {
			// Add extra rows
			for (let i = rows.length; i < sites.length; i++) {
				const newRow = document.createElement("tr");
				newRow.innerHTML = `
                <td class="country-row"></td>
                <td class="field-data"></td>
                <td class="site-data">
                    <div data-site-id="${sites[i].site_id}">${sites[i].site_name}</div>
                </td>
                <td class="well-data"></td>
                <td class="wellbore-data"></td>
                <td class="report-data"></td>
            `;
				tbody.appendChild(newRow);
			}
		} else if (sites.length < rows.length) {
			// Remove extra rows if there are fewer sites
			for (let i = rows.length - 1; i >= sites.length; i--) {
				// tbody.removeChild(rows[i]);
			}
		}
	}
});
