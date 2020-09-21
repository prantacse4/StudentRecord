<?php
include '../db/Myfunction.php';

if (isset($_POST['id'])  ) {
    $function = new MyFunction();

    if ($function->deleteRecord($_POST['id'])) {
        echo json_encode(['status'=> 'success']);
    } else {
        echo json_encode(['status'=> 'error']);
    }
}
else{
    echo json_encode(['status'=> 'error']);
}

?>