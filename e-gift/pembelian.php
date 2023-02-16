<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "e-gift";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM data_barang WHERE id =".$_GET["id"];
$result = $conn->query($sql);


if(isset($_POST["submit"])){

    $namaPembeli = $_POST["nama_pembeli"];
    $alamat = $_POST["alamat"];
    $jumlah = $_POST["jumlah"];
    $idBarang = $_GET["id"];
    $waktu = date('Y-m-d');

    $sqlBeli = "INSERT INTO pembelian VALUES ('', '$namaPembeli', '$alamat', $jumlah, $idBarang, '$waktu')";
    mysqli_query($conn, $sqlBeli);
    
    if(mysqli_affected_rows($conn) > 0){
        echo "<script>alert('Berhasil membeli product!')</script>";

        while($row = mysqli_fetch_assoc($result)) {
            $stok = $row["stok"];
        }
        $stokBaru = $stok-$jumlah;
        $sqlUpdate = "UPDATE data_barang SET stok = $stokBaru WHERE id=".$_GET["id"];
        mysqli_query($conn ,$sqlUpdate);

    } else{
        echo "<script>alert('Gagal membeli product!')</script>";
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
            <a class="nav-link " href="/add_product.php">Product</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/daftar_pembeli.php">Daftar Pembeli</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <main>

    <?php foreach($result as $barang){ ?>
    <div class="container" style="margin-top: 100px;">
      <form action="" method="POST">
        <h1 class="mb-5">Pembelian <?php echo $barang["nama"]; ?> </h1>
        <div class="form-group mt-5">
          <p class="label-font"><label for="nama">Nama</label></p>
          <input type="text" name="nama_pembeli" class="form-control form-control-lg" id="nama" placeholder="masukan nama..." required/>
        </div>
        <div class="form-group mt-4">
          <p class="label-font"><label for="alamat">Alamat</label></p>
          <textarea name="alamat" class="form-control form-control-lg" id="alamat" placeholder="masukan alamat..." rows="3" required></textarea>
        </div>
        <div class="form-group mt-4">
          <p class="label-font"><label for="jumlah">Jumlah pembelian</label></p>
          <input type="number" name="jumlah" class="form-control form-control-lg" id="jumlah" placeholder="masukan jumlah..." required/>
        </div>
        <button type="submit" name="submit" class="btn btn-primary mt-5">Konfirmasi</button>
        <br><br><br><br><br><br>
      </form>
    </div>

    <?php }?>
  </main>

    <script src="bootstrap/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</body>
</html>