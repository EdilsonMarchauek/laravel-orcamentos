@extends('adminlte::page')

@section('title', 'Listagem dos Usuários')

@section('content_header')

    <span style="font-size: 20px;"><a href="{{ route('users.create') }}" class="btn btn-success">Add</a> 
        Usuários
    </span>
  
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('home') }}"> Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('users.index') }}"> Usuários</a></li>        
    </ol>   
@stop

@section('content')
    <div class="content row">

        <div class="card card-outline card-success" >
            <div class="box-body" style="padding: 10px">
                <form action="{{ route('users.search') }}" class="form form-inline" method="POST">
                    @csrf
                    <input type="text" name="filter" placeholder="Filtrar?" class="form-control" value="{{ $data['filter'] ?? '' }}">
                    <button type="submit" class="btn btn-success">Pesquisar</button>
                </form>

                @if (isset($data))
                    <a href="{{ route('users.index') }}">(x) Limpar Resultados da Pesquisa</a>
                @endif 
            </div>
        </div>

        <div class="card card-outline card-success">
            <div class="box-body">

                

                @include('admin.includes.alerts')
                
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">E-mail</th>
                            <th width="150px" scope="col">Ações</th>
                        </tr>                   
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{ $user->name }}</th>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a href="{{ route('users.edit', $user->id) }}" class="badge bg-yellow">
                                    Editar
                                </a>
                                <a href="{{ route('users.show', $user->id) }}" class="badge bg-primary">
                                    Detalhes
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                      
                  @if (isset($data))
                        {{ $users->appends($data)->links("pagination::bootstrap-4") }}
                  @else
                        {{ $users->links("pagination::bootstrap-4") }}
                  @endif     
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


 


