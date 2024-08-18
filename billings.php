<!DOCTYPE html>
<html>
<head>
    <title>Show Room : Billings</title>
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
            <div>
                <p><span id="indentation"></span>This page allows you to generate or compute bill amount for a specific section. Here, The important point is, you can compute only one section's bill at a time. Keep it in your mind and compute bills.</p>
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


                $query = "SELECT MAX(BILL_ID) FROM MYBILLINGS";
                $eq = oci_parse($c, $query);

                $result = oci_execute($eq);
                $row = oci_fetch_array($eq, OCI_ASSOC + OCI_RETURN_NULLS);

                if ($row) {
                    $currentSerId = $row['MAX(BILL_ID)'];
                    $id = $currentSerId + 1;
                } else {
                    $id = 15003001;
                }
                $id = ($id > 15003001) ? $id : 15003001;


                $query = "SELECT MAX(TRN_ID) FROM MYTRANSACTION";
                $eq = oci_parse($c, $query);

                $result = oci_execute($eq);
                $row = oci_fetch_array($eq, OCI_ASSOC + OCI_RETURN_NULLS);

                if ($row) {
                    $currentSerId = $row['MAX(TRN_ID)'];
                    $tid = $currentSerId + 1;
                } else {
                    $id = 15004001;
                }
                $tid = ($tid > 15004001) ? $tid : 15004001;


                
                if(isset($_POST['submit'])){
                    $vehid = $_POST['vehid'];
                    $serid = $_POST['serviceid'];
                    $productids = $_POST['productids'];
                    $excid = $_POST['excid'];


                    echo "<h2>Volta Agencies - Bill</h2><hr>";
                    //  $vehid = NULL;

                    if(isset($_POST['vehid']) && $_POST['vehid'] !=NULL){
                        $type = 'vehicle';
                        $query = "SELECT * FROM MYVEHICLES WHERE VEH_ID = $vehid";
                        $eq = oci_parse($c, $query);
                        $res = oci_execute($eq);
                        $row = oci_fetch_array($eq, OCI_ASSOC + OCI_RETURN_NULLS);
                        $vehname = $row['VEH_NAME'];
                        $amount = $row['AMOUNT'];

                        echo "<table>";
                            echo "<tr>";
                            echo "<th>Vehicle ID</th>";
                            echo "<th>Vehicle Name</th>";
                            echo "<th>Prize</th>";
                            echo "</tr>";

                            echo "<tr>";
                            echo "<td>$vehid</td>";
                            echo "<td>$vehname</td>";
                            echo "<td>$amount</td>";
                            echo "</tr>";

                            echo "<tr>";
                            echo "<td></td>";
                            echo "<th>Total Amount</th>";
                            echo "<td>$amount</td>";
                            echo "</tr>";
                        echo "</table>";
                        /*echo "<p>Vehicle Id :     $vehid</p>";
                        echo "<p>Vehicle Name :     $vehname     -     $amount</p>";
                        echo "<p>Total Amount :     $amount</p>";*/

                        $query = "INSERT INTO MYBILLINGS VALUES($id, $amount, SYSTIMESTAMP, $vehid, '$type', 2001)";
                        $eq = oci_parse($c, $query);
                        //echo $query;
                        $res = oci_execute($eq);
                    }

                    else if(isset($_POST['serviceid']) && $_POST['serviceid'] !=NULL){
                        $type = 'service';
                        $query = "SELECT * FROM MYSERVICE WHERE SER_ID = $serid";
                        $eq = oci_parse($c, $query);
                        $res = oci_execute($eq);
                        $row = oci_fetch_array($eq, OCI_ASSOC + OCI_RETURN_NULLS);
                        $amount = $row['AMOUNT'];

                        $query = "SELECT LISTAGG(SER_TYPE, ', ') WITHIN GROUP (ORDER BY SER_TYPE) AS ConcatenatedList
                        FROM MYSERVICETYPE
                        WHERE SER_ID = $serid";

                        $eq = oci_parse($c, $query);
                        $res = oci_execute($eq);
                        $row = oci_fetch_array($eq, OCI_ASSOC + OCI_RETURN_NULLS);
                        $vehid = NULL;
                        $services = $row['CONCATENATEDLIST'];

                        echo "<table>";
                            echo "<tr>";
                            echo "<th>Service ID ID</th>";
                            echo "<th>Services</th>";
                            echo "<th>Prize</th>";
                            echo "</tr>";

                            echo "<tr>";
                            echo "<td>$serid</td>";
                            echo "<td>$services</td>";
                            echo "<td>$amount</td>";
                            echo "</tr>";

                            echo "<tr>";
                            echo "<td></td>";
                            echo "<th>Total Amount</th>";
                            echo "<td>$amount</td>";
                            echo "</tr>";
                        echo "</table>";
                        

                        /*echo "<p>Service Id :     $serid</p>";
                        echo "<p>Services :     $services</p>";
                        echo "<p>Total Amount :     $amount</p>";*/
                        $query = "INSERT INTO MYBILLINGS VALUES($id, $amount, SYSTIMESTAMP, NULL, '$type', 2001)";
                        $eq = oci_parse($c, $query);
                        //echo $query;
                        $res = oci_execute($eq);
                    }

                    else if(isset($_POST['productids']) && $_POST['productids'] !=NULL){
                        $type = 'product';
                        $query = "SELECT * FROM MYPRODUCTS WHERE PROD_ID IN ($productids)";
                        $eq = oci_parse($c, $query);
                        $res = oci_execute($eq);
                        $amount = 0;

                        echo "<table>\n";
                            echo "<tr>";
                                echo "<th>Product ID</th>";
                                echo "<th>Product Name</th>";
                                echo "<th>Prize</th>";
                            echo "</tr>\n";

                        while(($row = oci_fetch_array($eq, OCI_ASSOC + OCI_RETURN_NULLS)) != false){
                            $pid = $row['PROD_ID'];
                            $pname = $row['PROD_NAME'];
                            $prize = $row['PRIZE'];
                            echo "<tr>\n";
                                echo "<td>$pid</td>";
                                echo "<td>$pname</td>";
                                echo "<td>$prize</td>";
                            echo "</tr>\n";
                            $amount = $amount + $row['PRIZE'];
                        }
                            echo "<tr>\n";
                                echo "<td></td>";
                                echo "<th>Total Amount</th>";
                                echo "<td>$amount</td>";
                            echo "</tr>\n";
                        echo "</table>";

                        
                        $query = "UPDATE MYPRODUCTS SET QUANTITY = QUANTITY - 1 WHERE PROD_ID IN ($productids)";
                        $eq = oci_parse($c, $query);
                        $res = oci_execute($eq);
                        

                        /*$query = "SELECT LISTAGG(PROD_NAME, ', ') WITHIN GROUP (ORDER BY PROD_NAME) AS ConcatenatedList
                        FROM MYPRODUCTS
                        WHERE PROD_ID IN ($productids)";

                        $eq = oci_parse($c, $query);
                        $res = oci_execute($eq);
                        $row = oci_fetch_array($eq, OCI_ASSOC + OCI_RETURN_NULLS);
                        $products = $row['CONCATENATEDLIST'];
                        

                        echo "<p>Product Id :     $productids</p>";
                        echo "<p>Product Names :     $products</p>";
                        echo "<p>Total Amount :     $amount</p>";*/

                        $query = "INSERT INTO MYBILLINGS VALUES($id, $amount, SYSTIMESTAMP, NULL, '$type', 2001)";
                        $eq = oci_parse($c, $query);
                        //echo $query;
                        $res = oci_execute($eq);
                    }

                    else if(isset($_POST['excid']) && $_POST['excid'] !=NULL){
                        $type = 'exchange';
                        $query = "SELECT * FROM MYEXCHANGE WHERE EXC_ID =  $excid";
                        $eq = oci_parse($c, $query);
                        $res = oci_execute($eq);
                        $row = oci_fetch_array($eq, OCI_ASSOC + OCI_RETURN_NULLS);
                        $amount = $row['DIFF_AMOUNT'];
                        $vehid = $row['NEW_VEH_ID'];

                        $query = "SELECT VEH_NAME
                        FROM MYVEHICLES
                        WHERE VEH_ID = $vehid";

                        $eq = oci_parse($c, $query);
                        $res = oci_execute($eq);
                        $row = oci_fetch_array($eq, OCI_ASSOC + OCI_RETURN_NULLS);
                        $vehname = $row['VEH_NAME'];

                        echo "<table>";
                            echo "<tr>";
                            echo "<th>Exchange ID</th>";
                            echo "<th>Exchanged Vehicle Name</th>";
                            echo "<th>Amount</th>";
                            echo "</tr>";

                            echo "<tr>";
                            echo "<td>$vehid</td>";
                            echo "<td>$vehname</td>";
                            echo "<td>$amount</td>";
                            echo "</tr>";

                            echo "<tr>";
                            echo "<td></td>";
                            echo "<th>Total Amount</th>";
                            echo "<td>$amount</td>";
                            echo "</tr>";
                        echo "</table>";
                        
                        

                        /*echo "<p>Exchage Id :     $excid</p>";
                        echo "<p>Exchanged Vehicle :     $vehname</p>";
                        echo "<p>Total Amount :     $amount</p>";*/

                        $query = "INSERT INTO MYBILLINGS VALUES($id, $amount, SYSTIMESTAMP, $vehid, '$type', 2001)";
                        $eq = oci_parse($c, $query);
                        //echo $query;
                        $res = oci_execute($eq);
                    }
                    

                    $query = "INSERT INTO MYTRANSACTION VALUES($tid, SYSTIMESTAMP, $id)";
                    $eq = oci_parse($c, $query);
                    $res = oci_execute($eq);

                }
        
            ?>
        </div>
        <div class="sidebar_vf" style="width: 300px;">
            
            <h3 id="sidebar-title-vehicles-filter">Options</h3>
            <form action="" method="post">
                <div>
                    <p><b>Vehicle ID :</b></p>
                    <input type="number" id="vehid" name="vehid" style="height: 20px; width: 255px;  border-radius: 3px; padding: 5px;" placeholder="Ex. 14001051"><hr>
                </div>

                <div>
                    <p><b>Service ID :</b></p>
                    <input type="number" id="serviceid" name="serviceid" style="height: 20px; width: 255px;  border-radius: 3px; padding: 5px;" placeholder="Ex. 14009051"><hr>
                </div>

                <div>
                    <p><b>Product IDs :</b></p>
                    <input type="text" id="productids" name="productids" style="height: 20px; width: 255px;  border-radius: 3px; padding: 5px;" placeholder="Ex. 14009051"><hr>
                </div>

                <div>
                    <p><b>Exchange ID :</b></p>
                    <input type="number" id="excid" name="excid" style="height: 20px; width: 255px;  border-radius: 3px; padding: 5px;" placeholder="Ex. 14007051">
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
    height: 80px;
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
    height: 280px;
    width: 950px;
    padding: 30px;
    border-radius: 5px;
    overflow: auto;
}


table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #D6EEEE;
}

.sidebar_vf{
    font-family: Arial, Helvetica, sans-serif;   
    width: 250px;
    height: 490px;
    background-color: white;
    border-radius: 10px;
    margin-top: 100px;
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