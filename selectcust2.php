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
                <p><span id="indentation"></span>In this page you can search for an specific customer. You can filter the customers by the given options. This page also contains remove and edit options. If you want to add a customer, click on the <i>add customer</i> button.</p>
            </div>
            <div style="float: right;">
                <button type="button" id="addservice" style="width: 150px; height: 30px; border-radius:4px; background-color: #7575a3; margin: 30px;"><a href="addcust.php"><b>Add Customer</b></a></button>
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
                if(isset($_POST['submit'])){
                    if(isset($_POST['ino']) && $_POST['ino'] != NULL){
                        $inoArray = $_POST['ino'];
                        $ino = implode(', ', $inoArray);
                        $query = "SELECT * FROM MYCUSTOMERS WHERE CUST_ID IN (SELECT CUST_ID FROM MYCUSTOMERINSURANCE WHERE INS_ID IN ($ino))";
                    }
                    else if(isset($_POST['vcount']) && $_POST['vcount'] != NULL){
                        $count = $_POST['vcount'];
                        if($count == "less_than_3"){
                            $lowlimitcount = 1;
                            $highlimitcount = 2;
                        }
                        else if($count == "3_to_6"){
                            $lowlimitcount = 3;
                            $highlimitcount = 6;
                        }
                        else if($count == "more_than_6"){
                            $lowlimitcount = 7;
                            $highlimitcount = 50;
                        }

                        $query = "SELECT * FROM MYCUSTOMERS WHERE VISITED_COUNT BETWEEN $lowlimitcount AND $highlimitcount";
                    }
                    else if(isset($_POST['gender']) && $_POST['gender'] != NULL){
                        $gen = $_POST['gender'];
                        $query = "SELECT * FROM MYCUSTOMERS WHERE GENDER = '$gen'";
                    }
                    else if(isset($_POST['vehicleid']) && $_POST['vehicleid'] != NULL){
                        $vehid = $_POST['vehicleid'];
                        $query = "SELECT * FROM MYCUSTOMERS WHERE CUST_ID IN (SELECT CUST_ID FROM MYCUSTOMERVEHICLE WHERE VEH_ID = $vehid)";
                    }
                    else if(isset($_POST['custid']) && $_POST['custid'] != NULL){
                        $custid = $_POST['custid'];
                        $query = "SELECT * FROM MYCUSTOMERS WHERE CUST_ID = $custid";
                    }
                    else{
                        $query = "SELECT * FROM MYCUSTOMERS";
                    }




                    //echo $query;
                    echo "<table border='1'>";
                    echo "<tr>";
                    echo "  <th><b>Customer ID</th>";
                    echo "  <th><b>Name</th>";
                    echo "  <th><b>Gender</th>";
                    echo "  <th><b>Contact</th>";
                    //echo "  <th><b>E-mail</th>";
                    //echo "  <th><b>Aadhar No.</th>";
                    //echo "  <th><b>Date of Birth</th>";
                    echo "  <th><b>Age</th>";
                    //echo "  <th><b>Licence No.</th>";
                    echo "  <th><b>Visited_count</th>";
                    echo "  <th><b>Address</th>";
                    echo "  <th><b>Vehicle ID</th>";
                    echo "  <th><b>Insurance ID</th>";
                    echo "  <th><b>Operations</th>";
                    echo "</tr>";
                    $s = oci_parse($c, $query);
                    //oci_bind_by_name($s, ':id', $id);
                    $r = oci_execute($s);
                    
                    while ($row = oci_fetch_assoc($s)){
                        $id = $row['CUST_ID'];
                        echo "<tr><td>".$row['CUST_ID']."</td>";
                        echo "<td>".$row['NAME']."</td>";
                        echo "<td>".$row['GENDER']."</td>";
                        echo "<td>".$row['CONTACT']."</td>";
                        //echo "<td>".$row['EMAIL']."</td>";
                        //echo "<td>".$row['AADHAR_NO']."</td>";
                        //echo "<td>".$row['DOB']."</td>";
                        echo "<td>".$row['AGE']."</td>";
                        //echo "<td>".$row['LICENSE_NO']."</td>";
                        echo "<td>".$row['VISITED_COUNT']."</td>";
                        echo "<td>".$row['ADDRESS']."</td>";
                        $query1 = "SELECT LISTAGG(VEH_ID, ', ') AS VEHICLE_ID FROM MYCUSTOMERVEHICLE WHERE CUST_ID = $id";
                        $s1 = oci_parse($c, $query1);
                        $r1 = oci_execute($s1);
                        $row1 = oci_fetch_assoc($s1);
                        echo "<td>".$row1['VEHICLE_ID']."</td>";

                        $query2 = "SELECT LISTAGG(INS_ID, ', ') AS INSURANCE_ID FROM MYCUSTOMERINSURANCE WHERE CUST_ID = $id";
                        $s2 = oci_parse($c, $query2);
                        $r2 = oci_execute($s2);
                        $row2 = oci_fetch_assoc($s2);
                        echo "<td>".$row2['INSURANCE_ID']."</td>";
                        echo "<td><button id='edit'><a href='updatecust.php?updateid=$id'>Edit</a></button><button id='remove'><a href='deletecust.php?deleteid=$id'>Remove</a></button></td>\n";
                        echo "</tr>\n";
                    }
                    echo "</table>\n";                  
                }
            ?>
        </div>
        <div class="sidebar_vf" style="width: 300px;">
            
            <h3 id="sidebar-title-vehicles-filter">Options</h3>
            <form action="" method="post">

                <!---INSURANCE ID-------------------------------------------------->
                <div><p ><b>Search By Insurance type</b></p>
                    <select id="service_type" name="ino[]" style="height: 120px; width: 265px;  border-radius: 5px; padding: 8px; border: 2px solid black;" multiple>
                        <option value="14006001"> Motorcycle Insurance</option>
                        <option value="14006002"> Comprehensive Insurance</option>
                        <option value="14006003"> Collision Insurance</option>
                        <option value="14006004"> Personal Injury Protection (PIP)</option>
                        <option value="14006005"> Uninsured/Underinsured Motorist Coverage</option>
                        <option value="14006006"> Gap Insurance</option>
                        <option value="14006007"> Roadside Assistance</option>
                        <option value="14006008"> Accessory Coverage</option>
                        <option value="14006009"> Rental Reimbursement</option>
                        <option value="14006010"> Tyre Insurance</option>
                        <option value="14006011"> No Claim Bonus Protection</option>
                        <option value="14006012"> Loss of Use Coverage</option>
                        <option value="14006013"> Theft Insurance</option>
                        <option value="14006014"> Personal Effects Coverage</option>
                        <option value="14006015"> Legal Expense Insurance</option>
                    </select>
                    <hr>
                </div>

                <div><p ><b>Visited Count</b></p>
                    <input type="radio" name="vcount" value="less_than_3"/>
                    <label>Lessthan 3</label><br>

                    <input type="radio" name="vcount" value="3_to_6">
                    <label>3 to 6</label><br>

                    <input type="radio" name="vcount" value="more_than_6">
                    <label>More than 6</label><br>
                </div>

                <div><p ><b>Visited Count</b></p>
                    <input type="radio" name="gender" value="Male"/>
                    <label>Male</label><br>

                    <input type="radio" name="gender" value="Female">
                    <label>Female</label><br>
                </div>

                <div>
                    <p><b>Vehicle ID : </b></p>
                    <input type="number" id="vehicleid" name="vehicleid" style="height: 15px; width: 125px; border: 2px solid black; border-radius: 5px;" placeholder="Ex . 14001001">
                </div>

                <div>
                    <p><b>Customer ID : </b></p>
                    <input type="number" id="custid" name="custid" style="height: 15px; width: 125px; border: 2px solid black; border-radius: 5px;" placeholder="Ex . 1">
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
    height: 450px;
    width: 950px;
    padding: 30px;
    border-radius: 5px;
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
    height: 660px;
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