<?php 
require 'user.php';

$user = new user("localhost", "root", "", "login");

$username_notify = $email_notify = $pass_notify = "";
$username = $email = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["pass"];

    $notify = $user->register($username, $email, $password);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
</head>
<body>
    <h2>Signup</h2>
    <form action="" method="post">
        <p>Username: <input type="text" name="username" value="<?php echo htmlspecialchars($username); ?>"> <?php echo $username_notify; ?></p>
        <p>Email: <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>"> <?php echo $email_notify; ?></p>
        <p>Password: <input type="password" name="pass" value=""> <?php echo $pass_notify; ?></p>
        <button type="submit">Sign up</button>
    </form>
    <p>Already have an account? <a href="login.php">Login</a></p>
    <?php if (isset($notify)) echo $notify; ?>
</body>
</html>
