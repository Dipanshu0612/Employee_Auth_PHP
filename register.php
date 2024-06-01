<?php
include("db.php");
// include("index.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Register Page</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <div class="main">
        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" class="form">
            <h1>Employee Register</h1>
            <div class="line"></div>
            <h3>Username/Email</h3>
            <input type="email" name="username" id="username" required placeholder="Enter your email" autocomplete="OFF">
            <h3>Password</h3>
            <input type="password" name="password" id="password" required placeholder="Password">
            <h3>Department</h3>
            <input type="password" name="password" id="password" required placeholder="Enter your Department">
            <input type="submit" value="Register" class="button">
        </form>
    </div>
</body>

</html>

<?php
if (isset($_POST["submit"])) {

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $department = $_POST["department"];

        $sql = "INSERT INTO employee_details (user_email,password,department) VALUES('$username', '$password', '$department')";
        mysqli_query($conn, $sql);
    }
} 

?>