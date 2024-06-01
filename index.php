<?php
include("db.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Login Page</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <div class="main">
        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" class="form">
            <h1>Employee Login</h1>
            <div class="line"></div>
            <h3>Username/Email</h3>
            <input type="email" name="username" id="username" required placeholder="Enter your email" autocomplete="OFF">
            <h3>Password</h3>
            <input type="password" name="password" id="password" required placeholder="Password">
            <input type="submit" value="Login" class="button">
            <h3 class="login">New User? <a href="/First_XAMPP/register.php">Register Here!</a></h3>
        </form>
    </div>
</body>

</html>

<?php
if (isset($_POST["submit"])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM employee_details WHERE user_email = '$username'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);

        if ($count == 1) {
            echo "Login successful";
        } else {
            echo "Invalid username or password";
        }

        mysqli_close($conn);
    }
    else {
        echo "Error";
    }
} 
?>