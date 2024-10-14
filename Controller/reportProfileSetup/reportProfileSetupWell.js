// Function to toggle visibility
function toggleVisibility() {
	const geoCoorDD_well = document.getElementById("geoCoorDD_well");
	const geoCoorDMS_well = document.getElementById("geoCoorDMS_well");
	const ddRadio_well = document.getElementById("dd_well");
	const dmsRadio_well = document.getElementById("dms_well");

	// Debugging statements to check if elements are found
	console.log("Checking visibility...");

	if (ddRadio_well) {
		console.log("ddRadio detected:", ddRadio_well);
	} else {
		console.error("ddRadio NOT detected");
	}

	if (dmsRadio_well) {
		console.log("dmsRadio detected:", dmsRadio_well);
	} else {
		console.error("dmsRadio NOT detected");
	}

	if (geoCoorDD_well) {
		console.log("geoCoorDD detected:", geoCoorDD_well);
	} else {
		console.error("geoCoorDD NOT detected");
	}

	if (geoCoorDMS_well) {
		console.log("geoCoorDMS detected:", geoCoorDMS_well);
	} else {
		console.error("geoCoorDMS NOT detected");
	}

	// Only proceed if all required elements are found
	if (!ddRadio_well || !dmsRadio_well || !geoCoorDD_well || !geoCoorDMS_well) {
		console.error("One or more elements are not found.");
		return; // Exit the function if any elements are missing
	}

	// Proceed with toggling visibility
	console.log("Toggling visibility...");

	if (ddRadio_well.checked) {
		geoCoorDD_well.style.display = "block";
		geoCoorDMS_well.style.display = "none";
		console.log("Showing DD coordinates.");
	} else if (dmsRadio_well.checked) {
		geoCoorDD_well.style.display = "none";
		geoCoorDMS_well.style.display = "block";
		console.log("Showing DMS coordinates.");
	}
}

// Call toggleVisibility() immediately to set the initial state
toggleVisibility(); // Initial toggle to set the default state
const ddRadio_well = document.getElementById("dd_well");
const dmsRadio_well = document.getElementById("dms_well");
// Additional logging for radio buttons
if (ddRadio_well) {
	console.log("ddRadio event listener added.");
	ddRadio_well.addEventListener("change", function () {
		console.log("ddRadio changed");
		toggleVisibility();
	});
} else {
	console.error("ddRadio element not found, cannot add event listener.");
}

if (dmsRadio_well) {
	console.log("dmsRadio event listener added.");
	dmsRadio_well.addEventListener("change", function () {
		console.log("dmsRadio_well changed");
		toggleVisibility();
	});
} else {
	console.error("dmsRadio_well element not found, cannot add event listener.");
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

	let map; // Declare map as a global variable

	// Function to initialize the map (only if not already initialized)
	function initializeMap() {
		if (!map) {
			// Check if map has already been initialized
			map = L.map("map").setView([4.2105, 101.9758], 5); // Set view to Malaysia

			// Add a tile layer to the map
			L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
				maxZoom: 19,
				attribution: "© OpenStreetMap",
			}).addTo(map);

			// Add a marker to the map
			const marker = L.marker([4.2105, 101.9758]).addTo(map);
			marker.bindPopup("<b>Hello!</b><br>This is a marker.").openPopup();

			console.log("Map initialized.");
		} else {
			console.log("Map is already initialized.");
		}
	}

	// Function to load the Leaflet script and then initialize the map
	function loadLeafletAndInitializeMap() {
		loadScript("https://unpkg.com/leaflet/dist/leaflet.js", function () {
			console.log("Leaflet script loaded.");
			initializeMap(); // Call the function to initialize the map
		});
	}

	// Call this function wherever you need to load the map
	loadLeafletAndInitializeMap();
});
