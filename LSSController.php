<?php 

    session_start();
    $db = mysqli_connect('localhost', 'root', '', 'ECOMMERCE_CAR') or die("Error");

    if(isset($_POST['signup'])){
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $name = mysqli_real_escape_string($db, $_POST['name']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        $postal = mysqli_real_escape_string($db, $_POST['postal']);
        $country = mysqli_real_escape_string($db, $_POST['country']);
        $type = mysqli_real_escape_string($db, $_POST['type']);
        
        mysqli_query($db, "insert into sales_person (SALES_PERSON_NAME, SALES_PERSON_EMAIL, SALES_PERSON_PASSWORD, SALES_PERSON_COUNTRY, SALES_PERSON_POSTAL_CODE, SALES_PERSON_TYPE) values('$name' , '$email', '$password', '$country', '$postal', '$type')");
        $_SESSION['msg'] = "Your account has been registered! Please login to continue";
        header ('location: salesPersonLogin.php');
    }

    if(isset($_POST['login'])){
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        $type = mysqli_real_escape_string($db, $_POST['type']);
        
        $query = mysqli_query($db, "select * from sales_person where SALES_PERSON_EMAIL = '$email' and SALES_PERSON_PASSWORD = '$password' and SALES_PERSON_TYPE = '$type'");
        
        $arr = mysqli_fetch_array($query);
        $_SESSION['id'] = $arr['SALES_PERSON_ID'];
        $type = $arr['SALES_PERSON_TYPE'];
        
        if($row = mysqli_num_rows($query)){    
            $_SESSION['msg'] = "Login successfull!";
            if($type == 'S'){
                header ('location: salesPersonHome.php');
            }
            else{
                header ('location: ManagerHome.php');
            }
            
        }
        else{
            $_SESSION['msg'] = "Invalid Credentials!";
            header ('location: salesPersonLogin.php');
        }
    }
    
?>