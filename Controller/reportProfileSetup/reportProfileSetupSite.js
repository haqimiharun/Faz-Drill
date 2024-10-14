// Function to toggle visibility
function toggleVisibility() {
	const geoCoorDD_site = document.getElementById("geoCoorDD_site");
	const geoCoorDMS_site = document.getElementById("geoCoorDMS_site");
	const ddRadio_site = document.getElementById("dd_site");
	const dmsRadio_site = document.getElementById("dms_site");

	// Debugging statements to check if elements are found
	console.log("Checking visibility...");

	if (ddRadio_site) {
		console.log("ddRadio detected:", ddRadio_site);
	} else {
		console.error("ddRadio NOT detected");
	}

	if (dmsRadio_site) {
		console.log("dmsRadio detected:", dmsRadio_site);
	} else {
		console.error("dmsRadio NOT detected");
	}

	if (geoCoorDD_site) {
		console.log("geoCoorDD detected:", geoCoorDD_site);
	} else {
		console.error("geoCoorDD NOT detected");
	}

	if (geoCoorDMS_site) {
		console.log("geoCoorDMS detected:", geoCoorDMS_site);
	} else {
		console.error("geoCoorDMS NOT detected");
	}

	// Only proceed if all required elements are found
	if (!ddRadio_site || !dmsRadio_site || !geoCoorDD_site || !geoCoorDMS_site) {
		console.error("One or more elements are not found.");
		return; // Exit the function if any elements are missing
	}

	// Proceed with toggling visibility
	console.log("Toggling visibility...");

	if (ddRadio_site.checked) {
		geoCoorDD_site.style.display = "block";
		geoCoorDMS_site.style.display = "none";
		console.log("Showing DD coordinates.");
	} else if (dmsRadio_site.checked) {
		geoCoorDD_site.style.display = "none";
		geoCoorDMS_site.style.display = "block";
		console.log("Showing DMS coordinates.");
	}
}

// Call toggleVisibility() immediately to set the initial state
toggleVisibility(); // Initial toggle to set the default state
const ddRadio_site = document.getElementById("dd_site");
const dmsRadio_site = document.getElementById("dms_site");
// Additional logging for radio buttons
if (ddRadio_site) {
	console.log("ddRadio event listener added.");
	ddRadio_site.addEventListener("change", function () {
		console.log("ddRadio changed");
		toggleVisibility();
	});
} else {
	console.error("ddRadio element not found, cannot add event listener.");
}

if (dmsRadio_site) {
	console.log("dmsRadio event listener added.");
	dmsRadio_site.addEventListener("change", function () {
		console.log("dmsRadio_site changed");
		toggleVisibility();
	});
} else {
	console.error("dmsRadio_site element not found, cannot add event listener.");
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
