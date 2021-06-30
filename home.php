
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <title>Koperasi Simpan Pinjam</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light text-success">
  <div class="container-fluid ">
    <a class="navbar-brand fas fa-globe">KSP</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarSupportedContent">
      <ul class="navbar-brand navbar-nav me-auto mb-2 mb-lg-0 ">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="home.php">Home</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link " href="anggota.php">Anggota</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="simpan.php">Simpan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pinjam.php">Pinjam</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php"onclick="return confirm('anda yakin akan keluar?')">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- <div>
  <p>Ini adalah sebuah paragraf yang berisi beberapa kalimat.Saya sedang belajar HTML di Petani Kode. Saat ini Sedang,Belajar tentang paragraf.</p>
  <p>Paragraf adalah kumpulan dari beberapa kalimat yang saling mendukung. Punya ide pokok sebagai dasar dari paragraf itu sendiri.</p>
</div> -->
  <script type="text/javascript" scr="js/bootstrap.min.js"></script>  
<?php
include 'beranda.php';
?>
</body>
</html>