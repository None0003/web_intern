<?php 
require 'user.php';

$user = new user("localhost", "root", "", "login");

$notify = "";
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
    <style>
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background: #fff;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .popup.active {
            display: block;
        }
    </style>
    <script>
        function showPopup() {
            document.getElementById('popup').classList.add('active');
        }

        function hidePopup() {
            document.getElementById('popup').classList.remove('active');
            window.location.href = 'login.php';
        }
    </script>
</head>
<body>
    <h2>Signup</h2>
    <form action="" method="post">
        <p>Username: <input type="text" name="username" value="<?php echo htmlspecialchars($username); ?>"></p>
        <p>Email: <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>"></p>
        <p>Password: <input type="password" name="pass" value=""></p>
        <button type="submit">Sign up</button>
    </form>
    <p>Already have an account? <a href="login.php">Login</a></p>
    <?php if ($notify !== "success") echo $notify; ?>

    <div id="popup" class="popup">
        <p>Registration successful! Please return to the login page.</p>
        <button onclick="hidePopup()">Return to Login page</button>
    </div>

    <?php if ($notify === "success") echo '<script>showPopup();</script>'; ?>
</body>
</html>
