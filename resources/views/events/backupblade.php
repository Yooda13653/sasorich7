@extends('layouts.app')

@section('content')
    <h1>Create Event</h1>
            @foreach ($events as $event)
                
                
                <li>Day:{{ $event->day }}</li>
                <li>Time From:{{ $event->timefrom }}</li>
                <li>Time To:{{ $event->timeto }}</li>
                <li>Place:{{ $event->place }}</li>
                <li>Theme:{{ $event->theme }}</li>
                <li>Max People:{{ $event->maxpeople }}</li>
                
            @endforeach
            
        {!! Form::model($events, ['route' => 'events.store']) !!}<br>

       
        <br>
        {!! Form::label('day', 'Day:') !!}
        {!! Form::text('day') !!}
        <br>
        {!! Form::label('timefrom', 'From:') !!}
        {!! Form::text('timefrom') !!}
        <br>
        {!! Form::label('timeto', 'To:') !!}
        {!! Form::text('timeto') !!}
        <br>
        {!! Form::label('place', 'Place:') !!}
        {!! Form::text('place') !!}
        <br>
        {!! Form::label('theme', 'Theme:') !!}
        {!! Form::text('theme') !!}
        <br>
        {!! Form::label('details', 'Details:') !!}
        {!! Form::text('details') !!}
        <br>
        {!! Form::label('maxpeople', 'Max People:') !!}
        {!! Form::text('maxpeople') !!}
        {!! Form::submit('投稿') !!}

    {!! Form::close() !!}
    
            {!! link_to_route('categories.create', '新規メッセージの投稿') !!}
@endsection
