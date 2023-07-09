<?php
    include 'connect.php';

    // Retrieve form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Retrieve user data from the database
    $result = $conn->query("SELECT * FROM user WHERE email='$email' AND password='$password'");

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        session_start();
        $_SESSION['logged_in'] = true;
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['username'] = $user['username'];
    } else {
        echo '
            <div class="container-fluid position-absolute alert alert-danger text-center" role="alert">
                <ion-icon name="warning"></ion-icon> Invalid username or password.
            </div>
        ';
    }

    $conn->close();
?>
