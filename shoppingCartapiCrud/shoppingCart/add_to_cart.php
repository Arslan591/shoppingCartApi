<?php
require_once("../config.php");
include_once("../db.php");

$data = json_decode(file_get_contents("php://input"));

if($data->shopping_cart_id){
    $query2 ="SELECT * FROM shoppingcart WHERE shopping_cart_id = ".$data->shopping_cart_id ;

    $run2 = mysqli_query($db,$query2);
    $cart = mysqli_fetch_assoc($run2);

    if($cart ==""){
        echo "Given cart id is not available";
    }else{
        $user_cart_id == $cart['user_cart_id'];
        $shopping_cart_id ==$cart['shopping_cart_id'];
        $quantity = $cart['quantity'];


        if($data->user_cart_id != ""){
            $user_cart_id = $data->user_cart_id;
        }
        if($data->shopping_cart_id !=""){
            $shopping_cart_id = $data->shopping_cart_id;
        }
        if($data->quantity){
            $quantity = $data->quantity;
        }



        $query = "UPDATE shoppingcart SET user_cart_id ='$user_cart_id',shopping_cart_id='$shopping_cart_id',quantity='$quantity'";

        $run = mysqli_query($db,$query);

        if($run){
            echo json_encode(["status"=>"Successfull" ,"Desc"=>"Data has been updated successfuly"]);

        }
        else{
            echo json_encode(["status"=>"is not updated"]);
        }
    }


}else{


if($data->user_cart_id==" "&& $data->shopping_cart_id == "" && $data->quantity ==""){

    echo jason_encode(["status"=>"Failed to Add product" ,"Desc"=>"Somethin is Missing"]);
}else{

    
     $query = "INSERT INTO  shoppingcart(user_cart_id,shopping_pro_id,quantity)Values('$data->user_cart_id','$data->shopping_pro_id','$data->quantity')";

    
   
    $query_run= mysqli_query($db,$query);

    if($query_run){
        echo "Successful";
    }else{
        echo "fail";
    }

}
}

?>