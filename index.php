<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <script>
        function cartAction(action, id) {
            var queryString = "";
            if(action != "") {
                switch(action) {
                    case "add":
                        queryString = 'action='+action+'&id='+ product_id+'&quantity='+$("#total_quantity_"+id).val();
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
                    location.reload();
                },
                error:function (){}
            });
        }
    </script>
</head>

</html>

<?php include 'cart.php';?>

