<?php
require_once("../config.php");
include("../db.php");


$data = json_decode(file_get_contents("php://input"));

if($data->shopping_cart_id){
    $query = "DELETE * FROM shoppingcart WHERE shopping_cart_id = ".$data->shopping_cart_id;

    $run = mysqli_query($db,$query);

    if($run){
        echo json_encode(["status"=> "success","msg"=>"cart is Deleted"]);
    }else{
        echo json_encode(["status"=>"cart is not Deleted"]);
    }

}else{
    echo json_encode(["status"=>"failed","msg"=>"User id is not given"]);
}




?>