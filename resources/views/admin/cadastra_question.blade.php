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
        @foreach($form as $forms)
        {{$forms->title}}
        @endforeach        
        </div>
        <div class="col-md-12 text-center">
            (Nova Questão)
        </div>
        <div class="col-md-4 col-md-offset-4">
        
        {{ Form::open(array('method' => 'POST', 'url' => 'admin/insert_question'))}}
           <input type="hidden" name="form_id" value="{{$form_id}}">  
           <input type="hidden" name="question_id" value="{{$question_id+1}}">
           <input type="hidden" name="order" value="{{$order}}">     
           <select name="select_type" class="form-control form-input">
                <option selected disabled>Escolha o tipo da questão</option>
                <option value="Text">Texto</option>
                <option value="Mult">Multipla escolha</option> 
                <option value="Check">CheckBox</option>
           </select>
        {{ Form::text('title', null, array('class' => 'form-control form-input', 'placeholder' => 'Digite a questão')) }}
        {{ Form::submit('Adicionar Questão', array('class' => 'btn-submit'))}}
        {{ Form::close() }}
        </div>
        </div>
    </body>
</html>




