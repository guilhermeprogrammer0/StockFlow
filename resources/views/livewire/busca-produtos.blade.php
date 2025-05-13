<x-area-component>
<div class="w-full d-flex justify-center items-center mb-3 flex-column">
<label for="busca" class="color-text text-2xl"> Buscar </label>
<input type="text" class="form-control w-25" wire:model.live="busca" placeholder="Código ou nome">
</div>
    @if(count($produtos) === 0)
        <h2 class="text-white bg-red-900 p-1 text-center mt-2">Não foram encontrados produtos</h2>
    @else
    <div class="d-flex gap-2 w-full h-auto justify-center items-start flex-wrap">
        @foreach($produtos as $produto)
            <div class="card w-auto mt-2 p-2">
                <div class="card-header relative">
                    <h4>{{ $produto->nome }}</h4>
                    @can('admin')
                        <a href="{{ route('excluir_produto', ['id' => Crypt::encrypt($produto->id)]) }}">
                            <i class="fa-solid fa-delete-left absolute top-1 right-1 text-red-700 cursor-pointer"></i>
                        </a>
                    @endcan
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Código: <strong>{{ $produto->codigo }}</strong></li>
                    <li class="list-group-item">Preço: R${{ number_format($produto->preco, 2, ',', '.') }}</li>
                    <li class="list-group-item">Quantidade: {{ $produto->quantidade ?? 0 }}</li>
                    <li class="list-group-item text-center">
                        <a href="{{ route('mudar_estoque', ['id' => Crypt::encrypt($produto->id)]) }}" class="btn btn-secondary">
                            Mudar estoque
                        </a>
                        @can('admin')
                            <a href="{{ route('editar_produto', ['id' => Crypt::encrypt($produto->id)]) }}" class="btn btn-warning">
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
