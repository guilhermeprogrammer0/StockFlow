<x-main-layout titulo="Confirmar exclusão produto" color="fundo-padrao">
    <x-logo-component />
    <main class="main-container" >
        <x-menu-component />
        <x-area-component>
                <div class="flex flex-col items-center justify-center bg-white p-5 rounded mt-2">
                 @if(session('erro'))
                    <div class="text-red-600 text-2xl bg-red-100 text-center">
                    {{session('erro')}}
                    </div>
                    @endif
                    <h2 class="text-3xl">Deseja mesmo excluir <strong> {{$produto->nome}}</strong>?</h2>
                    <div class="mt-5">
                    <a href="{{route('lista_produtos')}}" class="btn-produto btn-editar">Cancelar</a>
                    <a href="{{route('excluir_produto_confirma',['id'=>Crypt::encrypt($produto->id)])}}" class="btn-produto btn-excluir"> Excluir</a>
                    </div>
                </div>
        </x-area-component>
    </main>
</x-main-layout>