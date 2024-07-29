<?php 
require 'user.php';

$user = new user("localhost", "root", "", "login");

$notify = "";
$username = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $notify = $user->login($username, $password);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>
    <h2>Login</h2>
    <form action="" method="post">
        <p>Username: <input type="text" name="username" value="<?php echo htmlspecialchars($username); ?>"></p>
        <p>Password: <input type="password" name="password" value=""></p>
        <button type="submit">Login</button>
    </form>
    <p>Don't have an account? <a href="register.php">Register now</a></p>
    <?php echo $notify; ?>
</body>
</html>
