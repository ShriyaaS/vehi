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
            height: 1920px;
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
            <h3 id="sidebar-title-vehicles-filter">To Schedule a New Service</h3>
            <form action="" method="post">

                    <div>
                        <p><b>Customer Name</b></p>
                        <input type="text" id="name" name="name" style="height: 20px; width: 255px;  border-radius: 3px; padding: 5px;" placeholder="Ex. Antony Doss" required/><hr>
                    </div>

                <div>
                    <p><b>Service Type</b></p>
                    <select id="service_type" name="service_type[]" style="height: 120px; width: 265px;  border-radius: 5px; padding: 8px; border: 2px solid black;" multiple required>   
                        <option value="oilChange">Oil Change</option>
                        <option value="tireRotation">Tire Rotation</option>
                        <option value="brakeService">Brake Service</option>
                        <option value="chainMaintenance">Chain Maintenance</option>
                        <option value="sparkPlugReplacement">Spark Plug Replacement</option>
                        <option value="batteryCheck">Battery Check</option>
                        <option value="Full-Service">Full-Service</option>
                        <option value="painting">Painting</option>
                        <option value="engineTuneUp">Engine Tune-Up</option>
                        <option value="coolantFlush">Coolant Flush</option>
                        <option value="brakePadReplacement">Brake Pad Replacement</option>
                        <option value="headlightAdjustment">Headlight Adjustment</option>
                        <option value="wheelAlignment">Wheel Alignment</option>
                        <option value="fuelSystemCleaning">Fuel System Cleaning</option>
                        <option value="exhaustSystemInspection">Exhaust System Inspection</option>
                        <option value="suspensionCheck">Suspension Check</option>
                        <option value="airFilterReplacement">Air Filter Replacement</option>
                        <option value="engineDiagnostic">Engine Diagnostic</option>
                        <option value="chainAdjustment">Chain Adjustment</option>
                        <option value="coolingSystemFlush">Cooling System Flush</option>
                        <option value="electricalSystemCheck">Electrical System Check</option>
                        <option value="clutchAdjustment">Clutch Adjustment</option>
                        <option value="throttleBodyCleaning">Throttle Body Cleaning</option>
                        <option value="engineOilFlush">Engine Oil Flush</option>
                        <option value="ignitionSystemCheck">Ignition System Check</option>
                        <option value="wheelBearingReplacement">Wheel Bearing Replacement</option>
                        <option value="carburetorCleaning">Carburetor Cleaning</option>
                        <option value="forkSealReplacement">Fork Seal Replacement</option>
                    </select>
                    <hr>
                </div>

                <div>
                    <p><b>Preferred Date</b></p>
                    <input type="date" id="preferredDate" name="preferredDate" style="height: 20px; width: 255px;  border-radius: 3px; padding: 5px;" required>
                    <hr>
                </div>

                <div>
                    <p><b>Repaired Parts</b></p>
                    <div>
                    <label for="repairPart"><b>1. Engine Components</b></label><br>
                    <select id="repairPart" name="repairPart[]" style="height: 150px; width: 265px;  border-radius: 5px; padding: 5px; border: 2px solid black; margin-top: 5px;" multiple>
                        <option value="engine">Engine</option>
                        <option value="piston">Piston</option>
                        <option value="crankshaft">Crankshaft</option>
                        <option value="cylinderHead">Cylinder Head</option>
                        <option value="timingBelt">Timing Belt</option>
                        <option value="fuelInjector">Fuel Injector</option>
                        <option value="waterPump">Water Pump</option>
                        <option value="alternator">Alternator</option>
                    </select><br>
                    </div>

                    <div>
                    <label for="repairPart"><b>2. Braking System</b></label><br>
                    <select id="repairPart" name="repairPart[]" style="height: 115px; width: 265px;  border-radius: 5px; padding: 5px; border: 2px solid black; margin-top: 5px;" multiple>
                        <option value="brakePads">Brake Pads</option>
                        <option value="brakeRotors">Brake Rotors</option>
                        <option value="calipers">Calipers</option>
                        <option value="brakeMasterCylinder">Brake Master Cylinder</option>
                        <option value="brakeLines">Brake Lines</option>
                        <option value="ABSModule">ABS Module</option>
                    </select><br>
                    </div>

                    <div>
                    <label for="repairPartsDropdown"><b>3. Suspension System</b></label><br>
                    <select id="repairPartsDropdown" name="repairPart[]" style="height: 115px; width: 265px;  border-radius: 5px; padding: 5px; border: 2px solid black; margin-top: 5px;" multiple>
                        <option value="shockAbsorbers">Shock Absorbers</option>
                        <option value="struts">Struts</option>
                        <option value="controlArms">Control Arms</option>
                        <option value="ballJoints">Ball Joints</option>
                        <option value="suspensionBushings">Suspension Bushings</option>
                        <option value="swayBarLinks">Sway Bar Links</option>
                    </select><br>
                    </div>

                    <div>
                    <label for="repairPart"><b>4. Exhaust System</b></label><br>
                    <select id="repairPart" name="repairPart[]" style="height: 100px; width: 265px;  border-radius: 5px; padding: 5px; border: 2px solid black; margin-top: 5px;" multiple>
                        <option value="exhaustPipe">Exhaust Pipe</option>
                        <option value="muffler">Muffler</option>
                        <option value="catalyticConverter">Catalytic Converter</option>
                        <option value="exhaustManifold">Exhaust Manifold</option>
                        <option value="oxygenSensor">Oxygen Sensor</option>
                    </select><br>
                    </div>


                    <div>
                    <label for="fuelSystem"><b>5. Fuel System</b></label><br>
                    <select id="fuelSystem" name="repairPart[]" style="height: 100px; width: 265px;  border-radius: 5px; padding: 5px; border: 2px solid black; margin-top: 5px;" multiple>
                        <option value="fuelPump">Fuel Pump</option>
                        <option value="fuelFilter">Fuel Filter</option>
                        <option value="fuelInjector">Fuel Injector</option>
                        <option value="fuelTank">Fuel Tank</option>
                        <option value="fuelPressureRegulator">Fuel Pressure Regulator</option>
                    </select><br>
                    </div>

                    <div>
                    <label for="repairPart"><b>6. Cooling System</b></label><br>
                    <select id="repairPart" name="repairPart[]" style="height: 100px; width: 265px;  border-radius: 5px; padding: 5px; border: 2px solid black; margin-top: 5px;" multiple>
                        <option value="radiator">Radiator</option>
                        <option value="waterPump">Water Pump</option>
                        <option value="thermostat">Thermostat</option>
                        <option value="coolantReservoir">Coolant Reservoir</option>
                        <option value="coolingFan">Cooling Fan</option>
                    </select><br>
                    </div>

                    <div>
                    <label for="repairPart"><b>7. Transmission System</b></label><br>
                    <select id="repairPart" name="repairPart[]" style="height: 100px; width: 265px;  border-radius: 5px; padding: 5px; border: 2px solid black; margin-top: 5px;" multiple>
                        <option value="transmission">Transmission</option>
                        <option value="clutchKit">Clutch Kit</option>
                        <option value="transmissionFluid">Transmission Fluid</option>
                        <option value="torqueConverter">Torque Converter</option>
                        <option value="transmissionMount">Transmission Mount</option>
                    </select><br>
                    </div>

                    <div>
                    <label for="repairPart"><b>8. Air Conditioning System</b></label><br>
                    <select id="repairPart" name="repairPart[]" style="height: 100px; width: 265px;  border-radius: 5px; padding: 5px; border: 2px solid black; margin-top: 5px;" multiple>
                        <option value="compressor">Compressor</option>
                        <option value="condenser">Condenser</option>
                        <option value="evaporator">Evaporator</option>
                        <option value="ACBlowerMotor">AC Blower Motor</option>
                        <option value="ACRechargeKit">AC Recharge Kit</option>
                    </select>
                    </div>
                    <hr>
                </div>

                <div>
                    <p><b>Additional Comments</b></p>
                    <textarea id="additionalComments" name="additionalComments" rows="4" cols="30"></textarea>
                </div>

            <div style="float: left; width: 50px;"><input type="submit" id="submit" name="submit" value="Schedule" style=" height:20px; width:85px; background-color: rgb(230, 230, 230); border-radius: 5px;"></div>
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

<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');

    $username = "system";
    $password = "aravinth583#";
    $database = "localhost/XE";

    $c = oci_connect($username, $password, $database);


    //Below code is for retrieving the Maximum Id of the Service table to Initialize Id for Present data
    $query = "SELECT MAX(SER_ID) FROM MYSERVICE";
    $eq = oci_parse($c, $query);

    $result = oci_execute($eq);
    $row = oci_fetch_array($eq, OCI_ASSOC + OCI_RETURN_NULLS);

    if ($row) {
        $currentSerId = $row['MAX(SER_ID)'];
        $id = $currentSerId + 1;
    } else {
        $id = 14003001;
    }
    $id = ($id > 14003001) ? $id : 14003001;
    //---------------------------------------------------------------------------------------------------

    if(isset($_POST['submit'])){
        $type = $_POST['service_type'];
        $DOP = $_POST['preferredDate'];
        $rep_part = $_POST['repairPart'];
        $add_comm = $_POST['additionalComments'];
        $name = $_POST['name'];
        $repParts = $_POST['repairPart'];
        echo implode(',', $repParts);
        //Initializing array for service and its corresponding prize
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
        $DOS = date("d-m-Y");
        //Query to insert in myservice table
        $query = "INSERT INTO MYSERVICE VALUES($id, '$name', TO_DATE('$DOS','DD-MM-YYYY'), TO_DATE('$DOP','YYYY-MM-DD'), '$add_comm', $totalAmount, 2001, NULL)";
        //echo $query;
        $s = oci_parse($c, $query);
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
                echo $query;
                $m = oci_error($s);
                trigger_error('Could not execute statement: ' . $m['message'], E_USER_ERROR);
            } else {
                echo "<script>";
                echo "alert('Service Scheduled Successfully.');";
                echo "</script>";
            }
        }
        //echo "</div>";


        //Query to insert in Myservicetype table
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
        //echo $query2;

        //Query For myservicerepairedpart table 
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
        //echo $query3;

    }
?>



