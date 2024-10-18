//Bit Data
document.getElementById("bitData").addEventListener("click", function () {
	openPopup("bitData");
});

//Mud Check
document.getElementById("mudCheck1").addEventListener("click", function () {
	openPopup("mudCheck");
});
document.getElementById("mudCheck2").addEventListener("click", function () {
	openPopup("mudCheck");
});

//BHA
document.getElementById("bha_part").addEventListener("click", function () {
	openPopup("BHA");
});

function openPopup(field) {
	// Open a new popup window (this URL will handle the popup content)
	let popupUrl = `../../View/reportViewer/reportViewerPopup.php?field=${field}&reportId=${reportId}`;
	window.open(popupUrl, "Popup", "width=800,height=600");
}
