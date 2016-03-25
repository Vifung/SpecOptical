<?php
/* when the login begins */
if(!session_id()){
session_start();
}


require_once('./libs/PHPTAL-1.3.0/PHPTAL.php');

    $template = new PHPTAL('login.xhtml');

    $template->page_title = "Welcome to Spectacular!";

    try {
        echo $template->execute();
    }
    catch (Exception $e){
        // not much else we can do here if the template engine barfs
        echo $e;
    }
?>