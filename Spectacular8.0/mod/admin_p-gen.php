<?php

require_once('init.php');
loadScripts();

    $data = array("status" => "not set!");
//cheanged isget post//
    if(Utils::isPOST()) {
        $pm = new ProductManager();
        $rows = $pm->listProducts();
        //var_dump($rows);
        $html = "";
        foreach($rows as $row) {
            $id = $row['id'];
            
            $stock = $row['stock'];
            $sku = $row['SKU'];
            $style_g = $row['style'];
            $colour_g = $row['colour'];
            $presc = $row['type'];
            $price = $row['unit_price'];
            $img = $row['img'];
            $html .="<table class='pure-table' style='margin:auto;width:90%;>'>
                    <thead>
                        <tr style='text-align:center;' >
                            <th>Product</th>
                            <th>SKU</th>
                            <th>Style</th>
                            <th>Colour</th>
                            <th>Price</th>
                            <th>Type</th>
                            <th>Stock</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr data-id='$id'><td><img src='$img' height='100px' weight='100px' /></td>
                    <td>$sku</td>
                    <td>$style_g</td>
                    <td>$colour_g</td>
                    <td>$price</td>
                    <td>$presc</td>
                    <td><input id='numStock' type='number' value=$stock></td>
                    <td><button class='prodUpdate'>Update</button></td>
                    </tr></tbody>
                </table>";
            }
        echo $html;
        return;
    }
?>