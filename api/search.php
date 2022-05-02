<?php
require_once("../functions.php");
if(isset($_POST['search'])){
    $db = connect();

    $query = $db->prepare("SELECT * FROM tickets WHERE title LIKE '%".$_POST['search']."%'  ");
    $query->execute();
    
    echo json_encode(['results' => array_reverse($query->fetchAll())]);
}