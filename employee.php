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
            <li><a href="billings.html">Billings</a></li>
            <li><a href="admin.html">Admin</a></li>
        </ul>
    </div>
    <div class="main-contents" style="height: 1700px;">
        <div style="float: left; margin-top: 20px;">
            <div class="sidebar_vf" style="width: 302px;">
                
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
                        <input type="radio" id="prizerange" name="prizerange" value="35000_to_50000"/>
                        <label for="35000_to_50000">35000 - 50000</label><br>

                        <input type="radio" id="prizerange" name="prizerange" value="50000_to_65000">
                        <label for="50000_to_65000">50000 - 65000</label><br>

                        <input type="radio" id="prizerange" name="prizerange" value="65000_to_95000">
                        <label for="65000_to_95000">65000 - 95000</label><br>

                        <input type="radio" id="prizerange" name="prizerange" value="95000_to_120000">
                        <label for="95000_to_120000">95000 - 120000</label><br>

                        <input type="radio" id="prizerange" name="prizerange" value="more_than_120000">
                        <label for="more_than_120000">More than 120000 </label><br>

                        <p><b>For a Specific Range of Prize :</b></p>
                        <input type="number" id="lowlimit" name="lowlimit" style="height: 15px; width: 75px; border: 2px solid black; border-radius: 5px;" placeholder="Lower"><span> - </span>
                        <input type="number" id="highlimit" name="highlimit" style="height: 15px; width: 75px; border: 2px solid black; border-radius: 5px;" placeholder="Higher"></p><hr>

                    </div>
                    <div><p ><b>Model</b></p>
                        <input type="checkbox" id="2023" name="2023" value="2023"/>
                        <label for="2023">2023</label><br>

                        <input type="checkbox" id="2022" name="2022" value="2022">
                        <label for="2022">2022</label><br>

                        <input type="checkbox" id="2021" name="2021" value="2021">
                        <label for="2021">2021</label><br>

                        <input type="checkbox" id="2020" name="2020" value="2020">
                        <label for="2020">2020</label><br>

                        <p><b>For Older and Specific Models :</b></p>
                        <input type="number" id="lowlimitmodel" name="lowlimitmodel" style="height: 15px; width: 75px; border: 2px solid black; border-radius: 5px;" placeholder="Lower"><span> - </span>
                        <input type="number" id="highlimitmodel" name="highlimitmodel" style="height: 15px; width: 75px; border: 2px solid black; border-radius: 5px;" placeholder="Higher"></p><hr>
                    </div>

                    <div><p ><b>Color</b></p>
                        <select id="color" name="color" multiple size=5>
                            <option value="MetallicBlack">Metallic Black</option>
                            <option value="MetallicBlackSteal">Metallic Black Steal</option>
                            <option value="MetallicSteelGray">Metallic Steel Gray</option>
                            <option value="MetallicStoneSilver">Metallic Stone Silver</option>
                            <option value="UtilShadowSilver">Util Shadow Silver</option>
                            <option value="MetallicRed">Metallic Red</option>
                            <option value="MetallicCabernetRed">Metallic Cabernet Red</option>
                            <option value="MetallicSeaGreen">Metallic Sea Green</option>
                            <option value="MetallicMarinerBlue">MetallicMarinerBlue</option>
                            <option value="UtilMediumBrown">Util Medium Brown</option>
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
                        <input type="radio" id="ccrange" name="ccrange" value="60_to_100"/>
                        <label for="60_to_100">60 - 100</label><br>

                        <input type="radio" id="ccrange" name="ccrange" value="100_to_150">
                        <label for="100_to_150">100 - 150</label><br>

                        <input type="radio" id="ccrange" name="ccrange" value="150_to_200">
                        <label for="150_to_200">150 - 200</label><br>

                        <input type="radio" id="ccrange" name="ccrange" value="200_to_250">
                        <label for="200_to_250">200 - 250</label><br>

                        <input type="radio" id="ccrange" name="ccrange" value="more_than_250">
                        <label for="more_than_250">More than 250</label><br>

                        <p><b>For a Specific Range of Mileage :</b></p>
                        <input type="number" id="lowlimitmileage" name="lowlimitmileag" style="height: 15px; width: 75px; border: 2px solid black; border-radius: 5px;" placeholder="Lower"><span> - </span>
                        <input type="number" id="highlimitmileage" name="highlimitmileage" style="height: 15px; width: 75px; border: 2px solid black; border-radius: 5px;" placeholder="Higher"></p>
                    </div>
                    <div>
                        <input type="submit" value="Go" style=" height:20px; width:65px; background-color: rgb(230, 230, 230); border-radius: 5px;">
                    </div>
                </form>
            </div>

            <div class="sidebar_vf2" style="float: left; width: 302px; height: 280px">
                <h3 id="sidebar-title-vehicles-filter">To Remove an Employee</h3>
                <form>
                    
                    <div>
                        <p><span style="color: red;"><b>Note :</b></span> To remove a specific employee, Do confirm their ID using <i>filter options</i>. Then remove that employee.</p>
                        <p><b>Employee ID : </b></p>
                        <input type="number" id="empid" name="empid" style="height: 15px; width: 125px; border: 2px solid black; border-radius: 5px;" placeholder="Employee's ID Number">
                    </div>
                    <div>
                        <input type="submit" value="Remove" style=" height:20px; width:65px; background-color: rgb(230, 230, 230); border-radius: 5px;">
                    </div>
                </form>
            </div>
        </div>

        <div class="output_box" style="float: left;">
            <?php
                error_reporting(E_ALL);
                ini_set('display_errors', 'On');

                $username = "system";
                $password = "aravinth583#";
                $database = "localhost/XE";

                $c = oci_connect($username, $password, $database);
                
                // Getting Types input---------------------------------
                if(isset($_POST['vehicle_type'])){
                    $type = $_POST['vehicle_type'];
                }else{
                    $type = ["'scooty'","'motorcycle'","'sportsbike'","'nongearbike'","'electricbike'"];
                }
                $str = implode(',', $type);

                //Getting prize Range input-----------------------------
                $lowlimitprice = 0;
                $highlimitprice = 300000;

                if(isset($_POST['lowlimit']) || isset($_POST['highlimit'])){
                    if(isset($_POST['lowlimit']) && isset($_POST['highlimit'])){
                        $lowlimitprice = $_POST['lowlimit'];
                        $highlimitprice = $_POST['highlimit'];
                    }
                    elseif(isset($_POST['lowlimit'])){
                        $lowlimitprice = $_POST['lowlimit'];
                    }
                    elseif(isset($_POST['highlimit'])){
                        $highlimitprice = $_POST['highlimit'];
                    }
                }

                if(isset($_POST['prizerange'])){
                    $prize = $_POST['prizerange'];
                    if($prize == "35000_to_50000"){
                        $lowlimitprice = 35000;
                        $highlimitprice = 50000;
                    }
                    elseif($prize == "50000_to_65000"){
                        $lowlimitprice = 50000;
                        $highlimitprice = 65000;
                    }
                    elseif($prize == "65000_to_95000"){
                        $lowlimitprice = 65000;
                        $highlimitprice = 95000;
                    }
                    elseif($prize == "95000_to_120000"){
                        $lowlimitprice = 95000;
                        $highlimitprice = 120000;
                    }
                    elseif($prize == "more_than_120000"){
                        $lowlimitprice = 120000;
                    }
                }

                if($highlimitprice == NULL){
                    $highlimitprice = 300000;
                }
                if($lowlimitprice == NULL){
                    $lowlimitprice = 0;
                }
                
                //Getting model input-----------------------------
                $lowlimitmodel = 0;
                $highlimitmodel = 300000;

                if(isset($_POST['lowlimitmodel']) || isset($_POST['highlimitmodel'])){
                    if(isset($_POST['lowlimit']) && isset($_POST['highlimit'])){
                        $lowlimitprice = $_POST['lowlimitmodel'];
                        $highlimitprice = $_POST['highlimitmodel'];
                    }
                    elseif(isset($_POST['lowlimitmodel'])){
                        $lowlimitprice = $_POST['lowlimitmodel'];
                    }
                    elseif(isset($_POST['highlimitmodel'])){
                        $highlimitprice = $_POST['highlimitmodel'];
                    }
                }

                if(isset($_POST['prizerange'])){
                    $prize = $_POST['prizerange'];
                    if($prize == "35000_to_50000"){
                        $lowlimitprice = 35000;
                        $highlimitprice = 50000;
                    }
                    elseif($prize == "50000_to_65000"){
                        $lowlimitprice = 50000;
                        $highlimitprice = 65000;
                    }
                    elseif($prize == "65000_to_95000"){
                        $lowlimitprice = 65000;
                        $highlimitprice = 95000;
                    }
                    elseif($prize == "95000_to_120000"){
                        $lowlimitprice = 95000;
                        $highlimitprice = 120000;
                    }
                    elseif($prize == "more_than_120000"){
                        $lowlimitprice = 120000;
                    }
                }

                if($highlimitprice == NULL){
                    $highlimitprice = 300000;
                }
                if($lowlimitprice == NULL){
                    $lowlimitprice = 0;
                }


                //--------------------------------------Query-----------------------------------------------------------

                $query = "SELECT * FROM MYCUSTOMERS WHERE veh_type IN ($str) AND amount BETWEEN $lowlimitprice AND $highlimitprice";
                echo $query;
                

                if (!$c) {
                    $m = oci_error();
                    trigger_error('Could not connect to database: ' . $m['message'], E_USER_ERROR);
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
                echo "</tr>\n";

                while (($row = oci_fetch_array($s, OCI_ASSOC + OCI_RETURN_NULLS)) != false) {
                    echo "<tr>\n";
                    foreach ($row as $item) {
                        echo "  <td>" . ($item !== null ? htmlspecialchars($item, ENT_QUOTES | ENT_SUBSTITUTE) : "&nbsp;") . "</td>\n";
                    }
                    echo "</tr>\n";
                }

                echo "</table>\n";
                if (isset($_POST['vehicle_type'])) {
                    foreach ($_POST['vehicle_type'] as $type){
                        echo "Selected: $type<br>";
                    }
                } else {
                    echo "No vehicles selected.";
                }
            ?>
        </div>

            <div class="sidebar_vf" style="float: left; width: 302px; margin-top: 20px; height: 1175px;">
                
                <h3 id="sidebar-title-vehicles-filter">To Add a New Employee</h3>
                
                <form action="" method="post">
                    <!--Employee ID-------------------------------------------------------->
                    <div>
                        <p ><b>Employee ID : </b></p>
                        <input type="number" id="empid" name="empid" style="height: 20px; width: 175px;  border-radius: 3px; padding: 5px;" placeholder="Employee ID Number">
                        <hr>
                    </div>
                    <!--Employee Name-------------------------------------------------------->
                    <div>
                    <p ><b>Employee Name : </b></p>
                        <input type="text" id="empname" name="empname" style="height: 20px; width: 175px; border-radius: 3px; padding: 5px;" placeholder="Full Name of The Employee">
                        <hr>
                    </div>
                    <!--Employee Designation-------------------------------------------------------->
                    <div><p><b>Designation : </b></p>
                        <select id="designation" name="designation">
                            <option value="Select">Select</option>
                            <option value="Showroom Manager">Showroom Manager</option>
                            <option value="SalesManager">Sales Manager</option>
                            <option value="SalesExecutive">Sales Executive</option>
                            <option value="ServiceManager">Service Manager</option>
                            <option value="ServiceAdvisor">Service Advisor</option>
                            <option value="Mechanic/Technician">Mechanic/Technician</option>
                            <option value="SparePartsManager">Spare Parts Manager</option>
                            <option value="ExchangeSectionManager">Exchange Section Manager</option>
                            <option value="SalesSectionStaff">Sales Section Staff</option>
                            <option value="ExchangeSectionStaff">Exchange Section Staff</option>
                            <option value="BillingSpecialist">Billing Specialist</option>

                            <option value="Cleaners">Cleaners</option>
                            <option value="Security Staff">Security Staff</option>
                        </select>
                        <hr>
                    </div>

                    <!--Employee Qualification-------------------------------------------------------->
                    <div><p><b>Qualification : </b></p>
                            <input type="text" id="qualification1" name="qualification1" style="height: 15px; width: 175px; border: 2px solid black; border-radius: 3px; padding: 5px; margin-bottom: 5px;" placeholder="Qualification - 1">
                            <input type="text" id="qualification2" name="qualification2" style="height: 15px; width: 175px; border: 2px solid black; border-radius: 3px; padding: 5px; margin-bottom: 5px;" placeholder="Qualification - 2">
                            <input type="text" id="qualification3" name="qualification3" style="height: 15px; width: 175px; border: 2px solid black; border-radius: 3px; padding: 5px;" placeholder="Qualification - 3">
                        <hr>
                    </div>
                    <!--Employee Salary-------------------------------------------------------->
                    <div>
                        <p ><b>Salary : </b></p>
                        <input type="number" id="salary" name="salary" style="height: 20px; width: 175px; border-radius: 3px; padding: 5px;" placeholder="Employee Salary">
                        <hr>
                    </div>
                    <div><p ><b>Date of join : </b></p>
                        <input type="date" id="DOJ" name="DOJ" style="height: 20px; width: 175px; border-radius: 3px; padding: 5px;" required/>
                        <hr>
                    </div>
                    <!--Employee Contact Number-------------------------------------------------------->
                    <div>
                        <p ><b>Contact Number : </b></p>
                        <input type="number" id="contact" name="contact" style="height: 20px; width: 175px; border-radius: 3px; padding: 5px;" placeholder="+91 0000000000">
                        <hr>
                    </div>
                    <!--Employee Email ID-------------------------------------------------------->
                    <div>
                    <p ><b>Employee Email ID : </b></p>
                        <input type="email" id="email" name="email" style="height: 20px; width: 175px; border-radius: 3px; padding: 5px;" placeholder="example@gmail.com">
                        <hr>
                    </div>
                    <!--Date of Birth-------------------------------------------------------->
                    <div><p ><b>Date of Birth : </b></p>
                        <input type="date" id="DOB" name="DOB" style="height: 20px; width: 175px;  border-radius: 3px; padding: 5px;" required/>
                        <hr>
                    </div>

                    <!--Employee Name-------------------------------------------------------->
                    <div>
                    <p ><b>Employee Address : </b></p>
                        <textarea id="address" name="address" rows="4" style="width: 175px; border-radius: 3px; padding: 5px;" required></textarea>
                    </div>


                    <div>
                        <input type="submit" value="Go" style=" height:20px; width:65px; background-color: rgb(230, 230, 230); border-radius: 5px;">
                    </div>
                </form>
            </div>

            <div class="sidebar_vf2" style="float: left; width: 302px;">
                <h3 id="sidebar-title-vehicles-filter">To Remove an Employee</h3>
                <form>
                    <div>
                        <p><b>Employee ID : </b></p>
                        <input type="number" id="empid" name="empid" style="height: 15px; width: 125px; border: 2px solid black; border-radius: 5px;" placeholder="Employee's ID Number">
                    </div>
                    <div>
                        <input type="submit" value="Remove" style=" height:20px; width:65px; background-color: rgb(230, 230, 230); border-radius: 5px;">
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
    padding: 0px 20px;
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

.output_box{
    border: 2px solid saddlebrown;
    background-color: white;
    height: 1400px;
    width: 650px;
    padding: 75px;
    border-radius: 15px;
    margin: 20px
}

.sidebar_vf{
    font-family: Arial, Helvetica, sans-serif;   
    width: 302px;
    height: 1350px;
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
    width: 252px;
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

#designation{
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