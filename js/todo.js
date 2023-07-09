$(document).ready(function () {
    // Load todo on page load
    loadTodo();

    // Sortable
    $('#todo-list').sortable({
        axis: 'y', // comment this on showcase and delete this comment after it
        update: function(event, ui) {
            var newOrder = [];
            $('#todo-list li').each(function() {
                newOrder.push($(this).data('todo-id'));
            });
            orderTodo(newOrder);
        }
    });

    // Checklist
    $(document).on('change', '.form-check-input' , function() {
        var listItem = $(this).closest('li');
        var todoItem = listItem.find('.todo-item');
        var todoId = listItem.attr('data-todo-id');
        if ($(this).is(':checked')) {
            todoItem.addClass('text-decoration-line-through text-black-50');
            checkTodo(todoId, 1);
        } else {
            todoItem.removeClass('text-decoration-line-through text-black-50');
            checkTodo(todoId, 0);
        }
    });

    // Handle todo form submit
    $('#todo-form').on('submit', function (event) {
        event.preventDefault();
        var todoContent = $('#todo-content').val();
        if (todoContent !== '') {
            createTodo(todoContent);
            $('#todo-content').val('');
        }
    });

    // Handle todo delete button click
    $(document).on('click', '.delete-todo', function() {
        var todoId = $(this).closest('li').attr('data-todo-id');
        deleteTodo(todoId);
    });
});

function loadTodo() {
    $.ajax({
        url: '../php/todo_get.php',
        type: 'GET',
        success: function(response) {
            $('#todo-list').html(response);
        }
    });
}

function createTodo(content) {
    $.ajax({
        url: '../php/todo_create.php',
        type: 'POST',
        data: {
            content: content
        },
        success: function(response) {
            loadTodo();
        }
    });
}

function deleteTodo(id) {
    $.ajax({
        url: '../php/todo_delete.php',
        type: 'POST',
        data: {
            id: id
        },
        success: function(response) {
            loadTodo();
        }
    });
}

function orderTodo(order) {
    $.ajax({
        url: '../php/todo_order.php',
        type: 'POST',
        data: {
            order: order
            // order: JSON.stringify(order) // bisa tapi tdk perlu
        }
    });
}

function checkTodo(id, status) {
    $.ajax({
        url: '../php/todo_check.php',
        type: 'POST',
        data: {
            id: id,
            status: status
        }
    });
}