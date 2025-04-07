<x-main-layout titulo="Resetar senha" color="fundo-login">
    <main class="container-completo d-flex justify-content-center align-items-center">
      <div class="w-7xs imagem">
        <img src="{{asset('imagens/imagem-logo-2.png')}}">
      </div>
      <div class="container bg-white rounded-md">
      <h1 class="escrito-entrar text-black text-center mt-50">Recuperar senha</h1>
      <form action="{{route('password.update')}}" method="POST" novalidate>
        @csrf
        <input type="hidden" name="token" value="{{$request->route('token')}}">
        <div class="mb-3">
    <div class="form-group">
      <label for="usuario" >E-mail</label>
      <input type="email" class="form-control" id="email" placeholder="usuario@mail.com" name="email">
      @error('email')
              <span class="text-danger mt-1">{{$message}}</span>
      @enderror
    </div>
    </div>
        <div class="mb-3 ">
    <div class="form-group">
      <label for="senha">Senha</label>
      <input type="password" class="form-control senha" id="password" placeholder="********" name="password">
      @error('password')
              <span class="text-danger mt-1">{{$message}}</span>
      @enderror
    </div>
    <div class="mb-3">
        <div class="form-group">
          <label for="senha">Confirmar senha</label>
          <input type="password" class="form-control senha" id="password_confirmation" placeholder="********" name="password_confirmation"> 
          @error('password_confirmation')
              <span class="text-danger mt-1">{{$message}}</span>
      @enderror
      <i class="fa-solid fa-eye" id="btn_senha"></i>
      </div>
  
        </div>
    <div class="mb-3 text-center">
    <button type="submit" class="btn btn-primary">Recuperar</button>
    </div>
  </form>
 
      </div>
  </main>
  </x-main-layout>