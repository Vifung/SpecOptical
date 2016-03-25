<?php

require_once('init.php');
loadScripts();

    $data = array("status" => "not set!");
//cheanged isget post//
    if(Utils::isPOST()) {
        
        
        $pm = new ProductManager();
        $rows = $pm->insertProduct();
        //var_dump($rows);
        
    
        return;
    }
    

?>
