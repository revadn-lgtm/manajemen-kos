<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Login Manajemen Kos</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

<link rel="stylesheet" href="newlogin.css">

</head>

<body>

<div class="login-box">

<form action="proses_login.php" method="POST">

<h2>LOGIN</h2>

<div class="input-group">
<input type="text" name="username" placeholder="Username" required>
</div>

<div class="input-group">
<input type="password" name="password" placeholder="Password" required>
</div>

<button type="submit" class="login-btn">
Sign In
</button>

</form>

</div>

</body>

</html>