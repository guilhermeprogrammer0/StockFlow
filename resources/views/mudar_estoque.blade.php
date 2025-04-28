<x-main-layout titulo="Mudar estoque" color="fundo-padrao">
    <x-logo-component />
    <main class="main-container">
        <x-menu-component />
        <x-area-component tipoAlinhamento="flex-column">
            <div class="formulario p-2 mt-3 bg-white rounded">
                <div>
                    <h2 class="text-center bg-blue-500 text-white">Mudar estoque</h2>
                </div>
                <h5 class="text-center">{{$produto->nome}}</h5>
                <p class="text-center">Quantidade atual: <strong>{{$produto->quantidade}}</strong></p>

                <form action="{{route('mudar_estoque_submit')}}" method="post" novalidate>
                    @csrf
                    <input type="hidden" name="product_id" value="{{$produto->id}}">
                    <div class="mb-3">
                        <div>
                            <label for="quantidade">Nova Quantidade</label>
                            <input type="text" class="form-control" id="descricao" name="quantidade" value="{{old('quantidade')}}">
                            @error('quantidade')
                            <span class="text-danger mt-1">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="quantidade">Tipo de operação</label>
                        <div>
                            <select class="form-select-cadastro p-3 border bg-white" name="tipo">
                                <option value="0" selected>Selecione</option>
                                <option value="entrada">Entrada</option>
                                <option value="saida">Saída</option>
                            </select>
                        </div>
                        @error('tipo')
                        <span class="text-danger mt-1">{{$message}}</span>
                        @enderror
                    </div>
                    @if(session('erro'))
                    <div class="text-danger">{{session('erro')}}</div>
                    @enderror
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Mudar</button>
                    </div>

                </form>
            </div>
        </x-area-component>
        <main>
</x-main-layout>