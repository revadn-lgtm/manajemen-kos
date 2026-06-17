<?php

session_start();

if(!isset($_SESSION['login'])){
    header("Location:index.php");
}

include "koneksi.php";

?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Dashboard Manajemen Kos</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">

</head>

<body>

<div class="container mt-4">

<h2 class="mb-3">Dashboard Manajemen Kos</h2>

<a href="logout.php" class="btn btn-danger mb-3">Logout</a>

<button class="btn btn-primary mb-3"
data-bs-toggle="modal"
data-bs-target="#modalTambah">
Tambah Penghuni
</button>

<table id="tabelPenghuni" class="table table-bordered table-striped">

<thead class="table-dark">
<tr>
<th>No</th>
<th>Nama</th>
<th>Kamar</th>
<th>Telepon</th>
<th>Foto</th>
<th>KTP</th>
<th>TTD</th>
<th>Aksi</th>
</tr>
</thead>

<tbody>

<?php
$data = mysqli_query($conn,"SELECT * FROM penghuni");
$no = 1;

while($d = mysqli_fetch_array($data)){
?>

<tr>
<td><?= $no++; ?></td>
<td><?= $d['nama']; ?></td>
<td><?= $d['kamar']; ?></td>
<td><?= $d['telepon']; ?></td>

<td>
<?php if($d['foto'] != ""){ ?>
<img src="upload/<?= $d['foto']; ?>" width="80">
<?php } ?>
</td>

<td>
<?php if($d['ktp'] != ""){ ?>
<img src="upload/<?= $d['ktp']; ?>" width="80">
<?php } ?>
</td>

<td>
<?php if($d['ttd'] != ""){ ?>
<img src="<?= $d['ttd']; ?>" width="120">
<?php } ?>
</td>

<td>
<a href="edit.php?id=<?= $d['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
<a href="hapus.php?id=<?= $d['id']; ?>" class="btn btn-danger btn-sm"
onclick="return confirm('Yakin hapus data?')">Hapus</a>
</td>

</tr>

<?php } ?>

</tbody>
</table>

<hr>

<h4>Video Profil Kos</h4>

<video width="500" controls>
<source src="video/kos.mp4" type="video/mp4">
</video>

<hr>

<h4>Audio Informasi Kos</h4>

<audio controls>
<source src="audio/info.mpeg" type="audio/mpeg">
</audio>

</div>

<!-- MODAL TAMBAH -->
<div class="modal fade" id="modalTambah">
<div class="modal-dialog modal-lg">
<div class="modal-content">

<div class="modal-header">
<h5 class="modal-title">Tambah Penghuni</h5>
<button class="btn-close" data-bs-dismiss="modal"></button>
</div>

<div class="modal-body">

<form action="simpan.php" method="POST" enctype="multipart/form-data">

<div class="mb-2">
<label>Nama</label>
<input type="text" name="nama" class="form-control" required>
</div>

<div class="mb-2">
<label>Kamar</label>
<input type="text" name="kamar" class="form-control" required>
</div>

<div class="mb-2">
<label>Telepon</label>
<input type="text" name="telepon" class="form-control" required>
</div>

<div class="mb-2">
<label>Foto</label>
<input type="file" name="foto" class="form-control" required>
</div>

<div class="mb-2">
<label>KTP</label>
<input type="file" name="ktp" class="form-control" required>
</div>

<div class="mb-2">
<label>TTD Digital</label>
<br>

<canvas id="signature-pad" width="400" height="150" style="border:1px solid #000;"></canvas>

<input type="hidden" name="ttd" id="ttd">

<br><br>

<button type="button" class="btn btn-warning" onclick="saveTTD()">Simpan TTD</button>
<button type="button" class="btn btn-secondary" onclick="signaturePad.clear()">Hapus</button>

</div>

<button type="submit" class="btn btn-success">Simpan</button>

</form>

</div>
</div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>

<script>
$(document).ready(function(){
$('#tabelPenghuni').DataTable({
dom:'Bfrtip',
buttons:['copy','csv','excel','pdf','print']
});
});

const canvas = document.getElementById("signature-pad");
const signaturePad = new SignaturePad(canvas);

function saveTTD(){
document.getElementById("ttd").value = signaturePad.toDataURL();
alert("TTD berhasil disimpan");
}
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>