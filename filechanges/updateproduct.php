<?php

require_once('init.php');
loadScripts();

    $data = array("status" => "not set!");
//cheanged isget post//
    if(Utils::isPOST()) {
        $quantity = $_POST['newquty'];
        $id = $_POST['product_id'];
        
        $pm = new ProductManager();
        $rows = $pm->editQuantity();
        //var_dump($rows);

       
        return;
    }
    

?>
