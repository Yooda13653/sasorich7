@extends('layouts.app')

@section('content')
    <h1>ID,Sports,Food,Music</h1>
            @foreach ($categories as $category)
                <li>ID:{{ $category->id }} Sports:{{ $category->sports }} Food:{{ $category->food }} Music:{{ $category->music }}
                {!! Form::model($category, ['route' => ['categories.destroy', $category->id], 'method' => 'delete']) !!}
                {!! Form::submit('削除') !!}
                {!! Form::close() !!}
                </li>
            @endforeach
            
            @foreach ($users as $user)
                {{$user->name}}
            @endforeach
        
        <?php
        var_dump ($a);
        $jibun=0;
        $aite=0;
        for($jibun=0;$jibun<=count($a)-1;$jibun++){
            for($aite;$aite<=count($a)-1;$aite++){
                if($jibun==$aite){
                    continue;
                }
                print $jibun . $aite . "  ";
                $sportsindex = $a[$jibun]["sports"]*$a[$aite]["sports"];
                $foodindex= $a[$jibun]["food"]*$a[$aite]["food"];
                $musicindex = $a[$jibun]["music"]*$a[$aite]["music"];
                $prodindex = $sportsindex * $foodindex * $musicindex;
                print "JibunID=" . $a[$jibun]["id"] . "aiteID=" . $a[$aite]["id"] . " スポーツの相性:" . $sportsindex . " Foodの相性:" . $foodindex .  " Musicの相性:" . $musicindex . "総合相性:" . $prodindex;
                //print "JibunID=" . $a[$jibun]["id"] . "aiteID=" . $a[$aite]["id"] . " スポーツの相性:" . $a[$jibun]["sports"]*$a[$aite]["sports"] . " Foodの相性:" . $a[$jibun][""]*$a[$aite]["sports"] . " スポーツの相性:" . $a[$jibun]["sports"]*$a[$aite]["sports"] ;
                ?><br><?php
                
            }
            $aite=$jibun+1;
        }
        //print $a[0]["id"];
        ?>
            
        {!! Form::model($category, ['route' => 'categories.store']) !!}

        {!! Form::label('sports', 'メッセージ:') !!}
        {!! Form::text('sports') !!}
                {!! Form::label('music', 'メッセージ:') !!}
        {!! Form::text('music') !!}
                {!! Form::label('food', 'メッセージ:') !!}
        {!! Form::text('food') !!}

        {!! Form::submit('投稿') !!}

    {!! Form::close() !!}
    
            {!! link_to_route('categories.create', '新規メッセージの投稿') !!}
@endsection
