<x-main-layout titulo="Cadastro" color="fundo-login">
    <main class="container-completo m-6 d-flex justify-content-center align-items-center">
      <div class="w-7xs imagem">
        <img src="{{asset('imagens/imagem-logo-2.png')}}">
      </div>
      <div class="container bg-white rounded-md">
        
      <h1 class="escrito-entrar text-black text-center mt-50">Cadastrar</h1>
      <form action="{{route('register')}}" method="POST" novalidate>
        @csrf
        <div class="mb-3">
            <div class="form-group">
              <label for="usuario" >Nome</label>
              <input type="text" class="form-control" id="name" placeholder="João" name="name">
              @error('name')
              <span class="text-danger mt-1">{{$message}}</span>
              @enderror
            </div>
          </div>
          <div class="mb-3 teste">
            <div class="d-flex flex-column">
            <label for="role" >Tipo de perfil</label>
              <select class="form-select w-sm p-3 border" name="role">
              <option value="0" selected>Selecione</option>
                <option value="Administrador">Administrador</option>
                <option value="Comum">Comum</option>
              </select>
              @error('role')
              <span class="text-danger mt-1">{{$message}}</span>
              @enderror
          </div>
</div>
      <div class="mb-3">
    <div class="form-group">
      <label for="usuario" >Usuário</label>
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
      </div>
      <i class="fa-solid fa-eye" id="btn_senha"></i>
        </div>
    <div class="mb-3">
    <button type="submit" class="btn btn-primary">Cadastrar</button>
    <p><a href="{{route('login')}}" class="link-underline-dark">Voltar para o login</a></p>
    </div>

  </form>
      </div>
  </main>
  </x-main-layout>