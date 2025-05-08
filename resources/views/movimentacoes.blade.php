<x-main-layout titulo="Movimentações" color="fundo-padrao">
    <x-logo-component />
    <main class="main-container">
        <x-menu-component />
        <x-area-component tipoAlinhamento2="items-start">
            <div class="lista_usuarios overflow-x-auto">
            @if(count($movimentacoes) === 0)
            <h2 class="text-white text-center bg-red-900 p-1">Não foram encontradas movimentações</h2>
            @else
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Fornecedor</th>
                            <th scope="col">Quantidade Movimentada</th>
                            <th scope="col">Tipo de movimentação</th>
                            <th scope="col">Data</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($movimentacoes as $movimentacao)
                        <tr>
                           <td>{{$movimentacao->produto->nome ?? 'Produto excluído'}}</td>
                           <td>{{$movimentacao->tipo === 'entrada' ? $movimentacao->fornecedor->nome ?? 'Fornecedor excluído' : '---------'}}</td>
                           <td>{{$movimentacao->quantidade}}</td>
                           <td class="{{$movimentacao->tipo == 'saida' ? 'bg-red-500 text-white' : ' bg-green-500 text-white' }}">{{ucfirst($movimentacao->tipo);}}</td>
                           <td>{{\Carbon\Carbon::parse($movimentacao->data)->format('d/m/Y')}}</td>

                        </tr>
                    @endforeach
                    @endif
                    </tbody>
                </table>
            </div>

        </x-area-component>
    </main>
    <script src="{{asset('assets/js/modal.js')}}"></script>
</x-main-layout>