<?php
    // Connect to the database
    include 'connect.php';

    $todo_id = $_POST['id'];
    
    $sql = "DELETE FROM todo WHERE todo_id='$todo_id'";
    $conn->query($sql);

    $conn->close();
?>