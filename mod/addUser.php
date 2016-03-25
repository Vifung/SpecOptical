<?php
    require_once('init.php');
    loadScripts();
    
    $data = array("status" => "not set!");
    
    if(Utils::isPOST()) {
        $nu = new userManager();

        $parameters = new Parameters("POST");

        $action = $parameters->getValue('action');

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        switch($action) {
            case "adduser":
                // start the cart, so start session, create cart table in DB
                if(isset($_SESSION['started'])) {
                    $data = array("status" => "fail", "msg" => "You already have a cart started.");
                    echo json_encode($data, JSON_FORCE_OBJECT);
                    return;
                }

                $id = $nu->addUser();
                if(!empty($id)) {

                    $_SESSION['started'] = "true";
                    $_SESSION['id'] = $id;
                    $data = array("status" => "success", "cart_id" => $id, "msg" => "Cart started.");

                } else {
                    $data = array("status" => "fail", "msg" => "User cannotbe created.");
                }

                break;
            case "deleteuser":
                // cancel the cart, end session, set cart row to 'cancelled'

                if(!isset($_SESSION['started'])) {
                    $data = array("status" => "fail", "msg" => "There is no user to delete.");
                    echo json_encode($data, JSON_FORCE_OBJECT);
                    return;
                }
                

                if($affectedRows > 0) {

                    session_unset();
                    session_destroy();
                    $data = array("status" => "success", "msg" => "Cart cancelled.");

                } else {
                    $data = array("status" => "fail", "msg" => "Cart NOT cancelled.");
                }

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