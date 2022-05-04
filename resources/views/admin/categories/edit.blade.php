@extends('adminlte::page')

@section('title', 'Editar Categoria')

@section('content_header')
    <span style="font-size: 20px;">
        Editar Categoria: {{ $category->title }}
    </span>

    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('admin') }}"> Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('categories.index') }}"> Categorias</a></li>
        <li class="breadcrumb-item"><a href="{{ route('categories.edit', $category->id) }}"> Editar</a></li>
    </ol> 
@stop

@section('content')
    <div class="content row">
        <div class="box">
            <div class="box-body">

                    @include ('admin.includes.alerts')
            
                 <form action="{{ route('categories.update', $category->id) }}" class="form" method="POST">
                    <input type="hidden" name="_method" value="PUT">
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


 


