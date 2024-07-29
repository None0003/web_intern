<?php 
require 'user.php';

$user = new user("localhost", "root", "", "login");

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$username = $user->getUsername();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['logout'])) {
    $user->logout();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
</head>
<body>
    <h2>Welcome, <?php echo htmlspecialchars($username); ?>!</h2>
    <form action="" method="post">
        <button type="submit" name="logout">Logout</button>
    </form>
</body>
</html>
