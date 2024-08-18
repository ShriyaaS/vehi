<!DOCTYPE html>
<html>
<head>
    <title>Show Room : Update Employees</title>
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
            height: 1350px;
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

<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');

    $username = "system";
    $password = "aravinth583#";
    $database = "localhost/XE";

    $c = oci_connect($username, $password, $database);
    $id = $_GET['updateid'];

    //$id = $name = $des = $qualification1 = $qualification2 = $qualification3 = $sal = $doj = $dol = $con = $mail = $dob = $branch = $age = $add = '';

    $query = "SELECT * FROM MYEMPLOYEES WHERE empid = $id";
    $eq = oci_parse($c, $query);

    $result = oci_execute($eq);
    $row = oci_fetch_array($eq, OCI_ASSOC + OCI_RETURN_NULLS);
    //echo implode(',',$row);
    if ($row) {
        $id = $row['EMPID'];
        $fullname = $row['NAME'];
        $name = explode(",", $fullname);
        $names = implode(" ", $name);
        $des = $row['DESIGNATION'];
        $qualification1 = ($row['QUAL1'] != NULL) ? $row['QUAL1'] : 'NULL';
        $qualification2 = ($row['QUAL2'] != NULL) ? $row['QUAL2'] : 'NULL';
        $qualification3 = ($row['QUAL3'] != NULL) ? $row['QUAL3'] : 'NULL';
        $sal = $row['SALARY'];
        $doj = $row['DOJ'];
        $dol = $row['DOL'];
        $con = $row['CONTACT'];
        $mail = $row['EMAIL'];
        $dob = $row['DOB'];
        $branch = $row['BRANCHID'];
        $age = $row['AGE'];
        $add = $row['ADDRESS'];
    } else {
        echo "No data found or an error occurred.";
    }
    echo $names;    
    if (!$c) {
        echo "<div style='background-color: white;'>";
        $m = oci_error();
        trigger_error('Could not connect to database: ' . $m['message'], E_USER_ERROR);
        echo "</div>";
    }


    if(isset($_POST['submit'])){
        $id = $_POST['empid'];
        $name = $_POST['empname'];
        $des = $_POST['designation'];
        $qualification1 = $_POST['qualification1'];
        $qualification2 = $_POST['qualification2'];
        $qualification3 = $_POST['qualification3'];
        $sal = $_POST['salary'];
        $doj = $_POST['DOJ'];
        $dol = $_POST['DOL'];
        $con = $_POST['contact'];
        $mail = $_POST['email'];
        $dob = $_POST['DOB'];
        $add = $_POST['address'];

        $query = "UPDATE MYEMPLOYEES SET empid = $id, name = '$name', designation = '$des', qual1 = '$qualification1', qual2 = '$qualification2', qual3 = '$qualification3', salary = $sal, doj = TO_DATE('$doj', 'YYYY-MM-DD'), dol = TO_DATE('$dol' , 'YYYY-MM-DD'), contact = $con, email = '$mail', dob = TO_DATE('$dob', 'YYYY-MM-DD'), branchid = $branch, age = $age, address = '$add' where empid = $id";
        echo $query;

        $s = oci_parse($c, $query);
        echo "<div style='background-color: white;'>";
        if (!$s) {
            echo "<div style='background-color: white;'>";
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
                echo "alert('Updated Successfully.');";
                echo "</script>";
            }
        }
        echo "</div>";
    }
?>

<body>
    <div class="menu">
        <ul>
            <img style="width:90px; height:50px; margin-right: 35px;" src="Vehicle_image.png">
            <li><a href="index.html">Home</a></li>
            <li><a href="billings.php">Billings</a></li>
            <li><a href="admin.html">Admin</a></li>
        </ul>
    </div>
    <div class="main-contents" style="height: 1300px;">
        <div class="sidebar_vf" style="float: center;; width: 402px; margin-top: 20px; height: 1300px;">
            <h3 id="sidebar-title-vehicles-filter" style="width: 370px;">To Update an Employee Details</h3>
            <form action="" method="post">
                <!--Employee ID---------------------------------------------------------------->
                <div>
                    <p ><b>Employee ID : </b></p>
                    <input type="number" id="empid" name="empid" style="height: 20px; width: 255px;  border-radius: 3px; padding: 5px;" placeholder="Employee ID Number" value="<?php echo $id; ?>" required>
                    <hr>
                </div>
                <!--Employee Name--------------------------------------------------------------->
                <div>
                <p ><b>Employee Name : </b></p>
                    <input type="text" id="empname" name="empname" style="height: 20px; width: 255px; border-radius: 3px; padding: 5px;" placeholder="Full Name of The Employee" value="<?php echo $names; ?>" required>
                    <hr>
                </div>
                <!--Employee Designation--------------------------------------------------------->
                <div><p><b>Designation : </b></p>
                    <select id="designation" name="designation">
                        <option value="Select">Select</option>
                        <option value="ShowroomManager" <?php echo ($des == 'ShowroomManager') ? 'selected' : '';?>>Showroom Manager</option>
                        <option value="SalesManager" <?php echo ($des == 'SalesManager') ? 'selected' : '';?>>Sales Manager</option>
                        <option value="SalesExecutive" <?php echo ($des == 'SalesExecutive') ? 'selected' : '';?>>Sales Executive</option>
                        <option value="ServiceManager" <?php echo ($des == 'ServiceManager') ? 'selected' : '';?>>Service Manager</option>
                        <option value="ServiceAdvisor" <?php echo ($des == 'ServiceAdvisor') ? 'selected' : '';?>>Service Advisor</option>
                        <option value="Mechanic/Technician" <?php echo ($des == 'Mechanic/Technician') ? 'selected' : '';?>>Mechanic/Technician</option>
                        <option value="SparePartsManager" <?php echo ($des == 'SparePartsManager') ? 'selected' : '';?>>Spare Parts Manager</option>
                        <option value="ExchangeSectionManager" <?php echo ($des == 'ExchangeSectionManager') ? 'selected' : '';?>>Exchange Section Manager</option>
                        <option value="SalesSectionStaff" <?php echo ($des == 'SalesSectionStaff') ? 'selected' : '';?>>Sales Section Staff</option>
                        <option value="ExchangeSectionStaff" <?php echo ($des == 'ExchangeSectionStaff') ? 'selected' : '';?>>Exchange Section Staff</option>
                        <option value="BillingSpecialist" <?php echo ($des == 'BillingSpecialist') ? 'selected' : '';?>>Billing Specialist</option>

                        <option value="Cleaner" <?php echo ($des == 'Cleaner') ? 'selected' : '';?>>Cleaner</option>
                        <option value="SecurityStaff" <?php echo ($des == 'SecurityStaff') ? 'selected' : '';?>>Security Staff</option>
                    </select>
                    <hr>
                </div>
                <!--Employee Qualification-------------------------------------------------------->
                <div><p><b>Qualification : </b></p>
                        <input type="text" id="qualification1" name="qualification1" style="height: 15px; width: 255px; border: 2px solid black; border-radius: 3px; padding: 5px; margin-bottom: 5px;" placeholder="Qualification - 1" value="<?php echo $qualification1; ?>">
                        <input type="text" id="qualification2" name="qualification2" style="height: 15px; width: 255px; border: 2px solid black; border-radius: 3px; padding: 5px; margin-bottom: 5px;" placeholder="Qualification - 2" value="<?php echo $qualification2; ?>">
                        <input type="text" id="qualification3" name="qualification3" style="height: 15px; width: 255px; border: 2px solid black; border-radius: 3px; padding: 5px;" placeholder="Qualification - 3" value="<?php echo $qualification3; ?>">
                    <hr>
                </div>
                <!--Employee Salary---------------------------------------------------------------->
                <div>
                    <p ><b>Salary : </b></p>
                    <input type="number" id="salary" name="salary" style="height: 20px; width: 255px; border-radius: 3px; padding: 5px;" placeholder="Employee Salary" value="<?php echo $sal; ?>">
                    <hr>
                </div>
                <!--DOJ---------------------------------------------------------------------------->
                <div><p ><b>Date of join : </b></p>
                    <input type="date" id="DOJ" name="DOJ" style="height: 20px; width: 255px; border-radius: 3px; padding: 5px;" value="<?php echo date('Y-m-d', strtotime($doj)); ?>" required/>
                    <hr>
                </div>

                <!--DOL---------------------------------------------------------------------------->
                <div><p ><b>Date of Left : </b></p>
                    <input type="date" id="DOL" name="DOL" style="height: 20px; width: 255px; border-radius: 3px; padding: 5px;" value="<?php echo date('Y-m-d', strtotime($dol)); ?>"/>
                    <hr>
                </div>
                <!--Employee Contact Number-------------------------------------------------------->
                <div>
                    <p ><b>Contact Number : </b></p>
                    <input type="number" id="contact" name="contact" style="height: 20px; width: 255px; border-radius: 3px; padding: 5px;" placeholder="+91 0000000000" value="<?php echo $con; ?>" required>
                    <hr>
                </div>
                <!--Employee Email ID-------------------------------------------------------------->
                <div>
                <p ><b>Employee Email ID : </b></p>
                    <input type="email" id="email" name="email" style="height: 20px; width: 255px; border-radius: 3px; padding: 5px;" placeholder="example@gmail.com" value="<?php echo $mail; ?>" required>
                    <hr>
                </div>
                <!--Date of Birth------------------------------------------------------------------>
                <div><p ><b>Date of Birth : </b></p>
                    <input type="date" id="DOB" name="DOB" style="height: 20px; width: 255px;  border-radius: 3px; padding: 5px;" value="<?php echo date('Y-m-d', strtotime($dob)); ?>" required/>
                    <hr>
                </div>
                <!--Employee Address--------------------------------------------------------------->
                <div>
                <p ><b>Employee Address : </b></p>
                    <textarea id="address" name="address" rows="4" style="width: 255px; border-radius: 3px; padding: 5px;"  required><?php echo $add; ?></textarea>
                </div>
                <div style="float: left; width: 50px;"><input type="submit" id="submit" name="submit" value="Update" style=" height:20px; width:65px; background-color: rgb(230, 230, 230); border-radius: 5px;"></div>
                <div style="float: right; font-size: 12px;"><b>For Employee Page : </b><a href="employees_filter.php" style="text-decoration: none; color: #9966ff; background-color: rgb(230, 230, 230); border-radius: 2px;">Click here</a></div>
            </form>
        </div>  
    </div>

    <div class="copyright">
        <p>Copyright 1999-2023 by Volta Data. All Rights Reserved.<br>Volta is Powered by Honda</p>
    </div>
    <p></p>
</body>
</html>




