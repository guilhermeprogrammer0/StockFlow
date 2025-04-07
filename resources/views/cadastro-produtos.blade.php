<x-main-layout titulo="Escolha categoria" color="fundo-padrao">
    <x-logo-component />
    <main class="w-full d-flex justify-between h-160 ">
        <x-menu-component />
        <x-area-component tipoAlinhamento="flex-column">
            <div class="formulario p-2 mt-3 bg-white rounded">
            <div><h1>Cadastrar</h1></div>
            <form action="{{route('cadastro_produtos_submit')}}" method="post" novalidate>
                @csrf
                <div class="mb-3">
                    <div>
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" id="nome" placeholder="Notebook Dell" name="nome">
                        @error('nome')
                        <span class="text-danger mt-1">{{$message}}</span>
                        @enderror
                    </div>
                    <div>
                    <label for="descricao">Descrição</label>
                        <textarea class="form-control" placeholder="" rows="2" id="descricao" name="descricao"></textarea>
                        @error('descricao')
                        <span class="text-danger mt-1">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <div class="m-auto">
                        <label for="preco">Preço</label>
                        <input type="text" class="form-control" id="descricao" placeholder="250,00" name="preco">
                        @error('preco')
                        <span class="text-danger mt-1">{{$message}}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="quantidade">Quantidade</label>
                        <input type="text" class="form-control" id="descricao" placeholder="6" name="quantidade">
                        @error('quantidade')
                        <span class="text-danger mt-1">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <div>
                        <select class="form-select-cadastro p-3 border bg-white" name="categoria">
                            <option value="0" selected>Selecione</option>
                        @foreach($categorias as $categoria)
                        <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
                        @endforeach
                        </select>
                        @error('categoria')
                        <span class="text-danger mt-1">{{$message}}</span>
                        @enderror
                    </div>
                    </div>
                    <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
                </div>
    
            </form>
            </div>
        </x-area-component>
        <main>
</x-main-layout>