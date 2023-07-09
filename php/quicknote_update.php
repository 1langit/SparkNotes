<?php
    include 'connect.php';

    session_start();
    $user_id = $_SESSION['user_id'];
    $content = $_POST['content'];

    $sql = $conn->query("SELECT * FROM quicknote WHERE user_id='$user_id'");

    if ($sql && $sql->num_rows > 0) {
        $conn->query("UPDATE quicknote SET content='$content' WHERE user_id='$user_id'");
    } else {
        $conn->query("INSERT INTO quicknote (user_id, content) VALUES ('$user_id', '$content')");
    }

    $conn->close();
?>