<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product Cart</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        <!-- calls cart.php function from buttons in table form-->
        function cartAction(action, id) {
            var queryString = "";
            if(action != "") {
                switch(action) {
                    case "addProduct":
                        queryString = 'action='+action+'&productName='+$("#productName")+'&productPrice='+$("#productPrice");
                        break;
                    case "add":
                        queryString = 'action='+action+'&id='+ product_id+'&quantity='+$("#total_quantity_"+id);
                        break;
                    case "remove":
                        queryString = 'action='+action+'&id='+ product_code;
                        break;
                    case "empty":
                        queryString = 'action='+action;
                        break;
                }
            }
            jQuery.ajax({
                url: "cart.php",
                data:queryString,
                type: "POST",
                success:function(){
                    location.replace('#cart');
                },
                error:function (){}
            });
            
        }

    </script>
</head>

    <form action="cartAction()">
        <label for="productName">Product name:</label><br>
        <input type="text" id="productName" name="productName" value=""><br>
        <label for="productPrice">Product Price:</label><br>
        <input type="number" id="productPrice" name="productPrice" value=""><br><br>
        <input type="submit" value="Submit" onClick="cartAction('addProduct')">
    </form>

</html>

<?php include 'cart.php';?>

