<?php session_start(); ?>
<h2>Chào mừng, <?php echo $_SESSION["user"]["username"]; ?></h2>
<a href="/logout">Đăng xuất</a>
