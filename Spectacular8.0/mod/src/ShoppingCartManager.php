<?php

//require_once('./DBConnector.php');

//$um = new ShoppingCartManager();

// Facade
class ShoppingCartManager {

    private $db;

    public function __construct() {
        $this->db = DBConnector::getInstance();
    }

    public function startCart() {
        $sql = "INSERT INTO cart (state) values ('started')";
        $id = $this->db->getTransactionID($sql);
        // return id of the cart that was started
        return $id;
    }

    public function cancelCart($id) {
        $sql = "UPDATE cart SET state = 'cancelled' WHERE ID = $id";
        $count = $this->db->affectRows($sql);
        return $count;
    }

    public function checkoutCart($id) {
        $sql = "UPDATE cart SET state = 'checked out' WHERE ID = $id";
        $count = $this->db->affectRows($sql);
        return $count;
    }
    
    public function listAllCartProducts() {
        $cart_id = $_SESSION['id'];
        
        $sql = "SELECT * FROM cart_product
                    LEFT JOIN product 
                    ON cart_product.product_id = product.id
                WHERE cart_product.cart_id = $cart_id";
        $rows = $this->db->query($sql);
        return $rows;
    }
    
    public function removeProductFromCart() {
        $cart_id = $_SESSION['id'];
        $sql = "DELETE FROM cart_product WHERE cart_id = $cart_id";
        $rows = $this->db->query($sql);
        return $rows;
        
        $qty = $_POST['quantity'];
        $p_id = $_POST['p_id'];
        
        echo ($qty);
        echo ($cart_id);
        echo ($p_id);

        $qty = $qty - 1;
        $sql = "SELECT stock FROM product WHERE id = $p_id";
        $stocks = $this->db->query($sql);
        $stock=($stocks[0]["stock"]);
        
        
    }
    
    public function minusQuantity() {
        $qty = $_POST['quantity'];
        $cart_id = $_SESSION['id'];
        $p_id = $_POST['p_id'];
        
        echo ($qty);
        echo ($cart_id);
        echo ($p_id);

        $qty = $qty - 1;
        $sql = "SELECT stock FROM product WHERE id = $p_id";
        $stocks = $this->db->query($sql);
        $stock=($stocks[0]["stock"]);
        
        if(0 < $qty){
            
            $sql = "UPDATE cart_product SET quantity = '$qty' WHERE cart_id = '$cart_id' AND product_id = $p_id";
            $rows = $this->db->query($sql);
            $qtys = $stock+1;
            $sql = "UPDATE product SET stock = $qtys WHERE id = $p_id";
            $this->db->query($sql);
            
        } else {
            
            return "Quantity cannot go below zero";
            
        }
        
    }
    
    public function addQuantity() {
        $qty = $_POST['quantity'];
        $cart_id = $_SESSION['id'];
        $p_id = $_POST['p_id'];
        
        echo ($qty);
        echo ($cart_id);
        echo ($p_id);

        $qty = $qty + 1;
        
        $sql = "SELECT stock FROM product WHERE id = $p_id";
        $stocks = $this->db->query($sql);
        $stock=($stocks[0]["stock"]);
        if(0 < $stock){
            
            $sql = "UPDATE cart_product SET quantity = '$qty' WHERE cart_id = '$cart_id' AND product_id = $p_id";
            $rows = $this->db->query($sql);
            $qtys = $stock-1;
            $sql = "UPDATE product SET stock = $qtys WHERE id = $p_id";
            $this->db->query($sql);
            
        } else {
            
            return "Out of stock";
            
        }
                                
        
    }

    public function addItemsToCart() {

        $sku = $_POST['item'];
        $qty = $_POST['quantity'];
        $cart_id = $_SESSION['id'];
        $new_price = $_POST['item'] * $_POST['quantity'];

        // need to look up the ID of the product based on the SKU
        $sql = "SELECT ID FROM product WHERE SKU = '$sku'";
        $rows = $this->db->query($sql);
        $product_id = $rows[0]['ID'];
        
        $sql = "INSERT IGNORE INTO cart_product (product_id, cart_id, quantity) VALUES ($product_id, $cart_id, $qty)";
        $this->db->affectRows($sql);

        $sql = "SELECT * FROM cart_product LEFT JOIN product ON cart_product.product_id = product.id";
        $rows = $this->db->query($sql);
        
        $total_price = $total_price + $new_price;

        $sql = "UPDATE INTO cart (total) VALUES ($total_price) WHERE id = '$cart_id'";
        $rows = $this->db->query($sql);
        
        $sql = "SELECT stock FROM product WHERE SKU = '$sku'";
        $stocks = $this->db->query($sql);
        $stock=($stocks[0]["stock"]);
        
        $newstock = $stock-1;
        
        $sql = "UPDATE product SET stock = $newstock WHERE SKU = '$sku'";
            $this->db->query($sql);
        
        
        
    }
}

?>
