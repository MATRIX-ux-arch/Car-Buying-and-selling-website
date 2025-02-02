<?php 

    session_start();
    $db = mysqli_connect('localhost', 'root', '', 'ECOMMERCE_CAR') or die("Error");

    if(isset($_POST['signup'])){
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $name = mysqli_real_escape_string($db, $_POST['name']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        $postal = mysqli_real_escape_string($db, $_POST['postal']);
        $country = mysqli_real_escape_string($db, $_POST['country']);
        
        mysqli_query($db, "insert into customer (CUSTOMER_NAME, CUSTOMER_EMAIL, CUSTOMER_PASSWORD, CUSTOMER_COUNTRY, CUSTOMER_POSTAL_CODE) values('$name' , '$email', '$password', '$country', '$postal')");
        $_SESSION['msg'] = "Your account has been registered! Please login to continue";
        header ('location: Customerlogin.php');
    }

    if(isset($_POST['login'])){
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        
        $query = mysqli_query($db, "select * from customer where CUSTOMER_EMAIL = '$email' and CUSTOMER_PASSWORD = '$password'");
        
        $arr = mysqli_fetch_array($query);
        $_SESSION['cid'] = $arr['CUSTOMER_ID '];
        
        if($row = mysqli_num_rows($query)){    
            $_SESSION['msg'] = "Login successfull!";
            header ('location: customerHome.php');
        }
        else{
            $_SESSION['msg'] = "Invalid Credentials!";
            header ('location: customerLogin.php');
        }
    }
    
?>