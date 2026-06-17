<?php

include "koneksi.php";

$nama = $_POST['nama'];
$kamar = $_POST['kamar'];
$telepon = $_POST['telepon'];
$ttd = $_POST['ttd'];

$foto = $_FILES['foto']['name'];
$ktp = $_FILES['ktp']['name'];

move_uploaded_file(
$_FILES['foto']['tmp_name'],
"upload/".$foto
);

move_uploaded_file(
$_FILES['ktp']['tmp_name'],
"upload/".$ktp
);

mysqli_query($conn,

"INSERT INTO penghuni
(nama,kamar,telepon,foto,ktp,ttd)

VALUES

('$nama',
'$kamar',
'$telepon',
'$foto',
'$ktp',
'$ttd')

");

header("Location: dashboard.php");

?>