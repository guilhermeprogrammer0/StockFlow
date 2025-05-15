<x-main-layout titulo="Resetar senha" color="fundo-login">
  <main class="container-completo flex justify-center items-center">
    <div class="w-md imagem">
      <img src="{{asset('imagens/imagem-logo-2.png')}}">
    </div>
    <div class="w-md p-2 mt-3 bg-white rounded flex flex-col justify-center">
      <h1 class="escrito-entrar text-center">Recuperar senha</h1>
      <form action="{{route('password.update')}}" method="POST" novalidate>
        @csrf
        <input type="hidden" name="token" value="{{$request->route('token')}}">
        <div class="mb-3">
          <label for="usuario">E-mail</label>
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
          </div>
          @error('password')
          <span class="text-red-500 mt-1">{{$message}}</span>
          @enderror
        </div>
        <div class="mb-3">
          <label for="senha">Confirmar senha</label>
          <div>
            <input type="password" class="input-form senha" id="password_confirmation" name="password_confirmation">
             <i class="fa-solid fa-eye mt-2" id="btn_senha"></i>
          </div>
          @error('password_confirmation')
          <span class="text-red-500 mt-1">{{$message}}</span>
          @enderror
        
        </div>
    <div class="mb-3 text-center">
      <button type="submit" class="btn-main">Recuperar</button>
    </div>
    </form>
    </div>
  </main>
</x-main-layout>