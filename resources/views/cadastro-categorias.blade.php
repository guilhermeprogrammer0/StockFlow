<x-main-layout titulo="Cadastro categoria" color="fundo-padrao">
    <x-logo-component />
    <main class="main-container">
        <x-menu-component />
        <x-area-component>
            <div class="formulario p-2 mt-3 bg-white rounded">
                <h1 class="escrito-entrar">Cadastro de categorias</h1>
                <form action="{{route('cadastro_categorias_submit')}}" method="POST" novalidate>
                    @csrf
                    <div class="mb-3">
                        <label for="nome">Nome</label>
                        <div>
                            <input type="text" class="input-form" id="nome" name="nome">
                        </div>
                        @error('nome')
                        <span class="text-red-500">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn-main">Cadastrar</button>
                    </div>
                    <div class="lista-categorias">
                        <table class="table">
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
                                    <td> <a href="{{route('excluir_categoria',['id'=>Crypt::encrypt($categoria->id)])}}" class="btn-excluir">Excluir</a> </td>
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