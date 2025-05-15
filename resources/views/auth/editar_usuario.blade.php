<x-main-layout titulo="Editar usuário" color="fundo-padrao">
  <x-logo-component />
  <main class="main-container !h-190">
    <x-menu-component />
    <x-area-component>
      <div class="formulario p-2 mt-3 bg-white rounded">
        <div class="mt-2">
          @if(session('sucesso'))
          <div class="text-green-400 text-2xl bg-green-100 text-center">{{session('sucesso')}}</div>
          @endif
          @if(session('erro'))
          <div class="text-red-400 text-2xl bg-red-100 text-center">{{session('erro')}}</div>
          @endif
        </div>
        <h1 class="escrito-entrar">Edição de usuário</h1>
        <form action="{{ route('editar_usuario_submit')}}" method="POST" novalidate>
          @csrf
          <input type="hidden" name="id" value="{{$usuario->id}}">
          <div class="mb-3">
            <label for="usuario">Nome</label>
            <div>
              <input type="text" class="input-form" id="name" name="name" value="{{old('name',$usuario->name)}}">
            </div>
            @error('name')
            <span class="text-red-500 mt-1">{{$message}}</span>
            @enderror
          </div>
          @can('admin')
          <div class="mb-3">
            <label for="role">Tipo de perfil</label>
            <div>
              <select class="form-select-cadastro p-3" name="role">
                <option value="0" selected>Selecione</option>
                <option value="administrador" {{ $usuario->role == 'administrador' ? 'selected' : '' }}>Administrador</option>
                <option value="comum" {{ $usuario->role == 'comum' ? 'selected' : '' }}>Comum</option>
              </select>
            </div>
            @error('role')
            <span class="text-red-500 mt-1">{{$message}}</span>
            @enderror
          </div>
          @endcan
          <div class="mb-3">
            <label for="usuario">Usuário</label>
            <div>
              <input type="email" class="input-form" id="email" name="email" value="{{old('email',$usuario->email)}}">
            </div>
            @error('email')
            <span class="text-red-500 mt-1">{{$message}}</span>
            @enderror
          </div>
          @can('senha',$usuario)
          <div class="mb-3">
            <label for="usuario">Senha</label>
            <div>
              <input type="password" class="input-form senha" id="password" placeholder="********" name="password" value="{{old('password')}}">
            </div>
            @error('password')
            <span class="text-red-500 mt-1">{{$message}}</span>
            @enderror
          </div>
          <div class="mb-3">
            <label for="senha">Confirmar senha</label>
            <div>
              <input type="password" class="input-form senha" id="password_confirmation" placeholder="********" name="password_confirmation" value="{{old('password_confirmation')}}">
              <i class="fa-solid fa-eye mt-2" id="btn_senha"></i>
            </div>
            @error('password_confirmation')
            <span class="text-red-500 mt-1">{{$message}}</span>
            @enderror
          </div>
          @endcan
          <div class="mb-3 flex flex-col">
            <button type="submit" class="btn-main">Editar</button>
            <a href="{{auth()->user()->role == 'administrador' ? route('lista_usuarios') : route('perfil_comum')}}" class="text-blue-500 mt-2">Voltar</a>
          </div>

        </form>

      </div>
    </x-area-component>
    <main>
</x-main-layout>