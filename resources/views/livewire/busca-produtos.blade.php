<x-area-component>
    <div class="w-4/5 flex justify-center items-center flex-col p-2">
            <label for="busca" class="color-text text-2xl text-center"> Buscar </label>
            <input type="text" class="w-4/5 md:w-1/2 p-3 bg-white outline-none" wire:model.live="busca" placeholder="Código ou nome">
        <p class="text-center color text-base p-1 mt-2 text-white rounded-sm w-1/2">Total de produtos encontrados: <strong>{{$quantidadeProdutos}}</strong></p>
    </div>
    @if(count($produtos) === 0)
    <h2 class="text-white bg-red-900 p-1 text-center mt-2 text-3xl">Não foram encontrados produtos</h2>
    @else
    <div class="flex gap-1 w-full h-auto justify-evenly items-center flex-wrap">
        @foreach($produtos as $produto)
        <div class="card w-auto">
            <div class="card-header relative">
                <h4 class="text-2xl text-color p-2">{{ $produto->nome }}</h4>
                @can('admin')
                <a href="{{ route('excluir_produto', ['id' => Crypt::encrypt($produto->id)]) }}">
                    <i class="fa-solid fa-delete-left absolute top-1 right-1 text-red-700 cursor-pointer"></i>
                </a>
                @endcan
            </div>
            <ul class="list-group">
                <li class="list-group-item">Código: <strong>{{ $produto->codigo }}</strong></li>
                <li class="list-group-item">Preço: R${{ number_format($produto->preco, 2, ',', '.') }}</li>
                <li class="list-group-item">Quantidade: {{ $produto->quantidade ?? 0 }}</li>
                <li class="list-group-item text-center">
                    <a href="{{ route('mudar_estoque', ['id' => Crypt::encrypt($produto->id)]) }}" class="btn-produto btn-mudar-estoque">
                        Mudar estoque
                    </a>
                    @can('admin')
                    <a href="{{ route('editar_produto', ['id' => Crypt::encrypt($produto->id)]) }}" class="btn-produto btn-editar">
                        Editar produto
                    </a>
                    @endcan
                </li>
            </ul>
        </div>
        @endforeach
    </div>
    @endif
</x-area-component>