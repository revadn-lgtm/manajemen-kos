<?php

session_start();
include "koneksi.php";

$username = $_POST['username'];
$password = md5($_POST['password']);

$query = mysqli_query($conn,
"SELECT * FROM users
WHERE username='$username'
AND password='$password'");

$cek = mysqli_num_rows($query);

if($cek > 0){

    $_SESSION['login'] = true;

    header("Location: dashboard.php");

}else{

    echo "
    <script>
    alert('Username atau Password Salah');
    window.location='index.php';
    </script>
    ";

}
?>