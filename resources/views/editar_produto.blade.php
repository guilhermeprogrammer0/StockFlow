<x-main-layout titulo="Editar produto" color="fundo-padrao">
    <x-logo-component />
    <main class="main-container !h-190">
        <x-menu-component />
        <x-area-component tipoAlinhamento2="items-start">
            <div class="formulario p-2 mt-3 bg-white rounded">
                 <div class="mt-2">
                    @if(session('sucesso'))
                    <div class="alert alert-success text-center">{{session('sucesso')}}</div>
                    @endif
                    @if(session('erro'))
                    <div class="alert alert-success text-center">{{session('erro')}}</div>
                    @endif
                </div>
            <div><h2>Edição de produtos</h2></div>
            <form action="{{route('atualizar_produto')}}" method="post" novalidate>
                @csrf
                <input type="hidden" name="id" value="{{$produto->id}}">
                <div>
                    <label for="codigo">Código</label>
                        <input class="form-control" type="text" id="codigo" name="codigo" value="{{old('codigo',$produto->codigo)}}">
                        @error('codigo')
                        <span class="text-danger mt-1">{{$message}}</span>
                        @enderror
                    </div>
                <div class="mb-3">
                    <div>
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" id="nome" placeholder="Notebook Dell" name="nome" value="{{old('nome',$produto->nome)}}">
                        @error('nome')
                        <span class="text-danger mt-1">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <div class="m-auto">
                        <label for="preco">Preço</label>
                        <input type="text" class="form-control" id="descricao" placeholder="250,00" name="preco" value="{{old('preco',$produto->preco)}}">
                        @error('preco')
                        <span class="text-danger mt-1">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="categoria">Categoria</label>
                    <div>
                        <select class="form-select-cadastro p-3 border bg-white" name="categoria">
                            <option value="0" selected>Selecione</option>
                        @foreach($categorias as $categoria)
                        <option value="{{$categoria->id}}"{{ $categoria->id == $produto->categoria_id ? 'selected' : '' }}>{{$categoria->nome}}</option>
                        @endforeach
                        </select>
                    </div>
                    @error('categoria')
                        <span class="text-danger mt-1">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Editar</button>
                </div>
                </div>
    
            </form>
            </div>
        </x-area-component>
        <main>
</x-main-layout>