<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Room : Insert Vehicle</title>
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
            height: 955px;
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

<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');

    $username = "system";
    $password = "aravinth583#";
    $database = "localhost/XE";

    $c = oci_connect($username, $password, $database);

    $query = "SELECT MAX(VEH_ID) FROM MYVEHICLES";
    $eq = oci_parse($c, $query);

    $result = oci_execute($eq);
    $row = oci_fetch_array($eq, OCI_ASSOC + OCI_RETURN_NULLS);

    if ($row) {
        $currentVehId = $row['MAX(VEH_ID)'];
        $id = $currentVehId + 1;
    } else {
        $id = 14001001;
    }
    $id = ($id > 14001001) ? $id : 14001001;

    if(isset($_POST['submit'])){
        // Retrieve form data
        $name = $_POST['name'];
        $amount = $_POST['prize'];
        $type = $_POST['vehicle_type'];
        $model = $_POST['model'];
        $mileage = $_POST['mileage'];
        $cc = $_POST['cc'];
        $color = $_POST['color'];


        $query = "INSERT INTO MYVEHICLES VALUES($id, '$name', $type, $amount, $model, $mileage, $cc, '$color', 2001, 'available')";

        //echo $query;
        $eq = oci_parse($c, $query);

        $res = oci_execute($eq);

        if ($res) {
            echo "<script> alert('Data inserted successfully.'); </script>";
        } else {
            $m = oci_error($stid);
            echo "Error: " . $m['message'];
        }
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
    <div class="main-contents">
        <div class="sidebar_vf" >
            <h3 id="sidebar-title-vehicles-filter">To Add a New Vehicle</h3>
            <form action="" method="post">
                <div>
                    <p><b>Name</b></p>
                    <input type="text" id="name" name="name" style="height: 20px; width: 255px;  border-radius: 3px; padding: 5px;"  placeholder="Ex. Grizzly EPS" required>
                    <hr>
                </div>

                <div><p ><b>Prize</b></p>
                    <input type="number" id="prize" name="prize" style="height: 20px; width: 255px;  border-radius: 3px; padding: 5px;" placeholder="00000000" required>
                    <hr>
                </div>

                <div>
                    <p><b>Type</b></p>
                        <input type="radio" id="scooty" name="vehicle_type" value="'scooty'">
                        <label for="scooty">Scooty</label><br>

                        <input type="radio" id="motorcycle" name="vehicle_type" value="'motorcycle'">
                        <label for="motorcycle">Motor Cycle</label><br>

                        <input type="radio" id="sportsbike" name="vehicle_type" value="'sportsbike'">
                        <label for="sportsbike">Sports Bike</label><br>

                        <input type="radio" id="electricbike" name="vehicle_type" value="'electricbike'">
                        <label for="electricbike">Electric Bike</label><br>

                        <input type="radio" id="nongearbike" name="vehicle_type" value="'nongearbike'">
                        <label for="nongearbike">Non-gear Bike</label><br>
                        <hr>
                </div>


                <div><p ><b>Model</b></p>
                    <select id="model" name="model" style="height: 30px; width: 255px;  border-radius: 3px; padding: 5px;" required>
                        <option value='select'>Select</option>
                        <option value='2023'>2023</option>
                        <option value='2022'>2022</option>
                        <option value='2021'>2021</option>
                        <option value='2020'>2020</option>
                        <option value='2019'>2019</option>
                        <option value='2018'>2018</option>
                        <option value='2017'>2017</option>
                        <option value='2016'>2016</option>
                        <option value='2015'>2015</option>
                        <option value='2014'>2014</option>
                        <option value='2013'>2013</option>
                        <option value='2012'>2012</option>
                        <option value='2011'>2011</option>
                        <option value='2010'>2010</option>
                        <option value='2009'>2009</option>
                        <option value='2008'>2008</option>
                        <option value='2007'>2007</option>
                        <option value='2006'>2006</option>
                        <option value='2005'>2005</option>
                        <option value='2004'>2004</option>
                        <option value='2003'>2003</option>
                        <option value='2002'>2002</option>
                        <option value='2001'>2001</option>
                        <option value='2000'>2000</option>
                        <option value='1999'>1999</option>
                        <option value='1998'>1998</option>
                        <option value='1997'>1997</option>
                        <option value='1996'>1996</option>
                        <option value='1995'>1995</option>
                        <option value='1994'>1994</option>
                        <option value='1993'>1993</option>
                        <option value='1992'>1992</option>
                        <option value='1991'>1991</option>
                        <option value='1990'>1990</option>
                    </select><hr>
                </div>

                <div>
                    <p><b>Mileage</b></p>
                    <input type="number" id="mileage" name="mileage" style="height: 20px; width: 255px;  border-radius: 3px; padding: 5px;" placeholder="Ex. 50" required>
                    <hr>
                </div>
                <div>
                    <p><b>CC</b></p>
                    <input type="number" id="cc" name="cc" style="height: 20px; width: 255px;  border-radius: 3px; padding: 5px;" placeholder="Ex. 150" required>
                    <hr>
                </div>

                <div><p><b>Color</b></p>
                    <select id="color" name="color" style="height: 30px; width: 255px;  border-radius: 3px; padding: 5px;" required>
                        <option value="Select">Select</option>
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
                        <option value="WornTaxiYellow">Worn Taxi Yellow</option>
                        <option value="PoliceCarBlue">Police Car Blue</option>
                        <option value="MatteGreen">Matte Green</option>
                        <option value="MatteBrown">Matte Brown</option>
                        <option value="WornOrange">Worn Orange</option>
                        <option value="MatteWhite">Matte White</option>
                        <option value="WornWhite">Worn White</option>
                        <option value="WornOliveArmyGreen">Worn Olive Army Green</option>
                        <option value="PureWhite">Pure White</option>
                        <option value="HotPink">Hot Pink</option>
                        <option value="SalmonPink">Salmon Pink</option>
                        <option value="MetallicVermillionPink">Metallic Vermillion Pink</option>
                        <option value="Orange">Orange</option>
                        <option value="Green">Green</option>
                        <option value="Blue">Blue</option>
                        <option value="MetallicBlackBlue">Metallic Black Blue</option>
                    </select>

                    </select>
                </div>

            <div style="float: left; width: 50px;"><input type="submit" id="submit" name="submit" value="Add" style=" height:20px; width:65px; background-color: rgb(230, 230, 230); border-radius: 5px;"></div>
            <div style="float: right; font-size: 12px;"><b>For Vehicles Page : </b><a href="vehicles_filter.php" style="text-decoration: none; color: #9966ff; background-color: rgb(230, 230, 230); border-radius: 2px;">Click here</a></div>
        
            </form>
        </div>   
    </form>

    </div>
    <div class="copyright">
        <p>Copyright 1999-2023 by Volta Data. All Rights Reserved.<br>Volta is Powered by Honda</p>
    </div>
</body>
</html>



