<?php
require_once("../functions.php");
if(isset($_POST['id'])){
    $query = connect()->prepare("DELETE FROM users WHERE customer_id = '".$_POST['id']."'");
    $query->execute();
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'something went wrong']);
}