<?php
require_once('../config.php');
error_reporting(0);
//$data = json_decode(file_get_contents("php://input"));

 include("../db.php");
 $query = "SELECT * FROM products";


 if(isset($_GET['product_id'])){
    $query = "SELECT * FROM products WHERE product_id=".$_GET['product_id'];
 }


$run= mysqli_query($db,$query);   

$products = mysqli_fetch_all($run,MYSQLI_ASSOC);

echo json_encode($products);

 


?>