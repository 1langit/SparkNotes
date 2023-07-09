<?php
    include 'connect.php';
    
    $order = $_POST['order'];
    // $order = json_decode($_POST['order'], true); // bisa tapi tdk perlu

    for ($i=0; $i<count($order); $i++) {
        $todo_id = $order[$i];
        $newOrder = $i + 1;

        $sql = "UPDATE todo SET display_order='$newOrder' WHERE todo_id='$todo_id'";
        $conn->query($sql);
    }

    $conn->close();
?>