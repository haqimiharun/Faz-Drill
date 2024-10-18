document.getElementById("shaker").addEventListener("click", function () {
	openPopup("shaker");
});
document.getElementById("centrifuge").addEventListener("click", function () {
	openPopup("centrifuge");
});
document.getElementById("hydrocyclone").addEventListener("click", function () {
	openPopup("hydrocyclone");
});
document.getElementById("LotFit").addEventListener("click", function () {
	openPopup("LotFit");
});
document.getElementById("formData").addEventListener("click", function () {
	openPopup("formData");
});
document.getElementById("supportCraft").addEventListener("click", function () {
	openPopup("supportCraft");
});
document.getElementById("bulks").addEventListener("click", function () {
	openPopup("bulks");
});
document.getElementById("weather").addEventListener("click", function () {
	openPopup("weather");
});
document.getElementById("safetyCards").addEventListener("click", function () {
	openPopup("safetyCards");
});
document.getElementById("personnel").addEventListener("click", function () {
	openPopup("personnel");
});
document.getElementById("anchorTension").addEventListener("click", function () {
	openPopup("anchorTension");
});
document.getElementById("safety").addEventListener("click", function () {
	openPopup("safety");
});
document.getElementById("surveys").addEventListener("click", function () {
	openPopup("surveys");
});

function openPopup(field) {
	// Open a new popup window (this URL will handle the popup content)
	let popupUrl = `../../View/reportViewer/reportViewerPopup.php?field=${field}&reportId=${reportId}`;
	window.open(popupUrl, "Popup", "width=800,height=600");
}
