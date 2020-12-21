<?php

if(session_unset()) {
    session_start();
}

    function productsCart($id = null, $quantity = null) {
            $output = "";
            $i = 0;
            $quantityPriceArray = isset($_SESSION['quantityArray']) ? $_SESSION['quantityArray'] : array();

            // ######## please do not alter the following code ########
                    $products = [
                        [ "name" => "Sledgehammer", "price" => 125.75 ],
                        [ "name" => "Axe", "price" => 190.50 ],
                        [ "name" => "Bandsaw", "price" => 562.131 ],
                        [ "name" => "Chisel", "price" => 12.9 ],
                        [ "name" => "Hacksaw", "price" => 18.45 ],
                    ];
            // ########################################################

            try {

                if(empty($products)){
                    throw new Exception("No Products Found");
                }

                foreach ($products as $product) {

                    if (!isset($quantityArray[$i])){
                        $quantityPriceArray[$i] = 0;
                    }

                    $output .= "<tr id=$i>";
                    $output .= "<td>" . $product['name'] . "</td>";
                    $output .= "<td>" . $product['price'] . "</td>";
                    $output .=  "<td> <a onClick='cartAction('add','<?php echo ".$i."; ?>')' class='btnAddProduct cart-action'>+</a> 
                                / <a onClick='cartAction('remove','<?php echo ".$i."; ?>')' class='btnRemoveProduct cart-action'>-<a/></td>";
                    $output .= "<td><p id='total_quantity_'".$i.">". ($id != null && $id == $i) ? changeQuantity($quantity) : $quantityPriceArray[$i] ."</p></td></tr>";
                    $output .= "<td><p id='total_price_'".$i.">0</p></td></tr>";
                    $i++;
                }

                $output .= "<tr><td>Total Products</td><td></td></tr>";

                echo $_SESSION["output"] = !isset($_SESSION["output"] ) ? $output : $_SESSION["output"] ;
            } catch (Exception $e){
                echo $e->getMessage();
            }
    }

    //change quantity of product
    function changeQuantity($currentQuantity){

//        if($currentQuantity == 0){
//            throw new Exception("Quantity Already Zero");
//        }

        if($_POST["action"] = "add"){
            return $currentQuantity+1;
        } else if ($_POST["action"] = "remove"){
            return $currentQuantity-1;
        }
    }

?>



<?php
    echo productsCart();
?>
