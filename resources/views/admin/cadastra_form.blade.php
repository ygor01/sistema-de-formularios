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
        
    </head>
    <body>
        <div class="container">
        <div class="title text-center m-b-md">
        Cadastro de Formulário:
        </div>
        <div class="col-sx-12 col-sm-12 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
        
        {{ Form::open(array('method' => 'POST', 'url' => 'insert_form'))}}
        {{ Form::text('title', null, array('class' => 'form-control form-input', 'placeholder' => 'Digite  nome do formulário')) }}
        {{ Form::text('author', null, array('class' => 'form-control form-input', 'placeholder' => 'Seu nome')) }}
        {{ Form::text('description', null, array('class' => 'form-control form-input', 'placeholder' => 'Digite a descrição')) }}
        {{ Form::submit('Criar Formulário', array('class' => 'btn-submit'))}}
        {{ Form::close() }}
        </div>
        </div>
    </body>
</html>




