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
        $sql = "INSERT INTO cart (state, total) values ('started', 0.00)";
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
        $sql = "SELECT * FROM product LEFT JOIN cart_product ON product.id = cart_product.product_id";
        $rows = $this->db->query($sql);
        return $rows;
    }
    
    /*public function removeProductFromCart() {
        $sql = "DELETE FROM cart_product WHERE id = $id";
        $rows = $this->db->query($sql);
        return $rows;
    }*/

    public function addItemsToCart() {

        $sku = $_POST['item'];
        $qty = $_POST['quantity'];
        $cart_id = $_SESSION['id'];
        $new_price = $_POST['item'] * $_POST['quantity'];

        // need to look up the ID of the product based on the SKU
        $sql = "SELECT ID FROM product WHERE SKU = '$sku'";
        $rows = $this->db->query($sql);
        $product_id = $rows[0]['ID'];

        $sql = "INSERT INTO cart_product (product_id, cart_id, quantity) VALUES ($product_id, $cart_id, $qty)";
        $this->db->affectRows($sql);

        $sql = "SELECT * FROM cart_product WHERE card_id = '$cart_id'";
        $rows = $this->db->query($sql);

        foreach (cart_id as $cart_id){
            $total_price = $total_price + $new_price;

            $sql = "INSERT INTO cart (total) VALUES ($total_price)";
            $rows = $this->db->query($sql);
        }
    }
}

?>
