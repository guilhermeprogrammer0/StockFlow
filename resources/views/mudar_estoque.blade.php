<x-main-layout titulo="Mudar estoque" color="fundo-padrao">
    <x-logo-component />
    <main class="main-container">
        <x-menu-component />
        <x-area-component>
            <div class="formulario p-2 mt-3 bg-white rounded">
                <div class="mt-2">
                    @if(session('sucesso'))
                    <div class="text-green-400 text-2xl bg-green-100 text-center">{{session('sucesso')}}</div>
                    @endif
                    @if(session('erro2'))
                    <div class="text-red-400 text-2xl bg-red-100 text-center">{{session('erro2')}}</div>
                    @endif
                </div>
                <div>
                    <h2 class="text-center color text-white text-2xl">Mudar estoque</h2>
                </div>
                <h5 class="text-center text-xl">{{$produto->nome}}</h5>
                <p class="text-center">Quantidade atual: <strong>{{$produto->quantidade ?? 0}}</strong></p>

                <form action="{{route('mudar_estoque_submit')}}" method="post" novalidate>
                    @csrf
                    <input type="hidden" name="product_id" value="{{$produto->id}}">
                    <div class="mb-3">
                          <label for="quantidade">Quantidade</label>
                        <div>
                            <input type="text" class="input-form" id="descricao" name="quantidade" value="{{old('quantidade')}}">
                        </div>
                          @error('quantidade')
                            <span class="text-red-500 mt-1">{{$message}}</span>
                            @enderror
                    </div>
                    <div class="mb-3">
                        <label for="quantidade">Tipo de operação</label>
                        <div>
                            <select class="form-select-cadastro p-3 bg-white" name="tipo" id="tipo">
                                <option value="0" selected>Selecione</option>
                                <option value="entrada">Entrada</option>
                                <option value="saida">Saída</option>
                            </select>
                        </div>
                        @error('tipo')
                        <span class="text-red-500 mt-1">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3 hidden" id="div-fornecedor">
                        <label for="categoria">Fornecedor</label>
                            <div>
                                <select class="form-select-cadastro p-3 bg-white" name="fornecedor" id="fornecedor">
                                    <option value="0" selected>Selecione</option>
                                    @foreach($fornecedores as $fornecedor)
                                    <option value="{{$fornecedor->id}}">{{$fornecedor->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('fornecedor')
                            <span class="text-red-500 mt-1">{{$message}}</span>
                            @enderror
                    </div>
                      <div class="mb-3 hidden" id="div-cliente">
                        <label for="categoria">Cliente</label>
                            <div>
                                <select class="form-select-cadastro p-3 bg-white " name="cliente" id="cliente">
                                    <option value="0" selected>Selecione</option>
                                    @foreach($clientes as $cliente)
                                    <option value="{{$cliente->id}}">{{$cliente->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('cliente')
                            <span class="text-red-500 mt-1">{{$message}}</span>
                            @enderror
                    </div>
                      @if(session('erro'))
                    <div class="text-red-500">{{session('erro')}}</div>
                    @endif
                    <div class="mb-3 mt-2">
                        <button type="submit" class="btn-main">Mudar</button>
                    </div>

                </form>
            </div>
        </x-area-component>
    </main>
    <script src="{{asset('assets/js/mudar_estoque.js')}}"></script>

</x-main-layout>