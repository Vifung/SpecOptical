<?php

include("./mod/init.php");

function addtocart(){
    global $db;
    $query = "INSERT INTO cart_product (product_id, cart_id, quantiy) VALUES ('".$_POST['product_id']."', '".$_POST['cart_id']."','".$_POST['quantity']."')";
    $result = $db->query($query);
}

function getProduct(){
    global $db;

    $query = "SELECT * FROM product WHERE SKU = '12354653'";
    $result = $db->query($query);
    echo json_encode($result->fetchAll());
}

?>