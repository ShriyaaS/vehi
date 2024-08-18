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
            height: 550px;
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
    $username = "system";
    $password = "aravinth583#";
    $database = "localhost/XE";

    $c = oci_connect($username, $password, $database);


    $id = $_GET['updateid'];

    $query = "SELECT * FROM MYPRODUCTS WHERE prod_id = $id";
    $eq = oci_parse($c, $query);

    $result = oci_execute($eq);
    $row = oci_fetch_assoc($eq);/*, OCI_ASSOC + OCI_RETURN_NULLS);*/
    if ($row) {
        $name = $row['PROD_NAME'];
        $prize = $row['PRIZE'];
        $quan = $row['QUANTITY'];
    }
    if(isset($_POST['submit'])){
        $name = $_POST['productname'];
        $prize = $_POST['prize'];
        $quan = $_POST['quantity'];

        $query = "UPDATE MYPRODUCTS SET PROD_NAME = '$name', PRIZE = $prize, QUANTITY = $quan WHERE PROD_ID = $id";
        $s = oci_parse($c, $query);
        //echo $query;
        $r = oci_execute($s);
        if($r){
            echo "<script> alert('Updated Successfully.'); </script>";   
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
            <h3 id="sidebar-title-vehicles-filter">To Update a Product</h3>
            <form action="" method="post">
                <div>
                    <p><b>Product Name</b></p>
                    <input type="text" id="productname" name="productname" style="height: 20px; width: 255px;  border-radius: 3px; padding: 5px;" placeholder="Ex. Spark Plugs"  value="<?php echo $name;?>" required><hr>
                    <hr>
                </div>

                <div>
                    <p><b>Prize</b></p>
                    <input type="number" id="prize" name="prize" style="height: 20px; width: 255px;  border-radius: 3px; padding: 5px;" placeholder="000.00"  value="<?php echo $prize;?>"required><hr>
                </div>

                <div>
                    <p><b>Quantity</b></p>
                    <input type="number" id="quantity" name="quantity" style="height: 20px; width: 255px;  border-radius: 3px; padding: 5px;" placeholder="Ex. 100"  value="<?php echo $quan;?>"required>
                </div>

                <div style="float: left; width: 50px;"><input type="submit" id="submit" name="submit" value="Go" style=" height:20px; width:85px; background-color: rgb(230, 230, 230); border-radius: 5px;"></div>
                <div style="float: right; font-size: 12px;"><b>For Products Page : </b><a href="products_filter.php" style="text-decoration: none; color: #9966ff; background-color: rgb(230, 230, 230); border-radius: 2px;">Click here</a></div>
            
            </form>
        </div>   
    </form>

    </div>
    <div class="copyright">
        <p>Copyright 1999-2023 by Volta Data. All Rights Reserved.<br>Volta is Powered by Honda</p>
    </div>
</body>
</html>



