<!DOCTYPE html>
<html>
<head>
    <title>Show Room : Vehicles</title>
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
        }

        .main-contents {
            margin-top: 100px;
            padding: 0px 20px;
            height: 1330px;
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
            width: 302px;
            justify-content: center;
            align-items: center;
            background-color: white;
            border-radius: 10px;
            float: center; 
            width: 402px; 
            margin-top: 20px; 
            height: 1320px;
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
            width: 268px;
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
    <script src="index.js"></script>
</head>
<body>
    <script>
        function disp0(){
            document.getElementById('cid').style.display="none";
            //let elements = document.getElementsByClassName('new1');
            var elements = document.getElementsByClassName('new1');
            for (var i = 0; i < elements.length; i++) {
                elements[i].style.display = 'block'; 
            }
            var myDiv = document.getElementsByClassName('sidebar_vf')[0];
            var myDiv2 = document.getElementsByClassName('main-contents')[0];
            if (myDiv) {
                myDiv.style.height = '1220px';
                myDiv2.style.height = '1220px';
            }
        }
        function disp1(){
            document.getElementById('cid').style.display="block";
            //document.getElementsByClassName('new1').style.display="none";
            var elements = document.getElementsByClassName('new1');
            for (var i = 0; i < elements.length; i++) {
                elements[i].style.display = 'none'; 
            }
            var myDiv = document.getElementsByClassName('sidebar_vf')[0];
            var myDiv2 = document.getElementsByClassName('main-contents')[0];
            if (myDiv) {
                myDiv.style.height = '520px';
                myDiv2.style.height = '540px';
            }

        }

    </script>
    <div class="menu">
        <ul>
            <img style="width:90px; height:50px; margin-right: 35px;" src="Vehicle_image.png">
            <li><a href="index.html">Home</a></li>
            <li><a href="billings.php">Billings</a></li>
            <li><a href="admin.html">Admin</a></li>
        </ul>
    </div>
    <div class="main-contents" style="">
        <div class="sidebar_vf" style="">
            <h3 id="sidebar-title-vehicles-filter" style="width: 370px;">To Add a New Customer</h3>
            <form action="" method="post">
                <div>
                    <p><b>Customer type :</b></p>
                    <input type="radio" name="c" value='1' onclick="disp1();"><label>Old</label>
                    <input type="radio" name="c" value=0 onclick="disp0();"><label>New</label>
                    <hr> 
                </div>
                <!--Customer ID---------------------------------------------------------------->
                <div id = "cid">
                    <p ><b>Customer ID : </b></p>
                    <input type="number" id="cust_id" name="cust_id" style="height: 20px; width: 255px;  border-radius: 3px; padding: 5px;" placeholder="Customer ID Number">
                    <hr>
                </div>
                <!--Employee Name--------------------------------------------------------------->
                <div class="new1">
                <p ><b>Name : </b></p>
                    <input type="text" id="custname" name="custname" style="height: 20px; width: 255px; border-radius: 3px; padding: 5px;" placeholder="Full Name">
                    <hr>
                </div>
                <!--Employee Designation--------------------------------------------------------->
                <div class="new1"><p><b>Gender : </b></p>
                    <input type="radio" name="Gen" value="Male"> <label>Male</label>
                    <input type="radio" name="Gen" value="Female"> <label>Female</label>
                    <hr>
                </div>
                <!--DOB--------------------------------------------------------------------------->
                <div class="new1"><p ><b>Date of Birth : </b></p>
                    <input type="date" id="DOB" name="DOB" style="height: 20px; width: 255px; border-radius: 3px; padding: 5px;"/>
                    <hr>
                </div>
                <!--Employee Contact Number-------------------------------------------------------->
                <div class="new1">
                    <p ><b>Contact Number : </b></p>
                    <input type="number" id="contact" name="contact" style="height: 20px; width: 255px; border-radius: 3px; padding: 5px;" placeholder="+91 0000000000">
                    <hr>
                </div>
                <!--Employee Email ID-------------------------------------------------------------->
                <div class="new1">
                <p ><b>Email ID : </b></p>
                    <input type="email" id="email" name="email" style="height: 20px; width: 255px; border-radius: 3px; padding: 5px;" placeholder="example@gmail.com">
                    <hr>
                </div>
                <!--Aadhaar Number-------------------------------------------------------->
                <div class="new1">
                    <p ><b>Aadhaar Number : </b></p>
                    <input type="number" id="Aadhaar" name="Aadhaar" style="height: 20px; width: 255px; border-radius: 3px; padding: 5px;" placeholder="xxxx xxxx xxxx">
                    <hr>
                </div>
                <!--Licence Number-------------------------------------------------------->
                <div class="new1">
                    <p ><b>Licence Number : </b></p>
                    <input type="number" id="lno" name="lno" style="height: 20px; width: 255px; border-radius: 3px; padding: 5px;" placeholder="xxxxxxxxxxxx">
                    <hr>
                </div><!--Vehicle Id-------------------------------------------------------->
                <div>
                    <p ><b>Vehicle ID : </b></p>
                    <input type="number" id="vno" name="vno" style="height: 20px; width: 255px; border-radius: 3px; padding: 5px;" placeholder="xxxx">
                    <hr>
                </div><!--Licence Number-------------------------------------------------------->

                <div>
                    <p><b>Insurance ID : </b></p>
                    <select id="insuranceSelect" name="ino" style="height: 30px; width: 255px; border-radius: 3px; padding: 5px;">
                        <option>Select</option>
                        <option value="14006001">Motorcycle Insurance</option>
                        <option value="14006002">Comprehensive Insurance</option>
                        <option value="14006003">Collision Insurance</option>
                        <option value="14006004">Personal Injury Protection (PIP)</option>
                        <option value="14006005">Uninsured/Underinsured Motorist Coverage</option>
                        <option value="14006006">Gap Insurance</option>
                        <option value="14006007">Roadside Assistance</option>
                        <option value="14006008">Accessory Coverage</option>
                        <option value="14006009">Rental Reimbursement</option>
                        <option value="14006010">Tyre Insurance</option>
                        <option value="14006011">No Claim Bonus Protection</option>
                        <option value="14006012">Loss of Use Coverage</option>
                        <option value="14006013">Theft Insurance</option>
                        <option value="14006014">Personal Effects Coverage</option>
                        <option value="14006015">Legal Expense Insurance</option>
                    </select>
                </div>



                <!--<div>
                    <p><b>Insurance ID : </b></p>
                    <input type="number" id="ino" name="ino" style="height: 20px; width: 255px; border-radius: 3px; padding: 5px;" placeholder="xxxxxxxxxx">
                    <hr>
                </div>-->
                <!--Address--------------------------------------------------------------->
                <div class="new1">
                <p ><b>Address : </b></p>
                    <textarea id="address" name="address" rows="4" style="width: 255px; border-radius: 3px; padding: 5px;"></textarea>
                </div>
                
                <div style="float: left; width: 50px;">
                    <input type="submit" id="submit" name="submit" value="Add" style=" height:20px; width:65px; background-color: rgb(230, 230, 230); border-radius: 5px;">
                </div>

                <div style="float: right; font-size: 12px;"><b>For Customer Page : </b><a href="selectcust2.php" style="text-decoration: none; color: #9966ff; background-color: rgb(230, 230, 230); border-radius: 2px;">Click here</a></div>
            </form>
        </div>  
    </div>

    <div class="copyright">
        <p>Copyright 1999-2023 by Volta Data. All Rights Reserved.<br>Volta is Powered by Honda</p>
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

    if(isset($_POST['submit'])){
        $name = $_POST['custname'];
        $gen = $_POST['Gen'];
        $contact = $_POST['contact'];
        $email = $_POST['email'];
        $dob = $_POST['DOB'];
        $address = $_POST['address'];
        $aadhaar = $_POST['Aadhaar'];

        $today = new DateTime();
        $birthDateObj = new DateTime($dob);
        $age = $today->diff($birthDateObj)->y;
        //$age = 23;
        $lno = $_POST['lno'];
        $vc = 0;
        $vno = $_POST['vno'];
        $ino = $_POST['ino'];
        $cid = $_POST['c'];
        echo $cid;
        if($cid ==0){
            $q = "SELECT MAX(cust_id) FROM MYCUSTOMERS";
            $s = oci_parse($c, $q);
            oci_execute($s);
            $row = oci_fetch_assoc($s);
            if($row){
                $id = $row['MAX(CUST_ID)'] + 1;
            }

            $query = "INSERT INTO MYCUSTOMERS VALUES($id, '$name', '$gen', $contact, '$email', $aadhaar, TO_DATE('$dob', 'YYYY-MM-DD'), $age, $lno, $vc, '$address')";
        
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
                }
            }
        } else if($cid==1){
            $id = $_POST['cust_id'];
            echo $id;
        }
        $query = "INSERT INTO MYCUSTOMERVEHICLE (CUST_ID, VEH_ID) VALUES($id, $vno)";
        
        $s = oci_parse($c, $query);
        echo "<div style='background-color: white;'>";
        if (!$s) {
            echo "<div style='background-color: white;'>";
            echo $query;
            $m = oci_error($c);
            trigger_error('Could not parse statement: ' . $m['message'], E_USER_ERROR);
            echo "</div>";
        }
        else{
            $r = oci_execute($s);
            if (!$r) {
                echo $query;
                $m = oci_error($s);
                trigger_error('Could not execute statement: ' . $m['message'], E_USER_ERROR);
            } else {
                $query = "INSERT INTO MYCUSTOMERINSURANCE VALUES($id, $vno, $ino)";
        
                $s = oci_parse($c, $query);
                echo "<div style='background-color: white;'>";
                if (!$s) {
                    echo "<div style='background-color: white;'>";
                    echo $query;
                    $m = oci_error($c);
                    trigger_error('Could not parse statement: ' . $m['message'], E_USER_ERROR);
                    echo "</div>";
                }
                else{
                    $r = oci_execute($s);
                    if (!$r) {
                        echo $query;
                        $m = oci_error($s);
                        trigger_error('Could not execute statement: ' . $m['message'], E_USER_ERROR);
                    } else {
                        echo "<script>";
                        echo "alert('Customer Detail added Successfully.');";
                        echo "</script>";
                        //header('location:selectcust2.php');
                    }
                }
            }
        }
        echo "</div>";
    }
?>