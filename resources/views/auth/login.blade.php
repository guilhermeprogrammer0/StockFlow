<x-main-layout titulo="Login" color="fundo-login">
  <main class="container-completo flex justify-center items-center">
    <div class="w-lg imagem">
      <img src="{{asset('imagens/imagem-logo-2.png')}}">
    </div>
    <div class="w-md p-2 mt-3 bg-white rounded flex flex-col justify-center">
      <h1 class="escrito-entrar text-center">Entrar</h1>
      <form action="{{route('login')}}" method="POST" novalidate>
        @csrf
        <div class="mb-3">
          <label for="usuario">Usuário</label>
          <div>
            <input type="email" class="input-form" id="email" name="email">
          </div>
           @error('email')
            <span class="text-red-500 mt-1">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
          <label for="senha">Senha</label>
          <div>
            <input type="password" class="input-form senha" id="password" name="password">
            <i class="fa-solid fa-eye text-center mt-2" id="btn_senha"></i>
          </div>
           @error('password')
            <span class="text-red-500 mt-1">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3 text-center">
          <p><a href="{{route('password.request')}}" class="text-blue-500">Esqueci minha senha</a></p>
        </div>
        <div class="mb-3 text-center">
          <button type="submit" class="btn-main">Entrar</button>
        </div>
      </form>
    </div>
  </main>
</x-main-layout>