<?php
    // Connect to the database
    include 'connect.php';

    // Get note ID from the POST request
    $noteId = $_POST['id'];

    // Delete the note from the database
    $sql = "DELETE FROM notes WHERE note_id=$noteId";
    $conn->query($sql);

    $conn->close();
?>
