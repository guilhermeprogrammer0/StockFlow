<x-main-layout titulo="Escolha categoria" color="fundo-padrao">
        <x-logo-component />
    <main class="w-full d-flex justify-between border-solid border-2 h-130">
        <x-menu-component />
        <x-area-component tipoAlinhamento="flex-column">
            <div class="mb-3">
                <h1>Qual categoria de produtos gostaria de ver?</h1>
            </div>
            <form action="{{route('categoria')}}" method="post">
                @csrf
                <div class="mb-3">
                    <select class="form-select-lg form-select-categoria mb-3 w-2xl p-1 border-solid border-1" aria-label="Large select example" name="categoria">
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

        </x-area-component>
        <main>
</x-main-layout>