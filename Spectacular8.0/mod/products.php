<?php

require_once('./init.php');
loadScripts();

    $data = array("status" => "not set!");

    if(Utils::isGET()) {
        $pm = new ProductManager();
        
        $action = $parameters->getValue('action');
        
        $parameters = new Parameters("POST");
        
        if(session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
        switch($action) {
            case "findProduct":
            
               $fp = new findProduct($SKU);
        
        }
        
        
        

    } else {
        $data = array("status" => "error", "msg" => "Only POST allowed.");

    }

    echo json_encode($data, JSON_FORCE_OBJECT);

?>
