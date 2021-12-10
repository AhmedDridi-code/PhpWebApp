<?php
require_once("C:/wamp64/www/farah/config.php"); // Change it later !!!
class OrderController{
    function getAllOrders()
    {
        $connection = config::getConnection();
        $sql = "select * from orders";
        try {
            $query = $connection->prepare($sql);
            $query->execute();
            $products = $query->fetchAll();
            return $products;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    function getOrderById($id)
    {
        $connection = config::getConnection();
        $sql = "select * from orders WHERE id = ?";
        try {
            $query = $connection->prepare($sql);
            $query->execute([$id]);
            $products = $query->fetch();
            return $products;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    function getOrderByIdUser($id)
    {
        $connection = config::getConnection();
        $sql = "select * from orders WHERE idUser = ?";
        try {
            $query = $connection->prepare($sql);
            $query->execute([$id]);
            $products = $query->fetch();
            return $products;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    function addOrder($order){
        $connection = config::getConnection();
        $sql = "insert into orders (idUser, idProduct) values (?,?)";
        try {
            $request = $connection->prepare($sql);
            $request->execute([
                $order->getIdUser(),
                $order->getIdProduct(),
            ]);
        } catch (Exception $e) {

            echo "Error: " . $e->getMessage();
        }

    }
    function removeOrder($id)
    {
        $connection = config::getConnection();
        $sql = "delete from orders where id = ?";
        $request = $connection->prepare($sql);
        $request->execute([$id]);
    }
}
?>