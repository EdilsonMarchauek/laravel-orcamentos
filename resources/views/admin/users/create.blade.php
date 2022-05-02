@extends('adminlte::page')

@section('title', 'Cadastrar Novo Usuário')

@section('content_header')
    <span style="font-size: 20px;">
        Cadastrar Novo Usuário
    </span>

    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('home') }}"> Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('users.index') }}"> Usuários</a></li>
        <li class="breadcrumb-item"><a href="{{ route('users.create') }}"> Cadastrar</a></li>
    </ol> 
@stop


@section('content')
    <div class="content row">
        <div class="box">
            <div class="box-body">

                    @include ('admin.includes.alerts')
            
                 <form action="{{ route('users.store') }}" class="form" method="POST">
                    @include ('admin.users._partials.form')
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


 


