// Initialize the Leaflet map
document.addEventListener("DOMContentLoaded", function () {
	// Initialize the map
	var map = L.map("map").setView([37.7749, -122.4194], 10); // Set initial coordinates

	// Add a tile layer
	L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
		maxZoom: 19,
	}).addTo(map);

	// Function to update the map based on Northing and Easting
	function updateMap() {
		const easting = parseFloat(document.getElementById("EastingLoc").value);
		const northing = parseFloat(document.getElementById("NorthingLoc").value);

		// Validate user input
		if (!isNaN(easting) && !isNaN(northing)) {
			// Convert Easting/Northing to Latitude/Longitude
			const latLng = utmToLatLng(easting, northing); // Implement this conversion
			map.setView(latLng, 10); // Set map view to new coordinates
			L.marker(latLng).addTo(map); // Add a marker to the new location
		} else {
			alert("Please enter valid coordinates.");
		}
	}

	// Function to convert UTM to Latitude/Longitude
	function utmToLatLng(easting, northing) {
		// Define the projection (you need to replace 'EPSG:XXXX' with your UTM zone)
		const utmProjection = "+proj=utm +zone=33 +datum=WGS84 +units=m +no_defs"; // Example for UTM zone 33N
		const latLng = proj4(utmProjection, [easting, northing]);
		return [latLng[1], latLng[0]]; // Return [latitude, longitude]
	}

	// Add event listeners to update map when coordinates change
	document.getElementById("EastingLoc").addEventListener("change", updateMap);
	document.getElementById("NorthingLoc").addEventListener("change", updateMap);
});

// Function to toggle visibility
function toggleVisibility() {
	const ddRadio = document.getElementById("dd");
	const dmsRadio = document.getElementById("dms");
	const geoCoorDD = document.getElementById("geoCoorDD");
	const geoCoorDMS = document.getElementById("geoCoorDMS");

	console.log(ddRadio, dmsRadio, geoCoorDD, geoCoorDMS); // Debugging statement to check if elements are found

	if (!dmsRadio || !geoCoorDD || !geoCoorDMS) {
		console.error("One or more elements are not found.");
		return; // Exit the function if any elements are missing
	}

	dmsRadio.style.display = "block";
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
	toggleVisibility(); // Initial toggle to set the default state
	const ddRadio = document.getElementById("dd");
	const dmsRadio = document.getElementById("dms");

	// Add event listeners for radio buttons
	ddRadio.addEventListener("change", toggleVisibility);
	dmsRadio.addEventListener("change", toggleVisibility);
});
