<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Country</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
        <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            margin: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-footer {
            margin-top: 20px;
        }
        .sbs {
            display: grid;
            grid-template-columns: 1fr 1fr;
        }
        #map {
            height: 300px; /* Increased height for better visibility */
            width: 96%; /* Make the map fill the width */
            border: 1px solid #ccc; /* Optional: Add a border for better visibility */
        }
    </style>
</head>
<body>

    <!-- Content of add_country.php -->
    <form id="countryForm" action="" method="POST">
         <div class="form-group">
        <label for="countrySelect">Select Country</label>
        <select id="countrySelect" name="countryId" required>
            <option value="">Select a Country</option>
            <!-- Country options will be populated by AJAX -->
        </select>
        <!-- Hidden dropdown for adding a new country -->
        <div id="newCountryDropdown" style="display: none;">
            <select id="newCountrySelect" name="newCountryId">
                <option value="addNewCountry">Select a Country</option>
                <!-- New country options will be populated by AJAX -->
            </select>
        </div>
    </div>
        <div class="form-group">
            <h5 for="countrySetting">COUNTRY INITIAL SETTINGS</h5>
            <label>
                <input type="radio" name="mapSystemType" value="mapSystemCountry" required checked> Map System
            </label>
            <label>
                <input type="radio" name="mapSystemType" value="EPSGcodeCountry"> EPSG Code
            </label>
        </div>
        <div class="sbs">
            <div class="sbs2">
                <div class="form-group">
                    <label for="locEPSG">Location EPSG code</label>
                    <select type="text" id="locEPSGCountry" name="locEPSG"></select>
                </div>
                <div class="form-group">
                    <label for="mapSys">Map System</label>
                    <select type="text" id="mapSysCountry" name="mapSys"></select>
                </div>
                <div class="form-group">
                    <label for="Datum">Datum</label>
                    <select type="text" id="DatumCountry" name="Datum"></select>
                </div>
                <div class="form-group">
                    <label for="Location">Location</label>
                    <select type="text" id="LocationCountry" name="Location"></select>
                </div>
            </div>
            <div class="sbs2">
                <div class="form-group">
                    <div id="map"></div> <!-- Map will be rendered here -->
                </div>
            </div>
        </div>
        <div class="form-footer">
            <button type="submit" class="btn btn-primary">Add Country</button>
        </div>
    </form>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        // Initialize the Leaflet map
        var map = L.map('map').setView([37.7749, -122.4194], 10); // Set your desired coordinates

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        // Add a marker to the map
        L.marker([37.7749, -122.4194]).addTo(map)
            .bindPopup('San Francisco')
            .openPopup();
    </script>
</body>
</html>
