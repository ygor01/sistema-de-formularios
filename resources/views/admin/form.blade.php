<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->        
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <style>
            
        </style>
    </head>
    <body>
        
            @if (Route::has('teste'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif
            <div class="content">
                <div class="col-md-12 col-xs-12 title m-b-md">
                    Escolha um formulário:
                </div>
                <div class="col-md-4 col-md-offset-4">
                
                
                    {{Form::open(array('method' => 'POST', 'url' => 'admin/questions'))}}
                    <select name="form_select" class="form-control"> 
                    
                    @foreach ($form as $forms)
                        <option value="{{$forms->id}}" title="{{$forms->description}}">{{$forms->title}}</option>
                        
                    @endforeach
                    </select>
                    <select name="form_select_user" class="form-control">   
                        <option value="0">Visualizar e editar Formulário</option>
                        @foreach ($user as $users)                         
                            <option value="{{$users->id}}" title="">Responder como {{$users->nome}}</option>
                        @endforeach
                    </select>
                    <div class="row div-btn-form">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <a href="{{URL::to('admin/newform')}}">
                            {{Form::button('Criar Formulário', ['class' => 'btn-form-criar'])}}
                        </a>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    {{Form::submit('Próximo', ['class' => 'btn-submit'])}}
                    </div>
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        
    </body>
</html>
