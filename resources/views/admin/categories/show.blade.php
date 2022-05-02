@extends('adminlte::page')

@section('title', 'Detalhes da Categoria { $category->title }')

@section('content_header')
    <span style="font-size: 20px;">
        Categoria: {{ $category->title }}
    </span>

    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('home') }}"> Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('categories.index') }}"> Categorias</a></li>
        <li class="breadcrumb-item"><a href="{{ route('categories.show', $category->id) }}"> Detalhes</a></li>
    </ol>  
@stop

@section('content')
    <div class="content row">
        <div class="box">
            <div class="box-body">
                <p><strong>ID: </strong>{{ $category->id }}</p>
                <p><strong>Título: </strong>{{ $category->title }}</p>
                <p><strong>URL: </strong>{{ $category->url }}</p>
                <p><strong>Descrição: </strong>{{ $category->description }}</p>

                <hr>

                <form action="{{ route('categories.destroy', $category->id)}}" class="form" method="POST">
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


 


