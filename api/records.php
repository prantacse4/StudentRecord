<?php
include '../db/Myfunction.php';
    $function = new MyFunction();
    $records  = $function -> getRecord();
    echo json_encode(['success'=> true , 'data' => $records]);


?>