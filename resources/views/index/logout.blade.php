<!DOCTYPE html>
<html>
    <head>
<link href="css/sasorich.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{ secure_asset('css/style.css') }}">

        
        
    </head>
    <body>
      <div class='box'>
  <div class='wave -one'></div>
  <div class='wave -two'></div>
  <div class='wave -three'></div>
  <div class='title'>Sasorich
       <div class="column" style="text-align:center;">
        <ul class="list-inline">
            {!! link_to_route('signup.get', 'Signup', null, ['class' => 'btn btn-info']) !!}
            &nbsp;&nbsp;&nbsp;{!! link_to_route('login', 'Login', null, ['class' => 'btn btn-warning']) !!}
        </ul>
     </div>
  </div>
</div>
    
<footer>    


    </footer>
    </body>
</html>