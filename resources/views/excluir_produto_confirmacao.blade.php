<x-main-layout titulo="Confirmar exclusão produto" color="fundo-padrao">
    <x-logo-component />
    <main class="main-container" >
        <x-menu-component />
        <x-area-component>
                <div class="d-flex flex-column items-center justify-center bg-white p-5 rounded mt-2">
                 @if(session('erro'))
                    <div class="alert alert-danger text-center">
                    {{session('erro')}}
                    </div>
                    @endif
                    <h2>Deseja mesmo excluir <strong> {{$produto->nome}}</strong>?</h2>
                    <div>
                    <a href="{{route('lista_produtos')}}" class="btn btn-secondary">Cancelar</a>
                    <a href="{{route('excluir_produto_confirma',['id'=>Crypt::encrypt($produto->id)])}}" class="btn btn-danger"> Excluir</a>
                    </div>
                </div>
        </x-area-component>
    </main>
</x-main-layout>