<x-main-layout titulo="Confirmar exclusão" color="fundo-padrao">
    <x-logo-component />
    <main class="main-container">
        <x-menu-component />
        <x-area-component>
                <div class="d-flex flex-column items-center justify-center bg-white p-5 rounded mt-2">
                  @if(session('erro'))
                    <div class="alert alert-danger text-center">
                    {{session('erro')}}
                    </div>
                    @endif
                    <h2>Deseja mesmo excluir o cliente<strong> {{$cliente->nome ?? 'Cliente excluído'}}</strong>?</h2>
                    <div>
                    <a href="{{route('lista_clientes')}}" class="btn btn-secondary"> Cancelar</a>
                    <a href="{{route('excluir_cliente_confirma',['id'=>Crypt::encrypt($cliente->id)])}}" class="btn btn-danger">Excluir</a>
                    </div>
                </div>
        </x-area-component>
    </main>
</x-main-layout>