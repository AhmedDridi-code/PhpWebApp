<?php
	include '../../../controllers/product.controller.php';
    $productController = new ProductController();	
    $productController->removeProduct($_GET["id"]);
	header('Location:Products.php');
?>