document.addEventListener("DOMContentLoaded", function () {
	// Add click event listeners to country rows
	document.querySelectorAll(".country-row").forEach(function (row) {
		row.addEventListener("click", function () {
			const countryId = this.getAttribute("data-country-id");

			fetch("get_fields.php?countryId=" + encodeURIComponent(countryId))
				.then((response) => response.json())
				.then((data) => {
					if (data.status === "success") {
						updateFieldData(data.data);
					} else {
						console.error("Error:", data.message);
					}
				})
				.catch((error) => console.error("Error fetching fields:", error));
		});
	});

	// Delegate click events for field, site, well, wellbore, and report data
	document
		.querySelector("#reportTableBody")
		.addEventListener("click", function (event) {
			const target = event.target;

			// Click on field-data
			if (target.closest(".field-data div")) {
				const fieldElement = target.closest(".field-data div");
				const fieldId = fieldElement.dataset.fieldId;
				if (fieldId) {
					fetch("get_sites.php?fieldId=" + encodeURIComponent(fieldId))
						.then((response) => response.json())
						.then((data) => {
							if (data.status === "success") {
								updateSiteData(data.data);
							} else {
								console.error("Error:", data.message);
							}
						})
						.catch((error) => console.error("Error fetching sites:", error));
				}
			}

			// Click on site-data
			if (target.closest(".site-data div")) {
				const siteElement = target.closest(".site-data div");
				const siteId = siteElement.dataset.siteId;
				if (siteId) {
					fetch("get_wells.php?siteId=" + encodeURIComponent(siteId))
						.then((response) => response.json())
						.then((data) => {
							if (data.status === "success") {
								updateWellData(data.data);
							} else {
								console.error("Error:", data.message);
							}
						})
						.catch((error) => console.error("Error fetching wells:", error));
				}
			}

			// Click on well-data
			if (target.closest(".well-data div")) {
				const wellElement = target.closest(".well-data div");
				const wellId = wellElement.dataset.wellId;
				if (wellId) {
					fetch("get_wellbores.php?wellId=" + encodeURIComponent(wellId))
						.then((response) => response.json())
						.then((data) => {
							if (data.status === "success") {
								updateWellboreData(data.data);
							} else {
								console.error("Error:", data.message);
							}
						})
						.catch((error) =>
							console.error("Error fetching wellbores:", error)
						);
				}
			}

			// Click on wellbore-data
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
							} else {
								console.error("Error:", data.message);
							}
						})
						.catch((error) =>
							console.error("Error fetching report data:", error)
						);
				}
			}
		});

	// Update functions
	function updateReportData(reports) {
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
					reportCell.appendChild(reportElement);
				}
			}
		});

		if (reports.length > rows.length) {
			for (let i = rows.length; i < reports.length; i++) {
				const newRow = document.createElement("tr");
				newRow.innerHTML = `
                    <td class="country-row"></td>
                    <td class="field-data"></td>
                    <td class="site-data"></td>
                    <td class="well-data"></td>
                    <td class="wellbore-data"></td>
                    <td class="report-data">
                        <div data-report-id="${reports[i].report_id}">${reports[i].report_name}</div>
                    </td>
                `;
				tbody.appendChild(newRow);
			}
		} else if (reports.length < rows.length) {
			for (let i = rows.length - 1; i >= reports.length; i--) {
				// tbody.removeChild(rows[i]);
			}
		}
	}

	function updateWellboreData(wellbores) {
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
