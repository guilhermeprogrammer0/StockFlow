<section class="menu-container h-full">
    <ul class="menu color h-full w-full">
        @can('admin')
        <li><a href="{{route('cadastro_categorias')}}">Cadastrar categorias</a></li>
        <li><a href="{{route('cadastro_produtos')}}">Cadastrar produtos</a></li>
        @endcan
        <li><a href="{{route('escolha_categoria')}}">Lista de produtos</a></li>
        <li><a href="#">Movimentações</a></li>
        @can('admin')
        <li><a href="{{route('cadastro')}}">Cadastrar Usuários</a></li>
        @endcan
    </ul>
</section>