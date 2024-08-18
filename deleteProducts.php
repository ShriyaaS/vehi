<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');

    $username = "system";
    $password = "aravinth583#";
    $database = "localhost/XE";

    $c = oci_connect($username, $password, $database);

    if(isset($_GET['deleteid'])){
        $id = $_GET['deleteid'];
        echo $id;
        $query1 = "DELETE FROM MYPRODUCTS WHERE PROD_ID = $id";
    
        $s1 = oci_parse($c, $query1);
        if (!$s1) {
            $m = oci_error($c);
            trigger_error('Could not parse statement: ' . $m['message'], E_USER_ERROR);
        }
        else{
            $r1 = oci_execute($s1);
            header('location:products_filter.php');
        }     
    }
?>