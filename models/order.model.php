<?php 
class Order{
    private $id=null;
    private $idUser = null;
    private $idProduct = null;

public function __construct($idUser, $idProduct){
    $this->idUser=$idUser;
    $this->idProduct=$idProduct;
}
public function getId(){
    return $this->$id;
}
public function getIdUser(){
    return $this->$idUser;
}
public function getIdProduct(){
    return $this->$idProduct;
}
public function setIdUser(int $idUser){
$this->idUser=$idUser;
}
public function setIdProduct(int $idProduct){
    $this->idProduct=$idProduct;
}
}
?>