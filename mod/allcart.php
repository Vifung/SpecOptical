<?php

require_once('init.php');
loadScripts();

    $data = array("status" => "not set!");
//cheanged isget post//
    if(Utils::isPOST()) {
        
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
        $scm = new ShoppingCartManager();
        $rows = $scm->listAllCartProducts();
        $scm->listAllCartProducts($_SESSION['id']);
        
        //var_dump($rows);
        $html = "";
        foreach($rows as $row) {
            $p_id = $row['id'];
            $sku = $row['SKU'];
            $style_g = $row['style'];
            $colour_g = $row['colour'];
            $presc = $row['type'];
            $price = $row['unit_price'];
            $img = $row['img'];
            $qnty = $row['quantity'];
            $html .="<table class='pure-table' style='margin:auto;width:90%;>'>
                    <thead>
                        <tr style='text-align:center;'>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Style</th>
                            <th>Colour</th>
                            <th>Price</th>
                            <th>Type</th>
                            <th>Controller</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr data-id='$p_id' data-quantity='$qnty'>
                    <td><img src='$img' height='100px' weight='100px' /></td>
                    <td>$qnty</td>
                    <td>$style_g</td>
                    <td>$colour_g</td>
                    <td>$price</td>
                    <td>$presc</td>
                    <td>
                        <button class='add'>+</button>
                        <button class='minus'>-</button>
                        <button class='delete'>Remove</button>
                    </td>
                    
                    </tr>
                    </tbody>
                </table>";
            }
        echo $html;
        return;
    }
?>