<?php
require_once("../config.php");
include_once("../db.php");

$query = "SELECT * FROM cartuser";

if(isset($_GET['user_id'])){
    $query = "SELECT * FROM cartuser WHERE user_id=".$_GET['user_id'];
}

$run = mysqli_query($db,$query);
$users = mysqli_fetch_all($run);

echo json_encode($users);


?>