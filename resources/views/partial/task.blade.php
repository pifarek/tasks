<li class="task time-{{ strtotime($task->finish_at) }}{{ $task->status === 'completed'? ' task-completed' : '' }}" data-id="{{ $task->id }}">
    <div class="row">

        <div class="col-auto task-icon">
            <a href="#" class="status-completed" {!! Auth::user() && Auth::user()->can('update', $task)? ' data-action="task-mark-as-pending" data-toggle="tooltip" data-placement="right" title="Mark this task as Pending"' : ' disabled="disabled"' !!}><i class="far fa-check-circle"></i></a>
            <a href="#" class="status-pending" {!! Auth::user() && Auth::user()->can('update', $task)? '  data-action="task-mark-as-completed" data-toggle="tooltip" data-placement="right" title="Mark this task as Completed"' : ' disabled="disabled"' !!}><i class="far fa-circle"></i></a>
        </div>

        <div class="mr-auto">
            <p>{{ $task->content }}</p>
            <ol class="task-details">
                <li><i class="fa fa-hashtag"></i> {{ $task->hash }}</li>
                <li><i class="far fa-user"></i> {{ $task->user->name }}</li>
                <li><i class="far fa-calendar"></i> {{ $task->finish_at->diffForHumans() }}</li>
                @can('delete', $task)
                    <li><a href="#" data-action="task-delete" class="badge badge-danger"><i class="fa fa-trash"></i> Delete</a></li>
                @endcan
            </ol>
        </div>
    </div>
</li>