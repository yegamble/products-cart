<?php
session_start();
    function productsCart() {
            $output = "";
            $i = 0;

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
                    $output .= "<tr id=$i>";
                    $output .= "<td>" . $product['name'] . "</td>";
                    $output .= "<td>" . $product['price'] . "</td>";
                    $output .=  "<td> <a onClick='cartAction('add','<?php echo ".$product[$i]."; ?>')' class='btnAddProduct cart-action'>+</a> / <a onClick='cartAction('remove','<?php echo ".$product[$i]."; ?>')' class='btnRemoveProduct cart-action'>-<a/></td>";
                    $output .= "<td><p id='total_quantity_'".$product[$i].">0</p></td></tr>";
                    $output .= "<td><p id='total_price_'".$product[$i].">0</p></td></tr>";
                    $i++;
                }

                $output .= "<tr><td>Total Products</td><td></td></tr>";

                echo $output;
            } catch (Exception $e){
                echo $e->getMessage();
            }
    }

?>



<?php echo productsCart()?>
