<?php
require_once("../config.php");
include_once("../db.php");


$data = json_decode(file_get_contents("php://input"));
 include("../db.php");

 if($data->user_id){
     $query = "DELETE FROM cartuser WHERE user_id=".$data->user_id;
     $run = mysqli_query($db,$query);
    if($run){
        echo json_encode(["status"=> "success","msg"=>"user id Deleted"]);
    
    }else{
        echo json_encode(["status"=>"user is not Deleted"]);
    }
    
     

 }else{
    echo json_encode(["status"=>"failed","msg"=>"User id is not given"]);
 }



?>