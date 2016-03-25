<?php
    include("../userdb.php");

    if(isset($_POST['method'])){
        if($_POST['method'] === 'insert')
        insert_user();
    }

    if(isset($_POST['email']) && isset($_POST['password'])){
       login_user();
    
        
    header('Location: ../../index.php');
    // header('Status: 200');
    exit();
        
    }

    if(isset($_POST['method'])){
        if($_POST['method'] === 'update')
        update_user();
    }

    if(isset($_POST['method'])){
        if($_POST['method'] === 'stockUpdate')
        update_stock();
    }

?>