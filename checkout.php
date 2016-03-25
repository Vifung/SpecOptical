<?php
    require_once('./libs/PHPTAL-1.3.0/PHPTAL.php');

    $template = new PHPTAL('checkout.xhtml');

    $template->page_title = "Checkout";

    try {
        echo $template->execute();
    }
    catch (Exception $e){
        // not much else we can do here if the template engine barfs
        echo $e;
    }
?>