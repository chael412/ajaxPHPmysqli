<?php
require 'dbcon.php';


if (isset($_POST["email"])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);

    $query = "SELECT COUNT(*) AS count FROM students WHERE email = '$email'";
    $result = $con->query($query);

    if ($result) {
        $row = $result->fetch_assoc();
        $count = $row["count"];
        if ($count > 0) {
            // Email is already taken
            echo "false";
        } else {
            // Email is available
            echo "true";
        }
    } else {
        echo "error"; // Handle the error as needed
    }

}


?>