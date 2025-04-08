<section class="">
    <ul class="d-flex justify-center lg:justify-start color menu h-full w-full sm:flex-row md:flex-row lg:flex-col">
        @can('admin')
        <li class="p-2 rounded hover:bg-blue-700 text-white cursor:pointer"><a class="text-white" href="{{route('cadastro_categorias')}}">Cadastrar categorias</a></li>
        <li class="p-2 rounded hover:bg-blue-700 text-white cursor:pointer"><a class="text-white" href="{{route('cadastro_produtos')}}">Cadastrar produtos</a></li>
        @endcan
        <li class="p-2 rounded hover:bg-blue-700 text-white cursor:pointer"><a class="text-white" href="{{route('escolha_categoria')}}">Lista de produtos</a></li>
        <li class="p-2 rounded hover:bg-blue-700 text-white cursor:pointer"><a class="text-white" href="#">Movimentações</a></li>
        @can('admin')
        <li class="p-2 rounded hover:bg-blue-700 text-white cursor:pointer"><a class="text-white" href="{{route('cadastro')}}">Cadastrar Usuários</a></li>
        @endcan
    </ul>
</section>