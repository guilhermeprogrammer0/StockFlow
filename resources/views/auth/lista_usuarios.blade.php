<x-main-layout titulo="Lista usuários" color="fundo-padrao">
    <x-logo-component />
    <main class="main-container">
        <x-menu-component />
        <x-area-component tipoAlinhamento2="items-start">
            <div class="lista_usuarios overflow-x-auto">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Perfil</th>
                            <th scope="col">Ativo</th>
                            <th scope="col">E-mail</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    @foreach($usuarios as $usuario)
                    <tbody>
                        <tr>
                            <td class="{{$usuario->id == Auth::user()->id ? 'bg-teal-100': ''}}">@if ($usuario->id == Auth::user()->id) <strong> {{$usuario->name}} </strong> @else {{$usuario->name}} @endif </td>
                            <td class="{{$usuario->id == Auth::user()->id ? 'bg-teal-100': ''}}">@if ($usuario->id == Auth::user()->id) <strong> {{\Illuminate\Support\Str::ucfirst($usuario->role)}} </strong> @else {{\Illuminate\Support\Str::ucfirst($usuario->role)}} @endif </td>
                            <td class="{{$usuario->id == Auth::user()->id ? 'bg-teal-100': ''}}">@if ($usuario->id == Auth::user()->id) <strong>@endif @if($usuario->email_verified_at !== null) <span class="badge badge-success p-1"> Sim </span> @else <span class="badge badge-danger p-1"> Não </span> @endif </td>
                            <td class="{{$usuario->id == Auth::user()->id ? 'bg-teal-100': ''}}">@if ($usuario->id == Auth::user()->id) <strong> {{$usuario->email}} </strong> @else {{$usuario->email}} @endif </td>
                            <td class="{{$usuario->id == Auth::user()->id ? 'bg-teal-100': ''}}">@can('acao_admin',$usuario)<a href="{{route('editar_usuario',['id'=>Crypt::encrypt($usuario->id)])}}"><i class="fa-solid fa-pen-to-square text-orange-500 m-1 cursor:pointer"></i></a><a href="{{route('excluir_usuario',['id'=>Crypt::encrypt($usuario->id)])}}"><i class="fa-solid fa-trash text-red-700 cursor:pointer"></i></a> @endcan</td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
                <div class="mt-2 p-2">{{$usuarios->links()}}</div>
            </div>
        </x-area-component>
    </main>
    <script src="{{asset('assets/js/modal.js')}}"></script>
</x-main-layout>