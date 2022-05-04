@extends('adminlte::page')

@section('title', 'Cadastrar Novo Produto')

@section('content_header')

    <span style="font-size: 20px;">
        Cadastrar Novo Produto
    </span>
  
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('admin') }}"> Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('products.index') }}"> Produtos</a></li>
        <li class="breadcrumb-item"><a href="{{ route('products.create') }}"> Cadastrar</a></li>
        
    </ol>   
@stop

@section('content')
<div class="content row">

    <div class="card card-outline card-success" >
        <div class="box-body" style="padding: 10px">

            @include ('admin.includes.alerts')

            {{-- <form action="{{ route('products.store') }}" method="post" class="form">
               @include ('admin.products._partials.form')
            </form> --}}

            {{  Form::open(['route' => 'products.store', 'class' => 'form', 'enctype' => 'multipart/form-data'])   }}
                @include ('admin.products._partials.form')
            {{ Form::close() }}    
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


 


