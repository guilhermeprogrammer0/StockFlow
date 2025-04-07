<x-main-layout titulo="Página principal" color="fundo-padrao">
    <x-logo-component />
    <main class="w-full d-flex justify-between border-solid border-2 h-130">
        <x-menu-component />
        <x-area-component tipoAlinhamento=""> 
        @foreach($produtos as $produto)
            <div class="card" style="width: 18rem;">
                <div class="card-header relative">
                    <h2>{{$produto->nome}}</h2>
                    <i class="fa-solid fa-delete-left  absolute top-1 right-1 text-red-700 cursor-pointer"></i>
                </div>
                
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">{{$produto->descricao}}</li>
                    <li class="list-group-item">{{$produto->preco}}</li>
                    <li class="list-group-item">{{$produto->quantidade}}</li>
                    <li class="list-group-item text-center"><a href="#" class="btn btn-outline-primary btn-sm"> Mudar estoque </a> <a href="#" class="btn btn-outline-warning btn-sm"> Editar produto </a></li>
                 

                </ul>
            </div>

            @endforeach
        </x-area-component>
        <main>
</x-main-layout>