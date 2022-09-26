<?php
require_once("../config.php");
include("../db.php");

$data = json_decode(file_get_contents("php://input"));

if($data->user_cart_id){

$query = "INSERT INTO productorder(user_cart_id,shopping_pro_id,quantity) SELECT user_cart_id,shopping_pro_id,quantity FROM shoppingcart WHERE shoppingcart.user_cart_id = ".$data_user_cart_id;

$query_excute =mysqli_query($db,$query);

if($query_excute){
    echo "Order has been created";
}else{
    echo "given user_cart_id is having no item in cart";
}


}


?>