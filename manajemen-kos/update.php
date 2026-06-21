<?php

include "koneksi.php";

$id = $_POST['id'];
$nama = $_POST['nama'];
$kamar = $_POST['kamar'];
$telepon = $_POST['telepon'];
$ttd = $_POST['ttd'];

$data = mysqli_query(
$conn,
"SELECT * FROM penghuni_reva_2430511041 WHERE id='$id'"
);

$lama = mysqli_fetch_array($data);

$foto = $lama['foto'];
$ktp = $lama['ktp'];

if($_FILES['foto']['name'] != ''){

    $foto = $_FILES['foto']['name'];

    move_uploaded_file(
    $_FILES['foto']['tmp_name'],
    "upload/".$foto
    );
}

if($_FILES['ktp']['name'] != ''){

    $ktp = $_FILES['ktp']['name'];

    move_uploaded_file(
    $_FILES['ktp']['tmp_name'],
    "upload/".$ktp
    );
}

if($ttd == ''){
    $ttd = $lama['ttd'];
}

mysqli_query($conn,

"UPDATE penghuni_reva_2430511041 SET

nama='$nama',
kamar='$kamar',
telepon='$telepon',
foto='$foto',
ktp='$ktp',
ttd='$ttd'

WHERE id='$id'"

);

header("Location: dashboard.php");

?>
