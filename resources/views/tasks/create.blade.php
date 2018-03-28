@extends('layouts.default')

@section('content')
    <div class="container">

        <section class="section-create-task">

            <h3>Create a new task</h3>

            @if($errors->count())
            <div class="alert alert-warning">{{ $errors->first() }}</div>
            @endif

            <form method="post" action="{{ url('tasks') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="content">Your task</label>
                    <textarea class="form-control" id="content" name="content" aria-describedby="content" placeholder="Describe your task here"></textarea>
                </div>
                <div class="form-group">
                    <label for="finish">Task finish date</label>
                    <input type="text" class="form-control datetimepicker" name="finish" id="finish">
                </div>
                <button type="submit" class="btn btn-primary">Add Task</button>
            </form>

        </section>

    </div>
@endsection