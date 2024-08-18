<!DOCTYPE html>
<html>
<head>
    <title>Show Room : Products</title>
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
            <div style="float: left; width: 750px">
                <p><span id="indentation"></span>In this page you can search for an specific Product. You can filter the Products by the given options. This page also contains remove and edit options. If you want to add a product, click on the <i>add product</i> button.</p>
            </div>
            <div style="float: right;">
                <button type="button" id="addemployee" style="width: 150px; height: 30px; border-radius:4px; background-color: #7575a3; margin: 30px;"><a href="addProducts.php"><b>Add Products</b></a></button>
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
                    if(isset($_POST['productid']) && $_POST['productid'] != NULL){
                        $id = $_POST['productid'];
                        $query = "SELECT * FROM MYPRODUCTS WHERE PROD_ID = $id";
                    }
                    else if(isset($_POST['productname']) && $_POST['productname'] != NULL){
                        $name = $_POST['productname'];
                        $query = "SELECT * FROM MYPRODUCTS WHERE PROD_NAME = $name";
                    }
                    else if(isset($_POST['quantityrange']) && $_POST['quantityrange'] != NULL){
                        if($_POST['quantityrange'] == 'less_than_10'){
                            $min = 0;
                            $max = 9;
                        } else if($_POST['quantityrange'] == '10_to_50'){
                            $min = 10;
                            $max = 50;
                        } else if($_POST['quantityrange'] == 'more_than_50'){
                            $min = 51;
                            $max = 1000;
                        }
                        $query = "SELECT * FROM MYPRODUCTS WHERE QUANTITY BETWEEN $min AND $max";
                    }
                    else{
                        $query = "SELECT * FROM MYPRODUCTS";
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
                    echo "  <th><b>Options</th>\n";
                    echo "</tr>\n";

                    while (($row = oci_fetch_array($s, OCI_ASSOC + OCI_RETURN_NULLS)) != false) {
                        $id = $row['PROD_ID'];
                        echo "<tr>\n";
                        foreach ($row as $item) {
                            echo "  <td>" . ($item !== null ? htmlspecialchars($item, ENT_QUOTES | ENT_SUBSTITUTE) : "&nbsp;") . "</td>\n";
                        }
                        echo "  <td><button id='edit'><a href='updateProduct.php?updateid=$id'>Edit</a></button><button id='remove'><a href='deleteProducts.php?deleteid=$id'>Remove</a></button></td>\n";
                        echo "</tr>\n";
                    }
                    echo "</table>\n";
            }
        
            ?>
        </div>
        <div class="sidebar_vf" style="width: 300px;">
            
            <h3 id="sidebar-title-vehicles-filter">Options</h3>
            <form action="" method="post">

                <div><p><b>Quantity Range : </b></p>
                    <input type="radio" name="quantityrange" value="less_than_10">
                    <label>Less than 10</label><br>

                    <input type="radio" name="quantityrange" value="10_to_50"/>
                    <label for="25000_to_40000">10 to 50</label><br>

                    <input type="radio" name="quantityrange" value="more_than_50">
                    <label for="more_than_90000">More than 50</label><br>
                </div>

                <div>
                    <p><b>Product ID</b></p>
                    <input type="number" id="productid" name="productid" style="height: 20px; width: 255px;  border-radius: 3px; padding: 5px;" placeholder="Ex. 14009051"><hr>
                </div>

                <div>
                    <p><b>Product Name</b></p>
                    <input type="text" id="productname" name="productname" style="height: 20px; width: 255px;  border-radius: 3px; padding: 5px;" placeholder="Ex. Spark Plugs">
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
    height: 250px;
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
    height: 450px;
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