<?php

if(session_unset()) {
    session_start();
}

    //main cart function, accepts id and quantity inputs from JQuery
    function productsCart($id = null, $quantity = null) {

        try {
            $output = "";
            $i = 0;
            $quantityArray = isset($_SESSION['quantityArray']) ? $_SESSION['quantityArray'] : array();

            // ######## please do not alter the following code ########
                    $products = [
                        [ "name" => "Sledgehammer", "price" => 125.75 ],
                        [ "name" => "Axe", "price" => 190.50 ],
                        [ "name" => "Bandsaw", "price" => 562.131 ],
                        [ "name" => "Chisel", "price" => 12.9 ],
                        [ "name" => "Hacksaw", "price" => 18.45 ],
                    ];
            // ########################################################

            //check if new product is added
            if($_POST["action"] == "add_product"){

                if(!($_POST["productName"]) || !isset($_POST["productPrice"])){
                    throw new Exception("Cannot Add Product Information Missing");
                } else if(array_search($_POST["productName"],$products)){
                    throw new Exception("Product Already Exists");
                }

                array_push($products,["name"=>$_POST["productName"],"price"=>$_POST["productPrice"]]);
            }

                if(empty($products)){
                    throw new Exception("No Products Found");
                }

                foreach ($products as $product) {

                    if (!isset($quantityArray[$i])){
                        $quantityArray[$i] = ['quantity' => 0];
                    }

                    $output .= "<tr id=$i>";
                    $output .= "<td>" . $product['name'] . "</td>";
                    $output .= "<td>" . number_format($product['price'],2) . "</td>"; //format prices 2 decimals
                    $output .=  "<td> <a onClick='cartAction('add','".$i."')' class='btnAddProduct cart-action'>+</a> 
                                / <a onClick='cartAction('remove','".$i."')' class='btnRemoveProduct cart-action'>-<a/></td>";
                    $output .= "<td><p id='total_quantity_".$i."'>". ($id != null && $id == $i) ? changeQuantity($quantityArray[$i]['quantity']) : $quantityArray[$i] ."</p></td></tr>";
                    $output .= "<td><p id='total_price_".$i."'>". ($quantityArray[$i]['quantity'] * $product['price']) ."</p></td></tr>";
                    $i++;
                }

                $output .= "<tr><td>Overall Total Products</td><td></td></tr>";

                echo $_SESSION["output"] = !isset($_SESSION["output"] ) ? $output : $_SESSION["output"] ;
            } catch (Exception $e){
                echo $e->getMessage();
            }
    }

    //change quantity of product
    function changeQuantity($currentQuantity): int
    {

        if($_POST["action"] = "add"){
            return $currentQuantity + 1;
        } else if ($_POST["action"] = "remove" && $currentQuantity > 0){
            return $currentQuantity - 1;
        }
    }

echo productsCart();

?>
