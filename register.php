<?php
session_start();
include("db.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Register Page</title>
    <style>
        <?php include "index.css" ?>
    </style>
</head>

<body>
    <div class="main">
    <?php if (isset($_SESSION['error'])) { ?>
            <p class="error"><?php echo $_SESSION['error'];
            unset($_SESSION['error']) ?></p>
        <?php } ?>
        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" class="form2">
            <h1>Employee Register</h1>
            <div class="line"></div>
            <h3>Username</h3>
            <input type="text" name="username" id="username" required placeholder="Enter your username" autocomplete="OFF">
            <h3>Email</h3>
            <input type="email" name="email" id="email" required placeholder="Enter your email" autocomplete="OFF">
            <h3>Password</h3>
            <input type="password" name="password" id="password" required placeholder="Password">
            <h3>Department</h3>
            <input type="text" name="department" id="password" required placeholder="Enter your Department" autocomplete="OFF">
            <input type="submit" value="Register" class="button" name="submit">
            <h3 class="login">Already Registerd? <a href="/First_XAMPP/index.php">Login Here!</a></h3>
        </form>
    </div>
</body>

</html>

<?php
if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["department"]) && isset($_POST["email"])){
    $_SESSION['error'] = "Hello";
    unset($_SESSION['error']);
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "Hello";
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $department = $_POST["department"];
        $hashp=password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO employee_details (user_name,user_email,password,department) VALUES('$username', '$email', '$hashp', '$department')";
        mysqli_query($conn, $sql);
        $_SESSION['error'] = "Registration Successful";
        header("Location: index.php");
    }
    else{
        echo "Error";
    }
}

?>