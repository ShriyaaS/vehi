
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Room : Insert Vehicle</title>
    <style>
            body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            /*background-image: url("wp5055258.jpg");*/
            background-size: cover;
            filter: blur(2px);
        }

        body {
            margin: 0;
        }

        .main-contents {
            margin-top: 100px;
            padding: 0px 70px;
            display: flex;
            justify-content: space-between;
        }

        .form-container {
            display: flex;
            flex-direction: column;
            align-items: center; /* Center the form content horizontally */
            justify-content: center; /* Center the form content vertically */
            height: 100%;
        }
        .menu {
            font-family: Arial, Helvetica, sans-serif;
            font-weight: 200;
            width: 100%;
            height: 80px;
            background-color: white;
            display: flex;
            overflow: hidden;
            padding-left: 100px;
            color: #000;
            position: fixed;
            top: 0;
            transition: top 0.3s;
            z-index: 3;
        }

        .menu ul {
            display: flex;
            align-items: center;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .menu ul li {
            margin: 0 20px;
        }

        .menu ul li a {
            text-decoration: none;
            color: #000;
            padding: 5px 12px;
            letter-spacing: 2px;
            font-size: 16px;
        }

        .menu ul li a:hover,
        .menu ul li a:active {
            background-color: #99ccff;
            height: 50px;
            border-radius: 30px;
            transition: 0.4s;
        }

        .left-region,
        .right-region {
            margin-bottom: 5px; /* Adjust the margin to minimize the distance */
            flex: 1;
            margin-top: 100px;
            margin-bottom: 20px;

            padding: 0px 70px;
            justify-content: space-between;
            display: flex;
            width: 300px;
            background-color: white;
            border-radius: 10px;
            flex-direction: column;
            align-items: center;
            font-family: Arial, Helvetica, sans-serif;
        }
        .right-region p {
            margin-bottom: 5px; /* Adjust the margin to minimize the distance */
        }

        .centered-content {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        .sidebar_vf {
            font-family: Arial, Helvetica, sans-serif;
            width: 300px;
            background-color: white;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .sidebar_vf h3 {
            font-weight: bold;
            font-family: 'Dancing Script', cursive;
            border: 2px solid white;
            text-align: center;
            padding: 15px;
            margin: 0;
            border-radius: 10px 10px 0px 0px;
            background-color: black;
            color: white;
        }

        .sidebar_vf form {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            width: 100%; /* Make the form full width */
        }

        .sidebar_vf form div {
            margin-bottom: 20px;
        }

        .sidebar_vf form p {
            margin: 0;
        }

        .input-field {
            height: 15px;
            width: calc(100% - 10px);
            border: 2px solid black;
            border-radius: 5px;
            padding: 5px;
        }

        .btn-submit {
            height: 20px;
            width: 65px;
            background-color: rgb(230, 230, 230);
            border-radius: 5px;
            text-align: center;
            position: relative;
            margin: 0 auto; /* Add this line to center the button horizontally */
            display: block; /* Ensure it's a block-level element for margin: 0 auto; to work */
        }

        #sidebar-title-vehicles-filter {
            text-align: center;
            margin: 0;
            position: absolute;
            left: 40%;
            transform: translateX(-50%);
            width: 500px; /* Adjust the width if needed */
        }

        .copyright {
            width: 100%;
            background-color: white;
            margin-top: 25px;
            font-family: Arial, Helvetica, sans-serif;
            font-weight: 200;
            height: 120px;
            text-align: center;
            padding: 10px;
        }


        .remove-vehicle-section {
            font-family: Arial, Helvetica, sans-serif;
            width: 300px;
            background-color: bla;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            align-items:flex-end;
            right:50%;

        }

        .remove-vehicle-section h3 {
            font-weight: bold;
            font-family: 'Dancing Script', cursive;
            border: 2px solid white;
            text-align: center;
            padding: 15px;
            margin: 0;
            border-radius: 10px 10px 0px 0px;
            background-color: black;
            color: white;
        }

        .remove-vehicle-section form {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            width: 60%; /* Make the form full width */
        }
        .main-contents {
            margin-top: 100px;
            padding: 0px 70px;
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>
<body>
    <div class="menu">
        <ul>
            <img style="width:90px; height:50px; margin-right: 35px;" src="Vehicle_image.png">
            <li><a href="index.html">Home</a></li>
            <li><a href="billings.html">Billings</a></li>
            <li><a href="admin.html">Admin</a></li>
        </ul>
    </div>
    <div class="main-contents">
        <div class="left-region">
            <div class="sidebar_vf">
                <h3 id="sidebar-title-vehicles-filter">Insert Vehicle</h3>
                <br><br><br><br>
                <form action="" method="post">
                    <div>
                        <p><b>Vehicle ID:</b></p>
                        <input type="number" id="vehicle_id" name="vehicle_id" class="input-field" placeholder="Ex. 123456" required>
                    </div>
                    <div>
                        <p><b>Name:</b></p>
                        <input type="text" id="name" name="name" class="input-field" required>
                    </div>
                    <div>
                        <p><b>Type:</b></p>
                        <input type="text" id="type" name="type" class="input-field" required>
                    </div>
                    <div>
                        <p><b>Amount:</b></p>
                        <input type="number" id="amount" name="amount" class="input-field" required>
                    </div>
                    <div>
                        <p><b>Model:</b></p>
                        <input type="text" id="model" name="model" class="input-field" required>
                    </div>
            </div>
        </div>
        <div class="right-region"><br><br><br><br>
            <div>
                <p><b>Mileage:</b></p>
                <input type="number" id="mileage" name="mileage" class="input-field" required>
            </div>
            <div>
                <p><b>CC:</b></p>
                <input type="number" id="cc" name="cc" class="input-field" required>
            </div>
            <div>
                <p><b>Status:</b></p>
                <input type="text" id="status" name="status" class="input-field" required>
            </div>
            <div>
                <p><b>Fuel Capacity:</b></p>
                <input type="number" id="fuel_capacity" name="fuel_capacity" class="input-field" required>
            </div>
            <div>
                <p><b>Color:</b></p>
                <input type="text" id="color" name="color" class="input-field" required>
            </div><br>
            <div style="text-align:center;">

                <input type="submit" value="Insert" class="btn-submit">
            </div>
        </div>
    </form>
<!-- Add a new section for removing a vehicle -->
<div class="remove-vehicle-section">
    <h3>Remove Vehicle</h3>
    <form action="remove_vehicle.php" method="post">
        <div>
            <p><b>Vehicle ID:</b></p>
            <input type="number" id="remove_vehicle_id" name="remove_vehicle_id" class="input-field" placeholder="Enter Vehicle ID" required>
        </div><br><br>
        <div>
            <input type="submit" value="Remove" class="btn-submit">
        </div>
    </form>
</div>

    </div>
    <div class="copyright">
        <p>Copyright 1999-2023 by Volta Data. All Rights Reserved.<br>Volta is Powered by Honda</p>
    </div>
</body>
</html>

<?php
$username = "your_username";
$password = "your_password";
$database = "your_database";

// Retrieve form data
$vehicle_id = $_POST['vehicle_id'];
$name = $_POST['name'];
$type = $_POST['type'];
$amount = $_POST['amount'];
$model = $_POST['model'];
$mileage = $_POST['mileage'];
$cc = $_POST['cc'];
$status = $_POST['status'];
$fuel_capacity = $_POST['fuel_capacity'];
$color = $_POST['color'];

// Connect to Oracle database
$c = oci_connect($username, $password, $database);

// Check connection
if (!$c) {
    $m = oci_error();
    trigger_error('Could not connect to database: ' . $m['message'], E_USER_ERROR);
}

// Insert values into the "vehicle" table
$query = "INSERT INTO vehicle(vehicle_id, name, type, amount, model, mileage, cc, status, fuel_capacity_L, color)
          VALUES (:vehicle_id, :name, :type, :amount, :model, :mileage, :cc, :status, :fuel_capacity, :color)";
$stid = oci_parse($c, $query);

oci_bind_by_name($stid, ':vehicle_id', $vehicle_id);
oci_bind_by_name($stid, ':name', $name);
oci_bind_by_name($stid, ':type', $type);
oci_bind_by_name($stid, ':amount', $amount);
oci_bind_by_name($stid, ':model', $model);
oci_bind_by_name($stid, ':mileage', $mileage);
oci_bind_by_name($stid, ':cc', $cc);
oci_bind_by_name($stid, ':status', $status);
oci_bind_by_name($stid, ':fuel_capacity', $fuel_capacity);
oci_bind_by_name($stid, ':color', $color);

// Execute the statement
$res = oci_execute($stid);

if ($res) {
    echo "Data inserted successfully.";
} else {
    $m = oci_error($stid);
    echo "Error: " . $m['message'];
}

// Close the Oracle connection
oci_free_statement($stid);
oci_close($c);
?>

