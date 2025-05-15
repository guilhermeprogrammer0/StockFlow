<x-main-layout titulo="Editar produto" color="fundo-padrao">
    <x-logo-component />
    <main class="main-container !h-190">
        <x-menu-component />
        <x-area-component>
            <div class="formulario p-2 mt-3 bg-white rounded">
                <div class="mt-2">
                    @if(session('sucesso'))
                    <div class="text-green-400 text-2xl bg-green-100 text-center">{{session('sucesso')}}</div>
                    @endif
                    @if(session('erro'))
                    <div class="text-red-400 text-2xl bg-red-100 text-center">{{session('erro')}}</div>
                    @endif
                </div>
                <div>
                    <h2 class="escrito-entrar">Edição de produtos</h2>
                </div>
                <form action="{{route('atualizar_produto')}}" method="post" novalidate>
                    @csrf
                    <input type="hidden" name="id" value="{{$produto->id}}">
                    <div class="mb-3">
                        <label for="codigo">Código</label>
                        <div>
                            <input class="input-form" type="text" id="codigo" name="codigo" value="{{old('codigo',$produto->codigo)}}">
                        </div>
                        @error('codigo')
                        <span class="text-red-500 mt-1">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nome">Nome</label>
                        <div>
                            <input type="text" class="input-form" id="nome" placeholder="Notebook Dell" name="nome" value="{{old('nome',$produto->nome)}}">
                        </div>
                        @error('nome')
                        <span class="text-red-500 mt-1">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="preco">Preço</label>
                        <div>
                            <input type="text" class="input-form" id="descricao" placeholder="250,00" name="preco" value="{{old('preco',$produto->preco)}}">
                        </div>
                        @error('preco')
                        <span class="text-red-500 mt-1">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="categoria">Categoria</label>
                        <div>
                            <select class="form-select-cadastro p-3 border bg-white" name="categoria">
                                <option value="0" selected>Selecione</option>
                                @foreach($categorias as $categoria)
                                <option value="{{$categoria->id}}" {{ $categoria->id == $produto->categoria_id ? 'selected' : '' }}>{{$categoria->nome}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('categoria')
                        <span class="text-red-500 mt-1">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn-main">Editar</button>
                    </div>
            </div>
            </form>
            </div>
        </x-area-component>
        <main>
</x-main-layout>