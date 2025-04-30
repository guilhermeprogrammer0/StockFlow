<x-main-layout titulo="Confirmar exclusão" color="fundo-padrao">
    <x-logo-component />
    <main class="main-container">
        <x-menu-component />
        <x-area-component>
                <div class="d-flex flex-column items-center justify-center bg-white p-5 rounded">
                    <h2>Deseja mesmo excluir o fornecedor<strong> {{$fornecedor->nome ?? 'Fornecedor excluído'}}</strong>?</h2>
                    <div>
                    <a href="{{route('lista_fornecedores')}}" class="btn btn-secondary"> Cancelar</a>
                    <a href="{{route('excluir_fornecedor_confirma',['id'=>Crypt::encrypt($fornecedor->id)])}}" class="btn btn-danger">Excluir</a>
                    </div>
                </div>
        </x-area-component>
    </main>
</x-main-layout>