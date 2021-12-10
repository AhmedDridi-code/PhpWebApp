<?php 
class Product{
    private $id = null;
    private $name  = null;
    private $color = null;
    private $size = null;
    private $quantity = null ;
    private $price = null;
    private $image = null;



public function __construct($name, $color, $size, $quantity, $price, $image){
$this->name=$name;
$this->color=$color;
$this->size=$size;
$this->quantity=$quantity;
$this->price=$price;
$this->image=$image;
}

public function getId(){
    return $this->id;
}
public function getName(){
    return $this->name;
}
public function getColor(){
    return $this->color;
}
public function getSize(){
    return $this->size;
}
public function getQuantity(){
    return $this->quantity;
}
public function getPrice(){
    return $this->price;
}
public function getImage(){
    return $this->image;
}

public function setName(string $name){
    $this->name=$name;
}
public function setColor(string $color){
    $this->color=$color;
}
public function setSize(string $size){
    $this->size=$size;
}
public function setQuantity(float $quantity){
    $this->quantity=$quantity;
}
public function setPrice(float $price){
    $this->price=$price;
}
public function setImage(string $image){
    $this->image=$image;
}
}
?>