<?php
require_once('../config.php');
error_reporting(0);
//$data = json_decode(file_get_contents("php://input"));

 include("../db.php");
 $query = "SELECT shoppingcart.shopping_cart_id,cartuser.user_name,products.product_name,products.product_price,shoppingcart.quantity FROM shoppingcart INNER JOIN cartuser ON shoppingcart.user_cart_id = cartuser.Cart_id INNER JOIN products ON shoppingcart.shopping_pro_id = products.product_id;";


 if(isset($_GET['user_cart_id'])){
    
    $query = "SELECT cartuser.user_name, products.product_name,products.product_price,shoppingcart.quantity FROM shoppingcart INNER JOIN cartuser ON shoppingcart.user_cart_id = cartuser.Cart_id INNER JOIN products ON shoppingcart.shopping_pro_id = products.product_id WHERE shoppingcart.user_cart_id =".$_GET['user_cart_id'];

 }


$run= mysqli_query($db,$query);   

$products_in_cart = mysqli_fetch_all($run,MYSQLI_ASSOC);

echo json_encode($products_in_cart);

 


?>