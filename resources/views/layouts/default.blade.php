<!doctype html>
<html lang="{{ App::getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Tasks.app</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ url('css/bootstrap-datetimepicker.min.css') }}" />
        <link rel="stylesheet" href="{{ url('css/default.css') }}">
        <link rel="icon" href="{{ url('favicon.png') }}">
    </head>

    <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="{{ url('/') }}"><i class="fa fa-coffee"></i> Tasks.app</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav ml-auto">
                @if(Auth::user())
                    <li class="nav-item">
                    <span class="navbar-text">
                        <i class="fa fa-user-circle"></i> Welcome, {{ Auth::user()->name }}!
                    </span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('tasks/create') }}"><i class="fa fa-plus"></i> Add Task</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('logout') }}"><i class="fa fa-sign-out-alt"></i> Logout</a>
                </li>
                @else
                    <li class="nav-item">
                    <span class="navbar-text">
                        <i class="fa fa-user-circle"></i> Welcome, Guest!
                    </span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('login') }}"><i class="fa fa-sign-in-alt"></i> Login</a>
                </li>
                @endif
            </ul>
        </div>
    </nav>

        @yield('content')

        <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js" integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js"></script>
        <script type="text/javascript" src="{{ url('js/bootstrap-datetimepicker.min.js') }}"></script>
        <script src="{{ url('js/default.js') }}"></script>
        <script>var settings = {base_url: '{{ url('/') }}'};</script>
    </body>
</html>