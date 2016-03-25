<?php

require_once('init.php');
//require_once('utils.php');
require_once('Parameters.php');
loadScripts();

    $data = array("status" => "not set!");

    if(Utils::isPOST()) {
        $scm = new ShoppingCartManager();

        $parameters = new Parameters("POST");

        $action = $parameters->getValue('action');

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        switch($action) {
            case "startcart":
                // start the cart, so start session, create cart table in DB
                if(isset($_SESSION['started'])) {
                    $data = array("status" => "fail", "msg" => "You already have a cart started.");
                    echo json_encode($data, JSON_FORCE_OBJECT);
                    return;
                }

                $id = $scm->startCart();
                if(!empty($id)) {

                    $_SESSION['started'] = "true";
                    $_SESSION['id'] = $id;
                    $data = array("status" => "success", "cart_id" => $id, "msg" => "Cart started.");
                    // lahiru echo($_SESSION);
                } else {
                    $data = array("status" => "fail", "msg" => "Cart NOT started.");
                }

                break;
            
            case "addQuantity":
            
            if(!isset($_SESSION['started'])) {
                    $data = array("status" => "fail", "msg" => "There is no items to check out.");
                    echo json_encode($data, JSON_FORCE_OBJECT);
                    return;
                }
                
                $affectedRows = $scm->addQuantity($_POST['quantity'], $_POST['p_id'], $_SESSION['id']);
                
                if($affectedRows > 0) {

                    $data = array("status" => "fail", "msg" => "There is no stock.");

                } else {
                    $data = array("status" => "success", "msg" => "Item edited.");
                }
                
            break;
                
                case "minusQuantity":
            
            if(!isset($_SESSION['started'])) {
                    $data = array("status" => "fail", "msg" => "There is no items to check out.");
                    echo json_encode($data, JSON_FORCE_OBJECT);
                    return;
                }
                
                $affectedRows = $scm->minusQuantity($_POST['quantity'], $_POST['p_id'], $_SESSION['id']);
                
                if($affectedRows > 0) {

                    $data = array("status" => "fail", "msg" => "There is no items to check out.");

                } else {
                    $data = array("status" => "success", "msg" => "Item edited.");
                }
                
            break;
            
            case "cancelcart":
                // cancel the cart, end session, set cart row to 'cancelled'

                if(!isset($_SESSION['started'])) {
                    $data = array("status" => "fail", "msg" => "There is no cart to cancel.");
                    echo json_encode($data, JSON_FORCE_OBJECT);
                    return;
                }
                $affectedRows = $scm->cancelCart($_SESSION['id']);

                if($affectedRows > 0) {

                    session_unset();
                    session_destroy();
                    $data = array("status" => "success", "msg" => "Cart cancelled.");
                    echo var_dump($_SESSION);
                } else {
                    $data = array("status" => "fail", "msg" => "Cart NOT cancelled.");
                }

                break;
                
            case "addItemsToCart":
                //add items to cart
                
                if(!isset($_SESSION['started'])) {
                    $data = array("status" => "fail", "msg" => "There is no items to check out.");
                    echo json_encode($data, JSON_FORCE_OBJECT);
                    return;
                }
                
                $scm->addItemsToCart($_POST['item'], $_POST['quantity'], $_POST['price'], $_SESSION['id']);
                
                if($affectedRows > 0) {

                    $data = array("status" => "fail", "msg" => "There is no items to check out.");

                } else {
                    $data = array("status" => "success", "msg" => "Item added.");
                }
                            
                break;
            
            case "removeProductFromCart":
                if(!isset($_SESSION['started'])) {
                    $data = array("status" => "fail", "msg" => "There is no products in your cart.");
                    echo json_encode($data, JSON_FORCE_OBJECT);
                    return;
                }
                $affectedRows = $scm->removeProductFromCart($_SESSION['id'], $_POST['p_id'], $_SESSION['id']);
                
                if($affectedRows > 0) {

                    $data = array("status" => "fail", "msg" => "There are no products");

                } else {
                    $data = array("status" => "success", "msg" => "There are products");
                }
                
                $scm->removeProductFromCart($_SESSION['id']);
                
            break;
            
            case "listAllCartProducts":
            
                if(!isset($_SESSION['started'])) {
                    $data = array("status" => "fail", "msg" => "There is no products in your cart.");
                    echo json_encode($data, JSON_FORCE_OBJECT);
                    return;
                }
                $affectedRows = $scm->addItemsToCart($_SESSION['id']);

            
                if($affectedRows > 0) {

                    $data = array("status" => "fail", "msg" => "There are no products");

                } else {
                    $data = array("status" => "success", "msg" => "There are products");
                }
                
                $scm->listAllCartProducts($_SESSION['id']);
                
                break;
                
            case "checkoutcart":
                // check out the cart

                if(!isset($_SESSION['started'])) {
                    $data = array("status" => "fail", "msg" => "There is no cart to check out.");
                    echo json_encode($data, JSON_FORCE_OBJECT);
                    return;
                }

                // turn the JSON into an array of arrays (true means arrays and not objects)
                $items = json_decode($_POST['items'], true);
                $scm->addItemsToCart($items, $_SESSION['id']);

                $affectedRows = $scm->checkoutCart($_SESSION['id']);

                if($affectedRows > 0) {

                    session_unset();
                    session_destroy();
                    $data = array("status" => "success", "msg" => "Cart successfully checked out.");

                } else {
                    $data = array("status" => "fail", "msg" => "Cart was NOT checked out.");
                }
                break;


        }


    } else {
        $data = array("status" => "error", "msg" => "Only POST allowed.");

    }

    echo json_encode($data, JSON_FORCE_OBJECT);



?>
