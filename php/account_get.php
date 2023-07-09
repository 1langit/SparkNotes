<?php
    include 'connect.php';
    session_start();
    $user_id = $_SESSION['user_id'];

    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {

        $sql = ($conn->query("SELECT * FROM user WHERE user_id='$user_id'"))->fetch_assoc();
        $userData = array(
            'id' => $user_id,
            'username' => $_SESSION['username'],
            'email' => $sql['email'],
            'password' => $sql['password']
        );
        echo json_encode($userData);

    } else {
        header("Location: ../html/account.php");
    }
?>