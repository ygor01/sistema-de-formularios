
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
        <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">

        
    </head>
    <body>
        <div class="container container_background">
            <div class="col-md-12">
                <a href="form">
                << Voltar para menu principal
                </a>
                @foreach($form as $forms)
                <div class="m-b-md title text-center">{{$forms->title}}</div>
                @endforeach
                
                
                
                
                
                <div class="box_questions">
                {{Form::open(array('method' => 'POST', 'url' => 'insert_answers', 'id' => 'form_answers'))}}
                
                
                @foreach($question as $questions)
                    <div class="div_padding_questions">
                        <div class="input-group">
                            <b>{{$questions->order}} - {{$questions->title}}:</b>

                        </div>  

                @foreach($questions->answers as $answers)   
                <!--<a class="link-question" href="">-->
                
                    <div class="row">
                    <div class="col-xs-8 col-md-9 form-check div_option">
                
                        {{$answers->answer}}
                
                
                    </div>
                    </div>
                
                
                
                @endforeach
                </div><hr>
                @endforeach
            </div>
                
                
                    <div class="col-md-12 info_box">
                        
                    <div class="col-xs-6 col-md-6">
                        
                        
                        
                    N° de questões: <b>{{$question_count}}</b> 
                    </div>
                    @foreach($form as $forms)
                    @php $data = date('d/m/Y', strtotime($forms->initial_date))  @endphp
                    <div class="col-xs-6 col-md-6 text-right float-right">
                    Formulário criado em: <b>{{$data}}</b><br>
                    </div>
                    @endforeach
                    </div>
                
        </div>
    </body>
</html>
