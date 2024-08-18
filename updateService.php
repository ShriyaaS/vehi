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
            background-image: url("wp5055258.jpg");
            background-size: cover;
            filter: blur(8px);
        }

        .main-contents {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            margin-top: 100px;
            padding: 0px 20px;
            height: 1800px;
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

        .menu ul li a:hover {
            background-color: #99ccff;
            height: 50px;
            border-radius: 30px;
            transition: 0.4s;
        }

        .menu ul li a:active {
            background-color: black;
            /*background-color: #0080ff;*/
            height: 50px;
            border-radius: 30px;
            transition: 0.4s;
        }


        .sidebar_vf{
            font-family: Arial, Helvetica, sans-serif;   
            width: 352px;
            justify-content: center;
            align-items: center;
            background-color: white;
            border-radius: 10px;
        }

        .sidebar_vf div{
            margin: 20px;
        }

        .sidebar_vf h3 {
            font-weight: bold; 
            font-family: 'Dancing Script', cursive;
            border: 2px solid white;
        }

        .sidebar_vf #sidebar-title{
            color: white;
            padding: 15px;
            text-align: center; 
            width: 237px;
            height: 25px;
            margin: 0px;
            display: block;
            border-radius:10px 10px 0px 0px ;
            background-color: black;
        }

        .sidebar_vf #sidebar-title-vehicles-filter{
            color: white;
            padding: 15px;
            text-align: center; 
            width: 320px;
            height: 25px;
            margin: 0px;
            display: block;
            border-radius:10px 10px 0px 0px ;
            background-color: black;
            border: 2px solid white;
        }

        #designation{
            width: 265px;
            padding: 5px;
            border-radius:5px 0px 0px 5px;
            border: 2px solid black;
        }

        .copyright{
            width: 100%;
            background-color: white;
            margin-top: 25px;   
            font-family: Arial, Helvetica, sans-serif;   
            font-weight: 200;
            height: 120px;
            text-align: center;
            padding: 10px;
        }
    </style>
</head>

<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');

    $username = "system";
    $password = "aravinth583#";
    $database = "localhost/XE";

    $c = oci_connect($username, $password, $database);
    $id = $_GET['updateid'];
    //$id = 14003001;

    $query1 = "SELECT * FROM MYSERVICE WHERE ser_id = $id";
    $eq = oci_parse($c, $query1);

    $result = oci_execute($eq);
    $row = oci_fetch_array($eq, OCI_ASSOC + OCI_RETURN_NULLS);
    //echo "Row :".$row;

    if ($row) {
        $fullname = $row['NAME'];
        $name = explode(",", $fullname);
        $n = implode(" ", $name);
        if($row['DOD'] != NULL){
            $dod = $row['DOD'];
        }
    }

    $squery = "SELECT LISTAGG(SER_TYPE, ', ') AS concatenated_service_types FROM MYSERVICETYPE WHERE SER_ID = $id";
    $eq = oci_parse($c, $squery);

    $result = oci_execute($eq);
    $row = oci_fetch_array($eq, OCI_ASSOC + OCI_RETURN_NULLS);

    $stypes = $row['CONCATENATED_SERVICE_TYPES'];

    $sTypeArray = explode(", ", $stypes);


    $rquery = "SELECT LISTAGG(M.NAME, ', ') WITHIN GROUP (ORDER BY M.NAME) AS concatenated_names
    FROM MYREPAIREDPART M JOIN MYSERVICEREPAIREDPART M1 ON M.REP_PART_ID = M1.REP_PART_ID
    WHERE M1.SER_ID = $id";
    $eq = oci_parse($c, $rquery);

    $result = oci_execute($eq);
    $row = oci_fetch_array($eq, OCI_ASSOC + OCI_RETURN_NULLS);

    $names = $row['CONCATENATED_NAMES'];

    echo $names;

    $rNameArray = explode(", ", $names);


    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $type = $_POST['service_type'];
        $DOD = $_POST['deliveryDate'];
        $repParts = $_POST['repairPart'];
        //echo implode(',', $repParts);

        $servicePrices = array(
            'oilChange' => 500,
            'tireRotation' => 300,
            'brakeService' => 700,
            'chainMaintenance' => 400,
            'sparkPlugReplacement' => 600,
            'batteryCheck' => 200,
            'full-service' => 1000,
            'painting' => 800,
            'engineTuneUp' => 550,
            'coolantFlush' => 450,
            'brakePadReplacement' => 750,
            'headlightAdjustment' => 300,
            'wheelAlignment' => 600,
            'fuelSystemCleaning' => 350,
            'exhaustSystemInspection' => 400,
            'suspensionCheck' => 500,
            'airFilterReplacement' => 250,
            'engineDiagnostic' => 700,
            'chainAdjustment' => 300,
            'coolingSystemFlush' => 650,
            'electricalSystemCheck' => 400,
            'clutchAdjustment' => 550,
            'throttleBodyCleaning' => 300,
            'engineOilFlush' => 450,
            'ignitionSystemCheck' => 500,
            'wheelBearingReplacement' => 600,
            'carburetorCleaning' => 350,
            'forkSealReplacement' => 400
        );
        $totalAmount = 0;
        //Loop to find total amount for the selected services
        foreach($type as $selectedService) {
            if (isset($servicePrices[$selectedService])){
                $totalAmount += $servicePrices[$selectedService];
            }
        }

        $query1 = "UPDATE MYSERVICE SET NAME = '$name', DOD = TO_DATE('$DOD', 'YYYY-MM-DD'), AMOUNT = $totalAmount WHERE SER_ID = $id";
        //echo $query;
        $s = oci_parse($c, $query1);
        $r = oci_execute($s);

        
        $query2 = "DELETE FROM MYSERVICETYPE WHERE SER_ID = $id";
        $s = oci_parse($c, $query2);
        $r = oci_execute($s);
        foreach($type as $selectedService) {
            $query2 = "INSERT INTO MYSERVICETYPE VALUES('$selectedService', $id)";
            /*Service Type*/
            $s = oci_parse($c, $query2);

            echo "<div style='background-color: white;'>";
            if (!$s) {
                echo "<div style='background-color: white;'>";
                echo $query;
                $m = oci_error($c);
                trigger_error('Could not parse statement: ' . $m['message'], E_USER_ERROR);
                echo "</div>";
            } else {
                $r = oci_execute($s);
                if (!$r) {
                    echo $query2;
                    $m = oci_error($s);
                    trigger_error('Could not execute statement: ' . $m['message'], E_USER_ERROR);
                }
            }
        }

        $query3 = "DELETE FROM MYSERVICEREPAIREDPART WHERE SER_ID =  $id";
        echo $query3;
        $s = oci_parse($c, $query3);
        $r = oci_execute($s);

        foreach($repParts as $part) {
            //This is for getting the id of the selected repaired part from the myrepairedpart table
            $querypartid = "SELECT REP_PART_ID FROM MYREPAIREDPART WHERE NAME = '$part'";
            $stmtpartid = oci_parse($c, $querypartid);
            oci_execute($stmtpartid);
            $rowpartid = oci_fetch_assoc($stmtpartid);
            if ($rowpartid !== false) {
                $partid = $rowpartid['REP_PART_ID'];
            } else {
                echo "Part ID not found.";
            }

            //This is the actual Query
            $query3 = "INSERT INTO MYSERVICEREPAIREDPART VALUES($id, $partid)";
            $s = oci_parse($c, $query3);

            echo "<div style='background-color: white;'>";
            if (!$s) {
                echo "<div style='background-color: white;'>";
                $m = oci_error($c);
                trigger_error('Could not parse statement: ' . $m['message'], E_USER_ERROR);
                echo "</div>";
            } else {
                $r = oci_execute($s);
                if (!$r) {
                    echo $query3;
                    $m = oci_error($s);
                    trigger_error('Could not execute statement: ' . $m['message'], E_USER_ERROR);
                }
            }
        }
        if($r){
            echo "<script> alert('Service Updated Successfully'); </script>";
        }


    }
?>

<body>
    <div class="menu">
        <ul>
            <img style="width:90px; height:50px; margin-right: 35px;" src="Vehicle_image.png">
            <li><a href="index.html">Home</a></li>
            <li><a href="billings.php">Billings</a></li>
            <li><a href="admin.html">Admin</a></li>
        </ul>
    </div>
    <div class="main-contents">
        <div class="sidebar_vf" >
            <h3 id="sidebar-title-vehicles-filter">To Update a Service</h3>
            <form action="" method="post">

                    <div>
                        <p><b>Customer Name</b></p>
                        <input type="text" id="name" name="name" style="height: 20px; width: 255px;  border-radius: 3px; padding: 5px;" placeholder="Ex. Antony Doss" value="<?php echo $n;?>"required/><hr>
                    </div>

                <div>
                    <p><b>Service Type</b></p>
                    <select id="service_type" name="service_type[]" style="height: 120px; width: 265px;  border-radius: 5px; padding: 8px; border: 2px solid black;" multiple>   
                        <option value="oilChange" <?php echo (in_array('oilChange', $sTypeArray)) ? 'selected' : ''; ?>>Oil Change</option>
                        <option value="tireRotation" <?php echo (in_array('tireRotation', $sTypeArray)) ? 'selected' : ''; ?>>Tire Rotation</option>
                        <option value="brakeService" <?php echo (in_array('brakeService', $sTypeArray)) ? 'selected' : ''; ?>>Brake Service</option>
                        <option value="chainMaintenance" <?php echo (in_array('chainMaintenance', $sTypeArray)) ? 'selected' : ''; ?>>Chain Maintenance</option>
                        <option value="sparkPlugReplacement" <?php echo (in_array('sparkPlugReplacement', $sTypeArray)) ? 'selected' : ''; ?>>Spark Plug Replacement</option>
                        <option value="batteryCheck" <?php echo (in_array('batteryCheck', $sTypeArray)) ? 'selected' : ''; ?>>Battery Check</option>
                        <option value="Full-Service" <?php echo (in_array('Full-Service', $sTypeArray)) ? 'selected' : ''; ?>>Full-Service</option>
                        <option value="painting" <?php echo (in_array('painting', $sTypeArray)) ? 'selected' : ''; ?>>Painting</option>
                        <option value="engineTuneUp" <?php echo (in_array('engineTuneUp', $sTypeArray)) ? 'selected' : ''; ?>>Engine Tune-Up</option>
                        <option value="coolantFlush" <?php echo (in_array('coolantFlush', $sTypeArray)) ? 'selected' : ''; ?>>Coolant Flush</option>
                        <option value="brakePadReplacement" <?php echo (in_array('brakePadReplacement', $sTypeArray)) ? 'selected' : ''; ?>>Brake Pad Replacement</option>
                        <option value="headlightAdjustment" <?php echo (in_array('headlightAdjustment', $sTypeArray)) ? 'selected' : ''; ?>>Headlight Adjustment</option>
                        <option value="wheelAlignment" <?php echo (in_array('wheelAlignment', $sTypeArray)) ? 'selected' : ''; ?>>Wheel Alignment</option>
                        <option value="fuelSystemCleaning" <?php echo (in_array('fuelSystemCleaning', $sTypeArray)) ? 'selected' : ''; ?>>Fuel System Cleaning</option>
                        <option value="exhaustSystemInspection" <?php echo (in_array('exhaustSystemInspection', $sTypeArray)) ? 'selected' : ''; ?>>Exhaust System Inspection</option>
                        <option value="suspensionCheck" <?php echo (in_array('suspensionCheck', $sTypeArray)) ? 'selected' : ''; ?>>Suspension Check</option>
                        <option value="airFilterReplacement" <?php echo (in_array('airFilterReplacement', $sTypeArray)) ? 'selected' : ''; ?>>Air Filter Replacement</option>
                        <option value="engineDiagnostic" <?php echo (in_array('engineDiagnostic', $sTypeArray)) ? 'selected' : ''; ?>>Engine Diagnostic</option>
                        <option value="chainAdjustment" <?php echo (in_array('chainAdjustment', $sTypeArray)) ? 'selected' : ''; ?>>Chain Adjustment</option>
                        <option value="coolingSystemFlush" <?php echo (in_array('coolingSystemFlush', $sTypeArray)) ? 'selected' : ''; ?>>Cooling System Flush</option>
                        <option value="electricalSystemCheck" <?php echo (in_array('electricalSystemCheck', $sTypeArray)) ? 'selected' : ''; ?>>Electrical System Check</option>
                        <option value="clutchAdjustment" <?php echo (in_array('clutchAdjustment', $sTypeArray)) ? 'selected' : ''; ?>>Clutch Adjustment</option>
                        <option value="throttleBodyCleaning" <?php echo (in_array('throttleBodyCleaning', $sTypeArray)) ? 'selected' : ''; ?>>Throttle Body Cleaning</option>
                        <option value="engineOilFlush" <?php echo (in_array('engineOilFlush', $sTypeArray)) ? 'selected' : ''; ?>>Engine Oil Flush</option>
                        <option value="ignitionSystemCheck" <?php echo (in_array('ignitionSystemCheck', $sTypeArray)) ? 'selected' : ''; ?>>Ignition System Check</option>
                        <option value="wheelBearingReplacement" <?php echo (in_array('wheelBearingReplacement', $sTypeArray)) ? 'selected' : ''; ?>>Wheel Bearing Replacement</option>
                        <option value="carburetorCleaning" <?php echo (in_array('carburetorCleaning', $sTypeArray)) ? 'selected' : ''; ?>>Carburetor Cleaning</option>
                        <option value="forkSealReplacement" <?php echo (in_array('forkSealReplacement', $sTypeArray)) ? 'selected' : ''; ?>>Fork Seal Replacement</option>
                    </select>
                    <hr>
                </div>

                <div>
                    <p><b>Delivery Date</b></p>
                    <input type="date" id="deliveryDate" name="deliveryDate" style="height: 20px; width: 255px;  border-radius: 3px; padding: 5px;" value="<?php echo date('Y-m-d', strtotime($dod)); ?>">
                    <hr>
                </div>

                <div>
                    <p><b>Repaired Parts</b></p>
                    <div>
                    <label for="repairPart"><b>1. Engine Components</b></label><br>
                    <select id="repairPart" name="repairPart[]" style="height: 150px; width: 265px;  border-radius: 5px; padding: 5px; border: 2px solid black; margin-top: 5px;" multiple>
                        <option value="engine" <?php echo (in_array('engine', $rNameArray)) ? 'selected' : ''; ?>>Engine</option>
                        <option value="piston" <?php echo (in_array('piston', $rNameArray)) ? 'selected' : ''; ?>>Piston</option>
                        <option value="crankshaft" <?php echo (in_array('crankshaft', $rNameArray)) ? 'selected' : ''; ?>>Crankshaft</option>
                        <option value="cylinderHead" <?php echo (in_array('cylinderHead', $rNameArray)) ? 'selected' : ''; ?>>Cylinder Head</option>
                        <option value="timingBelt" <?php echo (in_array('timingBelt', $rNameArray)) ? 'selected' : ''; ?>>Timing Belt</option>
                        <option value="fuelInjector" <?php echo (in_array('fuelInjector', $rNameArray)) ? 'selected' : ''; ?>>Fuel Injector</option>
                        <option value="waterPump" <?php echo (in_array('waterPump', $rNameArray)) ? 'selected' : ''; ?>>Water Pump</option>
                        <option value="alternator" <?php echo (in_array('alternator', $rNameArray)) ? 'selected' : ''; ?>>Alternator</option>
                    </select><br>
                    </div>

                    <div>
                    <label for="repairPart"><b>2. Braking System</b></label><br>
                    <select id="repairPart" name="repairPart[]" style="height: 115px; width: 265px;  border-radius: 5px; padding: 5px; border: 2px solid black; margin-top: 5px;" multiple>
                        <option value="brakePads" <?php echo (in_array('brakePads', $rNameArray)) ? 'selected' : ''; ?>>Brake Pads</option>
                        <option value="brakeRotors" <?php echo (in_array('brakeRotors', $rNameArray)) ? 'selected' : ''; ?>>Brake Rotors</option>
                        <option value="calipers" <?php echo (in_array('calipers', $rNameArray)) ? 'selected' : ''; ?>>Calipers</option>
                        <option value="brakeMasterCylinder" <?php echo (in_array('brakeMasterCylinder', $rNameArray)) ? 'selected' : ''; ?>>Brake Master Cylinder</option>
                        <option value="brakeLines" <?php echo (in_array('brakeLines', $rNameArray)) ? 'selected' : ''; ?>>Brake Lines</option>
                        <option value="ABSModule" <?php echo (in_array('ABSModule', $rNameArray)) ? 'selected' : ''; ?>>ABS Module</option>
   
                    </select><br>
                    </div>

                    <div>
                    <label for="repairPartsDropdown"><b>3. Suspension System</b></label><br>
                    <select id="repairPartsDropdown" name="repairPart[]" style="height: 115px; width: 265px;  border-radius: 5px; padding: 5px; border: 2px solid black; margin-top: 5px;" multiple>
                        <option value="shockAbsorbers" <?php echo (in_array('shockAbsorbers', $rNameArray)) ? 'selected' : ''; ?>>Shock Absorbers</option>
                        <option value="struts" <?php echo (in_array('struts', $rNameArray)) ? 'selected' : ''; ?>>Struts</option>
                        <option value="controlArms" <?php echo (in_array('controlArms', $rNameArray)) ? 'selected' : ''; ?>>Control Arms</option>
                        <option value="ballJoints" <?php echo (in_array('ballJoints', $rNameArray)) ? 'selected' : ''; ?>>Ball Joints</option>
                        <option value="suspensionBushings" <?php echo (in_array('suspensionBushings', $rNameArray)) ? 'selected' : ''; ?>>Suspension Bushings</option>
                        <option value="swayBarLinks" <?php echo (in_array('swayBarLinks', $rNameArray)) ? 'selected' : ''; ?>>Sway Bar Links</option>
                    </select><br>
                    </div>

                    <div>
                    <label for="repairPart"><b>4. Exhaust System</b></label><br>
                    <select id="repairPart" name="repairPart[]" style="height: 100px; width: 265px;  border-radius: 5px; padding: 5px; border: 2px solid black; margin-top: 5px;" multiple>
                        <option value="exhaustPipe" <?php echo (in_array('exhaustPipe', $rNameArray)) ? 'selected' : ''; ?>>Exhaust Pipe</option>
                        <option value="muffler" <?php echo (in_array('muffler', $rNameArray)) ? 'selected' : ''; ?>>Muffler</option>
                        <option value="catalyticConverter" <?php echo (in_array('catalyticConverter', $rNameArray)) ? 'selected' : ''; ?>>Catalytic Converter</option>
                        <option value="exhaustManifold" <?php echo (in_array('exhaustManifold', $rNameArray)) ? 'selected' : ''; ?>>Exhaust Manifold</option>
                        <option value="oxygenSensor" <?php echo (in_array('oxygenSensor', $rNameArray)) ? 'selected' : ''; ?>>Oxygen Sensor</option>

                    </select><br>
                    </div>


                    <div>
                    <label for="fuelSystem"><b>5. Fuel System</b></label><br>
                    <select id="fuelSystem" name="repairPart[]" style="height: 100px; width: 265px;  border-radius: 5px; padding: 5px; border: 2px solid black; margin-top: 5px;" multiple>
                        <option value="fuelPump" <?php echo (in_array('fuelPump', $rNameArray)) ? 'selected' : ''; ?>>Fuel Pump</option>
                        <option value="fuelFilter" <?php echo (in_array('fuelFilter', $rNameArray)) ? 'selected' : ''; ?>>Fuel Filter</option>
                        <option value="fuelInjector" <?php echo (in_array('fuelInjector', $rNameArray)) ? 'selected' : ''; ?>>Fuel Injector</option>
                        <option value="fuelTank" <?php echo (in_array('fuelTank', $rNameArray)) ? 'selected' : ''; ?>>Fuel Tank</option>
                        <option value="fuelPressureRegulator" <?php echo (in_array('fuelPressureRegulator', $rNameArray)) ? 'selected' : ''; ?>>Fuel Pressure Regulator</option>

                    </select><br>
                    </div>

                    <div>
                    <label for="repairPart"><b>6. Cooling System</b></label><br>
                    <select id="repairPart" name="repairPart[]" style="height: 100px; width: 265px;  border-radius: 5px; padding: 5px; border: 2px solid black; margin-top: 5px;" multiple>
                        <option value="radiator" <?php echo (in_array('radiator', $rNameArray)) ? 'selected' : ''; ?>>Radiator</option>
                        <option value="waterPump" <?php echo (in_array('waterPump', $rNameArray)) ? 'selected' : ''; ?>>Water Pump</option>
                        <option value="thermostat" <?php echo (in_array('thermostat', $rNameArray)) ? 'selected' : ''; ?>>Thermostat</option>
                        <option value="coolantReservoir" <?php echo (in_array('coolantReservoir', $rNameArray)) ? 'selected' : ''; ?>>Coolant Reservoir</option>
                        <option value="coolingFan" <?php echo (in_array('coolingFan', $rNameArray)) ? 'selected' : ''; ?>>Cooling Fan</option>

                    </select><br>
                    </div>

                    <div>
                    <label for="repairPart"><b>7. Transmission System</b></label><br>
                    <select id="repairPart" name="repairPart[]" style="height: 100px; width: 265px;  border-radius: 5px; padding: 5px; border: 2px solid black; margin-top: 5px;" multiple>
                        <option value="transmission" <?php echo (in_array('transmission', $rNameArray)) ? 'selected' : ''; ?>>Transmission</option>
                        <option value="clutchKit" <?php echo (in_array('clutchKit', $rNameArray)) ? 'selected' : ''; ?>>Clutch Kit</option>
                        <option value="transmissionFluid" <?php echo (in_array('transmissionFluid', $rNameArray)) ? 'selected' : ''; ?>>Transmission Fluid</option>
                        <option value="torqueConverter" <?php echo (in_array('torqueConverter', $rNameArray)) ? 'selected' : ''; ?>>Torque Converter</option>
                        <option value="transmissionMount" <?php echo (in_array('transmissionMount', $rNameArray)) ? 'selected' : ''; ?>>Transmission Mount</option>
                    </select><br>
                    </div>

                    <div>
                    <label for="repairPart"><b>8. Air Conditioning System</b></label><br>
                    <select id="repairPart" name="repairPart[]" style="height: 100px; width: 265px;  border-radius: 5px; padding: 5px; border: 2px solid black; margin-top: 5px;" multiple>
                        <option value="compressor" <?php echo (in_array('compressor', $rNameArray)) ? 'selected' : ''; ?>>Compressor</option>
                        <option value="condenser" <?php echo (in_array('condenser', $rNameArray)) ? 'selected' : ''; ?>>Condenser</option>
                        <option value="evaporator" <?php echo (in_array('evaporator', $rNameArray)) ? 'selected' : ''; ?>>Evaporator</option>
                        <option value="ACBlowerMotor" <?php echo (in_array('ACBlowerMotor', $rNameArray)) ? 'selected' : ''; ?>>AC Blower Motor</option>
                        <option value="ACRechargeKit" <?php echo (in_array('ACRechargeKit', $rNameArray)) ? 'selected' : ''; ?>>AC Recharge Kit</option>       
                    </select>
                    </div>
                    <hr>
                </div>

            <div style="float: left; width: 50px;"><input type="submit" id="submit" name="submit" value="Update" style=" height:20px; width:85px; background-color: rgb(230, 230, 230); border-radius: 5px;"></div>
            <div style="float: right; font-size: 12px;"><b>For Service Page : </b><a href="services_filter.php" style="text-decoration: none; color: #9966ff; background-color: rgb(230, 230, 230); border-radius: 2px;">Click here</a></div>
        
            </form>
        </div>   
    </form>

    </div>
    <div class="copyright">
        <p>Copyright 1999-2023 by Volta Data. All Rights Reserved.<br>Volta is Powered by Honda</p>
    </div>
</body>
</html>


