<x-main-layout titulo="Escolha categoria" color="fundo-padrao">
    <x-logo-component />
    <main class="main-container">
        <x-menu-component />
        <x-area-component tipoAlinhamento="flex-column">
            <section class="escolha-categoria bg-white p-3 rounded">
                <div class="mb-3">
                    <h2>Qual categoria de produtos você gostaria de ver?</h2>
                </div>
                <form action="{{route('categoria')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <select class="form-select-lg form-select-categoria mb-3 w-2xl p-2 border-solid border-1 border-zinc-300" aria-label="Large select example" name="categoria">
                            <option value="selecione">Selecione</option>
                            @foreach($categorias as $categoria)
                            <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
                            @endforeach
                            @error('categoria')
                            <span class="text-danger mt-1">{{$message}}</span>
                            @enderror
                        </select>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                </form>
            </section>
        </x-area-component>
        <main>
</x-main-layout>