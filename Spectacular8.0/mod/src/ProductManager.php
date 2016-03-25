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

    public function editQuantity() {
        
        
        $sql = "UPDATE product SET stock='".$_POST['newquty']."' WHERE id='".$_POST['product_id']."' ";
        $this->db->query($sql);
        
    }
    
    public function insertProduct() {
        
       
        
        $sql = "INSERT INTO product (SKU, style, colour, type, unit_price, img, stock) VALUES ('".$_POST['sku']."', '".$_POST['style']."', '".$_POST['colour']."', '".$_POST['type']."', '".$_POST['price']."', '".$_POST['img']."', '".$_POST['stock']."')";
        
        $this->db->query($sql);
        
    }
    
    
     
    
    

}

?>
