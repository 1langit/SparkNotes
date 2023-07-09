$(document).ready(function () {

    // Login-signup page
    stateHandler();

    // Signup
    $('#signupForm').on('submit', function (event) {
        event.preventDefault();
        var username = $('#sign-username').val();
        var email = $('#sign-email').val();
        var password = $('#sign-password').val();
        signup(username, email, password);
    });

    // Login
    $('#loginForm').on('submit', function (event) {
        event.preventDefault();
        var email = $('#log-email').val();
        var password = $('#log-password').val();
        login(email, password);
    });
});

function stateHandler() {
    const wrapper = $('.wrapper');
    const aLogin = $('.aLogin');
    const aSignup = $('.aSignup');

    window.location.href.includes('#signup') ? wrapper.addClass('active') : wrapper.removeClass('active');

    aSignup.on('click', function () {
        wrapper.addClass('active');
    });
    aLogin.on('click', function () {
        wrapper.removeClass('active');
    });
}

function signup(username, email, password) {
    $.ajax({
        url: '../php/account_signup.php',
        type: 'POST',
        data: {
            username: username,
            email: email,
            password: password
        },
        success: function (response) {
            if (response.includes('Signup successful')) {
                window.location.href = '../html/account.html#login';
                stateHandler();
                $('#message').html(response);
            }
            if (response.includes('Email already exists')) {
                $('#message').html(response);
            }
        }
    });
}

function login(email, password) {
    $.ajax({
        url: '../php/account_login.php',
        type: 'POST',
        data: {
            email: email,
            password: password
        },
        success: function (response) {
            if (response.includes('Invalid')) {
                $('#message').html(response);
            }
            else {
                window.location.href = '../html/home.html';
            }
        }
    });
}