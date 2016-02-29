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
                    <div class='switch'> 
                        <input type='checkbox' id='switch3' class='switch-check'/> 
                        <label for='switch3' class='switch-label'></label> 
                    </div>
                    <input type='button' value='addtocart' data-id='$sku'/>
                </div>";
            }
        echo $html;
        return;
    }
                    
// FIRST LIST
/*<table class="glassesList">
        
        <tr>
            <td class='td_padding'> // 1-1
<img src="./images/Classic_Burberry_BE1156.jpg" height="100px" weight="100px" /></td>
            <td class='td_padding'> // 1-2
<img src="./images/Classic_Oakley_Halfshock.jpg" height="200px" weight="200px" /></td>
            <td class='td_padding'>
<img src="./images/Classic_Ray-Ban_RX8582.jpg" height="100" weight="100px" /></td>
        </tr>
            
        <tr>
    <td class='td_padding'>Classic Burberry BE1156 </td> // 1-1
    <td class='td_padding'>Classic Oakley Halfshock</td>
// 1-2
    <td class='td_padding'>Classic Ray-Ban RX8582</td>
        </tr>
        
        <tr>
            <td>
            <div class="switch"> // 1-1
<input type="checkbox" id="switch1" class="switch-check"/> 
<label for="switch1" class="switch-label"> 
</label> 
            </div>
            </td>
            
            <td>
            <div class="switch"> // 1-2
<input type="checkbox" id="switch2" class="switch-check"/> 
<label for="switch2" class="switch-label"> 
</label> 
            </div>
            </td>
            
            <td>
            <div class="switch"> 
<input type="checkbox" id="switch3" class="switch-check"/> 
<label for="switch3" class="switch-label"> 
</label> 
            </div>
            </td>
        </tr>

// SECOND LIST
         <tr>
        <td class='td_padding'><div class='td_margin'>
<img src="./images/Cool_Trendy_Burberry_BE2150.jpg" height="110px" weight="100px"/></div></td>
        <td class='td_padding'><div class='td_margin'>
<img src="./images/Cool_Trendy_Gucci_GG1077.jpg" height="75px" weight="70px" /></div></td>
        <td class='td_padding'><div class='td_margin'>
<img src="./images/Cool_Trendy_Polo_PH2057.jpg" height="110px" weight="100px" /></div></td>
        </tr>
            
        <tr>
<td class='td_padding'>Cool Trendy Burberry BE2150</td>
<td class='td_padding'>Cool Trendy Gucci GG1077</td>
<td class='td_padding'>Cool Trendy Polo PH2057</td>
        </tr>
        
        <tr>
            <td class='td_padding'>$150</td>
            <td class='td_padding'>$107</td>
            <td class='td_padding'>$157</td>
        </tr>
        
         <tr>
            <td>
                <div class="switch"> 
                    <input type="checkbox" id="switch4" class="switch-check"/> 
                    <label for="switch4" class="switch-label"> 
                       
                    </label> 
                </div>
            </td>
            
            <td>
                <div class="switch"> 
                    <input type="checkbox" id="switch5" class="switch-check"/> 
                    <label for="switch5" class="switch-label"> 
                      
                    </label> 
                </div>
            </td>
            
            <td>
                <div class="switch"> 
                    <input type="checkbox" id="switch6" class="switch-check"/> 
                    <label for="switch6" class="switch-label"> 
                      
                    </label> 
                </div>
            </td>
        </tr>       

// THIRD LIST
        
        <tr>
            <td class='td_padding'><div class='td_margin'>
                <img src="./images/Nerdy_Persol_PO3007V_Eyeglasses.jpg" height="100px" weight="100px"/></div></td>
            <td class='td_padding'><div class='td_margin'>
                <img src="./images/Nerdy_Polo_PH2083.jpg" height="120px" weight="100px" /></div></td>
            <td class='td_padding'><div class='td_margin'>
                <img src="./images/Nerdy_Ray-Ban_RX5285.jpg" height="120px" weight="100px" /></div></td>
        </tr>
            
        <tr>
            <td class='td_padding'>Nerdy Persol PO3007V</td>
            <td class='td_padding'>Nerdy Polo PH2083</td>
            <td class='td_padding'>Nerdy Ray-Ban RX5285</td>
        </tr>
        
         <tr>
            <td class='td_padding'>$300</td>
            <td class='td_padding'>$208</td>
            <td class='td_padding'>$285</td>
        </tr>
        
         <tr>
            <td>
                <div class="switch"> 
                    <input type="checkbox" id="switch7" class="switch-check"/> 
                    <label for="switch7" class="switch-label"> 
                       
                    </label> 
                </div>
            </td>
            
            <td>
                <div class="switch"> 
                    <input type="checkbox" id="switch8" class="switch-check"/> 
                    <label for="switch8" class="switch-label"> 
                        
                    </label> 
                </div>
            </td>
            
            <td>
                <div class="switch"> 
                    <input type="checkbox" id="switch9" class="switch-check"/> 
                    <label for="switch9" class="switch-label"> 
                        
                    </label> 
                </div>
            </td>
        </tr>
        
        
           
    </table>
                
        
        }
        echo $html;
        return;

    } else {
        
        $data = array("status" => "error", "msg" => "Only GET allowed.");

    }

    echo json_encode($data, JSON_FORCE_OBJECT);*/


// RENAME allproducts.php


?>
