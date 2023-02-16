<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "e-gift";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sqlPembelian = "SELECT * FROM pembelian";
$resultPembelian = $conn->query($sqlPembelian);

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
            <a class="nav-link active" href="/daftar_pembeli.php">Daftar Pembeli</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <main>

    <div class="container" style="margin-top: 100px;">
        <h1 class="mb-5">Daftar Pembelian</h1>           
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Nama pembeli</th>
                <th>Nama barang</th>
                <th>Harga barang</th>
                <th>Jumlah dibeli</th>
                <th>Total harga</th>
                <th>Waktu</th>

            </tr>
            </thead>
            <tbody>
            <?php foreach($resultPembelian as $data){
                $resultBarang = mysqli_query($conn, "SELECT * FROM data_barang WHERE id=".$data["id_barang"]);
                foreach($resultBarang as $data2){
                $total = $data2["harga"]*$data["jumlah"];
                ?>
            <tr>
                <td><?php echo $data["nama_pembeli"];?></td>
                <td><?php echo $data2["nama"];?></td>
                <td><?php echo $data2["harga"];?></td>
                <td><?php echo $data["jumlah"];?></td>
                <td><?php echo $total;?></td>
                <td><?php echo $data["waktu"];?></td>
            </tr>
            <?php }}?>
            </tbody>
        </table>
    </div>
        
  </main>

  <script src="bootstrap/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</body>
</html>