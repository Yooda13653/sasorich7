<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SASORICH</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        <link rel="stylesheet" href="{{ secure_asset('css/style.css') }}">
        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        
    </head>
    <body>
        @if (Auth::check())
            <div class="col-xs-offset-3 col-xs-6">
                <h1  align="center">   Upcoming Lunch List</h1>
                @foreach ($events as $event)
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h2 class="panel-title"><span class="glyphicon glyphicon-pencil">  About Event</span></h2>
                        </div>
                        <div class="panel-body">
                            <div class = "lead">
                            <span class="glyphicon glyphicon-search"> </span>
                            {!! link_to_route('events.show', $event->title, ['title' => $event->id]) !!}
                            </div>
                            <br>
                            ▼ Date: {{ $event->day }} {{ $event->timefrom }}-{{ $event->timeto }}
                            <br>
                            ▼ Theme: {{ $event->theme }}
                            <br>
                            ▼ Host: {{ $event->host }}
                        </div>
                    </div>
                    <br>
                @endforeach
         
                <br>
                <br>
                
                @include('commons.footer')
            
         </div>
 
         @else
         <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Welcome to SASORICH
                </div>
                @include('commons.footer')
            </div>
        </div>
        @endif
    </body>
</html>