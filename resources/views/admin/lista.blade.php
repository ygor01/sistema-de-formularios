@extends('layouts.newmenu')
@section('content')

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
            
            
            
            <div class="container container_background">
                <div class="title text-center">Formulários preenchidos</div>
                <div class="row justify-content-between p-3">
                <div class="col-xs-4 col-md-3 btn-form-preencher-novo">
                     <a href="{{URL::asset('admin/form')}}">
                        <button class="btn btn-submit" type="button" title="Preencher Novas Respostas" >
                        
                        <span class="material-icons icon-add-question">
                            &#xE8AF;
                        </span>
                            Preencher Novo
                        </button>
                    </a>
                </div>
                    
                    
                 
                <div class="col-xs-4 col-md-3 btn-form-novo-formulario">
                    <a href="admin/newform">   
                    <button class="btn btn-submit" type="button" title="Criar um novo formulário" >
                        <span class="material-icons icon-add-question">
                            &#xE85D;
                        </span>
                            Novo Formulário
                    </button></a>
                </div>
                </div>
                
                
                <div class="col-md-12">
                <table class="table table-hover table-striped text-center">
                    <thead class="thead">
                    <tr class="thead-list">
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Entrevistado</th>
                        <th>CPF</th>
                        <th>Ações</th>
                        <th>Prazo</th>
                        <th>Status</th>
                        
                    </tr>
                    </thead>
                    <tbody>

                @if($form_count == '0')
                    <td colspan="7">                    
                        <div class="title-info-count text-center">Sem formulários no momento</div>     
                    </td>
                    </tbody>
                @else                                   
                @foreach ($form as $forms)
                    <tr>
                        <td>{{$forms->form_id}}</td>
                        <td>{{$forms->formulario}}</td>
                        <td>{{$forms->entrevistado}}</td>
                        <td>{{$forms->cpf}}</td>
                        <td>
                            <a href='answers?form_id={{$forms->form_id}}&user_id={{$forms->user_id}}'>Ver</a> | 
                            <a href='answers_pdf?form_id={{$forms->form_id}}&user_id={{$forms->user_id}}'>PDF</a>
                        </td>
                        @php
                        $data_now = new DateTime();
                        $data_end = new Datetime('19-04-2018 15:48:00');
                        // Resgata diferença entre as datas
                        $date = $data_now->diff($data_end);
                        @endphp

                        @if($data_now < $data_end)
                            @if($date->d < 1)
                                @if($date->h < 1)
                                    @if($date->i < 1)
                                    <td>Poucos segundos</td>
                                    @else
                                    <td>{{$date->i}} minutos</td>
                                    @endif
                                @elseif($date->h > 1)
                                    <td>{{$date->h}} horas</td>
                                @else
                                    <td>{{$date->h}} hora</td>
                                @endif
                            @elseif($date->d > 1)
                                <td>{{$date->d}} dias</td>  
                            @else   
                                <td>{{$date->d}} dia</td>                          
                            @endif     
                            
                            
                        @elseif($data_now > $data_end)
                        <td>Vencido</td>
                        @else
                        @endif
                        
                        @if($forms->status == '1')
                            <td>
                                <div class="div_list_status div_list_status_off">Desativar</div>
                            </td>
                       
                        @else
                            <td>
                                
                                <div class="div_list_status div_list_status_on">Ativar</div>
                            </td>
                        @endif
                    </tr>  
                @endforeach 
                @endif  
                    </tbody>
        
                    
                </table>
                
                
                <div class="col-md-12 info_box">
                        
                    <div class="col-xs-6 col-md-6">
                    <b>Formulários respondidos: </b>{{$form_count}}
                    </div>
                </div>
            </div>
@endsection
