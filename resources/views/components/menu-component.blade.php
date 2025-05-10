<nav class="menu-container" id="menu-ativo">
    <div class="btnMenu"><i class="fa-solid fa-bars fa-3x color-text" id="btnMenu"></i></div>
    <ul class="menu h-full w-full">
        @can('admin')
        <li class="p-2 rounded hover:bg-blue-700 text-white cursor:pointer"><a class="text-white" href="{{route('cadastro_categorias')}}">Cadastrar categorias</a></li>
        <li class="p-2 rounded hover:bg-blue-700 text-white cursor:pointer"><a class="text-white" href="{{route('cadastro_produtos')}}">Cadastrar produtos</a></li>
        @endcan
        <li class="p-2 rounded hover:bg-blue-700 text-white cursor:pointer"><a class="text-white" href="{{route('escolha_categoria')}}">Lista de produtos</a></li>
        <li class="p-2 rounded hover:bg-blue-700 text-white cursor:pointer"><a class="text-white" href="{{route('movimentacoes')}}">Movimentações</a></li>
        @can('admin')
        <li class="p-2 rounded hover:bg-blue-700 text-white cursor:pointer"><a class="text-white" href="{{route('cadastro')}}">Cadastrar usuários</a></li>
        <li class="p-2 rounded hover:bg-blue-700 text-white cursor:pointer"><a class="text-white" href="{{route('lista_usuarios')}}">Lista de usuários</a></li>
        <li class="p-2 rounded hover:bg-blue-700 text-white cursor:pointer"><a class="text-white" href="{{route('cadastro_fornecedores')}}">Cadastrar fornecedores</a></li>
        <li class="p-2 rounded hover:bg-blue-700 text-white cursor:pointer"><a class="text-white" href="{{route('lista_fornecedores')}}">Lista de fornecedores</a></li>
        <li class="p-2 rounded hover:bg-blue-700 text-white cursor:pointer"><a class="text-white" href="{{route('cadastro_clientes')}}">Cadastrar clientes</a></li>
        <li class="p-2 rounded hover:bg-blue-700 text-white cursor:pointer"><a class="text-white" href="{{route('lista_clientes')}}">Lista de clientes</a></li>
        @endcan
        @can('comum')
        <li class="p-2 rounded hover:bg-blue-700 text-white cursor:pointer"><a class="text-white" href="{{route('perfil_comum')}}">Editar/Excluir Usuário</a></li>
        @endcan
    </ul>
    <script src="{{asset('assets/js/menu.js')}}"></script>
</nav>