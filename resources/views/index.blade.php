@extends('templates.template')

@section('content')
    <h1 class="text-center">CRUD </h1> <hr>

    <div class="text-center mt-3 mb-4">
        <a href="{{url("users/create")}}">
            <button class="btn btn-success">Cadastrar</button>
        </a>
    </div>
    <div class="col-10 m-auto">
        @csrf
        <table class="table text-center">
        <thead class="thead-light">
            <tr>
            <th scope="col">Id</th>
            <th scope="col">Nome</th>
            <th scope="col">CPF</th>
            <th scope="col">Data Nascimento</th>
            <th scope="col">Sexo</th>
            <th scope="col">Altura</th>
            <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->nome}}</td>
                <td>{{$user->cpf}}</td>
                <td>{{$user->data_nascimento}}</td>
                <td>{{$user->sexo}}</td>
                <td>{{$user->altura}}</td>
                <td>
                    <a href="{{url("users/$user->id")}}">
                        <button class="btn btn-dark">Visualizar</button>
                    </a>
                    <a href="{{url("users/$user->id/edit")}}">
                        <button class="btn btn-primary">Editar</button>
                    </a>
                    <a href="{{url("users/$user->id")}}" class="js-del">
                        <button class="btn btn-danger">Excluir</button>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
        {{ $users->links() }}
    </div>
@endsection