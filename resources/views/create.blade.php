@extends('templates.template')

@section('content')
    <h1 class="text-center">
        @if(isset($user))
            Editar
        @else
            Cadastrar
        @endif 
    </h1> 
    <hr>

    <div class="col-8 m-auto">
        
        @foreach ($errors->all() as $error)
            <div class="text-center mt-4 mb-4 p-2 alert-danger">
                {{ $error }}<br/>
            </div>
        @endforeach
        @if(isset($user))
            <form class="FormEdit" name="formEdit" id="formCad" method="post" action="{{url("users/{$user->id}")}}">
            @method('PUT')
        @else
            <form class="FormCad" name="formCad" id="formCad" method="post" action="{{url('users')}}">
        @endif
        
            @csrf
            <input class="form-control" type="text" name="nome" id="nome" placeholder="Nome:" value="{{ $user->nome ?? '' }}" required>
            <input class="form-control cpf-mask" type="text" name="cpf" id="cpf" placeholder="CPF:" value="{{ $user->cpf ?? '' }}" required>
            <input class="form-control" type="date" name="data_nascimento" id="data_nascimento"placeholder="Ex.: dd/mm/aaaa" data-mask="00/00/0000" maxlength="10" autocomplete="off" value="{{ $user->data_nascimento ?? '' }}" required>
            <select class="form-control" name="sexo" id="sexo" placeholder="Sexo:" required>
                @if(isset($user))
                    <option value="{{$user->sexo}}">
                        @if($user->sexo == 'F')
                            Feminino
                        @else
                            Masculino
                        @endif 
                    </option>    
                @else
                    <option>
                        Sexo
                    </option>
                @endif
                    
                <option value="M">Masculino</option>
                <option value="F">Feminino</option>
            </select>
            <input class="form-control" type="text" name="altura" id="altura" placeholder="Altura" value="{{ $user->altura ?? '' }}" required>
            <input class="btn btn-primary" type="submit" value="@if(isset($user)) Editar @else Cadastrar @endif">
        </form>
    </div>
@endsection