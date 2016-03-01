<?php

//require_once('./DBConnector.php');

//$um = new ProductManager();

// Facade
class ProductManager {

    private $db;

     //$postId = $_POST['1'];
    //$sessionId = $_SESSION['id'];

    public function __construct() {
        $this->db = DBConnector::getInstance();
    }
    
    public function getId(){
        $sql = "INSERT INTO cart_product (product_id, cart_id) VALUES ('$postId','$sessionId')";
    
    }
    
    public function listProducts() {
        $sql = "SELECT * FROM product";
        $rows = $this->db->query($sql);
        return $rows;
    

    /*public function findProduct($SKU) {
        $params = array(":sku" => $SKU);
        $sql = "SELECT SKU, style, colour, type, unit_price WHERE SKU = :sku";

        $rows = $this->db->query($sql, $params);
        if(count($rows) > 0) {
            return $rows[0];
        }*/

        return null;
    }


}

?>
