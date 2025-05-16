<x-main-layout titulo="Cadastro produtos" color="fundo-padrao">
    <x-logo-component />
    <main class="main-container !h-190">
        <x-menu-component />
        <x-area-component>
            <div class="formulario p-2 mt-3 bg-white rounded text-center">
                <div class="mt-2">
                    @if(session('sucesso'))
                    <div class="text-green-600 text-2xl bg-green-100 text-center">{{session('sucesso')}}</div>
                    @endif
                    @if(session('erro'))
                    <div class="text-red-600 text-2xl bg-red-100 text-center">{{session('erro')}}</div>
                    @endif
                </div>
                <h1 class="escrito-entrar">Cadastro de produtos</h1>
                <form action="{{route('cadastro_produtos_submit')}}" method="post" novalidate>
                    @csrf
                    <div class="mb-3">
                         <label for="codigo">Código</label>
                        <div>
                            <input class="input-form" type="text" id="codigo" name="codigo" value="{{old('codigo')}}">
                        </div>
                        @error('codigo')
                        <span class="text-red-500 mt-1">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nome">Nome</label>
                        <div>
                            <input type="text" class="input-form" id="nome" name="nome" value="{{old('nome')}}">
                        </div>
                        @error('nome')
                        <span class="text-red-500  mt-1">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                         <label for="preco">Preço</label>
                        <div>
                            <input type="text" class="input-form" id="preco" name="preco" value="{{old('preco')}}">
                        </div>
                         @error('preco')
                            <span class="text-red-500  mt-1">{{$message}}</span>
                            @enderror
                    </div>
                    <div class="mb-3">
                        <label for="categoria">Categoria</label>
                        <div>
                            <select class="form-select-cadastro p-3 bg-white" name="categoria">
                                <option value="0" selected>Selecione</option>
                                @foreach($categorias as $categoria)
                                <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('categoria')
                        <span class="text-red-500  mt-1">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                         <div><button type="submit" class="btn-main">Cadastrar</button></div>
                        <div class="mt-2"><a href="{{route('lista_produtos')}}" class="text-blue-500"> Lista de produtos </a></div>
                    </div>
            </div>
            </form>

            </div>
        </x-area-component>
    </main>
</x-main-layout>