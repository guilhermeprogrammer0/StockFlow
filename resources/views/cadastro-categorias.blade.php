<x-main-layout titulo="Cadastro categoria" color="fundo-padrao">
    <x-logo-component />
    <main class="main-container">
        <x-menu-component/>
        <x-area-component>
            <div class="formulario p-2 mt-3 bg-white rounded">
                <div>
                    <h2>Cadastrar</h2>
                </div>
                <form action="{{route('cadastro_categorias_submit')}}" method="POST" novalidate>
                    @csrf
                    <div class="mb-3">
                        <div>
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" id="nome" placeholder="Desktop" name="nome">
                            @error('nome')
                            <span class="text-danger mt-1">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </div>
                    <div class="lista-categorias">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Ação</th>

                                </tr>
                            </thead>
                            @foreach($categorias as $categoria)
                            <tbody>
                                <tr>
                                    <td>{{$categoria->nome}}</td>
                                    <td> <a href="{{route('excluir_categoria',['id'=>Crypt::encrypt($categoria->id)])}}" class="btn btn-danger">Excluir</a> </td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </form>
            </div>
        </x-area-component>
        <main>
</x-main-layout>