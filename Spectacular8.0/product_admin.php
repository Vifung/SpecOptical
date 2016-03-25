<?php
    require_once('./libs/PHPTAL-1.3.0/PHPTAL.php');

    $template = new PHPTAL('product_admin.xhtml');

    $template->page_title = "My Products";

    try {
        echo $template->execute();
    }
    catch (Exception $e){
        // not much else we can do here if the template engine barfs
        echo $e;
    }
?>