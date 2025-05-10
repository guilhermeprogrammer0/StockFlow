<div>
 @if($movimentacoes->count() === 0)
              <h2 class="text-white bg-red-900 p-1 text-center">Não foram encontradas movimentacões</h2>
         @else
        <label for="tipo">Tipo de Movimentação</label>
        <select class="form-select p-3 border bg-white" wire:model.live="tipo">
        <option value="" selected>Selecione</option>
        <option value="entrada"> Entrada </option>
        <option value="saida"> Saída </option>
        </select>                        
        
 <table class="table table-striped mt-2">
                    <thead>
                        <tr>
                            <th scope="col">Produto</th>
                            <th scope="col">@if($tipo ==='entrada') Entrada @elseif($tipo === 'saida') Saída  @else Entrada/Saída @endif</th>
                            <th scope="col">Quantidade Movimentada</th>
                            <th scope="col">Tipo de movimentação</th>
                            <th scope="col">Data</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($movimentacoes as $movimentacao)
                        <tr>
                           <td>{{$movimentacao->produto->nome ?? 'Produto excluído'}}</td>
                           <td>{{$movimentacao->tipo === 'entrada' ? $movimentacao->fornecedor->nome ?? 'Fornecedor excluído' : $movimentacao->cliente->nome ?? 'Cliente excluído'}}</td>
                           <td>{{$movimentacao->quantidade}}</td>
                           <td class="{{$movimentacao->tipo == 'saida' ? 'bg-red-500 text-white' : ' bg-green-500 text-white' }}">{{ucfirst($movimentacao->tipo);}}</td>
                           <td>{{\Carbon\Carbon::parse($movimentacao->data)->format('d/m/Y')}}</td>

                        </tr>
                    @endforeach
</tbody>
 </table>
 @endif
</div>

