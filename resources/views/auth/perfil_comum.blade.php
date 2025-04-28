<x-main-layout titulo="Perfil comum" color="fundo-padrao">
    <x-logo-component />
    <main class="main-container">
        <x-menu-component />
        <x-area-component>
            <div class="card" style="width: 30rem;">
                <div class="d-flex flex-column items-center justify-center bg-white p-10 rounded">
                    <h1>Perfil</h1>
                    <div class="d-flex gap-5">
                        <a href="{{route('editar_usuario', ['id' => Crypt::encrypt(Auth::user()->id)])}}" class="btn btn-warning btn-lg"> Editar dados</a>
                        <a href="{{route('excluir_usuario',['id'=>Crypt::encrypt(Auth::user()->id)])}}" class="btn btn-danger btn-lg"> Excluir conta</a>
                    </div>
                </div>
        </x-area-component>
    </main>
</x-main-layout>