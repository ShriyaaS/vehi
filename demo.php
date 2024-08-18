<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

$username = "system";
$password = "aravinth583#";
$database = "localhost/XE";
$query = "select * from mycustomers";

$c = oci_connect($username, $password, $database);
if (!$c) {
    $m = oci_error();
    trigger_error('Could not connect to database: ' . $m['message'], E_USER_ERROR);
}

$s = oci_parse($c, $query);
if (!$s) {
    $m = oci_error($c);
    trigger_error('Could not parse statement: ' . $m['message'], E_USER_ERROR);
}

$r = oci_execute($s);
if (!$r) {
    $m = oci_error($s);
    trigger_error('Could not execute statement: ' . $m['message'], E_USER_ERROR);
}

echo "<table border='1'>\n";
$ncols = oci_num_fields($s);

echo "<tr>\n";
for ($i = 1; $i <= $ncols; ++$i) {
    $colname = oci_field_name($s, $i);
    echo "  <th><b>" . htmlspecialchars($colname, ENT_QUOTES | ENT_SUBSTITUTE) . "</b></th>\n";
}
echo "</tr>\n";

while (($row = oci_fetch_array($s, OCI_ASSOC + OCI_RETURN_NULLS)) != false) {
    echo "<tr>\n";
    foreach ($row as $item) {
        echo "  <td>" . ($item !== null ? htmlspecialchars($item, ENT_QUOTES | ENT_SUBSTITUTE) : "&nbsp;") . "</td>\n";
    }
    echo "</tr>\n";
}

echo "</table>\n";
?>




<?php
/*
            error_reporting(E_ALL);
            ini_set('display_errors', 'On');

            $username = "system";
            $password = "aravinth583#";
            $database = "localhost/XE";

            $c = oci_connect($username, $password, $database);
            if (!$c) {
                $m = oci_error();
                trigger_error('Could not connect to the database: ' . $m['message'], E_USER_ERROR);
            }
            //$array = ["scooty", "electricbike"];

            // Create a bind variable for each element

            //$types = implode(',',$array);
            $query = "SELECT * FROM MYCUSTOMERS WHERE VEH_TYPE IN (scooty)";
            
            $s = oci_parse($c, $query);
            if (!$s) {
                $m = oci_error($c);
                trigger_error('Could not parse statement: ' . $m['message'], E_USER_ERROR);
            }

            $r = oci_execute($s);
            if (!$r) {
                $m = oci_error($s);
                trigger_error('Could not execute statement: ' . $m['message'], E_USER_ERROR);
            }
           if (isset($_POST['vehicle_type']) && is_array($_POST['vehicle_type'])) {
                foreach ($_POST['vehicle_type'] as $type){
                    echo "Selected: $type<br>";
                }
            } else {
                echo "No vehicles selected.";
            }
            
            echo "<table border='1'>\n";
            $ncols = oci_num_fields($s);

            echo "<tr>\n";
            for($i = 1; $i <= $ncols; ++$i){
                $colname  = oci_field_name($s, $i);
                echo "  <th><br>" . htmlspecialchar($colname, ENT_QUOTES | ENT_SUBSTITUTE) . "</br></th>\n";
            }
            echo "</tr>\n";

            while(($row = oci_fetch_array($s, OCI_ASSOC + OCI_RETURN_NULLS)) != false){
                echo "<tr>\n";
                foreach($row as $item){
                    echo "  <td>" . ($item !== NULL ? htmlspecialchar($item, ENT_QUOTES | ENT_SUBSTITUTE) : "&nbsp") . "</td>\n";
                }
            }*/
        ?>


