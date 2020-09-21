<?php
include '../db/Myfunction.php';

if(isset($_REQUEST['id'])){
        $id = $_REQUEST['id'];
        $function = new MyFunction();
        $recordData = $function->findRecord($id);
        echo json_encode(['success'=> true , 'data' => $recordData]);
        
}
?>