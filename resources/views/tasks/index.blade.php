@extends('layouts.default')

@section('content')
    <div class="container">

        <section class="section-tasks">

            <h3>Check your tasks...</h3>

            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="#" data-type="all">All ({{ $tasks->count() }})</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-type="upcoming">Upcoming ({{ $tasks->where('finish_at', '>', Date('Y-m-d H:i:s'))->count() }})</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-type="past">Past ({{ $tasks->where('finish_at', '<', Date('Y-m-d H:i:s'))->count() }})</a>
                </li>
            </ul>

            @if($tasks->count())
            <ul class="tasks-list">
                @foreach($tasks as $task)
                    @include('partial.task')
                @endforeach
            </ul>
            @endif

            <div class="alert alert-warning{{ $tasks->count()? ' d-none' : '' }}">Sorry, you don't have any tasks yet...</div>

        </section>

    </div>
@endsection