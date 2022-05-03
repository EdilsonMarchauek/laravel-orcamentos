@extends('adminlte::page')

@section('title', 'Detalhes do produto { $product->name }')

@section('content_header')
    <span style="font-size: 20px;">
        Produto: {{ $product->name }}
    </span>

    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('home') }}"> Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('products.index') }}"> Produtos</a></li>
        <li class="breadcrumb-item"><a href="{{ route('products.show', $product->id) }}"> Detalhes</a></li>
    </ol>  
@stop

@section('content')

    <div align="left">
        @if ($product->photo)
        <img width="130" height="165" src="{{ URL("storage/{$product->photo}") }}" alt="{{ $product->name }}">
        @endif
    </div>
    
    <hr>

    <div class="content row">
        <div class="box">
            <div class="box-body">
                <p><strong>ID: </strong>{{ $product->id }}</p>
                <p><strong>Nome: </strong>{{ $product->name }}</p>
                <p><strong>Console: </strong>{{ $product->category->title }}</p>
                <p><strong>Descrição: </strong>{{ $product->description }}</p>

                <hr>

                <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        Deletar o Produto: {{ $product->name }}</button>               
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


 


