<!DOCTYPE html>
<html>
<head>
    <title>Show Room : Services</title>
    <!--<link rel="stylesheet" href = "vehicles_filter.css">-->
    <script src="index.js"></script>
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
        <div class="topic">
            <div style="float: left; width: 750px;">
                <p><span id="indentation"></span>In this page you can search for an specific service. You can filter the services by the given options. This page also contains remove and edit options. If you want to add a new service, click on the <i>add service</i> button.</p>
            </div>
            <div style="float: right;">
                <button type="button" id="addservice" style="width: 150px; height: 30px; border-radius:4px; background-color: #7575a3; margin: 30px;"><a href="addService.php"><b>Add Service</b></a></button>
            </div>
        </div>
        <div class="output_box" style="float: right;">
            <?php
                error_reporting(E_ALL);
                ini_set('display_errors', 'On');

                $username = "system";
                $password = "aravinth583#";
                $database = "localhost/XE";

                $c = oci_connect($username, $password, $database);
                $id = 14003002;
                if(isset($_POST['submit'])){
                    if(isset($_POST['serviceid']) && $_POST['serviceid'] != NULL){
                        $id = $_POST['serviceid'];
                        echo 'ID = '.$id.'<br>';
                        $query = 'SELECT DISTINCT SER_ID, NAME, DOS, DOD, AMOUNT FROM MYSERVICE WHERE SER_ID = :id';
                        $s = oci_parse($c, $query);
                        oci_bind_by_name($s, ':id', $id);
                    }
                    else{
                        if(isset($_POST['service_type']) && $_POST['service_type'] != NULL){
                            $type = implode(',',$_POST['service_type']);
                        }
                        else{
                            $type = "'oilChange', 'tireRotation', 'brakeService', 'chainMaintenance', 'sparkPlugReplacement', 
                            'batteryCheck', 'full-service', 'painting', 'engineTuneUp', 'coolantFlush', 'brakePadReplacement', 
                            'headlightAdjustment', 'wheelAlignment', 'fuelSystemCleaning', 'exhaustSystemInspection', 'suspensionCheck', 
                            'airFilterReplacement', 'engineDiagnostic', 'chainAdjustment', 'coolingSystemFlush', 'electricalSystemCheck', 
                            'clutchAdjustment', 'throttleBodyCleaning', 'engineOilFlush', 'ignitionSystemCheck', 'wheelBearingReplacement',
                            'carburetorCleaning', 'forkSealReplacement'";
                        }

                        if(isset($_POST['lowlimitSdate']) && isset($_POST['highlimitSdate']) && ($_POST['lowlimitSdate'] != NULL && $_POST['highlimitSdate'] != NULL)){
                            $startSDate = $_POST["lowlimitSdate"];
                            $endSDate = $_POST["highlimitSdate"];
                        }
                        else{
                            $startSDate = "1950-JAN-01";
                            $endSDate = date("Y-m-d");
                        }

                        if(isset($_POST['lowlimitDdate']) && isset($_POST['highlimitDdate']) && ($_POST['lowlimitDdate'] != NULL && $_POST['highlimitDdate'] != NULL)){
                            $startDDate = $_POST["lowlimitDdate"];
                            $endDDate = $_POST["highlimitDdate"];
                        }
                        else{
                            /*$startDDate = "1950-JAN-01";
                            $endDDate = date("Y-m-d");*/

                            $startDDate = NULL;
                            $endDDate = NULL;
                        }

                        if(isset($_POST['repairPart']) && $_POST['repairPart'] != NULL){
                            $parts = implode(',',$_POST['repairPart']);
                        }
                        else{
                            $parts = "'engine', 'piston', 'crankshaft', 'cylinderHead', 'timingBelt', 'fuelInjector', 'waterPump', 
                            'alternator', 'brakePads', 'brakeRotors', 'calipers', 'brakeMasterCylinder', 'brakeLines', 'ABSModule', 
                            'tires', 'rims', 'tirePressureSensor', 'wheelBearings', 'hubAssembly', 'alignmentKit', 'battery', 'starter', 
                            'ignitionCoil', 'sparkPlugs', 'wiringHarness', 'shockAbsorbers', 'struts', 'controlArms', 'ballJoints', 
                            'suspensionBushings', 'swayBarLinks', 'transmission', 'clutchKit', 'transmissionFluid', 'torqueConverter', 
                            'transmissionMount', 'exhaustPipe', 'muffler', 'catalyticConverter', 'exhaustManifold', 'oxygenSensor', 
                            'fuelPump', 'fuelFilter', 'fuelInjector', 'fuelTank', 'fuelPressureRegulator', 'radiator', 
                            'waterPumpCoolingSystem', 'thermostat', 'coolantReservoir', 'coolingFan', 'compressor', 'condenser', 
                            'evaporator', 'ACBlowerMotor', 'ACRechargeKit'"
                            ;
                        }

                        if(isset($_POST['lowlimitamount']) && isset($_POST['highlimitamount']) && ($_POST['lowlimitamount'] != NULL && $_POST['highlimitamount'] != NULL)){
                            $lAmount = $_POST['lowlimitamount'];
                            $hAmount = $_POST['highlimitamount'];
                        }
                        else if(isset($_POST['amountrange']) && $_POST['amountrange'] != NULL){
                            $range = $_POST['amountrange'];
                            if($range == 'less_than_1000'){
                                $lAmount = 0;
                                $hAmount = 1000;
                            }
                            else if($range == "1000_to_2500"){
                                $lAmount = 1000;
                                $hAmount = 2500;
                            }
                            else if($range == "2500_to_5000"){
                                $lAmount = 2500;
                                $hAmount = 5000;
                            }
                            else if($range == "5000_to_7500"){
                                $lAmount = 5000;
                                $hAmount = 7500;
                            }
                            else if($range == "7500_to_10000"){
                                $lAmount = 7500;
                                $hAmount = 10000;
                            }
                            else{
                                $lAmount = 10000;
                                $hAmount = 200000;
                            }
                        }
                        else{
                            $lAmount = 0;
                            $hAmount = 200000;
                        }

                        if($startDDate != NULL && $endDDate != NULL){
                            $query = "SELECT DISTINCT S.SER_ID, S.NAME, S.DOS, S.DOD, S.AMOUNT 
                            FROM MYSERVICE S 
                            JOIN MYSERVICETYPE S1 ON S.SER_ID = S1.SER_ID 
                            JOIN MYSERVICEREPAIREDPART S2 ON S.SER_ID = S2.SER_ID 
                            WHERE S1.SER_TYPE IN ($type) AND 
                            S.DOS BETWEEN TO_DATE('$startSDate', 'YYYY-MM-DD') AND TO_DATE('$endSDate', 'YYYY-MM-DD') AND 
                            S.DOD BETWEEN TO_DATE('$startDDate', 'YYYY-MM-DD') AND TO_DATE('$endDDate', 'YYYY-MM-DD') AND 
                            S.AMOUNT BETWEEN $lAmount AND $hAmount AND 
                            S2.REP_PART_ID IN (SELECT REP_PART_ID FROM MYREPAIREDPART WHERE NAME IN ($parts))";
                            $s = oci_parse($c, $query);
                        }
                        else{
                            $query = "SELECT DISTINCT S.SER_ID, S.NAME, S.DOS, S.DOD, S.AMOUNT 
                            FROM MYSERVICE S 
                            JOIN MYSERVICETYPE S1 ON S.SER_ID = S1.SER_ID 
                            JOIN MYSERVICEREPAIREDPART S2 ON S.SER_ID = S2.SER_ID 
                            WHERE S1.SER_TYPE IN ($type) AND 
                            S.DOS BETWEEN TO_DATE('$startSDate', 'YYYY-MM-DD') AND TO_DATE('$endSDate', 'YYYY-MM-DD') AND
                            S.AMOUNT BETWEEN $lAmount AND $hAmount AND 
                            S2.REP_PART_ID IN (SELECT REP_PART_ID FROM MYREPAIREDPART WHERE NAME IN ($parts))";
                            $s = oci_parse($c, $query);
                        }
                    }
                    
                    //echo $query;


                    
                    $r = oci_execute($s);

                    echo "<table border='1'>\n";
                    $ncols = oci_num_fields($s);
    
                    echo "<tr>\n";
                    for ($i = 1; $i <= $ncols; ++$i) {
                        $colname = oci_field_name($s, $i);
                        echo "  <th><b>" . htmlspecialchars($colname, ENT_QUOTES | ENT_SUBSTITUTE) . "</b></th>\n";   
                    }
                    echo "  <th><b>SERVICES</th>\n";
                    echo "  <th><b>R - PARTS</th>\n";
                    echo "  <th><b>OPTIONS</th>\n";
                    echo "</tr>\n";
    
                    while (($row = oci_fetch_array($s, OCI_ASSOC + OCI_RETURN_NULLS)) != false) {
                        $ser_id = $row['SER_ID'];
                        echo "<tr>\n";
                        foreach ($row as $item) {
                            echo "  <td>" . ($item !== null ? htmlspecialchars($item, ENT_QUOTES | ENT_SUBSTITUTE) : "&nbsp;") . "</td>\n";
                        }

                        $squery = "SELECT LISTAGG(SER_TYPE, ', ') AS concatenated_service_types FROM MYSERVICETYPE WHERE SER_ID = $ser_id";
                        $eq = oci_parse($c, $squery);

                        $result = oci_execute($eq);
                        $row = oci_fetch_array($eq, OCI_ASSOC + OCI_RETURN_NULLS);

                        $stypes = $row['CONCATENATED_SERVICE_TYPES'];

                        echo "<td>$stypes</td>";


                        $rquery = "SELECT LISTAGG(M.NAME, ', ') WITHIN GROUP (ORDER BY M.NAME) AS concatenated_names
                        FROM MYREPAIREDPART M JOIN MYSERVICEREPAIREDPART M1 ON M.REP_PART_ID = M1.REP_PART_ID
                        WHERE M1.SER_ID = $ser_id";
                        $eq = oci_parse($c, $rquery);

                        $result = oci_execute($eq);
                        $row = oci_fetch_array($eq, OCI_ASSOC + OCI_RETURN_NULLS);

                        $names = $row['CONCATENATED_NAMES'];

                        echo "<td>$names</td>";
                        echo "  <td><button id='edit'><a href='updateService.php?updateid=$ser_id'>Edit</a></button><button id='remove'><a href='deleteService.php?deleteid=$ser_id'>Remove</a></button></td>\n";
                        echo "</tr>\n";
                    }
                    echo "</table>\n";
                }
            ?>
        </div>
        <div class="sidebar_vf" style="width: 300px;">
            
            <h3 id="sidebar-title-vehicles-filter">Options</h3>
            <form action="" method="post">
                <div><p ><b>Sevice Types</b></p>
                <select id="service_type" name="service_type[]" style="height: 120px; width: 265px;  border-radius: 5px; padding: 8px; border: 2px solid black;" multiple>   
                        <option value="'oilChange'">Oil Change</option>
                        <option value="'tireRotation'">Tire Rotation</option>
                        <option value="'brakeService'">Brake Service</option>
                        <option value="'chainMaintenance'">Chain Maintenance</option>
                        <option value="'sparkPlugReplacement'">Spark Plug Replacement</option>
                        <option value="'batteryCheck'">Battery Check</option>
                        <option value="'Full-Service'">Full-Service</option>
                        <option value="'painting'">Painting</option>
                        <option value="'engineTuneUp'">Engine Tune-Up</option>
                        <option value="'coolantFlush'">Coolant Flush</option>
                        <option value="'brakePadReplacement'">Brake Pad Replacement</option>
                        <option value="'headlightAdjustment'">Headlight Adjustment</option>
                        <option value="'wheelAlignment'">Wheel Alignment</option>
                        <option value="'fuelSystemCleaning'">Fuel System Cleaning</option>
                        <option value="'exhaustSystemInspection'">Exhaust System Inspection</option>
                        <option value="'suspensionCheck'">Suspension Check</option>
                        <option value="'airFilterReplacement'">Air Filter Replacement</option>
                        <option value="'engineDiagnostic'">Engine Diagnostic</option>
                        <option value="'chainAdjustment'">Chain Adjustment</option>
                        <option value="'coolingSystemFlush'">Cooling System Flush</option>
                        <option value="'electricalSystemCheck'">Electrical System Check</option>
                        <option value="'clutchAdjustment'">Clutch Adjustment</option>
                        <option value="'throttleBodyCleaning'">Throttle Body Cleaning</option>
                        <option value="'engineOilFlush'">Engine Oil Flush</option>
                        <option value="'ignitionSystemCheck'">Ignition System Check</option>
                        <option value="'wheelBearingReplacement'">Wheel Bearing Replacement</option>
                        <option value="'carburetorCleaning'">Carburetor Cleaning</option>
                        <option value="'forkSealReplacement'">Fork Seal Replacement</option>
                    </select><hr>
                </div>
                <div><p ><b>Search By Service Date</b></p>
                    <input type="date" id="lowlimitSdate" name="lowlimitSdate" style="height: 25px; width: 110px; border: 2px solid black; border-radius: 5px;" ><span> - </span>
                    <input type="date" id="highlimitSdate" name="highlimitSdate" style="height: 25px; width: 110px; border: 2px solid black; border-radius: 5px;"></p><hr>
                </div>

                <div><p ><b>Search By Delivery Date</b></p>
                    <input type="date" id="lowlimitDdate" name="lowlimitDdate" style="height: 25px; width: 110px; border: 2px solid black; border-radius: 5px;" ><span> - </span>
                    <input type="date" id="highlimitDdate" name="highlimitDdate" style="height: 25px; width: 110px; border: 2px solid black; border-radius: 5px;"></p><hr>
                </div>

                <div>
                    <p><b>Repaired Parts</b></p>
                    <select id="repairPart" name="repairPart[]" style="height: 150px; width: 265px;  border-radius: 5px; padding: 5px; border: 2px solid black; margin-top: 5px;" multiple>
                    <option value="'engine'">Engine</option>
                    <option value="'piston'">Piston</option>
                    <option value="'crankshaft'">Crankshaft</option>
                    <option value="'cylinderHead'">Cylinder Head</option>
                    <option value="'timingBelt'">Timing Belt</option>
                    <option value="'fuelInjector'">Fuel Injector</option>
                    <option value="'waterPump'">Water Pump</option>
                    <option value="'alternator'">Alternator</option>

                    <option value="'brakePads'">Brake Pads</option>
                    <option value="'brakeRotors'">Brake Rotors</option>
                    <option value="'calipers'">Calipers</option>
                    <option value="'brakeMasterCylinder'">Brake Master Cylinder</option>
                    <option value="'brakeLines'">Brake Lines</option>
                    <option value="'ABSModule'">ABS Module</option>

                    <option value="'shockAbsorbers'">Shock Absorbers</option>
                    <option value="'struts'">Struts</option>
                    <option value="'controlArms'">Control Arms</option>
                    <option value="'ballJoints'">Ball Joints</option>
                    <option value="'suspensionBushings'">Suspension Bushings</option>
                    <option value="'swayBarLinks'">Sway Bar Links</option>

                    <option value="'exhaustPipe'">Exhaust Pipe</option>
                    <option value="'muffler'">Muffler</option>
                    <option value="'catalyticConverter'">Catalytic Converter</option>
                    <option value="'exhaustManifold'">Exhaust Manifold</option>
                    <option value="'oxygenSensor'">Oxygen Sensor</option>

                    <option value="'fuelPump'">Fuel Pump</option>
                    <option value="'fuelFilter'">Fuel Filter</option>
                    <option value="'fuelInjector'">Fuel Injector</option>
                    <option value="'fuelTank'">Fuel Tank</option>
                    <option value="'fuelPressureRegulator'">Fuel Pressure Regulator</option>

                    <option value="'radiator'">Radiator</option>
                    <option value="'waterPump'">Water Pump</option>
                    <option value="'thermostat'">Thermostat</option>
                    <option value="'coolantReservoir'">Coolant Reservoir</option>
                    <option value="'coolingFan'">Cooling Fan</option>

                    <option value="'transmission'">Transmission</option>
                    <option value="'clutchKit'">Clutch Kit</option>
                    <option value="'transmissionFluid'">Transmission Fluid</option>
                    <option value="'torqueConverter'">Torque Converter</option>
                    <option value="'transmissionMount'">Transmission Mount</option>

                    <option value="'compressor'">Compressor</option>
                    <option value="'condenser'">Condenser</option>
                    <option value="'evaporator'">Evaporator</option>
                    <option value="'ACBlowerMotor'">AC Blower Motor</option>
                    <option value="'ACRechargeKit'">AC Recharge Kit</option>

                    </select>
                    <hr>
                </div>

                <div><p ><b>Service Amount</b></p>
                    <input type="radio" id="amountrange" name="amountrange" value="less_than_1000"/>
                    <label for="less_than_1000">Less than 1000</label><br>

                    <input type="radio" id="amountrange" name="amountrange" value="1000_to_2500">
                    <label for="1000_to_2500">1000 - 2500</label><br>

                    <input type="radio" id="amountrange" name="amountrange" value="2500_to_5000">
                    <label for="2500_to_5000">2500 - 5000</label><br>

                    <input type="radio" id="amountrange" name="amountrange" value="5000_to_7500">
                    <label for="200_to_250">5000 - 7500</label><br>

                    <input type="radio" id="amountrange" name="amountrange" value="7500_to_10000">
                    <label for="7500_to_10000">7500 - 10000</label><br>

                    <input type="radio" id="amountrange" name="amountrange" value="more_than_10000">
                    <label for="more_than_10000">More than 10000</label><br>

                    <p><b>For a Specific Range of Service Amount :</b></p>
                    <input type="number" id="lowlimitamount" name="lowlimitamount" style="height: 15px; width: 75px; border: 2px solid black; border-radius: 5px;" placeholder="Lower"><span> - </span>
                    <input type="number" id="highlimitamount" name="highlimitamount" style="height: 15px; width: 75px; border: 2px solid black; border-radius: 5px;" placeholder="Higher"></p><hr>
                </div>

                <div>
                    <p><b>Service ID : </b></p>
                    <input type="number" id="serviceid" name="serviceid" style="height: 15px; width: 125px; border: 2px solid black; border-radius: 5px;" placeholder="Ex . 123456">
                </div>
                <div>
                    <input type="submit" name="submit" value="Go" style=" height:20px; width:65px; background-color: rgb(230, 230, 230); border-radius: 5px;">
                </div>
            </form>
        </div>

        
    
    </div>
    <div class="copyright">
        <p>Copyright 1999-2023 by Volta Data. All Rights Reserved.<br>Volta is Powered by Honda</p>
    </div>

    <p></p>
</body>
</html>


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
    filter: blur(2px);
}

.main-contents {
    margin-top: 100px;
    padding: 0px 70px;
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

#indentation{
    margin-left: 40px;
}

.topic{
    font-weight: bold; 
    font-family: 'Dancing Script', cursive;
    float: right;
    width: 980px;
    height: 100px;
    background-color: white;
    border-radius: 10px;
    margin-bottom: 25px;
    padding-top: 10px;
    padding: 10px 10px 10px 20px;
}

#edit{
    background-color: #6666ff;
    height: 20px;
    width:50px;
    margin: 3px;
    color: white;
    border-radius:4px;
}

#remove{
    background-color: #ff4d4d;
    height: 20px;
    width:70px;
    margin: 3px;
    color: white;
    border-radius:4px;
}

a {
    text-decoration: none; /* Remove underline */
    color: inherit; /* Use the default text color of the parent element */
}

.output_box{
    border: 2px solid saddlebrown;
    background-color: white;
    height: 820px;
    width: 910px;
    padding: 50px;
    border-radius: 15px;
    overflow: auto;
}

table{
  border-collapse: collapse;
  width: 100%;
}

th, td{
  padding: 8px;
  text-align: left;
  border: none;
  border-bottom: 2px solid #ddd;

}

.sidebar_vf{
    font-family: Arial, Helvetica, sans-serif;   
    width: 250px;
    height: 1075px;
    background-color: white;
    border-radius: 10px;
}

.sidebar_vf div{
    margin: 20px
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
    width: 217px;
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
    width: 266px;
    height: 25px;
    margin: 0px;
    display: block;
    border-radius:10px 10px 0px 0px ;
    background-color: black;
    border: 2px solid white;
}


#color{
    height: 75px;
    width: 200px;
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