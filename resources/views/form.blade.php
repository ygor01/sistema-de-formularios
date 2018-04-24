@extends('layouts.app')

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
            <div class="content">
                <div class="col-md-12 col-xs-12 title m-b-md">
                    Escolha um formulário:
                </div>
                <div class="col-md-4 col-md-offset-4">
                
                
                    {{Form::open(array('method' => 'POST', 'url' => 'questions'))}}
                    <select name="form_select" class="form-control"> 
                    
                    @foreach ($form as $forms)
                        <option value="{{$forms->id}}" title="{{$forms->description}}">{{$forms->title}}</option>
                        
                    @endforeach
                    </select>
                    <div class="row div-btn-form">
                    
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    {{Form::submit('Próximo', ['class' => 'btn-submit'])}}
                    </div>
                    </div>
                    {{Form::close()}}
                </div>
            </div>
@endsection
