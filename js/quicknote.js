$(document).ready(function() {
    loadNote();

    $('#quicknote-form').on('submit', function (event) {
        event.preventDefault();
        var content = $('#note-content').val();
        saveNote(content);
        console.log(content);
    });
});

function loadNote() {
    $.ajax({
        url: '../php/quicknote_get.php',
        type: 'GET',
        success: function(response) {
            $('#note-content').val(response);
        }
    })
}

function saveNote(content) {
    $.ajax({
        url: '../php/quicknote_update.php',
        type: 'POST',
        data: {
            content: content
        }
    });
}