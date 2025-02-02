<?php
include('LSSController.php'); 

if (isset($_POST['email'])) {
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $query = "SELECT * FROM sales_person WHERE SALES_PERSON_EMAIL = '$email'";
    $result = mysqli_query($db, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "exists";
    } else {
        echo "available";
    }
}
?>
