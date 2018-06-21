@extends('layouts.app')

@section('content')
    <h1>Lunch</h1>
            
        {!! Form::model($events, ['route' => 'events.index']) !!}<br>

        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title') !!}
        <br>
        
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
        {!! Form::submit('CREATE INVITATION') !!}

    {!! Form::close() !!}
    
            {!! link_to_route('events.index', 'TOPへ戻る') !!}
@endsection
