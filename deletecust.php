<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');

    $username = "system";
    $password = "aravinth583#";
    $database = "localhost/XE";

    $c = oci_connect($username, $password, $database);

    if(isset($_GET['deleteid'])){
        $id = $_GET['deleteid'];
        $query1 = "DELETE FROM MYCUSTOMERVEHICLE WHERE cust_id = $id";
        $query2 = "DELETE FROM MYCUSTOMERINSURANCE WHERE cust_id = $id";
        $query3 = "DELETE FROM MYCUSTOMERS WHERE cust_id = $id";
    
        $s1 = oci_parse($c, $query1);
        $s2 = oci_parse($c, $query2);
        $s3 = oci_parse($c, $query3);
        if (!$s1 || !$s2 || !$s3) {
            $m = oci_error($c);
            trigger_error('Could not parse statement: ' . $m['message'], E_USER_ERROR);
        }
        else{
            //oci_bind_by_name($s, ':id', $id);
            $r1 = oci_execute($s1);
            $r2 = oci_execute($s2);
            $r3 = oci_execute($s3);

            echo "<script>";
            echo "alert('Deleted Successfully.');";
            echo "</script>";
            header('location:selectcust2.php');
        }     
    }
?>