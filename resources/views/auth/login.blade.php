<x-main-layout titulo="Login" color="fundo-login">
    <main class="container-completo m-8 d-flex justify-content-center">
      <div class="w-7xs imagem">
        <img src="{{asset('imagens/imagem-logo-2.png')}}">
      </div>
      <div class="container bg-white rounded-md">
      <h1 class="escrito-entrar text-black text-center mt-50">Entrar</h1>
      <form action="{{route('login')}}" method="POST" novalidate>
        @csrf
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
    <i class="fa-solid fa-eye" id="btn_senha"></i>
  </div>
    <div class="mb-3">
    <p><a href="{{route('register')}}" class="link-underline-dark">Não tem conta?</a></p>
    <p><a href="{{route('password.request')}}" class="link-underline-dark">Esqueci minha senha</a></p>
    </div>
    <div class="mb-3">
    <button type="submit" class="btn btn-primary">Entrar</button>
    </div>
  </form>

      </div>
  </main>
  </x-main-layout>