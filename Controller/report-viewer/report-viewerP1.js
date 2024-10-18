// Get the reportId from the current URL
const urlParams = new URLSearchParams(window.location.search);
const reportId = urlParams.get("reportId"); // Extract reportId from the URL

// Well Information
document.getElementById("wellInfo").addEventListener("click", function () {
	openPopup("wellInfo", reportId);
});
document.getElementById("wi_eventDesc").addEventListener("click", function () {
	openPopup("wellInfo", reportId);
});
document.getElementById("wi_waterDepth").addEventListener("click", function () {
	openPopup("wellInfo", reportId);
});
document.getElementById("wi_region").addEventListener("click", function () {
	openPopup("wellInfo", reportId);
});
document.getElementById("wi_rigName").addEventListener("click", function () {
	openPopup("wellInfo", reportId);
});
document.getElementById("sixItem").addEventListener("click", function () {
	openPopup("wellInfo", reportId);
});
document.getElementById("well_Info").addEventListener("click", function () {
	openPopup("wellInfo", reportId);
});
document.getElementById("wi_block").addEventListener("click", function () {
	openPopup("wellInfo", reportId);
});
document.getElementById("wi_leadDS").addEventListener("click", function () {
	openPopup("wellInfo", reportId);
});
document.getElementById("wi_NightDS").addEventListener("click", function () {
	openPopup("wellInfo", reportId);
});
document.getElementById("wi_engName").addEventListener("click", function () {
	openPopup("wellInfo", reportId);
});

// Depth Day
document.getElementById("depthDays").addEventListener("click", function () {
	openPopup("depthDay", reportId);
});
document.getElementById("dol").addEventListener("click", function () {
	openPopup("depthDay", reportId);
});
document.getElementById("md").addEventListener("click", function () {
	openPopup("depthDay", reportId);
});
document.getElementById("rttingHrs").addEventListener("click", function () {
	openPopup("depthDay", reportId);
});
document.getElementById("lastCasing").addEventListener("click", function () {
	openPopup("depthDay", reportId);
});
document.getElementById("dfs").addEventListener("click", function () {
	openPopup("depthDay", reportId);
});
document.getElementById("tvd").addEventListener("click", function () {
	openPopup("depthDay", reportId);
});
document.getElementById("cumRotHrs").addEventListener("click", function () {
	openPopup("depthDay", reportId);
});
document.getElementById("lastHoleSize").addEventListener("click", function () {
	openPopup("depthDay", reportId);
});
document.getElementById("ttlDays").addEventListener("click", function () {
	openPopup("depthDay", reportId);
});
document.getElementById("progress").addEventListener("click", function () {
	openPopup("depthDay", reportId);
});
document.getElementById("avgROP").addEventListener("click", function () {
	openPopup("depthDay", reportId);
});
document.getElementById("lastShoeTMD").addEventListener("click", function () {
	openPopup("depthDay", reportId);
});
document.getElementById("estDays").addEventListener("click", function () {
	openPopup("depthDay", reportId);
});
document.getElementById("finalTMD").addEventListener("click", function () {
	openPopup("depthDay", reportId);
});
document.getElementById("blnk1").addEventListener("click", function () {
	openPopup("depthDay", reportId);
});
document.getElementById("lastShoeTVD").addEventListener("click", function () {
	openPopup("depthDay", reportId);
});
document.getElementById("dailyNPT").addEventListener("click", function () {
	openPopup("depthDay", reportId);
});
document.getElementById("cummNPT").addEventListener("click", function () {
	openPopup("depthDay", reportId);
});
document.getElementById("blnk2").addEventListener("click", function () {
	openPopup("depthDay", reportId);
});
document.getElementById("curnHoleSize").addEventListener("click", function () {
	openPopup("depthDay", reportId);
});

// Cost Information
document.getElementById("Cost").addEventListener("click", function () {
	openPopup("costInfo", reportId);
});
document.getElementById("dailyCost").addEventListener("click", function () {
	openPopup("costInfo", reportId);
});
document.getElementById("cummCost").addEventListener("click", function () {
	openPopup("costInfo", reportId);
});
document.getElementById("AFECost").addEventListener("click", function () {
	openPopup("costInfo", reportId);
});
document.getElementById("suppCost").addEventListener("click", function () {
	openPopup("costInfo", reportId);
});
document.getElementById("expenditure").addEventListener("click", function () {
	openPopup("costInfo", reportId);
});

// Status Information
document.getElementById("well_Info3").addEventListener("click", function () {
	openPopup("status", reportId);
});
document.getElementById("statusttl").addEventListener("click", function () {
	openPopup("status", reportId);
});

// Operation Summary
document.getElementById("operationSum").addEventListener("click", function () {
	openPopup("operationSum", reportId);
});
document.getElementById("operationSum2").addEventListener("click", function () {
	openPopup("operationSum", reportId);
});

function openPopup(field) {
	// Get the reportId from the current URL
	const urlParams = new URLSearchParams(window.location.search);
	const reportId = urlParams.get("reportId"); // Extract reportId from the URL

	// Check if reportId is valid
	if (!reportId) {
		console.error("Report ID not found in URL.");
		alert("Error: Report ID is required to proceed.");
		return; // Exit the function if reportId is missing
	}

	// Open a new popup window with the field and reportId parameters
	const popupUrl = `../../View/reportViewer/reportViewerPopup.php?field=${field}&reportId=${reportId}`;
	window.open(popupUrl, "Popup", "width=800,height=600");
}
