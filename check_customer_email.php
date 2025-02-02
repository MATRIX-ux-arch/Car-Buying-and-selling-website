<?php
// check_customer_email.php
include('LSCController.php'); // Ensure this file contains the database connection setup

if (isset($_POST['email'])) {
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $query = "SELECT * FROM customer WHERE CUSTOMER_EMAIL = '$email'";
    $result = mysqli_query($db, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "exists";
    } else {
        echo "available";
    }
}
?>
