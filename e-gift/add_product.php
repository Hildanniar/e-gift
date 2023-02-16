<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "e-gift";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    function upload(){
        $namaFile = $_FILES["gambar"]["name"];
        $error = $_FILES["gambar"]["error"];
        $tmpName = $_FILES["gambar"]["tmp_name"];

        if($error === 4){
            echo "<script>alert('Silakan masukan data gambar!')</script>";
            return false;
        }

        $ekstensiValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));

        if(!in_array($ekstensiGambar, $ekstensiValid)){
            echo "<script>alert('Mohon masukan file gambar!')</script>";
            return false;
        }

        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;

        move_uploaded_file($tmpName, 'assets/image/'.$namaFileBaru);
        return $namaFileBaru;
    }
    
    if(isset($_POST["submit"])){
        $nama = $_POST["nama"];
        $harga = $_POST["harga"];
        $stok = $_POST["stok"];
        $deskripsi = $_POST["deskripsi"];
        $gambar = upload();

        if($gambar){
            $sql = "INSERT INTO data_barang VALUES ('', '$nama', $harga, $stok, '$gambar', '$deskripsi')";
            mysqli_query($conn, $sql);
            
            if(mysqli_affected_rows($conn) > 0){
                echo "<script>alert('Berhasil menambahkan data!')</script>";
            } else{
                echo "<script>alert('Gagal menambahkan data!')</script>";
            }
        }
        
    }
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <title>E-Gift</title>

  <style>
    .label-font{
        font-size: 18px;
    }
  </style>
</head>
<body>

  <nav class="fixed-top navbar navbar-expand-lg navbar-light bg-light border-bottom">
    <div class="container-fluid">
      <a class="navbar-brand ms-5" href="/">
        <strong>E-gift</strong>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="/add_product.php">Product</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/daftar_pembeli.php">Daftar Pembeli</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <main>
    <div class="container" style="margin-top: 100px;">
      <form action="" method="POST" enctype="multipart/form-data">
        <h1 class="mb-5">Form Input Data Barang</h1>
        <div class="form-group mt-5">
          <p class="label-font"><label for="nama">Nama</label></p>
          <input type="text" name="nama" class="form-control form-control-lg" id="nama" placeholder="masukan nama...">
        </div>
        <div class="form-group mt-5">
          <p class="label-font"><label for="harga">Harga</label></p>
          <input type="number" name="harga" class="form-control form-control-lg" id="harga" placeholder="masukan harga...">
        </div>
        <div class="form-group mt-5">
          <p class="label-font"><label for="stok">Stok</label></p>
          <input type="number" name="stok" class="form-control form-control-lg" id="stok" placeholder="masukan stok...">
        </div>
        <div class="form-group mt-5">
          <p class="label-font"><label for="deskripsi">Deskripsi</label></p>
          <textarea name="deskripsi" class="form-control form-control-lg" id="deskripsi" rows="3"></textarea>
        </div>
        <div class="d-flex flex-row justify-content-between mt-5">
          <div>
            <p class="label-font"><label for="gambar">Gambar</label></p>
            <input type="file" name="gambar" id="gambar">
          </div>
          <button type="submit" name="submit" class="btn btn-primary" style="width: 140px;">Submit</button>
        </div>
        <br><br><br><br><br><br>
      </form>
    </div>
  </main>


  <script src="bootstrap/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</body>
</html>