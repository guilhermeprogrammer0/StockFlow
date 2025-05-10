<x-main-layout titulo="Lista clientes" color="fundo-padrao">
    <x-logo-component />
    <main class="main-container">
        <x-menu-component />
        <x-area-component>
            <div class="lista_usuarios overflow-x-auto">
            @if(count($clientes) === 0)
            <h2 class="text-white bg-red-900 p-1 text-center">Não foram encontrados clientes</h2>
            @else
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">E-mail</th>
                            <th scope="col" colspan="2" class="text-center">Ações</th>
                        </tr>
                    </thead>
                    @foreach($clientes as $cliente)
                    <tbody>
                        <tr>
                            <td>{{$cliente->nome}}</td>
                            <td>{{$cliente->email}}</td>
                            <td>
                            <td><a href="{{route('editar_cliente',['id'=>Crypt::encrypt($cliente->id)])}}"><i class="fa-solid fa-pen-to-square text-orange-500 m-1 cursor:pointer"></i></a> <a href="{{route('excluir_cliente',['id'=>Crypt::encrypt($cliente->id)])}}"><i class="fa-solid fa-trash text-red-700 cursor:pointer"></i></a></td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
            @endif

        </x-area-component>
    </main>
    <script src="{{asset('assets/js/modal.js')}}"></script>
</x-main-layout>