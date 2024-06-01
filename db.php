<?php
$server = "localhost:3307";
$database = "login";
$username = "root";
$password = "DakmM0612!";
$tablename = "employee_details";
$conn= "";
try {
    $conn = mysqli_connect($server, $username, $password, $database);
}
catch (mysqli_sql_exception $e) {
    echo "Databse Error: " . $e;
}
?>