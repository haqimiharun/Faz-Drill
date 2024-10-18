// Function to toggle input fields based on the selected map system
function toggleMapSystem() {
	epsgRadioField = document.querySelector(
		'input[name="mapSystemType"][value="EPSGcodeField"]'
	);
	mapSystemRadioField = document.querySelector(
		'input[name="mapSystemType"][value="mapSystemField"]'
	);

	locEPSGField = document.getElementById("locEPSGField");
	mapSysField = document.getElementById("mapSysField");
	DatumField = document.getElementById("DatumField");
	LocationField = document.getElementById("LocationField");

	// Debugging to check if the radio buttons and input fields are found
	if (
		!epsgRadioField ||
		!mapSystemRadioField ||
		!locEPSGField ||
		!mapSysField ||
		!DatumField ||
		!LocationField
	) {
		console.error("One or more elements are missing.");
		return;
	}

	// Toggle functionality based on the selected radio button
	if (epsgRadioField.checked) {
		locEPSGField.disabled = false;
		mapSysField.disabled = true;
		DatumField.disabled = true;
		LocationField.disabled = true;
		console.log("EPSG Code selected. Only Location EPSG Code is enabled.");
	} else if (mapSystemRadioField.checked) {
		locEPSGField.disabled = true;
		mapSysField.disabled = false;
		DatumField.disabled = false;
		LocationField.disabled = false;
		console.log(
			"Map System selected. All other fields except Location EPSG Code are enabled."
		);
	}
}

// Call the function immediately to set the initial state
toggleMapSystem();

// Add event listeners for the radio buttons
epsgRadioField = document.querySelector(
	'input[name="mapSystemType"][value="EPSGcodeField"]'
);
mapSystemRadioField = document.querySelector(
	'input[name="mapSystemType"][value="mapSystemField"]'
);

if (epsgRadioField) {
	epsgRadioField.addEventListener("change", toggleMapSystem);
} else {
	console.error("EPSG Code radio button not found.");
}

if (mapSystemRadioField) {
	mapSystemRadioField.addEventListener("change", toggleMapSystem);
} else {
	console.error("Map System radio button not found.");
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
