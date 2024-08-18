<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');

    $username = "system";
    $password = "aravinth583#";
    $database = "localhost/XE";
    $c = oci_connect($username, $password, $database);

    if(isset($_GET['deleteid'])){
        $id = $_GET['deleteid'];
        $query = "DELETE FROM MYVEHICLES WHERE VEH_ID = $id";

        if (!$c) {
            $m = oci_error();
            trigger_error('Could not connect to database: ' . $m['message'], E_USER_ERROR);
        }
    
        $s = oci_parse($c, $query);
        if (!$s) {
            $m = oci_error($c);
            trigger_error('Could not parse statement: ' . $m['message'], E_USER_ERROR);
        }
        else{
            //echo "Deleted Successfully.";
            header('location:vehicles_filter.php');
        }
    
        $r = oci_execute($s);
        if (!$r) {
            $m = oci_error($s);
            trigger_error('Could not execute statement: ' . $m['message'], E_USER_ERROR);
        } 
    }  
?>