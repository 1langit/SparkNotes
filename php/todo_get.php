<?php
    // Connect to the database
    include 'connect.php';

    session_start();
    $user_id = $_SESSION['user_id'];

    $sql = "SELECT * FROM todo WHERE user_id='$user_id' ORDER BY display_order";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $todo_id = $row['todo_id'];
            $todo_content = $row['content'];
            $todo_order = $row['display_order'];
            $todo_checked = $row['status'] == 0 ? '' : 'checked';
            $todo_crossed = $row['status'] == 0 ? '' : 'text-decoration-line-through text-black-50';

            echo '<li class="bg-warning rounded d-flex my-1 ps-2" data-todo-id="' . $todo_id . '" data-order="' . $todo_order . '">';
            echo '<input type="checkbox" class="form-check-input rounded-circle my-2 me-2" ' . $todo_checked  . '>';
            echo '<div class="todo-item flex-grow-1 p-1 ps-2 ' . $todo_crossed . '">' . $todo_content . '</div>';
            echo '<button class="delete-todo btn btn-danger float-end rounded-0 rounded-end ms-2 py-0 px-2"><ion-icon name="trash"></ion-icon></button>';
            echo '</li>';
        }
    }

    $conn->close();
?>