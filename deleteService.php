<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');

    $username = "system";
    $password = "aravinth583#";
    $database = "localhost/XE";
    $c = oci_connect($username, $password, $database);

    if(isset($_GET['deleteid'])){
        $id = $_GET['deleteid'];
        $query1 = "DELETE FROM MYSERVICEREPAIREDPART WHERE SER_ID =  $id";
        $query2 = "DELETE FROM MYSERVICETYPE WHERE SER_ID = $id";
        $query3 = "DELETE FROM MYSERVICE WHERE SER_ID = $id";

        if (!$c) {
            $m = oci_error();
            trigger_error('Could not connect to database: ' . $m['message'], E_USER_ERROR);
        }
    
        $s1 = oci_parse($c, $query1);
        $s2 = oci_parse($c, $query2);
        $s3 = oci_parse($c, $query3);
        if (!$s1 || !$s2 || !$s3) {
            $m = oci_error($c);
            trigger_error('Could not parse statement: ' . $m['message'], E_USER_ERROR);
        }
        else{
            //echo "Deleted Successfully.";
            header('location:services_filter.php');
        }
    
        $r1 = oci_execute($s1);
        $r2 = oci_execute($s2);
        $r3 = oci_execute($s3);
        if (!$r1 || !$r2 || !$r3) {
            $m = oci_error($s);
            trigger_error('Could not execute statement: ' . $m['message'], E_USER_ERROR);
        } 
    }

       
?>