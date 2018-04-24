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
        <style>
            html, body {
                
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 50px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
                margin-top: 5%;
            }
            
            .btn-submit, .btn-form-criar{
                margin-top: 20px;
                color: black;
                padding: 8px;
                border-radius: 4px;
                border: none;
                width: 100%;
                transition: 0.3s;
            }
            .btn-submit{
                background: #98c798;
            }
            
            .btn-form-criar:hover{
                background: #989898;
                color: white;
            }
            .btn-submit:hover{
                background: #69a969;
                color: white;
            }
            .form-input{
                margin: 10px 0px 0px 0px;
            }
        </style>
    </head>
    <body>
        <div class="container">
        <div class="title text-center m-b-md">
        @foreach($form as $forms)
        {{$forms->question_title}}
        @endforeach        
        </div>
        <div class="col-md-12 text-center">
            (Nova CheckBox)
        </div>
        <div class="col-md-4 col-md-offset-4">
        
        {{ Form::open(array('method' => 'POST', 'url' => 'admin/insert_option'))}}
           <input type="hidden" name="form_id" value="{{$form_id}}">
           <input type="hidden" name="question_id" value="{{$question_id}}">   
           
        {{ Form::text('title', null, array('class' => 'form-control form-input', 'placeholder' => 'Digite a opção')) }}
        {{ Form::submit('Adicionar Opção', array('class' => 'btn-submit'))}}
        {{ Form::close() }}
        </div>
        </div>
    </body>
</html>




