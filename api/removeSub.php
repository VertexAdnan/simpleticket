<?php
require_once("../functions.php");

if(isset($_POST['id'])){
    $query = connect()->prepare("DELETE FROM subjects WHERE sub_id = '".$_POST['id']."'");
    if($query->execute()){
        echo json_encode(['status' => "success"]);
    }
} else {
    echo json_encode(['status' => 'Something went wrong']);
}