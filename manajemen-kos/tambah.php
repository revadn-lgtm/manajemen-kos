<!DOCTYPE html>
<html>
<head>
    <title>Tambah Penghuni</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">

<h2>Tambah Data Penghuni</h2>

<form action="simpan.php" method="POST" enctype="multipart/form-data">

<div class="mb-3">
<label>Nama</label>
<input type="text" name="nama" class="form-control" required>
</div>

<div class="mb-3">
<label>Kamar</label>
<input type="text" name="kamar" class="form-control" required>
</div>

<div class="mb-3">
<label>Telepon</label>
<input type="text" name="telepon" class="form-control" required>
</div>

<div class="mb-3">
<label>Foto Penghuni</label>
<input type="file" name="foto" class="form-control" required>
</div>

<div class="mb-3">
<label>Foto KTP</label>
<input type="file" name="ktp" class="form-control" required>
</div>

<button type="submit" class="btn btn-success">
Simpan
</button>

<a href="dashboard.php" class="btn btn-secondary">
Kembali
</a>

</form>

</div>

</body>
</html>