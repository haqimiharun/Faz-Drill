let highestRowCount = 0;

function setRowCount(count) {
	if (count > highestRowCount) {
		highestRowCount = count;
		updateTableRows();
	}
}

function updateTableRows() {
	const tbody = document.querySelector("#reportTableBody");
	const rows = tbody.querySelectorAll("tr");

	// Add rows if needed
	if (highestRowCount > rows.length) {
		for (let i = rows.length; i < highestRowCount; i++) {
			const newRow = document.createElement("tr");
			newRow.innerHTML = `
                <td class="country-row"></td>
                <td class="field-data"></td>
                <td class="site-data"></td>
                <td class="well-data"></td>
                <td class="wellbore-data"></td>
                <td class="report-data"></td>
            `;
			tbody.appendChild(newRow);
		}
	}
	if (highestRowCount < rows.length) {
		for (let i = rows.length - 1; i >= highestRowCount; i--) {
			//tbody.removeChild(rows[i]);
		}
	}
}

function highlightSelected(level, id) {
	const rows = document.querySelectorAll("#reportTableBody tr");
	console.log("Highlighting level:", level, "with ID:", id);

	// First, remove the selection from the specific level
	rows.forEach((row) => {
		const targetCell = row.querySelector(`.${level}-data`);
		const countryCell = row.querySelector(".country-row");

		if (level === "country") {
			if (countryCell) {
				countryCell.classList.remove("selected-cell");
			}
		} else if (targetCell) {
			targetCell.classList.remove("selected-cell");
		}
	});

	// Now, apply the selection to the correct cell
	rows.forEach((row) => {
		if (level === "country") {
			const countryCell = row.querySelector(".country-row");
			if (countryCell && countryCell.dataset.countryId === id) {
				countryCell.classList.add("selected-cell");
				console.log("Selected country cell:", countryCell);
			}
		} else {
			const targetCell = row.querySelector(`.${level}-data`);
			if (targetCell) {
				const targetDiv = targetCell.querySelector("div");
				if (targetDiv && targetDiv.dataset[`${level}Id`] === id) {
					targetCell.classList.add("selected-cell");
					console.log(`Selected ${level} cell:`, targetCell);
				}
			}
		}
	});

	// Prepare data object
	const selectedData = {
		country: null,
		field: null,
		site: null,
		well: null,
		wellbore: null,
		report: null,
	};

	rows.forEach((row) => {
		const countryCell = row.querySelector(".country-row.selected-cell");
		const fieldCell = row.querySelector(".field-data.selected-cell");
		const siteCell = row.querySelector(".site-data.selected-cell");
		const wellCell = row.querySelector(".well-data.selected-cell");
		const wellboreCell = row.querySelector(".wellbore-data.selected-cell");
		const reportCell = row.querySelector(".report-data.selected-cell");

		if (countryCell) selectedData.country = countryCell.dataset.countryId;
		if (fieldCell)
			selectedData.field = fieldCell.querySelector("div").dataset.fieldId;
		if (siteCell)
			selectedData.site = siteCell.querySelector("div").dataset.siteId;
		if (wellCell)
			selectedData.well = wellCell.querySelector("div").dataset.wellId;
		if (wellboreCell)
			selectedData.wellbore =
				wellboreCell.querySelector("div").dataset.wellboreId;
		if (reportCell)
			selectedData.report = reportCell.querySelector("div").dataset.reportId;
	});

	console.log("Selected data:", selectedData);

	// Save data to sessionStorage
	sessionStorage.setItem("selectedData", JSON.stringify(selectedData));
}

document.addEventListener("DOMContentLoaded", function () {
	document.querySelectorAll(".country-row").forEach((row) => {
		row.addEventListener("click", function () {
			const countryId = this.getAttribute("data-country-id");

			fetch("get_AllFields.php?countryId=" + encodeURIComponent(countryId))
				.then((response) => response.json())
				.then((data) => {
					if (data.status === "success") {
						updateFieldData(data.data);
						clearSubsequentData("country"); // Clear site, well, wellbore, and report data
						highlightSelected("country", countryId);
						selectedCountryId = countryId;
					} else {
						console.error("Error:", data.message);
					}
				})
				.catch((error) => console.error("Error fetching fields:", error));
		});
	});

	document
		.querySelector("#reportTableBody")
		.addEventListener("click", function (event) {
			const target = event.target;

			if (target.closest(".field-data div")) {
				const fieldElement = target.closest(".field-data div");
				const fieldId = fieldElement.dataset.fieldId;
				if (fieldId) {
					fetch("get_AllSites.php?fieldId=" + encodeURIComponent(fieldId))
						.then((response) => response.json())
						.then((data) => {
							if (data.status === "success") {
								updateSiteData(data.data);
								clearSubsequentData("field"); // Clear well, wellbore, and report data
								highlightSelected("field", fieldId);
							} else {
								console.error("Error:", data.message);
							}
						})
						.catch((error) => console.error("Error fetching sites:", error));
				}
			}

			if (target.closest(".site-data div")) {
				const siteElement = target.closest(".site-data div");
				const siteId = siteElement.dataset.siteId;
				if (siteId) {
					fetch("get_AllWells.php?siteId=" + encodeURIComponent(siteId))
						.then((response) => response.json())
						.then((data) => {
							if (data.status === "success") {
								updateWellData(data.data);
								clearSubsequentData("site"); // Clear wellbore and report data
								highlightSelected("site", siteId);
							} else {
								console.error("Error:", data.message);
							}
						})
						.catch((error) => console.error("Error fetching wells:", error));
				}
			}

			if (target.closest(".well-data div")) {
				const wellElement = target.closest(".well-data div");
				const wellId = wellElement.dataset.wellId;
				if (wellId) {
					fetch("get_AllWellbores.php?wellId=" + encodeURIComponent(wellId))
						.then((response) => response.json())
						.then((data) => {
							if (data.status === "success") {
								updateWellboreData(data.data);
								clearSubsequentData("well"); // Clear report data
								highlightSelected("well", wellId);
							} else {
								console.error("Error:", data.message);
							}
						})
						.catch((error) =>
							console.error("Error fetching wellbores:", error)
						);
				}
			}

			if (target.closest(".wellbore-data div")) {
				const wellboreElement = target.closest(".wellbore-data div");
				const wellboreId = wellboreElement.dataset.wellboreId;
				if (wellboreId) {
					fetch(
						"get_report_data.php?wellboreId=" + encodeURIComponent(wellboreId)
					)
						.then((response) => response.json())
						.then((data) => {
							if (data.status === "success") {
								updateReportData(data.data);
								highlightSelected("wellbore", wellboreId);
							} else {
								console.error("Error:", data.message);
							}
						})
						.catch((error) =>
							console.error("Error fetching report data:", error)
						);
				}
			}
			if (target.closest(".report-data div")) {
				const reportElement = target.closest(".report-data div");
				const reportId = reportElement.dataset.reportId;
				if (reportId) {
					highlightSelected("report", reportId);
				}
			}
		});

	function clearSubsequentData(level) {
		const tbody = document.querySelector("#reportTableBody");
		const rows = tbody.querySelectorAll("tr");

		rows.forEach((row) => {
			switch (level) {
				case "country":
					row.querySelector(".site-data").innerHTML = "";
					row.querySelector(".well-data").innerHTML = "";
					row.querySelector(".wellbore-data").innerHTML = "";
					row.querySelector(".report-data").innerHTML = "";
					row.querySelector(".field-data").classList.remove("selected-cell");
					row.querySelector(".site-data").classList.remove("selected-cell");
					row.querySelector(".well-data").classList.remove("selected-cell");
					row.querySelector(".wellbore-data").classList.remove("selected-cell");
					row.querySelector(".report-data").classList.remove("selected-cell");
					break;
				case "field":
					row.querySelector(".well-data").innerHTML = "";
					row.querySelector(".wellbore-data").innerHTML = "";
					row.querySelector(".report-data").innerHTML = "";
					row.querySelector(".site-data").classList.remove("selected-cell");
					row.querySelector(".well-data").classList.remove("selected-cell");
					row.querySelector(".wellbore-data").classList.remove("selected-cell");
					row.querySelector(".report-data").classList.remove("selected-cell");
					break;
				case "site":
					row.querySelector(".wellbore-data").innerHTML = "";
					row.querySelector(".report-data").innerHTML = "";
					row.querySelector(".well-data").classList.remove("selected-cell");
					row.querySelector(".wellbore-data").classList.remove("selected-cell");
					row.querySelector(".report-data").classList.remove("selected-cell");
					break;
				case "well":
					row.querySelector(".report-data").innerHTML = "";
					row.querySelector(".wellbore-data").classList.remove("selected-cell");
					row.querySelector(".report-data").classList.remove("selected-cell");
					break;
			}
		});
	}

	function updateReportData(reports) {
		setRowCount(reports.length);

		const tbody = document.querySelector("#reportTableBody");
		const rows = tbody.querySelectorAll("tr");

		const reportMap = new Map(reports.map((report, index) => [index, report]));

		rows.forEach((row, index) => {
			const reportCell = row.querySelector(".report-data");

			if (reportCell) {
				reportCell.innerHTML = "";

				if (reportMap.has(index)) {
					const report = reportMap.get(index);
					const reportElement = document.createElement("div");
					reportElement.textContent = report.report_name;
					reportElement.dataset.reportId = report.report_id;

					// Create the pencil icon
					const icon = document.createElement("i");
					icon.classList.add("fa", "fa-pencil-alt"); // Using FontAwesome for the pencil icon
					icon.style.cursor = "pointer";
					icon.style.marginLeft = "10px"; // Add some space between text and icon
					icon.addEventListener("click", function () {
						const reportId = reportElement.dataset.reportId;
						const url = `http://localhost/Faz-Drill/report-header.php?reportId=${encodeURIComponent(
							reportId
						)}`;
						window.open(url, "_blank"); // Open in a new tab or window
					});

					// Create the pencil icon
					const icon2 = document.createElement("i");
					icon2.classList.add("fa", "fa-cat"); // Using FontAwesome for the pencil icon
					icon2.style.cursor = "pointer";
					icon2.style.marginLeft = "10px"; // Add some space between text and icon
					icon2.addEventListener("click", function () {
						const reportId = reportElement.dataset.reportId;
						const url = `http://localhost/Faz-Drill/report-viewer.php?reportId=${encodeURIComponent(
							reportId
						)}`;
						window.open(url, "_blank"); // Open in a new tab or window
					});

					// Append the report name and icon
					reportElement.appendChild(icon);
					reportElement.appendChild(icon2);
					reportCell.appendChild(reportElement);
				}
			}
		});
	}

	function updateWellboreData(wellbores) {
		setRowCount(wellbores.length);

		const tbody = document.querySelector("#reportTableBody");
		const rows = tbody.querySelectorAll("tr");

		const wellboreMap = new Map(
			wellbores.map((wellbore, index) => [index, wellbore])
		);

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
				}
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
		setRowCount(wells.length);

		const tbody = document.querySelector("#reportTableBody");
		const rows = tbody.querySelectorAll("tr");

		const wellMap = new Map(wells.map((well, index) => [index, well]));

		rows.forEach((row, index) => {
			const wellCell = row.querySelector(".well-data");

			if (wellCell) {
				wellCell.innerHTML = "";

				if (wellMap.has(index)) {
					const well = wellMap.get(index);
					const wellElement = document.createElement("div");
					wellElement.textContent = well.well_name;
					wellElement.dataset.wellId = well.well_id;
					wellCell.appendChild(wellElement);
				}
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

	function updateSiteData(sites) {
		setRowCount(sites.length);

		const tbody = document.querySelector("#reportTableBody");
		const rows = tbody.querySelectorAll("tr");

		const siteMap = new Map(sites.map((site, index) => [index, site]));

		rows.forEach((row, index) => {
			const siteCell = row.querySelector(".site-data");

			if (siteCell) {
				siteCell.innerHTML = "";

				if (siteMap.has(index)) {
					const site = siteMap.get(index);
					const siteElement = document.createElement("div");
					siteElement.textContent = site.site_name;
					siteElement.dataset.siteId = site.site_id;
					siteCell.appendChild(siteElement);
				}
			}
		});

		if (sites.length > rows.length) {
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
			for (let i = rows.length - 1; i >= sites.length; i--) {
				// tbody.removeChild(rows[i]);
			}
		}
	}

	function updateFieldData(fields) {
		setRowCount(fields.length);

		const tbody = document.querySelector("#reportTableBody");
		const rows = tbody.querySelectorAll("tr");

		const fieldMap = new Map(fields.map((field, index) => [index, field]));

		rows.forEach((row, index) => {
			const fieldCell = row.querySelector(".field-data");

			if (fieldCell) {
				fieldCell.innerHTML = "";

				if (fieldMap.has(index)) {
					const field = fieldMap.get(index);
					const fieldElement = document.createElement("div");
					fieldElement.textContent = field.field_name;
					fieldElement.dataset.fieldId = field.field_id;
					fieldCell.appendChild(fieldElement);
				}
			}
		});

		if (fields.length > rows.length) {
			for (let i = rows.length; i < fields.length; i++) {
				const newRow = document.createElement("tr");
				newRow.innerHTML = `
                    <td class="country-row"></td>
                    <td class="field-data">
                        <div data-field-id="${fields[i].field_id}">${fields[i].field_name}</div>
                    </td>
                    <td class="site-data"></td>
                    <td class="well-data"></td>
                    <td class="wellbore-data"></td>
                    <td class="report-data"></td>
                `;
				tbody.appendChild(newRow);
			}
		} else if (fields.length < rows.length) {
			for (let i = rows.length - 1; i >= fields.length; i--) {
				// tbody.removeChild(rows[i]);
			}
		}
	}
});
