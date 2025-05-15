<x-main-layout titulo="Perfil comum" color="fundo-padrao">
    <x-logo-component />
    <main class="main-container">
        <x-menu-component />
        <x-area-component>
            <div class="card" style="width: 30rem;">
                <div class="flex flex-col items-center justify-center bg-white p-10 rounded">
                    <h1 class="escrito-entrar">Perfil</h1>
                    <div class="flex gap-5">
                        <a href="{{route('editar_usuario', ['id' => Crypt::encrypt(Auth::user()->id)])}}" class="btn-produto btn-editar"> Editar dados</a>
                        <a href="{{route('excluir_usuario',['id'=>Crypt::encrypt(Auth::user()->id)])}}" class="btn-produto btn-excluir"> Excluir conta</a>
                    </div>
                </div>
        </x-area-component>
    </main>
</x-main-layout>