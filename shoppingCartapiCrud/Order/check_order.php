<?php

require_once("../config.php");
include("../db.php");

$data = json_decode(file_get_contents("php://input"));


$query = "SELECT productorder.user_cart_id,cartuser.user_name,products.product_name,products.product_price,products.quantity FROM productorder  INNER JOIN cartuser ON productorder.user_cart_id = cartuser.Cart_id INNER JOIN products ON productorder.shopping_pro_id = products.product_id";

if($data->user_cart_id){
    $query = "SELECT productorder.user_cart_id,cartuser.user_name,products.product_name,products.product_price,products.quantity FROM productorder  INNER JOIN cartuser ON productorder.user_cart_id = cartuser.Cart_id INNER JOIN products ON productorder.shopping_pro_id = products.product_id WHERE productorder.user_cart_id =".$data->user_cart_id;


}

$query = mysqli_query($db,$query);

$order = mysqli_fetch_all($query,MYSQLI_ASSOC);

echo json_encode($order);

?>