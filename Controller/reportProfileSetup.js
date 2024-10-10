// Function to toggle visibility
function toggleVisibility() {
	const ddRadio = document.getElementById("dd");
	const dmsRadio = document.getElementById("dms");
	const geoCoorDD = document.getElementById("geoCoorDD");
	const geoCoorDMS = document.getElementById("geoCoorDMS");

	// Debugging statements to check if elements are found
	if (ddRadio) {
		console.log("ddRadio detected:", ddRadio);
	} else {
		console.error("ddRadio NOT detected");
	}

	if (dmsRadio) {
		console.log("dmsRadio detected:", dmsRadio);
	} else {
		console.error("dmsRadio NOT detected");
	}

	if (geoCoorDD) {
		console.log("geoCoorDD detected:", geoCoorDD);
	} else {
		console.error("geoCoorDD NOT detected");
	}

	if (geoCoorDMS) {
		console.log("geoCoorDMS detected:", geoCoorDMS);
	} else {
		console.error("geoCoorDMS NOT detected");
	}

	// Only proceed if all required elements are found
	if (!dmsRadio || !geoCoorDD || !geoCoorDMS) {
		console.error("One or more elements are not found.");
		return; // Exit the function if any elements are missing
	}

	// Proceed with toggling visibility
	console.log("Toggling visibility...");

	if (ddRadio.checked) {
		geoCoorDD.style.display = "block";
		geoCoorDMS.style.display = "none";
		console.log("Showing DD coordinates.");
	} else {
		geoCoorDD.style.display = "none";
		geoCoorDMS.style.display = "block";
		console.log("Showing DMS coordinates.");
	}
}

// Set default visibility on page load
document.addEventListener("DOMContentLoaded", function () {
	console.log("DOM fully loaded and parsed.");
	toggleVisibility(); // Initial toggle to set the default state

	const ddRadio = document.getElementById("dd");
	const dmsRadio = document.getElementById("dms");

	// Additional logging for radio buttons
	if (ddRadio) {
		console.log("ddRadio event listener added.");
		ddRadio.addEventListener("change", toggleVisibility);
	} else {
		console.error("ddRadio element not found, cannot add event listener.");
	}

	if (dmsRadio) {
		console.log("dmsRadio event listener added.");
		dmsRadio.addEventListener("change", toggleVisibility);
	} else {
		console.error("dmsRadio element not found, cannot add event listener.");
	}
});
