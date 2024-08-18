

<?php
ob_end_flush();

error_reporting(E_ALL);
ini_set('display_errors', 'On');

$username = "system";
$password = "aravinth583#";
$database = "localhost/XE";
$c = oci_connect($username, $password, $database);
if (!$c) {
    $m = oci_error();
    trigger_error('Could not connect to database: ' . $m['message'], E_USER_ERROR);
}

$query = 'SELECT ser_id,type,name,dod,dos,add_comm,totalamount FROM myservice';
$stmt = oci_parse($c, $query);
oci_execute($stmt);
$row = oci_fetch_assoc($stmt);

if(isset($_POST['schedule'])){
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

        foreach ($type as $selectedService) {
            if (isset($servicePrices[$selectedService])) {
                $totalAmount += $servicePrices[$selectedService];
            }
        }

        $DOS = date("d-m-Y");
        $query = "DELETE FROM MYSERVICE WHERE ser_id=$id";
        $s = oci_parse($c, $query);
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
                echo "alert('Service Updated Successfully.');";
                echo "</script>";
            }
        }
        echo "</div>";
}
?>

