<x-main-layout titulo="Página principal" color="fundo-padrao">
    <x-logo-component />
    <main class="main-container">
        <x-menu-component />
        <x-area-component tipoAlinhamento=""> 
            @if(count($produtos) === 0)
            <h2 class="text-white bg-red-900 rounded p-1">Não foram encontrados produtos</h2>
            @endif
        @foreach($produtos as $produto)
            <div class="card w-auto">
                <div class="card-header relative">
                    <h2>{{$produto->nome}}</h2>
                    @can('admin')
                    <i class="fa-solid fa-delete-left  absolute top-1 right-1 text-red-700 cursor-pointer"></i>
                    @endcan
                </div>
                
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Descrição: {{$produto->descricao}}</li>
                    <li class="list-group-item">Preço: R${{number_format($produto->preco, 2, ',', '.')}}</li>
                    <li class="list-group-item">Quantidade: {{$produto->quantidade}}</li>
                    <li class="list-group-item text-center"><a href="#" class="btn btn-outline-primary btn-sm"> Mudar estoque </a> @can('admin')<a href="#" class="btn btn-outline-warning btn-sm"> Editar produto @endcan </a></li>
                 

                </ul>
            </div>

            @endforeach
        </x-area-component>
        <main>
</x-main-layout>