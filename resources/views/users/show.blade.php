@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-xs-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $user->name }}</h3>
                </div>
            </div>
        </aside>
        <div class="col-xs-8">
            @if (Auth::user()->id == $user->id)
                  {!! Form::open(['route' => 'events.store']) !!}
                      <div class="form-group">
                          {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '2']) !!}
                          {!! Form::submit('Post', ['class' => 'btn btn-primary btn-block']) !!}
                      </div>
                  {!! Form::close() !!}
            @endif
            @if (count($events) > 0)
                @include('events.events', ['events' => $events])
            @endif
        </div>
    </div>
@endsection