<?php
require_once('../config.php');
include("../db.php");

error_reporting(0);
$data = json_decode(file_get_contents("php://input"));


// For Update any data user gives "id" of specific data.

if($data->product_id){
   $query2 = "SELECT * FROM products WHERE product_id =".$data->product_id ;
   $run2 = mysqli_query($db,$query2);
   $product = mysqli_fetch_assoc($run2);

  
   if($product =="" ){ 

      echo"given id is not available";
    }else{

   $product_name = $product['product_name'];
   $product_price = $product['product_price'];
   $product_desc = $product['product_desc'];
   

  
   // These are validation for checking user enter updated value or assing 
   // to it previous values.

   if($data->product_name!=""){
       $product_name = $data->product_name;
    }
    if($data->product_price!=""){
       $product_price = $data->product_price;
       
    }
    
    if($data->product_desc!=""){
      $product_desc = $data->product_desc;
    }


    $query = "UPDATE products SET product_name='$product_name',product_price='$product_price',product_desc ='$product_desc'WHERE product_id= ".$data->product_id;

  
  
       $run = mysqli_query($db,$query);
   
   if($run){
       echo json_encode(["status"=> "success","msg"=>"product updated"]);
   
   }else{
       echo json_encode(["status"=>"is not updated"]);
   }}
   
    

}else{

// These are validation for creating a new product which check there is 
// value which are not provided through error.

if($data->product_name==""&& $data->product_price==""&& $data->product_desc =="" ){
   echo json_encode(["status"=>"failed some field is missing",]);
}else{

   $query = "INSERT INTO products(product_name,product_price,product_desc)Values('$data->product_name','$data->product_price','$data->product_desc')";
$run = mysqli_query($db,$query);

if($run){
   echo json_encode(["status"=> "success","msg"=>"product Added"]);

}else{
   echo json_encode(["status"=>"failed"]);
}

}

 
}


?>