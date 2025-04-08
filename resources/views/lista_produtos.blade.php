<x-main-layout titulo="Página principal" color="fundo-padrao">
    <x-logo-component />
    <main class="d-flex flex-col lg:flex-row sm:h-180 lg:h-130">
        <x-menu-component />
        <x-area-component tipoAlinhamento=""> 
            @if(count($produtos) === 0)
            <h1>Não foram encontrados produtos</h1>
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
                    <li class="list-group-item">{{$produto->descricao}}</li>
                    <li class="list-group-item">{{$produto->preco}}</li>
                    <li class="list-group-item">{{$produto->quantidade}}</li>
                    <li class="list-group-item text-center"><a href="#" class="btn btn-outline-primary btn-sm"> Mudar estoque </a> @can('admin')<a href="#" class="btn btn-outline-warning btn-sm"> Editar produto @endcan </a></li>
                 

                </ul>
            </div>

            @endforeach
        </x-area-component>
        <main>
</x-main-layout>