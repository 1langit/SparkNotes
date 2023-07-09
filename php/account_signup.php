<?php
include 'connect.php';

// Retrieve form data
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$emailCheckResult = $conn->query("SELECT * FROM user WHERE email='$email'");

if ($emailCheckResult->num_rows > 0) {
    echo '
        <div class="container-fluid position-absolute alert alert-danger text-center" role="alert">
            <ion-icon name="warning"></ion-icon> Email already exists. Please use a different email.
        </div>
    ';
} else {

    // Insert user data into the database
    $sql = "INSERT INTO user (username, password, email) VALUES ('$username', '$password', '$email')";

    if ($conn->query($sql) === TRUE) {
        $user_id = $conn->insert_id;
        echo '
            <div class="container-fluid position-absolute alert alert-success text-center" role="alert">
                <ion-icon name="checkmark-circle"></ion-icon> Signup successful! Please login with your credentials.
            </div>
        ';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>