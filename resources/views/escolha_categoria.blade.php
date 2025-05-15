<x-main-layout titulo="Escolha categoria" color="fundo-padrao">
    <x-logo-component />
    <main class="main-container">
        <x-menu-component />
        <x-area-component>
            <section class="escolha-categoria bg-white p-3 rounded mt-3">
                <div class="mb-3">
                    <h2 class="text-3xl text-color">Qual categoria de produtos você gostaria de ver?</h2>
                </div>
                <form action="{{route('categoria')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <select class="form-select-categoria mb-3 w-2xl p-2 border-solid border-1 border-zinc-300" aria-label="Large select example" name="categoria">
                            <option value="selecione">Selecione</option>
                            @foreach($categorias as $categoria)
                            <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
                            @endforeach
                        </select>
                    </div>
                      @error('categoria')
                        <span class="text-red-500 mt-1">{{$message}}</span>
                        @enderror
                    <div class="mb-3">
                        <button type="submit" class="btn-main">Enviar</button>
                    </div>
                </form>
            </section>
        </x-area-component>
        <main>
</x-main-layout>