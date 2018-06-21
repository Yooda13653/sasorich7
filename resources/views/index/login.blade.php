@extends('layouts.app')

@section('content')
    
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
         </div>
    
@endsection