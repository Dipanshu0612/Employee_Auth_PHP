<?php
session_start(); 
include("db.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Login Page</title>
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
        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" class="form">
            <h1>Employee Login</h1>
            <div class="line"></div>
            <h3>Email</h3>
            <input type="email" name="email" id="email" required placeholder="Enter your email" autocomplete="OFF">
            <h3>Password</h3>
            <input type="password" name="password" id="password" required placeholder="Password">
            <input type="submit" value="Login" class="button" name="login">
            <h3 class="register">New User? <a href="/Employee_Auth_PHP/register.php">Register Here!</a></h3>
        </form>
    </div>
</body>

</html>

<?php

if (isset($_POST["login"]) && isset($_POST["email"]) && isset($_POST["password"])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
        $password = $_POST["password"];
        // echo $email . "<br>" . $password;
        if (!empty($email) && !empty($password)) {
            $sql = "SELECT * FROM employee_details WHERE user_email = '$email'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $count = mysqli_num_rows($result);

            if ($count>0) {
                if(password_verify($password, $row['password'])){
                $_SESSION['error'] = "Login Successful";
                header("Location: index.php");
                exit();
                }
                else{
                    $_SESSION['error'] = "Invalid Password";
                    header("Location: index.php");
                    exit();
                }
            } else {
                $_SESSION['error'] = "Invalid Username or Password";
                header("Location: index.php");
                exit();
            }
        }
        mysqli_close($conn);
    } else {
        echo "Not Hello";
        $_SESSION['error'] = "ERROR";
    }
}

?>