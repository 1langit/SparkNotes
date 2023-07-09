$(document).ready(function () {
    getUsername();
});

function getUsername() {
    $.ajax({
        url: '../php/account_get.php',
        type: 'GET',
        success: function (response) {
            var userData = JSON.parse(response);
            $('.user-id').html(userData['id']);
            $('.username').html(userData['username']);
            $('.email').html(userData['email']);
            $('.password').html(userData['password']);
        }
    });
}