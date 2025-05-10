<x-main-layout titulo="Cadastro usuário" color="fundo-padrao">
  <x-logo-component />
  <main class="main-container !h-180">
    <x-menu-component />
    <x-area-component tipoAlinhamento2="items-start">
      <div class="container bg-white rounded-md mt-2">
        <div class="mt-2">
        @if(session('sucesso'))
          <div class="alert alert-success text-center">{{session('sucesso')}}</div>
          @endif
          @if(session('erro'))
          <div class="alert alert-danger text-center">{{session('erro')}}</div>
          @endif
          </div>
        <h1 class="escrito-entrar text-black text-center mt-50">Cadastro de usuários</h1>
        <form action="{{route('cadastro_usuario')}}" method="POST" novalidate>
          @csrf
          <div class="mb-3">
            <div class="form-group">
              <label for="usuario">Nome</label>
              <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
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
                <option value="administrador">Administrador</option>
                <option value="comum">Comum</option>
              </select>
              @error('role')
              <span class="text-danger mt-1">{{$message}}</span>
              @enderror
            </div>
          </div>
          <div class="mb-3">
            <div class="form-group">
              <label for="usuario">Usuário</label>
              <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">
              @error('email')
              <span class="text-danger mt-1">{{$message}}</span>
              @enderror
            </div>
          </div>

          <div class="mb-3 text-center">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
          </div>
        </form>
      </div>
    </x-area-component>
    <main>
</x-main-layout>