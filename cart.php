<?php

class cart
{

    private $cartArray;

    function __construct() {
        $this->cartArray = array();
        $this->setProducts();
    }

    //getter
    public function setProducts()
    {

        // ######## please do not alter the following code ########
        $products = [
            [ "name" => "Sledgehammer", "price" => 125.75 ],
            [ "name" => "Axe", "price" => 190.50 ],
            [ "name" => "Bandsaw", "price" => 562.131 ],
            [ "name" => "Chisel", "price" => 12.9 ],
            [ "name" => "Hacksaw", "price" => 18.45 ],
        ];
        // ########################################################

        foreach($products as $product){
            array_push($this->cartArray, $product);
        }

        echo $this->cartArray;
    }

}