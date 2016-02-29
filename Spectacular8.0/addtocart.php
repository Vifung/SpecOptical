<?php

include("./Cart2.php");

if($_POST['method'] == "addtocart"){
    addtocart();
}

if($_POST['method'] == "grabProduct"){
    getProduct();
}

?>