<?php

include "koneksi.php";

$id = $_GET['id'];

mysqli_query(
$conn,
"DELETE FROM penghuni_reva_2430511041 WHERE id='$id'"
);

header("Location: dashboard.php");

?>