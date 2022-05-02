@extends('adminlte::page')

@section('title', 'Cadastrar Nova Categoria')

@section('content_header')
    <span style="font-size: 20px;">
        Cadastrar Nova Categoria
    </span>

    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('home') }}"> Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('categories.index') }}"> Categorias</a></li>
        <li class="breadcrumb-item"><a href="{{ route('categories.create') }}"> Cadastrar</a></li>
    </ol> 
@stop


@section('content')
    <div class="content row">
        <div class="box">
            <div class="box-body">

                    @include ('admin.includes.alerts')
            
                 <form action="{{ route('categories.store') }}" class="form" method="POST">
                    @include ('admin.categories._partials.form')
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


 


