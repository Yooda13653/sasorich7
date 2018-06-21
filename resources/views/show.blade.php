@extends('layouts.app')

@section('content')
<div class="col-xs-offset-2 col-xs-8">
    <div class="alert alert-info" role="alert" align="center"><h1>{{ $events->title }} の詳細ページ</h1></div>
        
         
           
            <div class="panel panel-info">
                
                <div class="panel-heading">
                    <h2 class="panel-title"><span class="glyphicon glyphicon-pencil">About Event</span></h2>
                </div>
                
                <div class="lead">
                    <br>
                    <ul style="list-style:none;">
                    
                    <li><span class="glyphicon glyphicon-user"></span>
                    &nbsp;&nbsp;Host&nbsp;:&nbsp;{{ $events->host }}&nbsp;&nbsp;
                    </li>
                    
                    <li>
                    <span class="glyphicon glyphicon-calendar"></span>
                    &nbsp;&nbsp;{{ $events->month }}{{ $events->day }}
                    </li>
                    
                    <li>
                    <span class="glyphicon glyphicon-time"></span>
                    &nbsp;&nbsp;{{ $events->timefrom }}～{{ $events->timeto }}
                    </li>
                    
                    <li>
                    <span class="glyphicon glyphicon-map-marker"></span>
                    &nbsp;&nbsp;{{ $events->place }}
                    </li>
                    
                    <li>
                    <span class="glyphicon glyphicon-bullhorn"></span>
                    &nbsp;&nbsp;Theme&nbsp;:&nbsp;{{ $events->theme }}
                    </li>
                    
                    <li>
                    <span class="glyphicon glyphicon-paperclip"></span>
                    &nbsp;&nbsp;Details&nbsp;:&nbsp;{{$events->details }}
                    </li>
                    
                    <li><span class="glyphicon glyphicon-user"></span>
                    &nbsp;&nbsp;Max&nbsp;:&nbsp;{{ $events->maxpeople }}&nbsp;&nbsp;people
                    </li>
                    
                    
                    <br>
                    参加するユーザー：
                    <?php 
                    $exist=0;
                    foreach($name as $name){
                        print $name . " ";
                        if($name==\Auth::user()->name){
                            $exist=1;
                        }
                    }
                    ?><br><?php
                    if($exist==0){
                        ?>
                        {!! Form::open(['route' => ['member.sanka', $events->id]]) !!}
                        {!! Form::submit('JOIN', ['class' => 'btn btn-success btn-xs']) !!}
                        {!! Form::close() !!}
                        <?php
                    }else{
                        ?>
                            {!! Form::open(['route' => ['member.sanka', $events->id]]) !!}
                            {!! Form::submit('UNJOIN', ['class' => 'btn btn-warning btn-xs']) !!}
                            {!! Form::close() !!}
                    <?php } ?>

                </div>
            </div>
           
            <div class="form-group">
                @if(Auth::user())
                    @if(Auth::user()->name==$events->host)
                    {!! Form::model($events, ['route' => ['events.destroy', $events->id], 'method' => 'delete']) !!}
                    <br>
                    {!! Form::submit('Delete Event', ['class' => 'btn btn-danger']) !!}
                    @endif
                @endif
            </div>
            
        </div>

@endsection