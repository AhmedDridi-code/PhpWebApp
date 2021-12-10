<?php 
 include_once '../../../models/product.model.php';
 include_once '../../../controllers/product.controller.php';

 $error = "";

 // create adherent
 $product = null;

 // create an instance of the controller
 $productController = new ProductController();
 if (
     isset($_POST["submit"]) 
 ) {
     if (
     !empty($_POST["name"]) &&		
     !empty($_POST["color"]) &&
     !empty($_POST["price"]) && 
     !empty($_POST["size"]) && 
     !empty($_POST["quantity"])
     ) {
         $filename = $_FILES["choosefile"]["name"];

         $tempname = $_FILES["choosefile"]["tmp_name"];  
     
             $folder = "../../../uploads/".$filename; 
         $product = new Product(
             $_POST['name'],
             $_POST['color'],
             $_POST['size'],
             intval($_POST['quantity']),
             intval( $_POST['price']), 
             $filename
         );
         move_uploaded_file($tempname, $folder);
        $productController->updateProduct($product, $_GET["id"]);
         header('Location:Products.php');
     }
     else
         $error = "Missing information";
 } 
?>
<!--
=========================================================
* Soft UI Dashboard - v1.0.3
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2021 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Soft UI Dashboard by Creative Tim
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-100">
  <section class="min-vh-100 mb-8">
    <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('../assets/img/curved-images/curved14.jpg');">
    </div>
    <div class="container">
      <div class="row mt-lg-n10 mt-md-n11 mt-n10">
        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
          <div class="card z-index-0">
            <div class="card-header text-center pt-4">
              <h5>Edit Product</h5>
            </div>
            <div class="card-body">
            <?php
    if (isset($_GET['id'])) {
        $product = $productController->getProductById($_GET['id']);

    ?>
              <form role="form text-left" action="UpdateProduct.php?id=<?php echo $_GET['id']; ?>" method="POST" enctype="multipart/form-data">
              <div class="mb-3">
                  <input type="text" name="name" id="name" class="form-control" placeholder="Name" aria-label="Name"  value="<?php echo $product['name'] ?>">
                </div>
                <div class="mb-3">
                  <input type="text" name="color" id="color" class="form-control" placeholder="Color" aria-label="Color"  value="<?php echo $product['color'] ?>">
                </div>
                <div class="mb-3">
                  <input type="text" name="size" id="size" class="form-control" placeholder="Size" aria-label="Size" value="<?php echo $product['size'] ?>" >
                </div>
                <div class="mb-3">
                  <input type="text" name="quantity" id="quantity" class="form-control" placeholder="Quantity" aria-label="Quantity" value="<?php echo $product['quantity'] ?>" >
                </div>
                <div class="mb-3">
                  <input type="text" name="price" id="price" class="form-control" placeholder="Price" aria-label="Price" value="<?php echo $product['price'] ?>" >
                </div>
                <div class="mb-3 ">
                  <input type="file" name="choosefile"  class="btn bg-gradient-dark w-100 my-4 mb-2"/>
                  </div>
                <div class="text-center">
                  <input type="submit" value="submit" name="submit" class="btn bg-gradient-dark w-100 my-4 mb-2"/>
                </div>
            </form>
            <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.3"></script>
</body>

</html>