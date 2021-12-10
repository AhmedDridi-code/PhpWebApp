<?php
require_once("C:/wamp64/www/farah/config.php"); // Change it later !!!
class ProductController {
    function addProduct($product)
    {
        $connection = config::getConnection();
        $sql = "insert into product (name, color, size, quantity, price, image) values (?,?,?,?,?,?)";
        try {
            $request = $connection->prepare($sql);
            $request->execute([
                $product->getName(),
                $product->getColor(),
                $product->getSize(),
                $product->getQuantity(),
                $product->getPrice(),
                $product->getImage(),
            ]);
        } catch (Exception $e) {

            echo "Error: " . $e->getMessage();
        }
    }

    function getAllProducts()
    {
        $connection = config::getConnection();
        $sql = "select * from product";
        try {
            $query = $connection->prepare($sql);
            $query->execute();
            $products = $query->fetchAll();
            return $products;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function getProductById($id)
    {
        $connection = config::getConnection();
        $sql = "select * from product WHERE id = ?";
        try {
            $query = $connection->prepare($sql);
            $query->execute([$id]);
            $products = $query->fetch();
            return $products;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function updateProduct($product, $id)
    {
        $connection = config::getConnection();
        $sql = "update product set name = :name, color = :color, size= :size, quantity = :quantity, price = :price, image= :image WHERE id = :id";
        try {
            $request = $connection->prepare($sql);
            $request->execute(["name" => $product->getName(), "color" => $product->getColor(), "size" => $product->getSize(), "quantity" => $product->getQuantity(), "price" => $product->getPrice(), "image" => $product->getImage(), "id" => $id]);
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    function removeProduct($id)
    {
        $connection = config::getConnection();
        $sql = "delete from product where id = ?";
        $request = $connection->prepare($sql);
        $request->execute([$id]);
    }

    function editQunatity($id, $quantity){
        $connection = config::getConnection();
        $sql = "update product set quantity = :quantity WHERE id = :id";
        try {
            $request = $connection->prepare($sql);
            $request->execute(["quantity" => $quantity, "id" => $id]);
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>