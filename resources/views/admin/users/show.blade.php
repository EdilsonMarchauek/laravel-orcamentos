@extends('adminlte::page')

@section('title', 'Detalhes do Usuário { $user->name }')

@section('content_header')
    <span style="font-size: 20px;">
        Usuário: {{ $user->name }}
    </span>

    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('home') }}"> Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('users.index') }}"> Usuário</a></li>
        <li class="breadcrumb-item"><a href="{{ route('users.show', $user->id) }}"> Detalhes</a></li>
    </ol>  
@stop

@section('content')
    <div class="content row">
        <div class="box">
            <div class="box-body">
                <p><strong>ID: </strong>{{ $user->id }}</p>
                <p><strong>Título: </strong>{{ $user->name }}</p>
                <p><strong>URL: </strong>{{ $user->email }}</p>

                <hr>

                <form action="{{ route('users.destroy', $user->id)}}" class="form" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger">Deletar</button>
                </form>
                
            </div>
        </div>
    </div>
@stop

@section('css')
    <link href="/css/app.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/css/adminlte.min.css" rel="stylesheet">
@stop

@section('js')
    <script src="/js/app.js"></script>
@stop


 


