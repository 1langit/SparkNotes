<?php
    // Connect to the database
    include 'connect.php';

    session_start();
    $user_id = $_SESSION['user_id'];

    // Fetch all notes from the database
    $sql = "SELECT * FROM notes WHERE user_id='$user_id' ORDER BY note_id DESC"; 
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $noteId = $row['note_id'];
            $noteTitle = $row['title'];
            $noteContent = $row['content'];

            echo '<div class="card note-card p-1 m-3" data-note-id="' . $noteId . '">';
            echo '<div class="card-body">';
            echo '<h4 class="card-title">' . $noteTitle . '</h4>';
            echo '<p class="card-content note-clamp">' . $noteContent . '</p>';
            echo '<button class="btn btn-sm btn-primary edit-btn"><ion-icon name="create"></ion-icon> Edit</button>';
            echo '<button class="btn btn-sm btn-danger delete-btn mx-1"><ion-icon name="trash"></ion-icon> Delete</button>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo '<p class="ps-3">No notes found.</p>';
    }

    $conn->close();
?>