<!DOCTYPE html>
<html>
<head>
    <title>Show Room : Employees</title>
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
                <p><span id="indentation"></span>In this page You can Search for a specific employee, you can filter employees by their details. Also, You can add a new employee, remove an Existing employee. You can Update an employee details.</p>
            </div>
            <div style="float: right;">
                <button type="button" id="addemployee" style="width: 150px; height: 30px; border-radius:4px; background-color: #7575a3; margin: 30px;"><a href="addEmployee.php"><b>Add Employee</b></a></button>
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
                
                // Getting Types input---------------------------------
                if(isset($_POST['submit'])){
                    //Employee ID
                    if(isset($_POST['empid']) && $_POST['empid'] != NULL){
                        $id = $_POST['empid'];
                        $query = "SELECT EMPID, NAME, DESIGNATION, QUAL1, SALARY, CONTACT, DOJ, AGE, ADDRESS FROM MYEMPLOYEES WHERE EMPID = $id";
                    }
                    //Employee name
                    else if(isset($_POST['empname']) && $_POST['empname'] != NULL){
                        $empname = $_POST['empname'];
                        $query = "SELECT EMPID, NAME, DESIGNATION, QUAL1, SALARY, CONTACT, DOJ, AGE, ADDRESS FROM MYEMPLOYEES WHERE NAME = '$empname'";
                    }
                    //Contact
                    else if(isset($_POST['contact']) && $_POST['contact'] != NULL){
                        $contact = $_POST['contact'];
                        $query = "SELECT EMPID, NAME, DESIGNATION, QUAL1, SALARY, CONTACT, DOJ, AGE, ADDRESS FROM MYEMPLOYEES WHERE CONTACT = $contact";
                    }
                    //Email
                    else if(isset($_POST['email']) && $_POST['email'] != NULL){
                        $email = $_POST['email'];
                        $query = "SELECT EMPID, NAME, DESIGNATION, QUAL1, SALARY, CONTACT, DOJ, AGE, ADDRESS FROM MYEMPLOYEES WHERE EMAIL = '$email'";
                    }

                    //Other Inputs 
                    else{
                        //For Designation
                        if(isset($_POST['designation']) && $_POST['designation'] != NULL){
                            $desgArray = $_POST['designation'];
                            $desg = implode(',', $desgArray);
                        }
                        else{
                            $desg = "'ShowroomManager', 'SalesManager', 'SalesExecutive', 'ServiceManager', 
                            'ServiceAdvisor', 'Mechanic/Technician', 'SparePartsManager', 'ExchangeSectionManager', 
                            'SalesSectionStaff', 'ExchangeSectionStaff', 'BillingSpecialist', 'Cleaners', 'SecurityStaff'";
                        }

                        //For salary
                        if(isset($_POST['lowlimitsalary']) && isset($_POST['highlimitsalary']) && ($_POST['lowlimitsalary'] != NULL && $_POST['highlimitsalary'] != NULL)){
                            $lowlimitsalary = $_POST['lowlimitsalary'];
                            $highlimitsalary = $_POST['highlimitsalary'];
                        }
                        else if(isset($_POST['salaryrange']) && $_POST['salaryrange'] != NULL){
                            $salary = $_POST['salaryrange'];
                            if($salary == "less_than_25000"){
                                $lowlimitsalary = 0;
                                $highlimitsalary = 25000;
                            }
                            else if($salary == "25000_to_40000"){
                                $lowlimitsalary = 25000;
                                $highlimitsalary = 40000;
                            }
                            else if($salary == "40000_to_65000"){
                                $lowlimitsalary = 40000;
                                $highlimitsalary = 65000;
                            }
                            else if($salary == "65000_to_95000"){
                                $lowlimitsalary = 65000;
                                $highlimitsalary = 95000;
                            }
                            else if($salary == "more_than_90000"){
                                $lowlimitsalary = 90000;
                                $highlimitsalary = 300000;
                            }
                        }
                        else{
                            $lowlimitsalary = 0;
                            $highlimitsalary = 300000;
                        }

                        //For qualification
                        if(isset($_POST['qualification']) && $_POST['qualification'] != NULL){
                            $qualification = implode(', ', $_POST['qualification']);
                        }
                        else{
                            $qualification = "'B.TECH', 'B.E', 'M.TECH', 'M.E', 'MBA', 'BBA', 'B.COM', 
                            'BSC', 'MSC', 'HIGH SCHOOL', 'HIGHER SECONDARY SCHOOL'";
                        }

                        //For Joined date
                        if(isset($_POST['lowDOJ']) && isset($_POST['highDOJ']) && ($_POST['lowDOJ'] != NULL && $_POST['highDOJ'] != NULL)){
                            $startDOJ = $_POST["lowDOJ"];
                            $endDOJ = $_POST["highDOJ"];
                        }
                        else{
                            $startDOJ = "1950-JAN-01";
                            $endDOJ = date("Y-m-d");
                        }

                        //For Left date
                        if(isset($_POST['lowDOL']) && isset($_POST['highDOL']) && ($_POST['lowDOL'] != NULL && $_POST['highDOL'] != NULL)){
                            echo $_POST['lowDOL'];
                            echo $_POST['highDOL'];
                            $startDOL = $_POST["lowDOL"];
                            $endDOL = $_POST["highDOL"];
                        }
                        else{
                            $startDOL = NULL;
                            $endDOL = NULL;
                        }

                        //For Age
                        if(isset($_POST['lowlimitage']) && isset($_POST['highlimitage']) && ($_POST['lowlimitage'] != NULL && $_POST['highlimitage'] != NULL)){
                            $lowlimitage = $_POST['lowlimitage'];
                            $highlimitage = $_POST['highlimitage'];
                        }
                        else if(isset($_POST['agerange']) && $_POST['agerange'] != NULL){
                            $age = $_POST['agerange'];
                            if($age == "20_to_25"){
                                $lowlimitage = 20;
                                $highlimitage = 25;
                            }
                            else if($age == "25_to_30"){
                                $lowlimitage = 25;
                                $highlimitage = 30;
                            }
                            else if($age == "30_to_35"){
                                $lowlimitage = 30;
                                $highlimitage = 35;
                            }
                            else if($age == "35_to_40"){
                                $lowlimitage = 35;
                                $highlimitage = 40;
                            }
                            else if($age == "more_than_40"){
                                $lowlimitage = 40;
                                $highlimitage = 100;
                            }
                        }
                        else{
                            $lowlimitage = 0;
                            $highlimitage = 100;
                        }

                        if($startDOL == NULL && $endDOL == NULL){
                            $query = "SELECT EMPID, NAME, DESIGNATION, QUAL1, SALARY, CONTACT, DOJ, AGE, ADDRESS FROM MYEMPLOYEES WHERE DESIGNATION IN ($desg) AND 
                            (QUAL1 IN ($qualification) OR QUAL2 IN ($qualification) OR QUAL3 IN ($qualification)) AND 
                            SALARY BETWEEN $lowlimitsalary AND $highlimitsalary AND 
                            DOJ BETWEEN TO_DATE('$startDOJ', 'YYYY-MM-DD') AND TO_DATE('$endDOJ', 'YYYY-MM-DD') AND 
                            AGE BETWEEN $lowlimitage AND $highlimitage";
                        }
                        else{
                            $query = "SELECT EMPID, NAME, DESIGNATION, QUAL1, SALARY, CONTACT, DOJ, DOL, AGE, ADDRESS FROM MYEMPLOYEES WHERE DESIGNATION IN ($desg) AND 
                            (QUAL1 IN ($qualification) OR QUAL2 IN ($qualification) OR QUAL3 IN ($qualification)) AND 
                            SALARY BETWEEN $lowlimitsalary AND $highlimitsalary AND 
                            DOJ BETWEEN TO_DATE('$startDOJ', 'YYYY-MM-DD') AND TO_DATE('$endDOJ', 'YYYY-MM-DD') AND
                            DOL BETWEEN TO_DATE('$startDOL', 'YYYY-MM-DD') AND TO_DATE('$endDOL', 'YYYY-MM-DD') AND 
                            AGE BETWEEN $lowlimitage AND $highlimitage";
                        }
                    }


                    //echo $query;
                

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
                        $id = $row['EMPID'];
                        echo "<tr>\n";
                        foreach ($row as $item) {
                            echo "  <td>" . ($item !== null ? htmlspecialchars($item, ENT_QUOTES | ENT_SUBSTITUTE) : "&nbsp;") . "</td>\n";
                        }
                        echo "  <td><button id='edit'><a href='updateEmployee.php?updateid=$id'>Edit</a></button><button id='remove'><a href='deleteEmployee.php?deleteid=$id'>Remove</a></button></td>\n";
                        echo "</tr>\n";
                    }
                    echo "</table>\n";
                }
                
                //--------------------------------------Query-----------------------------------------------------------

                //$query = "SELECT EMPID, NAME, DESIGNATION, QUAL1, SALARY, CONTACT, DOJ, DOL, AGE, ADDRESS FROM MYEMPLOYEES";
                
                     
            ?>
        </div>
        <div class="sidebar_vf" style="width: 300px;">
            
            <h3 id="sidebar-title-vehicles-filter">Options</h3>
            <form action="" method="post">
                <div><p><b>Designation : </b></p>
                    <select id="designation" name="designation[]" multiple>
                        <option value="'ShowroomManager'">Showroom Manager</option>
                        <option value="'SalesManager'">Sales Manager</option>
                        <option value="'SalesExecutive'">Sales Executive</option>
                        <option value="'ServiceManager'">Service Manager</option>
                        <option value="'ServiceAdvisor'">Service Advisor</option>
                        <option value="'Mechanic/Technician'">Mechanic/Technician</option>
                        <option value="'SparePartsManager'">Spare Parts Manager</option>
                        <option value="'ExchangeSectionManager'">Exchange Section Manager</option>
                        <option value="'SalesSectionStaff'">Sales Section Staff</option>
                        <option value="'ExchangeSectionStaff'">Exchange Section Staff</option>
                        <option value="'BillingSpecialist'">Billing Specialist</option>

                        <option value="'Cleaners'">Cleaners</option>
                        <option value="'SecurityStaff'">Security Staff</option>
                    </select>
                    <hr>
                </div>

                <div><p><b>Salary</b></p>
                    <input type="radio" id="salaryrange" name="salaryrange" value="less_than_25000">
                    <label for="less_than_25000">Less than 25000</label><br>

                    <input type="radio" id="salaryrange" name="salaryrange" value="25000_to_40000"/>
                    <label for="25000_to_40000">25000 - 40000</label><br>

                    <input type="radio" id="salaryrange" name="salaryrange" value="40000_to_65000">
                    <label for="40000_to_65000">40000 - 65000</label><br>

                    <input type="radio" id="salaryrange" name="salaryrange" value="65000_to_95000">
                    <label for="65000_to_95000">65000 - 90000</label><br>

                    <input type="radio" id="salaryrange" name="salaryrange" value="more_than_90000">
                    <label for="more_than_90000">More than 90000</label><br>

                    <p><b>For a Specific Range of salary :</b></p>
                    <input type="number" id="lowlimitsalary" name="lowlimitsalary" style="height: 15px; width: 75px; border: 2px solid black; border-radius: 5px;" placeholder="Lower"><span> - </span>
                    <input type="number" id="highlimitsalary" name="highlimitsalary" style="height: 15px; width: 75px; border: 2px solid black; border-radius: 5px;" placeholder="Higher"></p><hr>
                </div>

                <div><p><b>Qualification : </b></p>
                    <select id="qualification" name="qualification[]" multiple>
                        <option value="'B.TECH'">B.TECH</option>
                        <option value="'B.E'">B.E</option>
                        <option value="'M.TECH'">M.TECH</option>
                        <option value="'M.E'">M.E</option>
                        <option value="'MBA'">MBA</option>
                        <option value="'BBA'">BBA</option>
                        <option value="'B.COM'">B.COM</option>
                        <option value="'BSC'">BSC</option>
                        <option value="'MSC'">MSC</option>

                        <option value="'HIGH SCHOOL'">HIGH SCHOOL</option>
                        <option value="'HIGHER SECONDARY SCHOOL'">HIGHER SECONDARY SCHOOL</option>
                    </select>
                    <hr>
                </div>

                <div><p><b>Joined Date : </b></p>
                    <input type="date" id="lowDOJ" name="lowDOJ" style="height: 15px; width: 100px; border-radius: 3px; padding: 5px;"/><span> - </span>
                    <input type="date" id="highDOJ" name="highDOJ" style="height: 15px; width: 100px; border-radius: 3px; padding: 5px;"/>
                    <hr>
                </div>

                <div><p><b>Left Date : </b></p>
                    <input type="date" id="lowDOL" name="lowDOL" style="height: 15px; width: 100px; border-radius: 3px; padding: 5px;"/><span> - </span>
                    <input type="date" id="highDOL" name="highDOL" style="height: 15px; width: 100px; border-radius: 3px; padding: 5px;"/>
                    <hr>
                </div>

                <div><p><b>Age</b></p>
                    <input type="radio" id="agerange" name="agerange" value="20_to_25">
                    <label for="20_to_25">20 - 25</label><br>

                    <input type="radio" id="agerange" name="agerange" value="25_to_30"/>
                    <label for="25_to_30">25 - 30</label><br>

                    <input type="radio" id="agerange" name="agerange" value="30_to_35">
                    <label for="30_to_35">30 - 35</label><br>

                    <input type="radio" id="agerange" name="agerange" value="35_to_40">
                    <label for="35_to_40">35 - 40</label><br>

                    <input type="radio" id="agerange" name="agerange" value="more_than_40">
                    <label for="more_than_40">More than 40</label><br>

                    <p><b>For a Specific Range of Age :</b></p>
                    <input type="number" id="lowlimitage" name="lowlimitage" style="height: 15px; width: 75px; border: 2px solid black; border-radius: 5px;" placeholder="Lower"><span> - </span>
                    <input type="number" id="highlimitage" name="highlimitage" style="height: 15px; width: 75px; border: 2px solid black; border-radius: 5px;" placeholder="Higher"></p><hr>
                </div>


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

                <div>
                    <p ><b>Contact Number : </b></p>
                    <input type="number" id="contact" name="contact" style="height: 20px; width: 175px; border-radius: 3px; padding: 5px;" placeholder="+91 0000000000">
                    <hr>
                </div>
                <!--Employee Email ID-------------------------------------------------------->
                <div>
                    <p ><b>Employee Email ID : </b></p>
                    <input type="email" id="email" name="email" style="height: 20px; width: 175px; border-radius: 3px; padding: 5px;" placeholder="example@gmail.com">
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
    background-color: #0080ff;
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
    padding: 10px 20px;
}

a {
    text-decoration: none; /* Remove underline */
    color: inherit; /* Use the default text color of the parent element */
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

.output_box{
    border: 2px solid saddlebrown;
    background-color: white;
    height: 1230px;
    width: 950px;
    padding: 35px;
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
    height: 1450px;
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


#designation, #qualification{
    width: 200px;
    padding: 5px;
    border-radius:5px 0px 0px 5px;
    border: 2px solid black;
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