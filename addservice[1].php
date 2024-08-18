<!DOCTYPE html>
<html>

<head>
    <title>Two-Wheeler Service Center</title>
    <link rel="stylesheet" href="service[1].css">
    <link rel="icon" type="image/x-icon" href="Vehicle_image.png" width="30px">
    <script src="service.js"></script>
</head>

<body>
    <div class="menu">
        <ul>
            <img style="width:90px; height:50px; margin-right: 35px;" src="Vehicle_image.png">
            <li><a href="index.html">Home</a></li>
            <li><a href="billings.html">Billings</a></li>
            <li><a href="admin_verification.html">Admin</a></li>
        </ul>
    </div>
    <div class="main-contents">
        <div class="sidebar_tw" style="width: 300px;">

            <h3 id="sidebar-title-tw-service">To add a Service<br><br>Service Options</h3>
            <form>
                
                <div>
                    
                    <div>
                        <label for="name">Customer Name:</label>
                        <input type="text" id="name" name="name"/><br><br>
                    </div>
                    <p><b>Service Type</b></p>
                    <select id="service_type" name="service_type[]">
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
                    <input type="date" id="preferredDate" name="preferredDate">
                    <hr>
                </div>

                <div>
                    <p><b>Repair Part:</b></p>
                    <div>
                        <label><b>Engine Components</b></label><br>
                        <input type="checkbox" id="engine" name="repairPart[]" value="engine">
                        <label for="engine">Engine</label><br>

                        <input type="checkbox" id="piston" name="repairPart[]" value="piston">
                        <label for="piston">Piston</label><br>

                        <input type="checkbox" id="crankshaft" name="repairPart[]" value="crankshaft">
                        <label for="crankshaft">Crankshaft</label><br>

                        <input type="checkbox" id="cylinderHead" name="repairPart[]" value="cylinderHead">
                        <label for="cylinderHead">Cylinder Head</label><br>

                        <input type="checkbox" id="timingBelt" name="repairPart[]" value="timingBelt">
                        <label for="timingBelt">Timing Belt</label><br>

                        <input type="checkbox" id="fuelInjector" name="repairPart[]" value="fuelInjector">
                        <label for="fuelInjector">Fuel Injector</label><br>

                        <input type="checkbox" id="waterPump" name="repairPart[]" value="waterPump">
                        <label for="waterPump">Water Pump</label><br>

                        <input type="checkbox" id="alternator" name="repairPart[]" value="alternator">
                        <label for="alternator">Alternator</label><br>
                    </div>

                    <div>
                        <label><b>Braking System</b></label><br>
                        <input type="checkbox" id="brakePads" name="repairPart[]" value="brakePads">
                        <label for="brakePads">Brake Pads</label><br>

                        <input type="checkbox" id="brakeRotors" name="repairPart[]" value="brakeRotors">
                        <label for="brakeRotors">Brake Rotors</label><br>

                        <input type="checkbox" id="calipers" name="repairPart[]" value="calipers">
                        <label for="calipers">Calipers</label><br>

                        <input type="checkbox" id="brakeMasterCylinder" name="repairPart[]" value="brakeMasterCylinder">
                        <label for="brakeMasterCylinder">Brake Master Cylinder</label><br>

                        <input type="checkbox" id="brakeLines" name="repairPart[]" value="brakeLines">
                        <label for="brakeLines">Brake Lines</label><br>

                        <input type="checkbox" id="ABSModule" name="repairPart[]" value="ABSModule">
                        <label for="ABSModule">ABS Module</label><br>
                    </div>
                    <div>
                        <label><b>Suspension System</b></label><br>
                        <input type="checkbox" id="shockAbsorbers" name="repairPart[]" value="shockAbsorbers">
                        <label for="shockAbsorbers">Shock Absorbers</label><br>

                        <input type="checkbox" id="struts" name="repairPart[]" value="struts">
                        <label for="struts">Struts</label><br>

                        <input type="checkbox" id="controlArms" name="repairPart[]" value="controlArms">
                        <label for="controlArms">Control Arms</label><br>

                        <input type="checkbox" id="ballJoints" name="repairPart[]" value="ballJoints">
                        <label for="ballJoints">Ball Joints</label><br>

                        <input type="checkbox" id="suspensionBushings" name="repairPart[]" value="suspensionBushings">
                        <label for="suspensionBushings">Suspension Bushings</label><br>

                        <input type="checkbox" id="swayBarLinks" name="repairPart[]" value="swayBarLinks">
                        <label for="swayBarLinks">Sway Bar Links</label><br>
                    </div>

                    <div>
                        <label><b>Exhaust System</b></label><br>
                        <input type="checkbox" id="exhaustPipe" name="repairPart[]" value="exhaustPipe">
                        <label for="exhaustPipe">Exhaust Pipe</label><br>

                        <input type="checkbox" id="muffler" name="repairPart[]" value="muffler">
                        <label for="muffler">Muffler</label><br>

                        <input type="checkbox" id="catalyticConverter" name="repairPart[]" value="catalyticConverter">
                        <label for="catalyticConverter">Catalytic Converter</label><br>

                        <input type="checkbox" id="exhaustManifold" name="repairPart[]" value="exhaustManifold">
                        <label for="exhaustManifold">Exhaust Manifold</label><br>

                        <input type="checkbox" id="oxygenSensor" name="repairPart[]" value="oxygenSensor">
                        <label for="oxygenSensor">Oxygen Sensor</label><br>
                    </div>

                    <div>
                        <label><b>Fuel System</b></label><br>
                        <input type="checkbox" id="fuelPump" name="repairPart[]" value="fuelPump">
                        <label for="fuelPump">Fuel Pump</label><br>

                        <input type="checkbox" id="fuelFilter" name="repairPart[]" value="fuelFilter">
                        <label for="fuelFilter">Fuel Filter</label><br>

                        <input type="checkbox" id="fuelInjector" name="repairPart[]" value="fuelInjector">
                        <label for="fuelInjector">Fuel Injector</label><br>

                        <input type="checkbox" id="fuelTank" name="repairPart[]" value="fuelTank">
                        <label for="fuelTank">Fuel Tank</label><br>

                        <input type="checkbox" id="fuelPressureRegulator" name="repairPart[]" value="fuelPressureRegulator">
                        <label for="fuelPressureRegulator">Fuel Pressure Regulator</label><br>
                    </div>

                    <div>
                        <label><b>Cooling System</b></label><br>
                        <input type="checkbox" id="radiator" name="repairPart[]" value="radiator">
                        <label for="radiator">Radiator</label><br>

                        <input type="checkbox" id="waterPump" name="repairPart[]" value="waterPump">
                        <label for="waterPump">Water Pump</label><br>

                        <input type="checkbox" id="thermostat" name="repairPart[]" value="thermostat">
                        <label for="thermostat">Thermostat</label><br>

                        <input type="checkbox" id="coolantReservoir" name="repairPart[]" value="coolantReservoir">
                        <label for="coolantReservoir">Coolant Reservoir</label><br>

                        <input type="checkbox" id="coolingFan" name="repairPart[]" value="coolingFan">
                        <label for="coolingFan">Cooling Fan</label><br>
                    </div>
                    <div>
                        <label><b>Transmission System</b></label><br>
                        <input type="checkbox" id="transmission" name="repairPart[]" value="transmission">
                        <label for="transmission">Transmission</label><br>

                        <input type="checkbox" id="clutchKit" name="repairPart[]" value="clutchKit">
                        <label for="clutchKit">Clutch Kit</label><br>

                        <input type="checkbox" id="transmissionFluid" name="repairPart[]" value="transmissionFluid">
                        <label for="transmissionFluid">Transmission Fluid</label><br>

                        <input type="checkbox" id="torqueConverter" name="repairPart[]" value="torqueConverter">
                        <label for="torqueConverter">Torque Converter</label><br>

                        <input type="checkbox" id="transmissionMount" name="repairPart[]" value="transmissionMount">
                        <label for="transmissionMount">Transmission Mount</label><br>
                    </div>
                

                        <div>
                            <label><b>Air Conditioning System</b></label><br>
                            <input type="checkbox" id="compressor" name="repairPart[]" value="compressor">
                            <label for="compressor">Compressor</label><br>

                            <input type="checkbox" id="condenser" name="repairPart[]" value="condenser">
                            <label for="condenser">Condenser</label><br>

                            <input type="checkbox" id="evaporator" name="repairPart[]" value="evaporator">
                            <label for="evaporator">Evaporator</label><br>

                            <input type="checkbox" id="ACBlowerMotor" name="repairPart[]" value="ACBlowerMotor">
                            <label for="ACBlowerMotor">AC Blower Motor</label><br>

                            <input type="checkbox" id="ACRechargeKit" name="repairPart[]" value="ACRechargeKit">
                            <label for="ACRechargeKit">AC Recharge Kit</label><br>
                        </div>

                </div>


                <div>
                    <p><b>Additional Comments</b></p>
                    <textarea id="additionalComments" name="additionalComments" rows="4" cols="30"></textarea>
                    <hr>
                </div>

                

                <div>
                    <input type="submit" id="schedule" name="schedule" value="Schedule Service">
                </div>
            </form>
        </div>
        <div id="main-contents"></div>
        <div class="sidebar_tw2" style="width: 300px;">
            <h3 id="sidebar-title-tw-service">For Search - Options</h3>
            <div>
                <p><b>Vehicle ID : </b></p>
                <input type="number" id="search_vehid" name="search_vehid" style="border: 2px solid black; border-radius: 5px;" placeholder="Ex . 123456"><br><br>
            </div>
            <div>
                <p><b>Service ID : </b></p>
                <input type="number" id="search_serid" name="search_serid" style="border: 2px solid black; border-radius: 5px;" placeholder="Ex . 123456"><br><br>
            </div>
            <div>
                <p><b>service Date: </b></p>
                <input type="date" id="search_serdate" name="search_serdate" style="border: 2px solid black; border-radius: 5px;" ><br><br>
            </div>
            <div>
                <p><b>Service type: </b></p>
                <input type="text" id="search_sertype" name="search_sertype" style="border: 2px solid black; border-radius: 5px;" placeholder="Ex . oilChange"><br><br>
            </div>
            <div>
                <input type="submit" id="search_service" name="search_service" value="Search Service">
            </div>
            <br><br>
            <div>
                <p><u>Remove a Service:</u></p>
                <p><b>Service ID : </b></p>
                <input type="number" id="rem_serid" name="rem_serid" style="border: 2px solid black; border-radius: 5px;" placeholder="Ex . 123456"><br><br>
                <input type="submit" name="rem_serbutton" id="rem_serbutton" value="Remove Service">
            </div>
        </div>
    </div>

    <div class="copyright">
        <p>Copyright 1999-2023 by SAVAAK TwoWheeler Services. All Rights Reserved.<br>SAVAAK powered by Honda</p>
    </div>

    <p></p>
</body>
</html>
<?php
    ob_end_flush();

    error_reporting(E_ALL);
    ini_set('display_errors', 'On');

    $username = "system";
    $password = "aravinth583#";
    $database = "localhost/XE";

    $c = oci_connect($username, $password, $database);

    if (!$c) {
        echo "<div style='background-color: white;'>";
        $m = oci_error();
        trigger_error('Could not connect to database: ' . $m['message'], E_USER_ERROR);
        echo "</div>";
    }

    $queryMaxId = "SELECT MAX(ser_id) AS max_id FROM MYSERVICE";
    $stmtMaxId = oci_parse($c, $queryMaxId);
    oci_execute($stmtMaxId);
    $rowMaxId = oci_fetch_assoc($stmtMaxId);

    
    $nextServiceId = $rowMaxId['MAX_ID'] + 1;

    $sql = "SELECT id FROM your_table WHERE id > $currentRecordId ORDER BY id LIMIT 1";
    $result = oci_parse($c, $sql);
    oci_execute($result);
    $totalAmount = 0;

    if (isset($_POST['schedule'])) {
        $id = $_POST['ser_id_fill'];
        $type = $_POST['service_type'];
        $DOD = $_POST['preferredDate'];
        $rep_part = $_POST['repairPart'];
        $add_comm = $_POST['additionalComments'];
        $name = $_POST['name'];

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

        foreach($type as $selectedService) {
            if (isset($servicePrices[$selectedService])) {
                $totalAmount += $servicePrices[$selectedService];
            }
        }

        $DOS = date("d-m-Y");
        $query = "INSERT INTO MYSERVICE VALUES($id, '$type', '$name', TO_DATE('$DOS','DD-MM-YYYY'), TO_DATE('$DOD','DD-MM-YYYY'), '$add_comm', $totalAmount, '2001')";
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
        echo "</div>";
    }
?>

