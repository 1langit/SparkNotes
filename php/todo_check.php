<?php
    include 'connect.php';

    $todo_id = $_POST['id'];
    $status = $_POST['status'];

    $sql = "UPDATE todo SET status='$status' WHERE todo_id='$todo_id'";
    $conn->query($sql);

    $conn->close();
?>