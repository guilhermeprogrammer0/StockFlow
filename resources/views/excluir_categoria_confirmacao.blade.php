<x-main-layout titulo="Confirmar exclusão categoria" color="fundo-padrao">
    <x-logo-component />
    <main class="main-container" >
        <x-menu-component />
        <x-area-component>
                <div class="d-flex flex-column items-center justify-center bg-white p-5 rounded">
                    <h2>Deseja mesmo excluir <strong> {{$categoria->nome}}</strong>?</h2>
                    <div>
                    <a href="{{route('cadastro_categorias')}}" class="btn btn-secondary">Cancelar</a>
                    <a href="{{route('excluir_categoria_confirma',['id'=>Crypt::encrypt($categoria->id)])}}" class="btn btn-danger"> Excluir</a>
                    </div>
                </div>
        </x-area-component>
    </main>
</x-main-layout>