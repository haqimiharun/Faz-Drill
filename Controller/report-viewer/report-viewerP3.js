//Bit Data
document.getElementById("AC").addEventListener("click", function (event) {
	// Check if the clicked element is not one of the exceptional divs
	if (
		!event.target.closest("#ACwell, #ACwellbore, #ACreportNo, #ACreportDate")
	) {
		openPopup("assemblyComp");
	}
});

//Gas Reading
document.getElementById("gasReadTitle").addEventListener("click", function () {
	openPopup("GasRead");
});
document.getElementById("gasRead").addEventListener("click", function () {
	openPopup("GasRead");
});
document.getElementById("gasRead1").addEventListener("click", function () {
	openPopup("GasRead");
});
document.getElementById("gasRead2").addEventListener("click", function () {
	openPopup("GasRead");
});
document.getElementById("gasRead3").addEventListener("click", function () {
	openPopup("GasRead");
});
document.getElementById("gasRead4").addEventListener("click", function () {
	openPopup("GasRead");
});
document.getElementById("gasRead5").addEventListener("click", function () {
	openPopup("GasRead");
});
document.getElementById("gasRead6").addEventListener("click", function () {
	openPopup("GasRead");
});

//Mud Volume
document.getElementById("gas_mud").addEventListener("click", function (event) {
	// Check if the clicked element is not one of the exceptional divs
	if (
		!event.target.closest(
			"#gasReadTitle, #gasRead, #gasRead1, #gasRead2,#gasRead3, #gasRead4, #gasRead5, #gasRead6"
		)
	) {
		openPopup("MudVol");
	}
});

//Pump/Hydraulics
document
	.getElementById("pumpHydraulicTitle")
	.addEventListener("click", function () {
		openPopup("pumpHydraulic");
	});
document.getElementById("pumpHydraulic").addEventListener("click", function () {
	openPopup("pumpHydraulic");
});

//PipeData
document.getElementById("pipeDataTitle").addEventListener("click", function () {
	openPopup("PipeData");
});
document.getElementById("pipeData").addEventListener("click", function () {
	openPopup("PipeData");
});

//annVelo
document.getElementById("annVeloTitle").addEventListener("click", function () {
	openPopup("annVelo");
});
document.getElementById("annVelo").addEventListener("click", function () {
	openPopup("annVelo");
});

function openPopup(field) {
	// Open a new popup window (this URL will handle the popup content)
	let popupUrl = `../../View/reportViewer/reportViewerPopup.php?field=${field}`;
	window.open(popupUrl, "Popup", "width=400,height=400");
}
