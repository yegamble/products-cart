<?php

class product
{

    private $name, $price, $quantityOrdered;

    function __construct($name_in, $price_in, $quantityOrdered) {
        $this->name = $name_in;
        $this->price  = $price_in;
        $this->quantityOrdered = isset($quantityOrdered) ? $quantityOrdered : 0; //initialise quantity to zero unless set
    }


    //getter
    function getName(){
        return $this->name;
    }

    function getPrice(){
        return $this->price;
    }

    function getQuantityOrdered(){
        return $this->quantityOrdered;
    }

    function getOrderPrice(){
        return ($this->quantityOrdered * $this->price);
    }

    //setters
    function setQuantityOrdered($quantity_in){
        $this->quantityOrdered = $quantity_in;
    }

}