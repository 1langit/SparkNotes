<?php
    // Connect to the database
    include 'connect.php';

    session_start();
    $user_id = $_SESSION['user_id'];

    // Get note data from the POST request
    $noteTitle = $_POST['title'];
    $noteContent = $_POST['content'];

    // Insert the new note into the database
    $sql = "INSERT INTO notes (user_id, title, content) VALUES ('$user_id', '$noteTitle', '$noteContent')";
    $conn->query($sql);

    $conn->close();
?>
