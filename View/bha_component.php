<link rel="stylesheet" href="css/report_info/bha_com.css">

<div class="wrapper-bc">
    <div class="container-bc">
        <form>
            <h2>Assembly Components</h2>

            <div class="form-group-bc">
                <!-- Component Type -->
                <label for="component-type">Component Type:</label>
                <select id="component-type" name="component-type">
                    <option value="" disabled selected>Select Component Type</option>
                    <!-- Add options here -->
                </select>

                <!-- No. of Joint -->
                <label for="joint-no">No. of Joint:</label>
                <input type="number" id="joint-no" name="joint-no">

                <!-- Length -->
                <label for="length">Length:</label>
                <input type="number" id="length" name="length">

                <!-- OD -->
                <label for="od">OD (Diameter):</label>
                <input type="number" id="od" name="od">

                <!-- ID -->
                <label for="id">ID (Diameter):</label>
                <input type="number" id="id" name="id">

                <!-- Connection (OD | Name) -->
                <label for="connection">Connection (OD | Name):</label>
                <input type="text" id="connection" name="connection">

                <!-- Weight -->
                <label for="weight">Weight:</label>
                <input type="number" id="weight" name="weight">

                <!-- Grade -->
                <label for="grade">Grade:</label>
                <input type="text" id="grade" name="grade">

                <!-- Pin Box -->
                <label for="pin-box">Pin Box:</label>
                <input type="text" id="pin-box" name="pin-box">

                <!-- Serial No -->
                <label for="serial-no">Serial No:</label>
                <input type="text" id="serial-no" name="serial-no">

                <!-- Left or Right Spiral -->
                <label for="spiral">Left or Right Spiral:</label>
                <input type="text" id="spiral" name="spiral">

                <!-- Fish Neck (Length | OD) -->
                <label for="fish-neck">Fish Neck (Length | OD):</label>
                <input type="text" id="fish-neck" name="fish-neck">
            </div>
        </form>
    </div>
</div>
