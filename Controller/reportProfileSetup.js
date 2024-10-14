// Function to toggle visibility
function toggleVisibility() {
	const ddRadio = document.getElementById("dd");
	const dmsRadio = document.getElementById("dms");
	const geoCoorDD = document.getElementById("geoCoorDD");
	const geoCoorDMS = document.getElementById("geoCoorDMS");

	// Debugging statements to check if elements are found
	console.log("Checking visibility...");

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
	if (!ddRadio || !dmsRadio || !geoCoorDD || !geoCoorDMS) {
		console.error("One or more elements are not found.");
		return; // Exit the function if any elements are missing
	}

	// Proceed with toggling visibility
	console.log("Toggling visibility...");

	if (ddRadio.checked) {
		geoCoorDD.style.display = "block";
		geoCoorDMS.style.display = "none";
		console.log("Showing DD coordinates.");
	} else if (dmsRadio.checked) {
		geoCoorDD.style.display = "none";
		geoCoorDMS.style.display = "block";
		console.log("Showing DMS coordinates.");
	}
}

// Call toggleVisibility() immediately to set the initial state
toggleVisibility(); // Initial toggle to set the default state

const ddRadio = document.getElementById("dd");
const dmsRadio = document.getElementById("dms");

// Additional logging for radio buttons
if (ddRadio) {
	console.log("ddRadio event listener added.");
	ddRadio.addEventListener("change", function () {
		console.log("ddRadio changed");
		toggleVisibility();
	});
} else {
	console.error("ddRadio element not found, cannot add event listener.");
}

if (dmsRadio) {
	console.log("dmsRadio event listener added.");
	dmsRadio.addEventListener("change", function () {
		console.log("dmsRadio changed");
		toggleVisibility();
	});
} else {
	console.error("dmsRadio element not found, cannot add event listener.");
}

function loadScript(src, callback) {
	let script = document.createElement("script");
	script.src = src;
	script.async = true;

	script.onload = function () {
		console.log(`${src} loaded successfully.`);
		if (callback) callback();
	};

	script.onerror = function () {
		console.error(`Error loading script: ${src}`);
	};

	document.head.appendChild(script);
}

// Load any necessary scripts after content is loaded
loadScript("https://unpkg.com/leaflet/dist/leaflet.js", function () {
	console.log("Map script loaded and executed.");
	if (typeof setupFunction === "function") {
		setupFunction();
	}

	// Initialize the map
	const map = L.map("map").setView([51.505, -0.09], 13); // Set the initial view [latitude, longitude], zoom level

	// Add a tile layer to the map (this is the visual representation of the map)
	L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
		maxZoom: 19,
		attribution: "© OpenStreetMap",
	}).addTo(map);

	// Add a marker to the map
	const marker = L.marker([51.5, -0.09]).addTo(map); // Set marker position
	marker.bindPopup("<b>Hello!</b><br>This is a marker.").openPopup(); // Popup text

	// Optional: Add more markers or layers as needed
});
