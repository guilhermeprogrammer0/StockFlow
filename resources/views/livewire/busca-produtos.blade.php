<x-area-component>
    <div class="w-4/5 flex justify-center items-center flex-col p-2">
        <label for="busca" class="text-2xl text-center"> Buscar </label>
        <input type="text" class="w-4/5 md:w-1/2 p-3 bg-white outline-none" wire:model.live="busca" placeholder="Código ou nome">
        <p class="text-center color text-base p-1 mt-2 text-white rounded-sm w-1/2">Total de produtos encontrados: <strong>{{$quantidadeProdutos}}</strong></p>
    </div>
    @if(count($produtos) === 0)
    <h2 class="text-white bg-red-900 p-1 text-center mt-2 text-3xl">Não foram encontrados produtos</h2>
    @else
    <div class="flex gap-1 w-full h-auto justify-evenly items-start flex-wrap">
        @foreach($produtos as $produto)
        <div class="mt-2 p-1 bg-white w-96 min-h-[270px] max-h-[350px] overflow-y-auto">
            <div class="relative">
                @can('admin')
                <a href="{{route('excluir_produto', ['id' => Crypt::encrypt($produto->id)])}}">
                    <i class="fa-solid fa-delete-left absolute top-0 right-0 text-red-700 cursor-pointer "></i>
                </a>
                @endcan
            </div>
            <h4 class="text-lg text-color p-2 w-full break-words"><strong>{{ $produto->nome }}</strong></h4>
            <ul class="list-group bg-white colorCard flex flex-col justify-center mb-6">
                <li class="list-group-item">Código: <strong>{{ $produto->codigo }}</strong></li>
                <li class="list-group-item">Preço: R${{ number_format($produto->preco, 2, ',', '.') }} </li>
                <li class="list-group-item">Quantidade: <span class="{{$produto->quantidade === null ? 'text-red-600 font-bold' : '' }}">{{ $produto->quantidade ?? 0}}</span></li>
            </ul>
            <div class="mb-3 text-center">
                <a href="{{ route('mudar_estoque', ['id' => Crypt::encrypt($produto->id)]) }}" class="btn-produto btn-mudar-estoque">
                    Mudar estoque
                </a>
                @can('admin')
                <a href="{{ route('editar_produto', ['id' => Crypt::encrypt($produto->id)]) }}" class="btn-produto btn-editar">
                    Editar produto
                </a>
                @endcan
            </div>
        </div>
        @endforeach
    </div>
    @endif
</x-area-component>