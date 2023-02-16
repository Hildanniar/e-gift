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


?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <title>E-Gift</title>
</head>
<body style="background-color: #e0e0e0;">

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
            <a class="nav-link active" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/add_product.php">Product</a>
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
      <div class="d-flex flex-row bg-light p-4 rounded">
        <div class="d-flex flex-row justify-content-center align-items-center">
          <img style="max-width: 550px;" src="<?php echo "assets/image/".$barang["gambar"];?>" alt="">
        </div>
        <div class="ms-4">
          <h2 class="text-break">
            <strong>
              <?php echo $barang["nama"];?>
            </strong>
          </h2>
          <h1 class="font-weight-bold mt-4 ms-5 text-break" style="color: #bd4a0d;">
            <strong><?php echo 'Rp.'.$barang["harga"];?></strong>
          </h1>
          <h3>
            <?php echo 'Stok : '.$barang["stok"];?>
          </h3>
          <h6 class="dark-text mt-3 mb-4 text-break">
            <?php echo $barang["deskripsi"];?>
          </h6>

          <div class="mt-5">
            <a href="<?php echo '/pembelian.php?id='.$_GET["id"]; ?>" class="btn btn-primary mt-4">Beli Sekarang</a>
          </div>
        </div>
      </div>
    </div>

    <?php }?>
  </main>

  <script src="bootstrap/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</body>
</html>