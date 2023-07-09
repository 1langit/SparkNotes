$(document).ready(function () {
    // Load notes on page load
    loadNotes();

    // Handle note form submit
    $('#note-form').on('submit', function (event) {
        event.preventDefault();
        var noteId = $('#note-id').val();
        var noteTitle = $('#note-title').val();
        var noteContent = $('#note-content').val();

        if (noteId === '') {
            createNote(noteTitle, noteContent);
        } else {
            deleteNote(noteId);
            createNote(noteTitle, noteContent);
        }

        // Clear form inputs
        $('#note-id').val('');
        $('#note-title').val('');
        $('#note-content').val('');
    });

    // Handle note edit button click
    $(document).on('click', '.edit-btn', function () {
        var noteCard = $(this).closest('.note-card');
        var noteId = noteCard.attr('data-note-id');
        var noteTitle = noteCard.find('.card-title').text();
        var noteContent = noteCard.find('.card-content').text();

        // Populate form inputs with selected note data
        $('#note-id').val(noteId);
        $('#note-title').val(noteTitle);
        $('#note-content').val(noteContent);
    });

    // Handle note delete button click
    $(document).on('click', '.delete-btn', function () {
        var noteCard = $(this).closest('.note-card');
        var noteId = noteCard.attr('data-note-id');

        if (confirm('Are you sure you want to delete this note?')) {
            deleteNote(noteId);
        }
    });
});

function loadNotes() {
    $.ajax({
        url: '../php/notes_get.php',
        type: 'GET',
        success: function (response) {
            $('#notes-list').html(response);
        }
    });
}

function createNote(title, content) {
    $.ajax({
        url: '../php/notes_create.php',
        type: 'POST',
        data: {
            title: title,
            content: content
        },
        success: function (response) {
            loadNotes();
        }
    });
}

function deleteNote(id) {
    $.ajax({
        url: '../php/notes_delete.php',
        type: 'POST',
        data: {
            id: id
        },
        success: function (response) {
            loadNotes();
        }
    });
}