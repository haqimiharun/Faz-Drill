document.addEventListener("DOMContentLoaded", () => {
	const wi_eventDesc = document.getElementById("wi_eventDesc");
	const wi_waterDepth = document.getElementById("wi_waterDepth");
	const wi_region = document.getElementById("wi_region");
	const wi_rigName = document.getElementById("wi_rigName");
	const wi_Obj_value = document.getElementById("wi_Obj_value");
	const platform_value = document.getElementById("wi_field-platform_value");
	const wi_AFE_No_value = document.getElementById("wi_AFE_No_value");
	const wi_Start_date_value = document.getElementById("wi_Start_date_value");
	const wi_Spud_date_value = document.getElementById("wi_Spud_date_value");
	const wi_End_date_value = document.getElementById("wi_End_date_value");
	const wi_block = document.getElementById("wi_block");
	const wi_leadDS = document.getElementById("wi_leadDS");
	const wi_NightDS = document.getElementById("wi_NightDS");
	const wi_engName = document.getElementById("wi_engName");

	function getReportIdFromUrl() {
		const params = new URLSearchParams(window.location.search);
		return params.get("reportId"); // This retrieves the reportId parameter
	}

	async function fetchDataFromDatabase() {
		const reportId = getReportIdFromUrl(); // Get dynamic report ID
		console.log("Retrieved reportId:", reportId); // Log the retrieved reportId

		// Check if reportId is not present
		if (!reportId) {
			console.error("No reportId found in the URL.");
			return; // Exit the function if no reportId is found
		}

		const url = `http://localhost/Faz-Drill/Model/reportViewerDatabase/wellData/get_well_info.php?report_id=${reportId}`;
		console.log("Fetching data from:", url); // Log the URL for debugging

		try {
			const response = await fetch(url);
			if (!response.ok) {
				throw new Error(`HTTP error! Status: ${response.status}`);
			}
			const data = await response.json();
			if (data.error) {
				console.error("Error fetching data:", data.error);
			} else {
				// Populate fields with fetched data
				console.log("Fetched data:", data);

				if (wi_eventDesc)
					wi_eventDesc.textContent = `Event Description: ${data.event_desc}`;
				if (wi_waterDepth)
					wi_waterDepth.textContent = `Water Depth: ${data.well_waterdepth}`;
				if (wi_region) wi_region.textContent = `Region: ${data.region_name}`;
				if (wi_rigName) wi_rigName.textContent = `Rig Name: ${data.rig_name2}`;
				if (wi_Obj_value) wi_Obj_value.textContent = data.well_obj;
				if (platform_value) platform_value.textContent = data.well_platform;
				if (wi_AFE_No_value) wi_AFE_No_value.textContent = data.well_afeno;
				if (wi_Start_date_value)
					wi_Start_date_value.textContent = data.well_startdate;
				if (wi_Spud_date_value)
					wi_Spud_date_value.textContent = data.well_spuddate;
				if (wi_End_date_value)
					wi_End_date_value.textContent = data.well_enddate;
				if (wi_block) wi_block.textContent = `Block: ${data.block_name}`;
				if (wi_leadDS) wi_leadDS.textContent = `Lead DS: ${data.well_leadds}`;
				if (wi_NightDS)
					wi_NightDS.textContent = `Night DS: ${data.well_nightds}`;
				if (wi_engName)
					wi_engName.textContent = `Engineer: ${data.well_engineer}`;
			}
		} catch (error) {
			console.error("Fetch Error:", error);
		}
	}

	// Call fetchDataFromDatabase on page load
	fetchDataFromDatabase();
});
