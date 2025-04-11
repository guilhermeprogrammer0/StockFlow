<x-main-layout titulo="Confirmar exclusão" color="fundo-padrao">
    <x-logo-component />
    <main class="main-container">
        <x-menu-component />
        <x-area-component tipoAlinhamento="">
                <div class="d-flex flex-column items-center justify-center bg-white p-5 rounded">
                    <h2>Deseja mesmo excluir o usuário <strong> {{$usuario->name}}</strong>?</h2>
                    <div>
                        <a href="{{route('excluir_usuario_confirma',['id'=>Crypt::encrypt($usuario->id)])}}" class="btn btn-danger"> Excluir</a>
                    </div>
                </div>
        </x-area-component>
    </main>
</x-main-layout>