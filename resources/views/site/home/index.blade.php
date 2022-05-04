@extends('site.layouts.app')

@section('title', 'Listagem de Categorias')

@section('content')
<div class="content row">
    
    <h3><br>Listagem de Produtos</h3>  
    <hr> 
   
        <form action="{{ route('site.search')}}" method="POST" class="form form-inline">
            @csrf
            <div class="input-group" style="width:500px;">
                <select name="category" class="form-control">
                    <option value="">Categoria</option>
                    {{-- Para utilizar a variavel $categories precisa criar no AppServiceProvider.php passando pra cá--}}
                    @foreach ($categories as $id => $category)
                        <option value="{{ $id }}" @if (isset($filters['category']) && $filters['category'] == $id)
                            selected 
                            @endif >{{ $category }}</option>
                    @endforeach
                </select>
                <input type="text" name="name" placeholder="Nome:" value="{{ $filters['name'] ?? '' }}" class="form-control">
                <button type="submit" class="btn btn-success">Pesquisar</button>
            </div>
               
                @if (isset($filters))
                    <a href="{{ route('site.index') }}">(x) Limpar Resultados da Pesquisa</a>
                @endif 
            
        </form>

    @include('admin.includes.alerts')
       
        <table class="table table-striped" style="margin-top: 20px">
            <thead>
                <tr>
                    <th scope="col" width="100">Imagem</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Descrição</th>
                    <th width="150px" scope="col">Ações</th>
                </tr>                   
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td valign="center">
                        @if ($product->photo)
                                    <img width="130" height="165" src="{{ URL("storage/{$product->photo}") }}" alt="{{ $product->name }}">
                        @endif
                    </td>
                    <td scope="row">{{ $product->name }}</td>
                    <td>{{ $product->category->title??null }}</td>
                    <td>R$ {{ $product->description }}</td>
                    <td>
                        <a href="{{ route('site.show', $product->id)}}">
                            Detalhes
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>

            {{-- Verifica se existe a variável filters do método search passando pra cá appends($filters)--}}
            @if (isset($filters))
                {!! $products->appends($filters)->links("pagination::bootstrap-4") !!} 
            @else
               {!! $products->links("pagination::bootstrap-4") !!} 
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

