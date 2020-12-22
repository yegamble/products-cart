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

            //set action to null by default
            if(!isset($_POST["action"])){
                $_POST["action"] = null;
            }

            //check if new product is added
            if($_POST["action"] == "add_product"){

                if(!($_POST["productName"]) || !isset($_POST["productPrice"])){
                    throw new Exception("Cannot Add Product Information Missing");
                } else if(array_search($_POST["productName"], array_column($products, 'name'))){
                    throw new Exception("Product Already Exists");
                }

                array_push($products,["name"=>$_POST["productName"],"price"=>$_POST["productPrice"]]);
            }

                if(empty($products)){
                    throw new Exception("No Products Found");
                }

                foreach ($products as $product) {
                    $output .= "<table id='cart'>";
                    if (!isset($quantityArray[$i])){
                        $quantityArray[$i] = ['quantity' => 0];
                    }

                    $output .= "<tr><th>Name</th><th>Price</th><th>Add/Remove</th><th>Quantity</th><th>Total Price</th></tr>";

                    $output .= "<tr id=$i>";
                    $output .= "<td>" . $product['name'] . "</td>";
                    $output .= "<td>" . number_format($product['price'],2) . "</td>"; //format prices 2 decimals
                    $output .=  "<td> <a onClick='cartAction('add','".$i."')' class='btnAddProduct cart-action'>+</a> 
                                / <a onClick='cartAction('remove','".$i."')' class='btnRemoveProduct cart-action'>-<a/></td>";
                    $output .= "<td><p id='total_quantity_".$i."'>". isset($_POST["action"]) ? changeQuantity($quantityArray[$i]['quantity']) : $quantityArray[$i] ."</p></td></tr>";
                    $output .= "<td><p id='total_price_".$i."'>". ($quantityArray[$i]['quantity'] * $product['price']) ."</p></td></tr>";
                    $i++;
                }

                //count overall value of products in cart.
                $output .= "<tr><td>Overall Total Products: ". json_encode(array_count_values(array_column($quantityArray, 'quantity')))."</tr>";

                $output .= "</table>";
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


