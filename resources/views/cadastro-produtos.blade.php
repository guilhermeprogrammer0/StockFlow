<x-main-layout titulo="Cadastro produtos" color="fundo-padrao">
    <x-logo-component />
    <main class="main-container !h-190">
        <x-menu-component />
        <x-area-component>
            <div class="formulario p-2 mt-3 bg-white rounded">
                <div>
                    <h2>Cadastrar</h2>
                </div>
                <form action="{{route('cadastro_produtos_submit')}}" method="post" novalidate>
                    @csrf
                    <div class="mb-3">
                        <div>
                            <label for="codigo">Código</label>
                            <input class="form-control" type="text" id="codigo" name="codigo" value="{{old('codigo')}}">
                            @error('codigo')
                            <span class="text-danger mt-1">{{$message}}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome" value="{{old('nome')}}">
                            @error('nome')
                            <span class="text-danger mt-1">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="m-auto">
                            <label for="preco">Preço</label>
                            <input type="text" class="form-control" id="preco" name="preco" value="{{old('preco')}}">
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
                                <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('categoria')
                        <span class="text-danger mt-1">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </div>
                    @if(session('sucesso'))
                    <div class="alert alert-success text-center">{{session('sucesso')}}</div>
                    @endif
                    @if(session('erro'))
                    <div class="alert alert-success text-center">{{session('erro')}}</div>
                    @endif
            </div>
            </form>

            </div>
        </x-area-component>
    </main>
</x-main-layout>