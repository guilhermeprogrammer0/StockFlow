<x-main-layout titulo="Cadastro usuário" color="fundo-padrao">
  <x-logo-component />
  <main class="main-container !h-210">
    <x-menu-component />
    <x-area-component tipoAlinhamento="flex-column">
      <div class="container bg-white rounded-md">
        <h1 class="escrito-entrar text-black text-center mt-50">Cadastrar</h1>
        <form action="{{route('cadastro_usuario')}}" method="POST" novalidate>
          @csrf
          <div class="mb-3">
            <div class="form-group">
              <label for="usuario">Nome</label>
              <input type="text" class="form-control" id="name" placeholder="João" name="name">
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
              <input type="email" class="form-control" id="email" placeholder="usuario@mail.com" name="email">
              @error('email')
              <span class="text-danger mt-1">{{$message}}</span>
              @enderror
            </div>
          </div>
          <div class="mb-3">
            <div class="form-group">
              <label for="senha">Senha</label>
              <input type="password" class="form-control senha" id="password" placeholder="********" name="password">
              @error('password')
              <span class="text-danger mt-1">{{$message}}</span>
              @enderror
            </div>
          </div>
          <div class="mb-3 ">
            <div class="form-group">
              <label for="senha">Confirmar senha</label>
              <input type="password" class="form-control senha" id="password_confirmation" placeholder="********" name="password_confirmation">
              @error('password_confirmation')
              <span class="text-danger mt-1">{{$message}}</span>
              @enderror
              <i class="fa-solid fa-eye mt-2" id="btn_senha"></i>
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