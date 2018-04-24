
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
                @foreach($form as $forms)
                <div class="m-b-md title text-center">{{$forms->title}}</div>
                @endforeach
                
                               
                @if (isset($_GET['info_status']))
                
                    @php $info_status = $_GET['info_status']; @endphp                
                
                        @if ($info_status == "true")
                            <div class="alert alert-success">Respostas cadastradas com sucesso.</div> 
                        @elseif($info_status == "false")
                            <div class="alert alert-danger">Ocorreu um erro no cadastro, tente novamente.</div>  
                        @else

                        @endif
                
                @else
                @endif
                
                
                <div class="row">
                
                </div>
                <div class="box_questions">
                {{Form::open(array('method' => 'POST', 'url' => 'insert_answers', 'id' => 'form_answers'))}}
                @foreach($form as $forms)
                @foreach($forms->questions as $questions)                
                
                @if ($questions->type == 'Text')
                <!--<a class="link-question" href="">-->
                <div class="div_padding_questions">
                    
                <div class="input-group">
                    <b>{{$questions->order}} - {{$questions->title}}:</b><br>
                    <input class="input-question" type="text" placeholder="Responda aqui" name="answer[{{$questions->order-1}}]" required>
                    <input type="hidden" name="question_id[]" value="{{$questions->id}}">
                </div>
                    
                </div>
                <!--</a>-->
                @elseif ($questions->type == 'Mult')
                <input type="hidden" name="question_id[]" value="{{$questions->id}}" required>
                <div class="div_padding_questions">
                <b>{{$questions->order}} - {{$questions->title}}</b><br>
                <div class="row">
                <div class="col-xs-8 col-md-9 form-check div_option">
                
                

                @foreach (range('a', 'z') as $letra)
                <?php 
                $letras[] = $letra
                ?>
                @endforeach
                
                @foreach ($questions->options as $key => $options)
                



                <b>{{$letras[$key]}})</b>
                
                
                <input class="form-check-input" type="radio" value="{{$options->title}}" name="answer[{{$questions->order-1}}]" required>
                <label class="form-check-label">{{$options->title}}</label><br>
                
                
               
                
                
                
                
                
                
                @endforeach
                
                
                </div>
                
                
                </div>
                
                
                
                
                </div>
                
                @elseif ($questions->type == 'Check')
                <input type="hidden" name="question_id[]" value="{{$questions->id}}">
                
                <div class="div_padding_questions">
                <b>{{$questions->order}} - {{$questions->title}}</b><br>
                <div class="row">
                <div class="col-xs-8 col-md-9 form-check div_option">
                @foreach ($questions->options as $options)
                
                <input class="form-check-input" type="checkbox" value="{{$options->title}}" name="answer[{{$questions->order-1}}]">
                <label class="form-check-label">{{$options->title}}</label><br>
                
                
                
                
                
                
                
                
                
                @endforeach
                
                
                
                </div>
                    
                
                
                </div>
                
                
                
                
                </div>
                
                
                @endif
                
                <hr>
                @endforeach
                @endforeach
                
            </div>
                @if($question_count == '0')
                    <div class="row col-md-12">
                        <div class="title-info-count text-center">Esse formulário não possui questões no momento</div>        
                    </div>
                
                    <div class="col-md-12">
                        <a href="form">
                            <button class="btn-submit" type="button">
                                <span class="material-icons icon-add-question">&#xE314;</span>
                                  Voltar à pagina anterior
                            </button>
                        </a>                        
                    </div>
                @else
                    <div class="col-md-6">
                        <a href="form">
                            <button class="btn-submit" type="button">
                                <span class="material-icons icon-add-question">&#xE314;</span>
                                    Voltar para página anterior
                                </button>
                            </a>                        
                    </div>
                
                <div class="col-md-6">
                    <input type="hidden" name="form_id" value="{{$form_id}}">
                    <input type="hidden" name="user_id" value="{{$user_id}}">
                        <button class="btn-submit-answers" type="submit">
                            <span class="material-icons icon-add-question">forward</span>
                                Salvar respostas
                        </button>
                        
                    {{Form::close()}}
                        
                </div>
                @if(isset($info_status))
                @if($info_status == 'true')
                    <div class="col-md-6">
                        <a href="answers?form_id={{$form_id}}&question_id={{$questions->id}}&user_id={{$user_id}}">
                            <button class="btn-submit-pdf" type="button">
                                <span class="material-icons icon-add-pdf">&#xE415;</span>
                                    Gerar arquivo PDF
                            </button>
                        </a>                        
                    </div>
                
                    
                @else
                @endif
                @else
                @endif
                    <div class="row col-md-12 info_box">
                        
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
                @endif
                
        </div>
    </body>
</html>
