<!DOCTYPE html>
<html>
<head>
    <title>Show Room : Vehicles</title>
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
                <p><span id="indentation"></span>This page is for Admin use. This page contain search and filter options for vehicles. In this page you can add new vehicles and if you want to alter any vehicle details you can do here. Also, You can delete vehicles.</p>
            </div>
            <div style="float: right;">
                <button type="button" id="addemployee" style="width: 150px; height: 30px; border-radius:4px; background-color: #7575a3; margin: 30px;"><a href="addVehicles.php"><b>Add Vehicle</b></a></button>
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
                if(isset($_POST['vehicleid']) && $_POST['vehicleid'] != NULL){
                    $veh_id = $_POST['vehicleid'];
                    $query = "SELECT VEH_ID AS ID, VEH_NAME AS NAME, VEH_TYPE AS TYPE, AMOUNT, MODEL, MILEAGE, CC, COLOR FROM MYVEHICLES WHERE VEH_ID = $veh_id";

                    $s = oci_parse($c, $query);
                }
                else if(isset($_POST['vehiclename']) && $_POST['vehiclename'] != NULL){
                    $veh_name = $_POST['vehiclename'];
                    $query = "SELECT VEH_ID AS ID, VEH_NAME AS NAME, VEH_TYPE AS TYPE, AMOUNT, MODEL, MILEAGE, CC, COLOR FROM MYVEHICLES WHERE VEH_NAME = '$veh_name'";
                    
                    $s = oci_parse($c, $query);
                }
                else{
                    // Getting Types input---------------------------------
                    if(isset($_POST['vehicle_type']) && $_POST['vehicle_type'] != NULL){
                        $str = implode(',', $_POST['vehicle_type']);
                    }else{
                        $str = "'scooty','motorcycle','sportsbike','nongearbike','electricbike'";
                    }

                    //Getting prize Range input-----------------------------
                    if(isset($_POST['lowlimit']) && isset($_POST['highlimit']) && ($_POST['lowlimit'] != NULL && $_POST['highlimit'] != NULL)){
                        $lowlimitprice = $_POST['lowlimit'];
                        $highlimitprice = $_POST['highlimit'];
                    }
                    else if(isset($_POST['prizerange']) && $_POST['prizerange'] != NULL){
                        $prize = $_POST['prizerange'];
                        if($prize == "35000_to_50000"){
                            $lowlimitprice = 35000;
                            $highlimitprice = 50000;
                        }
                        else if($prize == "50000_to_65000"){
                            $lowlimitprice = 50000;
                            $highlimitprice = 65000;
                        }
                        else if($prize == "65000_to_95000"){
                            $lowlimitprice = 65000;
                            $highlimitprice = 95000;
                        }
                        else if($prize == "95000_to_120000"){
                            $lowlimitprice = 95000;
                            $highlimitprice = 120000;
                        }
                        else if($prize == "more_than_120000"){
                            $lowlimitprice = 120000;
                            $highlimitprice = 500000;
                        }
                    }
                    else{
                        $lowlimitprice = 0;
                        $highlimitprice = 500000;
                    }

                    //Getting model input-----------------------------
                    if(isset($_POST['lowlimitmodel']) && isset($_POST['highlimitmodel']) && ($_POST['lowlimitmodel'] != NULL && $_POST['highlimitmodel'] != NULL)){ 
                        $modelArray = range($_POST['lowlimitmodel'], $_POST['highlimitmodel']);
                        $model = implode(',', $modelArray);
                    }
                    else if(isset($_POST['model'])){
                        $modelArray = $_POST['model'];
                        $model = implode(',', $modelArray);
                    }
                    else{
                        $modelArray = range(1950, 2024);
                        $model = implode(',', $modelArray);
                    }


                    if(isset($_POST['color']) && $_POST['color'] != NULL){
                        $colorArray = $_POST['color'];
                        $color = implode(',', $colorArray);
                    }
                    else{
                        $color = "'MetallicBlack','MetallicBlackSteal','MetallicSteelGray','MetallicStoneSilver','UtilShadowSilver',
                        'MetallicRed','MetallicCabernetRed','MetallicSeaGreen','MetallicMarinerBlue','UtilMediumBrown','WornTaxiYellow',
                        'PoliceCarBlue','MatteGreen','MatteBrown','WornOrange','MatteWhite','WornWhite','WornOliveArmyGreen','PureWhite',
                        'HotPink','SalmonPink','MetallicVermillionPink','Orange','Green','Blue','MetallicBlackBlue'";
                    }

                    //Getting CC range Input.........................
                    if(isset($_POST['lowlimitcc']) && isset($_POST['highlimitcc']) && ($_POST['lowlimitcc'] != NULL && $_POST['highlimitcc'] != NULL)){
                        $lowlimitcc = $_POST['lowlimitcc'];
                        $highlimitcc = $_POST['highlimitcc'];
                    }
                    else if(isset($_POST['ccrange']) && $_POST['ccrange'] != NULL){
                        $cc = $_POST['ccrange'];
                        if($cc == "60_to_100"){
                            $lowlimitcc = 60;
                            $highlimitcc = 100;
                        }
                        else if($cc == "100_to_150"){
                            $lowlimitcc = 100;
                            $highlimitcc = 150;
                        }
                        else if($cc == "150_to_200"){
                            $lowlimitcc = 150;
                            $highlimitcc = 200;
                        }
                        else if($cc == "200_to_250"){
                            $lowlimitcc = 200;
                            $highlimitcc = 250;
                        }
                        else if($cc == "more_than_250"){
                            $lowlimitcc = 250;
                            $highlimitcc = 800;
                        }
                    }
                    else{
                        $lowlimitcc = 0;
                        $highlimitcc = 800;
                    }

                    //Getting Mileage range input...................
                    if(isset($_POST['lowlimitmileage']) && isset($_POST['highlimitmileage']) && ($_POST['lowlimit'] != NULL && $_POST['highlimit'] != NULL)){
                        $lowlimitmileage = $_POST['lowlimitmileage'];
                        $highlimitmileage = $_POST['highlimitmileage'];
                    }
                    else if(isset($_POST['mileagerange']) && $_POST['mileagerange'] != NULL){
                        $mileage = $_POST['mileagerange'];
                        if($mileage == "20_to_35"){
                            $lowlimitmileage = 20;
                            $highlimitmileage = 35;
                        }
                        else if($mileage == "35_to_50"){
                            $lowlimitmileage = 35;
                            $highlimitmileage = 50;
                        }
                        else if($mileage == "50_to_75"){
                            $lowlimitmileage = 50;
                            $highlimitmileage = 75;
                        }
                        else if($mileage == "75_to_100"){
                            $lowlimitmileage = 75;
                            $highlimitmileage = 100;
                        }
                        else if($prize == "more_than_100"){
                            $lowlimitmileage = 100;
                            $highlimitmileage = 800;
                        }
                    }
                    else{
                        $lowlimitmileage = 0;
                        $highlimitmileage = 800;
                    }

                    if(isset($_POST['status']) && $_POST['status'] != NULL){
                        $status = implode(',', $_POST['status']);
                    }
                    else{
                        $status = "'available','sold'";
                    }

                    $query = "SELECT VEH_ID AS ID, VEH_NAME AS NAME, VEH_TYPE AS TYPE, AMOUNT, MODEL, MILEAGE, CC, COLOR FROM MYVEHICLES 
                    WHERE VEH_TYPE IN ($str) AND 
                    AMOUNT BETWEEN $lowlimitprice AND $highlimitprice AND MODEL IN ($model) AND 
                    MILEAGE BETWEEN $lowlimitmileage AND $highlimitmileage AND CC BETWEEN $lowlimitcc AND $highlimitcc AND 
                    COLOR IN ($color) AND 
                    STATUS IN ($status)";

                    //echo $query;

                    $s = oci_parse($c, $query);
                }
 
                $r = oci_execute($s);

                echo "<table border='1'>\n";
                $ncols = oci_num_fields($s);

                echo "<tr>\n";
                for ($i = 1; $i <= $ncols; ++$i) {
                    $colname = oci_field_name($s, $i);
                    echo "  <th><b>" . htmlspecialchars($colname, ENT_QUOTES | ENT_SUBSTITUTE) . "</b></th>\n";   
                }
                echo "  <th><b>OPTIONS</th>\n";
                echo "</tr>\n";

                while (($row = oci_fetch_array($s, OCI_ASSOC + OCI_RETURN_NULLS)) != false) {
                    $veh_id = $row['ID'];
                    echo "<tr>\n";
                    foreach ($row as $item) {
                        echo "  <td>" . ($item !== null ? htmlspecialchars($item, ENT_QUOTES | ENT_SUBSTITUTE) : "&nbsp;") . "</td>\n";
                    }
                    echo "  <td><button id='edit'><a href='updateVehicles.php?updateid=$veh_id'>Edit</a></button><button id='remove'><a href='deleteVehicles.php?deleteid=$veh_id'>Remove</a></button></td>\n";
                    echo "</tr>\n";
                }
                echo "</table>\n";
            }

        ?>
        </div>
        <div class="sidebar_vf" style="width: 300px;">
            
            <h3 id="sidebar-title-vehicles-filter">Options</h3>
            <form action="" method="post">
                <div><p ><b>Types</b></p>
                    <input type="checkbox" id="scooty" name="vehicle_type[]" value="'scooty'"/>
                    <label for="scooty">Scooty</label><br>

                    <input type="checkbox" id="motorcycle" name="vehicle_type[]" value="'motorcycle'">
                    <label for="motorcycle">Motor Cycle</label><br>

                    <input type="checkbox" id="sportsbike" name="vehicle_type[]" value="'sportsbike'">
                    <label for="sportsbike">Sports Bike</label><br>

                    <input type="checkbox" id="electricbike" name="vehicle_type[]" value="'electricbike'">
                    <label for="electricbike">Electric Bike</label><br>

                    <input type="checkbox" id="nongearbike" name="vehicle_type[]" value="'nongearbike'">
                    <label for="nongearbike">Non-gear Bike</label><br><hr>
                </div>
                <div><p ><b>Prize</b></p>
                    <input type="radio" name="prizerange" value="35000_to_50000"/>
                    <label for="35000_to_50000">35000 - 50000</label><br>

                    <input type="radio" name="prizerange" value="50000_to_65000">
                    <label for="50000_to_65000">50000 - 65000</label><br>

                    <input type="radio" name="prizerange" value="65000_to_95000">
                    <label for="65000_to_95000">65000 - 95000</label><br>

                    <input type="radio" name="prizerange" value="95000_to_120000">
                    <label for="95000_to_120000">95000 - 120000</label><br>

                    <input type="radio" name="prizerange" value="more_than_120000">
                    <label for="more_than_120000">More than 120000 </label><br>

                    <p><b>For a Specific Range of Prize :</b></p>
                    <input type="number" id="lowlimit" name="lowlimit" style="height: 15px; width: 75px; border: 2px solid black; border-radius: 5px;" placeholder="Lower"><span> - </span>
                    <input type="number" id="highlimit" name="highlimit" style="height: 15px; width: 75px; border: 2px solid black; border-radius: 5px;" placeholder="Higher"></p><hr>

                </div>
                <div><p ><b>Model</b></p>
                    <input type="checkbox" id="2023" name="model[]" value="2023"/>
                    <label for="2023">2023</label><br>

                    <input type="checkbox" id="2022" name="model[]" value="2022">
                    <label for="2022">2022</label><br>

                    <input type="checkbox" id="2021" name="model[]" value="2021">
                    <label for="2021">2021</label><br>

                    <input type="checkbox" id="2020" name="model[]" value="2020">
                    <label for="2020">2020</label><br>

                    <p><b>For Older and Specific Models :</b></p>
                    <input type="number" id="lowlimitmodel" name="lowlimitmodel" style="height: 15px; width: 75px; border: 2px solid black; border-radius: 5px;" placeholder="Lower"><span> - </span>
                    <input type="number" id="highlimitmodel" name="highlimitmodel" style="height: 15px; width: 75px; border: 2px solid black; border-radius: 5px;" placeholder="Higher"></p><hr>
                </div>

                <div><p ><b>Color</b></p>
                    <select id="color" name="color[]" multiple size=5>
                        <option value="'Select'">Select</option>
                        <option value="'MetallicBlack'">Metallic Black</option>
                        <option value="'MetallicBlackSteal'">Metallic Black Steal</option>
                        <option value="'MetallicSteelGray'">Metallic Steel Gray</option>
                        <option value="'MetallicStoneSilver'">Metallic Stone Silver</option>
                        <option value="'UtilShadowSilver'">Util Shadow Silver</option>
                        <option value="'MetallicRed'">Metallic Red</option>
                        <option value="'MetallicCabernetRed'">Metallic Cabernet Red</option>
                        <option value="'MetallicSeaGreen'">Metallic Sea Green</option>
                        <option value="'MetallicMarinerBlue'">MetallicMarinerBlue</option>
                        <option value="'UtilMediumBrown'">Util Medium Brown</option>
                        <option value="'WornTaxiYellow'">Worn Taxi Yellow</option>
                        <option value="'PoliceCarBlue'">Police Car Blue</option>
                        <option value="'MatteGreen'">Matte Green</option>
                        <option value="'MatteBrown'">Matte Brown</option>
                        <option value="'WornOrange'">Worn Orange</option>
                        <option value="'MatteWhite'">Matte White</option>
                        <option value="'WornWhite'">Worn White</option>
                        <option value="'WornOliveArmyGreen'">Worn Olive Army Green</option>
                        <option value="'PureWhite'">Pure White</option>
                        <option value="'HotPink'">Hot Pink</option>
                        <option value="'SalmonPink'">Salmon Pink</option>
                        <option value="'MetallicVermillionPink'">Metallic Vermillion Pink</option>
                        <option value="'Orange'">Orange</option>
                        <option value="'Green'">Green</option>
                        <option value="'Blue'">Blue</option>
                        <option value="'MetallicBlackBlue'">Metallic Black Blue</option>
                    </select><hr>
                </div>

                <div><p ><b>CC</b></p>
                    <input type="radio" id="ccrange" name="ccrange" value="60_to_100"/>
                    <label for="60_to_100">60 - 100</label><br>

                    <input type="radio" id="ccrange" name="ccrange" value="100_to_150">
                    <label for="100_to_150">100 - 150</label><br>

                    <input type="radio" id="ccrange" name="ccrange" value="150_to_200">
                    <label for="150_to_200">150 - 200</label><br>

                    <input type="radio" id="ccrange" name="ccrange" value="200_to_250">
                    <label for="200_to_250">200 - 250</label><br>

                    <input type="radio" id="ccrange" name="ccrange" value="more_than_250">
                    <label for="more_than_250">More than 250 </label><br>

                    <p><b>For a Specific Range of CC :</b></p>
                    <input type="number" id="lowlimitcc" name="lowlimitcc" style="height: 15px; width: 75px; border: 2px solid black; border-radius: 5px;" placeholder="Lower"><span> - </span>
                    <input type="number" id="highlimitcc" name="highlimitcc" style="height: 15px; width: 75px; border: 2px solid black; border-radius: 5px;" placeholder="Higher"></p><hr>
                </div>

                <div><p ><b>Mileage</b></p>
                    <input type="radio" id="mileagerange" name="mileagerange" value="20_to_35"/>
                    <label for="20_to_35">20 - 35</label><br>

                    <input type="radio" id="mileagerange" name="mileagerange" value="35_to_50">
                    <label for="35_to_50">35 - 50</label><br>

                    <input type="radio" id="mileagerange" name="mileagerange" value="50_to_75">
                    <label for="50_to_75">50 - 75</label><br>

                    <input type="radio" id="mileagerange" name="mileagerange" value="75_to_100">
                    <label for="75_to_100">75 - 100</label><br>

                    <input type="radio" id="mileagerange" name="mileagerange" value="more_than_100">
                    <label for="more_than_100">More than 100</label><br>

                    <p><b>For a Specific Range of Mileage :</b></p>
                    <input type="number" id="lowlimitmileage" name="lowlimitmileag" style="height: 15px; width: 75px; border: 2px solid black; border-radius: 5px;" placeholder="Lower"><span> - </span>
                    <input type="number" id="highlimitmileage" name="highlimitmileage" style="height: 15px; width: 75px; border: 2px solid black; border-radius: 5px;" placeholder="Higher"></p><hr>
                </div>

                <div><p ><b>Status</b></p>
                    <input type="checkbox" name="status[]" value="'available'"/>
                    <label for="available">Available</label><br>

                    <input type="checkbox" name="status[]" value="'sold'">
                    <label for="sold">Sold</label><br><hr>
                </div>

                <div>
                    <p><b>Vehicle Name : </b></p>
                    <input type="text" id="vehiclename" name="vehiclename" style="height: 15px; width: 125px; border: 2px solid black; border-radius: 5px;" placeholder="Ex . Grizzly EPS"><hr>
                </div>

                <div>
                    <p><b>Vehicle ID : </b></p>
                    <input type="number" id="vehicleid" name="vehicleid" style="height: 15px; width: 125px; border: 2px solid black; border-radius: 5px;" placeholder="Ex . 123456">
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
    padding: 10px;
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
    height: 1330px;
    width: 850px;
    padding: 75px;
    border-radius: 15px;
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
    height: 1630px;
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
    width: 268px;
    height: 25px;
    margin: 0px;
    display: block;
    border-radius:10px 10px 0px 0px ;
    background-color: black;
    border: 2px solid white;
}

.sidebar_vf2{
    margin: 20px 0px 0px 0px;
    font-family: Arial, Helvetica, sans-serif;   
    width: 250px;
    height: 190px;
    background-color: white;
    border-radius: 10px;
}

.sidebar_vf2 div{
    margin: 20px;
}

.sidebar_vf2 h3 {
    font-weight: bold; 
    font-family: 'Dancing Script', cursive;
    border: 2px solid white;
}

.sidebar_vf2 #sidebar-title{
    color: white;
    padding: 15px;
    text-align: center; 
    width: 217px;
    height: 25px;
    margin: 0px;
    display: block;
    border-radius:10px 10px 0px 0px;
    background-color: black;
}

.sidebar_vf2 #sidebar-title-vehicles-filter{
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