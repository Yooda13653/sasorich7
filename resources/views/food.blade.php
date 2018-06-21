@extends('layouts.app')

@section('content')

    <h1>Feed Page</h1>

    {!! Form::model($foods, ['route' => 'food.store']) !!}

        {!! Form::label('foodseaten', 'メッセージ:') !!}
        {!! Form::text('foodseaten') !!}

        {!! Form::submit('投稿') !!}

    {!! Form::close() !!}
    
    <?php
    foreach($foodeat as $foodeat){
        print $foodeat;
        ?><br><?php
    }
    ?>

@endsection