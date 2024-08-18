<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Room : Adding Exchage Vehicle Details</title>
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
            height: 750px;
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
            <h3 id="sidebar-title-vehicles-filter">To Add Exchange Vehicle Details</h3>
            <form action="" method="post">
                    <div>
                        <p><b>Vehicle ID</b></p>
                        <input type="number" id="vehid" name="vehid" style="height: 20px; width: 255px;  border-radius: 3px; padding: 5px;" placeholder="Ex. 14001001"  required><hr>
                    </div>

                    <div>
                        <p><b>Customer ID</b></p>
                        <input type="number" id="custid" name="custid" style="height: 20px; width: 255px;  border-radius: 3px; padding: 5px;" placeholder="Ex. 1"  required><hr>
                    </div>

                    <div>
                        <p><b>Trade-in amount</b></p>
                        <input type="text" id="amount" name="amount" style="height: 20px; width: 255px;  border-radius: 3px; padding: 5px;" placeholder="000000.00"  required><hr>
                    </div>

                    <div>
                        <p><b>New Vehicle ID</b></p>
                        <input type="number" id="newvehid" name="newvehid" style="height: 20px; width: 255px;  border-radius: 3px; padding: 5px;" placeholder="Ex. 14001001"  required><hr>
                    </div>
            
                    <div>
                        <p><b>Condition Details</b></p>
                        <textarea id="conditionDetails" name="conditionDetails" rows="4" cols="30"></textarea>
                    </div>

                    <div style="float: left; width: 50px;">
                        <input type="submit" id="submit" name="submit" value="Add" style=" height:20px; width:65px; background-color: rgb(230, 230, 230); border-radius: 5px;">
                    </div>
            <div style="float: right; font-size: 12px;"><b>For Exchage Section Page : </b><a href="exchanges_filter.php" style="text-decoration: none; color: #9966ff; background-color: rgb(230, 230, 230); border-radius: 2px;">Click here</a></div>
        
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

    $query = "SELECT MAX(EXC_ID) FROM MYEXCHANGE";
    $eq = oci_parse($c, $query);

    $result = oci_execute($eq);
    $row = oci_fetch_array($eq, OCI_ASSOC + OCI_RETURN_NULLS);

    if ($row) {
        $currentSerId = $row['MAX(EXC_ID)'];
        $id = $currentSerId + 1;
    } else {
        $id = 14007001;
    }
    $id = ($id > 14007001) ? $id : 14007001;

    if(isset($_POST['submit'])){
        $vehid = $_POST['vehid'];
        $custid = $_POST['custid'];
        $newvehid = $_POST['newvehid'];
        $amount = $_POST['amount'];
        $condition = $_POST['conditionDetails'];
        $query = "SELECT AMOUNT FROM MYVEHICLES WHERE VEH_ID = $newvehid";
        $s = oci_parse($c, $query);
        $r = oci_execute($s);
        $row = oci_fetch_array($s, OCI_ASSOC + OCI_RETURN_NULLS);
        $diff = $row['AMOUNT'] - $amount;

        $query = "INSERT INTO MYEXCHANGE  VALUES($id,  $custid, $vehid, $amount, $newvehid, $diff, '$condition')";
        
        $s = oci_parse($c, $query);
        $r = oci_execute($s);
        if($r){
            echo "<script> alert('Exchage details added Successfully.'); </script>";
        }
    }

?>

