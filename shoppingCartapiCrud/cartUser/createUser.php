<?php
require_once("../config.php");
include_once("../db.php");

$data = json_decode(file_get_contents("php://input")) ;

if($data->user_id){
    $query = "SELECT * FROM cartuser WHERE user_id =".$data->user_id;

    $query_excute = mysqli_query($db,$query);

    $user = mysqli_fetch_assoc($query_excute);

    if($user ==""){
        echo "given id is not available";
    }else{

        $Cart_id = $user['Cart_id'];
        $user_name = $user['user_name'];


        if($data->Cart_id !=""){
            $Cart_id = $data->Cart_id;
        }
        if($data->user_name !=""){
            $user_name = $data->user_name;
        }

        $updat_query = "UPDATE cartuser SET Cart_id = '$Cart_id',user_name ='$user_name' WHERE user_id =".$data->user_id;

        $run = mysqli_query($db,$updat_query);

        if($run){
            echo json_encode(["status"=>"Data has been updated"]);
        }else{
            echo "Given id is not available";
        }
        

    }
}else{



if($data->Cart_id =="" && $data->user_name =="" )
{
    echo json_encode(["status"=> "Failed","Reason"=>"Some fields are given"]);
}else{
    $query = "INSERT INTO cartuser(Cart_id,user_name)Values('$data->Cart_id','$data->user_name')";
     
    $query_run = mysqli_query($db,$query);

    if($query_run){
        echo json_encode(["status"=>"Success","User"=>"User Created"]);

    }else{
        echo json_encode(["status"=>"Failed","Desc"=>"Something is Wrong"]);
    }
  
}
}

?>