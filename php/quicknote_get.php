<?php
    include 'connect.php';

    session_start();
    $user_id = $_SESSION['user_id'];

    $sql = $conn->query("SELECT content FROM quicknote WHERE user_id='$user_id'");

    if ($sql && $sql->num_rows > 0) {
        echo $sql->fetch_assoc()['content'];
    }

    $conn->close();
?>