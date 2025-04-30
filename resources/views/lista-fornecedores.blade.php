<x-main-layout titulo="Lista fornecedores" color="fundo-padrao">
    <x-logo-component />
    <main class="main-container">
        <x-menu-component />
        <x-area-component tipoAlinhamento2="items-start">
            <div class="lista_usuarios overflow-x-auto">
            @if(count($fornecedores) === 0)
            <h2 class="text-white bg-red-900 p-1 text-center">Não foram encontrados fornecedores</h2>
            @else
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">CNPJ</th>
                            <th scope="col">E-mail</th>
                            <th scope="col" colspan="2" class="text-center">Ações</th>
                        </tr>
                    </thead>
                    @foreach($fornecedores as $fornecedor)
                    <tbody>
                        <tr>
                            <td>{{$fornecedor->nome}}</td>
                            <td>{{$fornecedor->cnpj}}</td>
                            <td>{{$fornecedor->email}}</td>
                            <td>
                            <td><a href="{{route('editar_fornecedor',['id'=>Crypt::encrypt($fornecedor->id)])}}"><i class="fa-solid fa-pen-to-square text-orange-500 m-1 cursor:pointer"></i></a> <a href="{{route('excluir_fornecedor',['id'=>Crypt::encrypt($fornecedor->id)])}}"><i class="fa-solid fa-trash text-red-700 cursor:pointer"></i></a></td>
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