<?php

include "koneksi.php";

$id = $_GET['id'];

$data = mysqli_query(
$conn,
"SELECT * FROM penghuni WHERE id='$id'"
);

$d = mysqli_fetch_array($data);

?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Edit Penghuni</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#f1f5f9;
}

.card-box{
    max-width:800px;
    margin:40px auto;
    background:white;
    padding:30px;
    border-radius:15px;
    box-shadow:0 2px 10px rgba(0,0,0,.1);
}

img{
    border-radius:10px;
}

</style>

</head>

<body>

<div class="container">

<div class="card-box">

<h3 class="mb-4">
Edit Data Penghuni
</h3>

<form action="update.php" method="POST" enctype="multipart/form-data">

<input
type="hidden"
name="id"
value="<?= $d['id']; ?>">

<div class="mb-3">

<label class="form-label">
Nama
</label>

<input
type="text"
name="nama"
value="<?= $d['nama']; ?>"
class="form-control"
required>

</div>

<div class="mb-3">

<label class="form-label">
Kamar
</label>

<input
type="text"
name="kamar"
value="<?= $d['kamar']; ?>"
class="form-control"
required>

</div>

<div class="mb-3">

<label class="form-label">
Telepon
</label>

<input
type="text"
name="telepon"
value="<?= $d['telepon']; ?>"
class="form-control"
required>

</div>

<div class="mb-3">

<label class="form-label">
Foto Saat Ini
</label>

<br>

<?php if($d['foto'] != ""){ ?>

<img
src="upload/<?= $d['foto']; ?>"
width="150">

<?php } ?>

</div>

<div class="mb-3">

<label class="form-label">
Ganti Foto
</label>

<input
type="file"
name="foto"
class="form-control">

</div>

<div class="mb-3">

<label class="form-label">
KTP Saat Ini
</label>

<br>

<?php if($d['ktp'] != ""){ ?>

<img
src="upload/<?= $d['ktp']; ?>"
width="150">

<?php } ?>

</div>

<div class="mb-3">

<label class="form-label">
Ganti KTP
</label>

<input
type="file"
name="ktp"
class="form-control">

</div>

<div class="mb-3">

<label class="form-label">
TTD Saat Ini
</label>

<br>

<?php if($d['ttd'] != ""){ ?>

<img
src="<?= $d['ttd']; ?>"
width="250">

<?php } ?>

</div>

<div class="mb-3">

<label class="form-label">
Ganti TTD Digital
</label>

<br>

<canvas
id="signature-pad"
width="500"
height="150"
style="border:1px solid #ccc;">
</canvas>

<input
type="hidden"
name="ttd"
id="ttd">

<br><br>

<button
type="button"
class="btn btn-warning"
onclick="saveTTD()">

Simpan TTD Baru

</button>

<button
type="button"
class="btn btn-secondary"
onclick="signaturePad.clear()">

Hapus TTD

</button>

</div>

<hr>

<button
type="submit"
class="btn btn-success">

Update Data

</button>

<a
href="dashboard.php"
class="btn btn-secondary">

Kembali

</a>

</form>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>

<script>

const canvas = document.getElementById("signature-pad");

const signaturePad = new SignaturePad(canvas);

function saveTTD(){

document.getElementById("ttd").value =
signaturePad.toDataURL();

alert("TTD baru berhasil disimpan");

}

</script>

</body>
</html>