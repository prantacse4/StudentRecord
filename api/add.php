<?php
include '../db/Myfunction.php';

if (isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['university'])  ) {
    $function = new MyFunction();
    if ($function->addRecord($_POST['name'], $_POST['phone'], $_POST['email'], $_POST['university'])) {
        echo json_encode(['status'=> 'success']);
    } else {
        echo json_encode(['status'=> 'error']);
    }
}
else{
    echo json_encode(['status'=> 'error']);
}

?>