<?php
    // Connect to the database
    include 'connect.php';

    session_start();
    $user_id = $_SESSION['user_id'];
    $todo_content = $_POST['content'];

    $sql = $conn->query("SELECT MAX(display_order) AS max_order FROM todo");
    
    if ($sql) {
        $new_order = $sql->fetch_assoc()['max_order'] + 1;
    } else {
        $new_order = 1;
    }

    $sql = "INSERT INTO todo (user_id, display_order, content) VALUES ('$user_id', '$new_order', '$todo_content')";
    $conn->query($sql);

    $conn->close();
?>