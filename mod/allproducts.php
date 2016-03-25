<?php

require_once('init.php');
loadScripts();

    $data = array("status" => "not set!");
    if(Utils::isPOST()) {
        $pm = new ProductManager();
        $rows = $pm->listProducts();
        $html = "";
        foreach($rows as $row) {
            $sku = $row['SKU'];
            $style_g = $row['style'];
            $colour_g = $row['colour'];
            $presc = $row['type'];
            $price = $row['unit_price'];
            $img = $row['img'];
            $html .="<div class='glassesbox'>
                     <img src='$img' height='100px' weight='100px' />
                    <h3>$style_g</h3>
                    <p>$price</p>
                    <p>$presc</p>
                    <input class='add' type='button' value='addtocart' data-id='$sku' data-price='$price'/>
                </div>";
            }
        echo $html;
        return;
    }

?>
