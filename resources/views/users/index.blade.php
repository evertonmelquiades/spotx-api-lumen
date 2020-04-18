@extends('layout')

@section('header')

@endsection

@section('cabecalho')
    Gestão de Usuários    
@endsection
 
@section('conteudo')


@if(!empty($mensagem))
    <div class="alert alert-success">
        {{ $mensagem }}
    </div>
@endif

<a href="{{ route('criar_perfil') }}" class="btn btn-success mb-2">Adicionar</a>


<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Ações</th>        
      </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>                
                <td>
                    <form method="post" action="/users/{{ $user->id }}">
                    
                        <button class="btn btn-danger btn-sm" method="destroy" action="/users/{{ $user->id }}">
                            <i class="far fa-trash-alt"></i>
                        </button>
                    </form>
                    
                </td>
            </tr>    
        @endforeach
    </tbody>
  </table>
 
@endsection