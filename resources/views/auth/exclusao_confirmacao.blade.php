<x-main-layout titulo="Confirmar exclusão" color="fundo-padrao">
    <x-logo-component />
    <main class="main-container">
        <x-menu-component />
        <x-area-component>
                <div class="d-flex flex-column items-center justify-center bg-white p-5 rounded mt-2">
                    <h2>Deseja mesmo excluir o usuário <strong> {{$usuario->name ?? 'Usuário excluído'}}</strong>?</h2>
                    <div>
                    <a href="{{ Auth::user()->role === 'administrador' ? route('lista_usuarios') : route('perfil_comum') }}" class="btn btn-secondary"> Cancelar</a>
                    <a href="{{route('excluir_usuario_confirma',['id'=>Crypt::encrypt($usuario->id)])}}" class="btn btn-danger"> Excluir</a>
                    </div>
                </div>
        </x-area-component>
    </main>
</x-main-layout>