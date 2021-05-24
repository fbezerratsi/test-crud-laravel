@extends('templates.template')

@section('content')
    <h1 class="text-center">Visualizar</h1> <hr>

    
    <div class="col-10 m-auto">
        Nome: {{ $user->nome }} <br>
        CPF: {{ $user->cpf }} <br>
        Data de Nacimento: {{ $user->data_nascimento }} <br>
        Sexo: {{ $user->sexo }} <br>
        Altura: {{ $user->altura }} <br>
        <a href="{{url('users')}}">
            <button class="btn btn-primary">Voltar</button>
        </a>
    </div>
    
@endsection