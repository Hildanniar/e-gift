<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "e-gift";

  $conn = mysqli_connect($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT * FROM data_barang";
  $result = $conn->query($sql);

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

  <div id="carouselExampleSlidesOnly">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="assets/image/wallpaper.jpg" class="d-block w-100" alt="">
      </div>
      </div>
    </div>
  </div>

  <main>

    <div class="page-header text-center mt-5 mb-5"> 
        <h1>• MENU •</h1> 
    </div> 

    <div class="container">
      <div class="row">
      
        
<?php foreach($result as $barang){ ?>
        <div class="col-md-4 mb-5">
        <div class="card m-md-auto" style="width: 18rem;">
          <img src="assets/image/<?php echo $barang["gambar"]; ?>" class="card-img-top" alt="">
          <div class="card-body">
            <h5 class="card-title mb-4 "><?php echo $barang["nama"]; ?></h5>
            <div class="mt-5 d-flex flex-row justify-content-between">
              <p class="text-break"><strong><?php echo 'Rp.'.$barang["harga"]; ?></strong></p>
              <a href="<?php echo '/product.php?id='.$barang["id"]; ?>" class="btn btn-primary">Beli</a>
            </div>
          </div>
        </div>
        </div>
<?php
};?>
      </div>
    </div>
  </main>


  <script src="bootstrap/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</body>
</html>