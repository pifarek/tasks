(function($){
    // Mark task as completed
    $('[data-action="task-mark-as-completed"]').click(function() {
        var id = $(this).closest('li.task').data('id');

        $.getJSON(settings.base_url + '/tasks/status/' + id + '/completed', function(response) {
            if(response.status === 'ok') {
                $('li[data-id="' + id + '"]').addClass('task-completed');
            }
        });

        $('[data-toggle="tooltip"]').tooltip('hide');

        return false;
    });

    // Mark task as pending
    $('[data-action="task-mark-as-pending"]').click(function() {
        var id = $(this).closest('li.task').data('id');

        $.getJSON(settings.base_url + '/tasks/status/' + id + '/pending', function(response) {
            if(response.status === 'ok') {
                $('li[data-id="' + id + '"]').removeClass('task-completed');
            }
        });

        $('[data-toggle="tooltip"]').tooltip('hide');

        return false;
    });

    // Delete Task
    $('[data-action="task-delete"]').click(function() {
        var id = $(this).closest('li.task').data('id');

        $.getJSON(settings.base_url + '/tasks/delete/' + id, function(response) {
            if(response.status === 'ok') {
                $('li[data-id="' + id + '"]').fadeOut(200, function() {
                    $(this).remove();
                    if(!$('li.task:visible').length) {
                        $('.alert-warning').removeClass('d-none');
                    }
                });
            }
        });

        $('[data-toggle="tooltip"]').tooltip('hide');

        return false;
    });

    // Handling the tabs
    $('.section-tasks .nav-tabs a').click(function(){
        $('.section-tasks .nav-tabs a.active').removeClass('active');
        $(this).addClass('active');
        var type = $(this).data('type');
        var now = Date.now() / 1000; // We need seconds

        $('ul.tasks-list li.task:hidden').fadeIn(300);

        if(type === 'upcoming') {
            // Show only upcoming tasks
            $('ul.tasks-list li.task').each(function() {
                var task_time = $(this).attr('class').split(' ')[1].split('time-')[1];
                if(task_time < now) {
                    $(this).hide();
                }
            });
        } else if(type === 'past') {
            // Show only past tasks
            $('ul.tasks-list li.task').each(function() {
                var task_time = $(this).attr('class').split(' ')[1].split('time-')[1];
                if(task_time >= now) {
                    $(this).hide();
                }
            });
        }

        if(!$('li.task:visible').length) {
            $('.alert-warning').removeClass('d-none');
        } else {
            $('.alert-warning').addClass('d-none');
        }

        return false;
    });

    // Enable Bootstrap tooltips
    $('[data-toggle="tooltip"]').tooltip();

    // Datetime picker
    $('.datetimepicker').datetimepicker({
        format: 'MM/DD/YYYY HH:MM'
    });
})(jQuery);