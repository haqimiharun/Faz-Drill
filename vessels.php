<?php require_once('header.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Well Info Input</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f7f9fc;
            color: #333;
            padding: 20px;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            flex-direction: column;
        }

        .wrapper {
            display: flex;
            flex-direction: column; /* Stack rows vertically */
            gap: 25px; /* Space between rows */
            width: 100%;
            max-width: 1800px;
        }

        .row {
            display: flex;
            gap: 25px; /* Space between containers in a row */
            flex-wrap: wrap; /* Ensure wrapping on smaller screens */
        }

        .container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            padding: 25px;
            flex: 1;
            min-width: 350px;
            box-sizing: border-box;
        }

        .container h2 {
            margin-bottom: 30px;
            color: #42C3FC;
            text-align: center;
        }

        .table-custom {
    border-collapse: collapse;
    width: 100%;
}

.table-custom th, .table-custom td {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: center;
    font-size: 14px;
}

.table-custom th {
    background-color: #f4f6f8;
    color: #333;
    font-weight: bold;
}

.table-custom td {
    background-color: #ffffff;
}

.table-custom input[type="text"] {
    width: calc(100% - 10px);
    padding: 6px;
    border-radius: 4px;
    border: 1px solid #ddd;
    box-sizing: border-box;
}

.table-wrapper {
    overflow-x: auto;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    font-weight: bold;
    /* display: block; */
    margin-bottom: 5px;
}

.form-group input[type="text"],
.form-group input[type="number"],
.form-group select {
    width: calc(100% - 20px);
    padding: 8px;
    border-radius: 4px;
    border: 1px solid #ddd;
    box-sizing: border-box;
}

.personnel-group input[type="number"] {
    width: 100%;
    margin-bottom: 10px;
}

.form-group .checkbox-group,
.form-group .radio-group {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

.checkbox-group label,
.radio-group label {
    flex: 1;
    min-width: 120px;
}

.form-group input[type="checkbox"],
.form-group input[type="radio"] {
    margin-right: 5px;
}

    .btn-group {
    text-align: center;
    margin-top: 20px;
}

.btn-group button {
    padding: 10px 20px;
    background-color: #42C3FC;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

.btn-group button:hover {
    background-color: #005E88;
}

        @media (max-width: 768px) {
            body {
                padding: 10px;
            }

            .wrapper {
                flex-direction: column; /* Stack rows vertically on small screens */
            }

            .row {
                flex-direction: column; /* Stack containers vertically in each row on small screens */
            }

            .container {
                flex: 1 1 100%;
                min-width: 100%;
            }

    .table-wrapper {
        overflow-x: auto;
    }
    .table-custom {
        width: auto;
    }

        .add-row, .delete-row {
        border: none;
        background-color: #007bff;
        color: white;
        font-size: 16px;
        width: 24px;
        height: 24px;
        border-radius: 50%;
        text-align: center;
        line-height: 20px;
        cursor: pointer;
        margin-right: 5px;
    }

    .add-row {
            border: none;
            background-color: #007bff;
            color: white;
            font-size: 16px;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            text-align: center;
            line-height: 20px;
            cursor: pointer;
            margin-right: 5px;
        }

        .add-row:disabled {
            background-color: #cccccc;
            cursor: not-allowed;
        }

        .add-row:hover:enabled {
            opacity: 0.8;
        }
        }

    /* General styling for datetime-local input */
input[type="datetime-local"] {
    width: calc(100% - 20px);
    padding: 8px;
    border-radius: 4px;
    border: 1px solid #ddd;
    box-sizing: border-box;
    background-color: #ffffff;
    color: #333;
    font-size: 14px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

/* Hover effect */
input[type="datetime-local"]:hover {
    border-color: #42C3FC;
}

/* Focus effect */
input[type="datetime-local"]:focus {
    border-color: #42C3FC;
    outline: none;
    box-shadow: 0 0 5px rgba(66, 195, 252, 0.5);
}

/* Disabled state */
input[type="datetime-local"]:disabled {
    background-color: #f0f0f0;
    color: #999;
    border-color: #ddd;
    cursor: not-allowed;
}

/* Placeholder styling (not all browsers support this for datetime-local) */
input[type="datetime-local"]::placeholder {
    color: #999;
    opacity: 1; /* Ensures placeholder is visible */
}
    </style>
</head>
<body>
    <div class="wrapper">
            <h1 style="text-align: center;">Vessels</h1>
        <div class="row">

            <div class="container">
<form action="#" method="post">
    <div class="form-group">
        <label for="dship">Drillship</label>
        <div style="display: flex; align-items: center;">
            <select id="dship" name="dship">
                <option value="" disabled selected>Select Drillship</option>
                <option value="drillship1">Drillship 1</option>
                <option value="drillship1">Drillship 2</option>
            </select>
            <button type="button" class="add-btn" data-target="dship">Add New</button>
        </div>
    </div>

    <div class="form-group">
        <label for="ss_rig">Semi-Submersible Rig</label>
        <div style="display: flex; align-items: center;">
            <select id="ss_rig" name="ss_rig">
                <option value="" disabled selected>Select Semi-Submersible Rig</option>
                <option value="ss_rig1">Semi-Submersible Rig 1</option>
                <option value="ss_rig2">Semi-Submersible Rig 2</option>
            </select>
            <button type="button" class="add-btn" data-target="ss_rig">Add New</button>
        </div>
    </div>

    <div class="form-group">
        <label for="ju_rig">Jack-Up Rig</label>
        <div style="display: flex; align-items: center;">
            <select id="ju_rig" name="ju_rig">
                <option value="" disabled selected>Select Jack-Up Rig</option>
                <option value="ju_rig1">Jack-Up Rig 1</option>
                <option value="ju_rig2">Jack-Up Rig 2</option>
            </select>
            <button type="button" class="add-btn" data-target="ju_rig">Add New</button>
        </div>
    </div>

    <div class="form-group">
        <label for="psv">Platform Supply Vessel (PSV)</label>
        <div style="display: flex; align-items: center;">
            <select id="psv" name="psv">
                <option value="" disabled selected>Select Platform Supply Vessel</option>
                <option value="psv1">Platform Supply Vessel 1</option>
                <option value="psv2">Platform Supply Vessel 2</option>
            </select>
            <button type="button" class="add-btn" data-target="psv">Add New</button>
        </div>
    </div>

    <div class="form-group">
        <label for="ahts">Anchor Handling Tug Supply (AHTS) Vessel</label>
        <div style="display: flex; align-items: center;">
            <select id="ahts" name="ahts">
                <option value="" disabled selected>Select Anchor Handling Tug Supply Vessel</option>
                <option value="ahts1">Anchor Handling Tug Supply Vessel 1</option>
                <option value="ahts2">Anchor Handling Tug Supply Vessel 2</option>
            </select>
            <button type="button" class="add-btn" data-target="ahts">Add New</button>
        </div>
    </div>

    <div class="form-group">
        <label for="crew_boat">Crew Boat</label>
        <div style="display: flex; align-items: center;">
            <select id="crew_boat" name="crew_boat">
                <option value="" disabled selected>Select Crew Boat</option>
                <option value="crew_boat1">Crew Boat 1</option>
                <option value="crew_boat2">Crew Boat 2</option>
            </select>
            <button type="button" class="add-btn" data-target="crew_boat">Add New</button>
        </div>
    </div>

    <div class="form-group">
        <label for="wiv">Well Intervention Vessel​</label>
        <div style="display: flex; align-items: center;">
            <select id="wiv" name="wiv">
                <option value="" disabled selected>Select Well Intervention Vessel​</option>
                <option value="wiv1">Well Intervention Vessel​ 1</option>
                <option value="wiv2">Well Intervention Vessel​ 2</option>
            </select>
            <button type="button" class="add-btn" data-target="wiv">Add New</button>
        </div>
    </div>

    <div class="form-group">
        <label for="dsv">Diving Support Vessel (DSV)​</label>
        <div style="display: flex; align-items: center;">
            <select id="dsv" name="dsv">
                <option value="" disabled selected>Select Diving Support Vessel</option>
                <option value="dsv1">Diving Support Vessel 1</option>
                <option value="dsv2">Diving Support Vessel 2</option>
            </select>
            <button type="button" class="add-btn" data-target="dsv">Add New</button>
        </div>
    </div>
</form>
<!-- separater -->
</div>
    <div class="container">    
    <form action="#" method="post">
    <div class="form-group">
        <label for="csv">Construction Support Vessel (CSV)​</label>
        <div style="display: flex; align-items: center;">
            <select id="csv" name="csv">
                <option value="" disabled selected>Select Construction Support Vessel</option>
                <option value="csv1">Construction Support Vessel 1</option>
                <option value="csv2">Construction Support Vessel 2</option>
            </select>
            <button type="button" class="add-btn" data-target="csv">Add New</button>
        </div>
    </div>

    <div class="form-group">
        <label for="fpso">Floating Production Storage and Offloading (FPSO) Vessel​</label>
        <div style="display: flex; align-items: center;">
            <select id="fpso" name="fpso">
                <option value="" disabled selected>Select Floating Production Storage and Offloading Vessel​</option>
                <option value="fpso1">Floating Production Storage and Offloading Vessel 1</option>
                <option value="fpso2">Floating Production Storage and Offloading Vessel 2</option>
            </select>
            <button type="button" class="add-btn" data-target="fpso">Add New</button>
        </div>
    </div>

    <div class="form-group">
        <label for="osv">Offshore Support Vessel (OSV)​</label>
        <div style="display: flex; align-items: center;">
            <select id="osv" name="osv">
                <option value="" disabled selected>Select Offshore Support Vessel​</option>
                <option value="osv1">Offshore Support Vessel 1</option>
                <option value="osv2">Offshore Support Vessel 2</option>
            </select>
            <button type="button" class="add-btn" data-target="osv">Add New</button>
        </div>
    </div>

    <div class="form-group">
        <label for="standby_vessel">Standby Vessel</label>
        <div style="display: flex; align-items: center;">
            <select id="standby_vessel" name="standby_vessel">
                <option value="" disabled selected>Select Standby Vessel</option>
                <option value="standby_vessel1">Standby Vessel 1</option>
                <option value="standby_vessel2">Standby Vessel 2</option>
            </select>
            <button type="button" class="add-btn" data-target="standby_vessel">Add New</button>
        </div>
    </div>

    <div class="form-group">
        <label for="flotel">Flotel (Accommodation Vessel)</label>
        <div style="display: flex; align-items: center;">
            <select id="flotel" name="flotel">
                <option value="" disabled selected>Select Flotel</option>
                <option value="flotel1">Flotel 1</option>
                <option value="flotel2">Flotel 2</option>
            </select>
            <button type="button" class="add-btn" data-target="flotel">Add New</button>
        </div>
    </div>

    <div class="form-group">
        <label for="osrv">Oil Spill Response Vessel (OSRV)​</label>
        <div style="display: flex; align-items: center;">
            <select id="osrv" name="osrv">
                <option value="" disabled selected>Select Oil Spill Response Vessel</option>
                <option value="osrv1">Oil Spill Response Vessel 1</option>
                <option value="osrv2">Oil Spill Response Vessel 2</option>
            </select>
            <button type="button" class="add-btn" data-target="osrv">Add New</button>
        </div>
    </div>

    <div class="form-group">
        <label for="tanker">Tanker​</label>
        <div style="display: flex; align-items: center;">
            <select id="tanker" name="tanker">
                <option value="" disabled selected>Select Tanker​​</option>
                <option value="tanker1">Tanker​​ 1</option>
                <option value="tanker2">Tanker​​ 2</option>
            </select>
            <button type="button" class="add-btn" data-target="tanker">Add New</button>
        </div>
    </div>

    <div class="form-group">
        <label for="rescue_vessel">Rescue Vessel​</label>
        <div style="display: flex; align-items: center;">
            <select id="rescue_vessel" name="rescue_vessel">
                <option value="" disabled selected>Select Rescue Vessel</option>
                <option value="rescue_vessel1">Rescue Vessel 1</option>
                <option value="rescue_vessel2">Rescue Vessel 2</option>
            </select>
            <button type="button" class="add-btn" data-target="rescue_vessel">Add New</button>
        </div>
    </div>

            </div>
        </div>
                <div class="btn-group">
            <button type="submit">Submit</button>
        </div>
    </div>

</body>

<script>
    document.querySelectorAll('.add-btn').forEach(function(button) {
        button.addEventListener('click', function() {
            const targetId = this.getAttribute('data-target');
            const newValue = prompt("Enter new value:");
            if (newValue) {
                const select = document.getElementById(targetId);
                const option = document.createElement('option');
                option.value = newValue.toLowerCase().replace(/\s+/g, '');
                option.text = newValue;
                select.add(option);
                select.value = option.value;
            }
        });
    });
</script>

</html>
    <?php require_once('footer.php'); ?>

