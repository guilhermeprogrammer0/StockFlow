<x-main-layout titulo="Página principal" color="fundo-padrao">
    <x-logo-component />
    <main class="main-container">
        <x-menu-component />
        <x-area-component> 
            @if(count($produtos) === 0)
            <h2 class="text-white bg-red-900 rounded p-1">Não foram encontrados produtos</h2>
            @endif
        @foreach($produtos as $produto)
            <div class="card w-auto">
                <div class="card-header relative">
                    <h2>{{$produto->nome}}</h2>
                    @can('admin')
                    <a href="{{route('excluir_produto',['id'=>Crypt::encrypt($produto->id)])}}"><i class="fa-solid fa-delete-left  absolute top-1 right-1 text-red-700 cursor-pointer"></i></a>
                    @endcan
                </div>  
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Descrição: {{$produto->descricao}}</li>
                    <li class="list-group-item">Preço: R${{number_format($produto->preco, 2, ',', '.')}}</li>
                    <li @class(['list-group-item','text-red-500'=>$produto->quantidade ===0])>Quantidade: {{$produto->quantidade}}</li>
                    <li class="list-group-item text-center"><a href="{{route('mudar_estoque',['id'=>Crypt::encrypt($produto->id)])}}" class="btn btn-secondary "> Mudar estoque </a> @can('admin')<a href="{{route('editar_produto',['id'=>Crypt::encrypt($produto->id)])}}" class="btn btn-warning"> Editar produto @endcan </a></li>
                </ul>
            </div>
            @endforeach
        </x-area-component>
</main>
</x-main-layout>