<?php
    
    session_start();
    $db = mysqli_connect('localhost', 'root', '', 'ecommerce_car') or die("Error");
    
    $trim = "";
    $model = "";
    $vin = "";
    $year = "";
    $color = "";
    $price = "";
    $brand = "";
    $description = "";


    if(isset($_GET['showid'])){
        $showid = $_GET['showid'];
        $_SESSION['showid'] = $showid;
        $result = mysqli_query($db, "select * from addss where id = '$showid'");
        header('location: showadd.php');
    }

    if(isset($_GET['carID'])){
        $carID = $_GET['carID'];
        $cid = $_SESSION['cid'];
        header('location: invoice.php');
    }

    if(isset($_GET['del'])){
        $id = $_GET['del'];
        $result = mysqli_query($db, "delete from CAR where CAR_ID = '$id'");
        $_SESSION['msg'] = "Add Deleted Successfully!";
        header('location: myAdds.php');
    }

    if(isset($_POST['upload'])){
        $id = mysqli_real_escape_string($db, $_POST['id']);
        $trim = mysqli_real_escape_string($db, $_POST['trim']);
        $model = mysqli_real_escape_string($db, $_POST['model']);
        $vin = mysqli_real_escape_string($db, $_POST['vin']);
        $year = mysqli_real_escape_string($db, $_POST['year']);
        $color = mysqli_real_escape_string($db, $_POST['color']);
        $price = mysqli_real_escape_string($db, $_POST['price']);
        $brand = mysqli_real_escape_string($db, $_POST['brand']);
        $description = mysqli_real_escape_string($db, $_POST['description']);
        
        $image = $_FILES['image']['name'];
        $target = "dbimages/".basename($image);
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		    $_SESSION['msg'] = "Image uploaded successfully";
        }
        else{
            $_SESSION['msg'] = "Failed to upload image";
            header('location: post.php');
        }
        mysqli_query($db, "INSERT INTO car(TRIM_NAME, CAR_MODEL, VIN_NUMBER, YEAR_OF_MANUFACTURE, CAR_COLOR, CAR_PRICE, CAR_BRAND, DESCRIPTION, IMAGE, SALES_PERSON_ID) VALUES ('$trim', '$model', '$vin', '$year', '$color', '$price', '$brand', '$description', '$image', '$id')");
        $_SESSION['msg'] = "Car Added Successfully!";
        
        header('location: salesPersonHome.php');
    }

    if(isset($_POST['update'])){
        $id = mysqli_real_escape_string($db, $_POST['id']);
        $trim = mysqli_real_escape_string($db, $_POST['trim']);
        $model = mysqli_real_escape_string($db, $_POST['model']);
        $vin = mysqli_real_escape_string($db, $_POST['vin']);
        $year = mysqli_real_escape_string($db, $_POST['year']);
        $color = mysqli_real_escape_string($db, $_POST['color']);
        $price = mysqli_real_escape_string($db, $_POST['price']);
        $brand = mysqli_real_escape_string($db, $_POST['brand']);
        $description = mysqli_real_escape_string($db, $_POST['description']);
        
        $image = $_FILES['image']['name'];
        $target = "dbimages/".basename($image);
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		    $_SESSION['msg'] = "Image uploaded successfully";
        }
        else{
            $_SESSION['msg'] = "Failed to upload image";
            header('location: post.php');
        }
        mysqli_query($db, "update car set TRIM_NAME = '$trim', CAR_MODEL = '$model', VIN_NUMBER = '$vin', YEAR_OF_MANUFACTURE = '$year', CAR_COLOR = '$color', CAR_PRICE = '$price', CAR_BRAND = '$brand', DESCRIPTION = '$description', IMAGE = '$image' where CAR_ID = '$id';");
        $_SESSION['msg'] = "Car Updated Successfully!";
        
        header('location: salesPersonHome.php');
    }

    if(isset($_GET['price'])){
        $price = $_GET['price'];
        $brand = $_GET['brand'];
        
        if($price == ''){
            $result = mysqli_query($db, "select * from car where CAR_BRAND like '$brand%'");
        }
        else{
            $result = mysqli_query($db, "select * from car where CAR_PRICE <= $price and CAR_BRAND like '$brand%'");
        }
    }
    else{
        $result = mysqli_query($db, "select * from car");
    }
?>