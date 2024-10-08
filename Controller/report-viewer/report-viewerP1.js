//Well Information
document.getElementById("wellInfo").addEventListener("click", function () {
	openPopup("wellInfo");
});
document.getElementById("eventDesc").addEventListener("click", function () {
	openPopup("wellInfo");
});
document.getElementById("waterDepth").addEventListener("click", function () {
	openPopup("wellInfo");
});
document.getElementById("region").addEventListener("click", function () {
	openPopup("wellInfo");
});
document.getElementById("rigName").addEventListener("click", function () {
	openPopup("wellInfo");
});
document.getElementById("sixItem").addEventListener("click", function () {
	openPopup("wellInfo");
});
document.getElementById("well_Info").addEventListener("click", function () {
	openPopup("wellInfo");
});
document.getElementById("block").addEventListener("click", function () {
	openPopup("wellInfo");
});
document.getElementById("leadDS").addEventListener("click", function () {
	openPopup("wellInfo");
});
document.getElementById("NightDS").addEventListener("click", function () {
	openPopup("wellInfo");
});
document.getElementById("engName").addEventListener("click", function () {
	openPopup("wellInfo");
});

//Depth Day
document.getElementById("depthDays").addEventListener("click", function () {
	openPopup("depthDay");
});
document.getElementById("dol").addEventListener("click", function () {
	openPopup("depthDay");
});
document.getElementById("md").addEventListener("click", function () {
	openPopup("depthDay");
});
document.getElementById("rttingHrs").addEventListener("click", function () {
	openPopup("depthDay");
});
document.getElementById("lastCasing").addEventListener("click", function () {
	openPopup("depthDay");
});
document.getElementById("dfs").addEventListener("click", function () {
	openPopup("depthDay");
});
document.getElementById("tvd").addEventListener("click", function () {
	openPopup("depthDay");
});
document.getElementById("cumRotHrs").addEventListener("click", function () {
	openPopup("depthDay");
});
document.getElementById("lastHoleSize").addEventListener("click", function () {
	openPopup("depthDay");
});
document.getElementById("ttlDays").addEventListener("click", function () {
	openPopup("depthDay");
});
document.getElementById("progress").addEventListener("click", function () {
	openPopup("depthDay");
});
document.getElementById("avgROP").addEventListener("click", function () {
	openPopup("depthDay");
});
document.getElementById("lastShoeTMD").addEventListener("click", function () {
	openPopup("depthDay");
});
document.getElementById("estDays").addEventListener("click", function () {
	openPopup("depthDay");
});
document.getElementById("finalTMD").addEventListener("click", function () {
	openPopup("depthDay");
});
document.getElementById("blnk1").addEventListener("click", function () {
	openPopup("depthDay");
});
document.getElementById("lastShoeTVD").addEventListener("click", function () {
	openPopup("depthDay");
});
document.getElementById("dailyNPT").addEventListener("click", function () {
	openPopup("depthDay");
});
document.getElementById("cummNPT").addEventListener("click", function () {
	openPopup("depthDay");
});
document.getElementById("blnk2").addEventListener("click", function () {
	openPopup("depthDay");
});
document.getElementById("curnHoleSize").addEventListener("click", function () {
	openPopup("depthDay");
});

//Cost Information
document.getElementById("Cost").addEventListener("click", function () {
	openPopup("costInfo");
});
document.getElementById("dailyCost").addEventListener("click", function () {
	openPopup("costInfo");
});
document.getElementById("cummCost").addEventListener("click", function () {
	openPopup("costInfo");
});
document.getElementById("AFECost").addEventListener("click", function () {
	openPopup("costInfo");
});
document.getElementById("suppCost").addEventListener("click", function () {
	openPopup("costInfo");
});
document.getElementById("expenditure").addEventListener("click", function () {
	openPopup("costInfo");
});

//Status Information
document.getElementById("well_Info3").addEventListener("click", function () {
	openPopup("status");
});
document.getElementById("statusttl").addEventListener("click", function () {
	openPopup("status");
});

//Operation Summary
document.getElementById("operationSum").addEventListener("click", function () {
	openPopup("operationSum");
});
document.getElementById("operationSum2").addEventListener("click", function () {
	openPopup("operationSum");
});

function openPopup(field) {
	// Open a new popup window (this URL will handle the popup content)
	let popupUrl = `../../View/reportViewer/reportViewerPopup.php?field=${field}`;
	window.open(popupUrl, "Popup", "width=400,height=400");
}
