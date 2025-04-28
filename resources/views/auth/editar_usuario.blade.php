<x-main-layout titulo="Editar usuário" color="fundo-padrao">
  <x-logo-component />
  <main class="main-container !h-190">
    <x-menu-component />
    <x-area-component>
      <div class="container bg-white rounded-md">
        <h1 class="escrito-entrar text-black text-center mt-50">Editar usuário</h1>
        <form action="{{route('editar_usuario_submit')}}" method="POST" novalidate>
          @csrf
          <input type="hidden" name="id" value="{{$usuario->id}}">
          <div class="mb-3">
            <div class="form-group">
              <label for="usuario">Nome</label>
              <input type="text" class="form-control" id="name" name="name" value="{{old('name',$usuario->name)}}">
              @error('name')
              <span class="text-danger mt-1">{{$message}}</span>
              @enderror
            </div>
          </div>
          <div class="mb-3">
            <div class="form-group">
              <label for="role">Tipo de perfil</label>
              <select class="form-select-cadastro p-3 border" name="role">
                <option value="0" selected>Selecione</option>
                <option value="administrador" {{ $usuario->role == 'administrador' ? 'selected' : '' }}>Administrador</option>
                <option value="comum" {{ $usuario->role == 'comum' ? 'selected' : '' }}>Comum</option>
              </select>
              @error('role')
              <span class="text-danger mt-1">{{$message}}</span>
              @enderror
            </div>
          </div>
          <div class="mb-3">
            <div class="form-group">
              <label for="usuario">Usuário</label>
              <input type="email" class="form-control" id="email" name="email" value="{{old('email',$usuario->email)}}">
              @error('email')
              <span class="text-danger mt-1">{{$message}}</span>
              @enderror
            </div>
          </div>
      
          <div class="mb-3 text-center d-flex flex-column items-center">
            <button type="submit" class="btn btn-primary">Editar</button>
            <a href="{{route('lista_usuarios')}}" class="text-blue-100 mt-2">Voltar</a>
          </div>

        </form>

      </div>
    </x-area-component>
    <main>
</x-main-layout>