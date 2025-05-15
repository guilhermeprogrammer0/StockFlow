<x-main-layout titulo="Esqueci minha senha" color="fundo-login">
  <main class="container-completo flex justify-center items-center">
    <div class="w-7xs imagem">
      <img src="{{asset('imagens/imagem-logo-2.png')}}">
    </div>
    <div class="w-md p-2 mt-3 bg-white rounded flex flex-col justify-center">
      @if(session('status'))
      <div class="p-10 h-full">
        <p class="text-green-400 text-md bg-green-100 text-center mb-5">E-mail enviado com sucesso, siga as intruções para recuperar a sua senha.</p>
        <p class="text-center"><a href="{{route('login')}}"><span class="btn-main p-3 cursor-pointer"> Voltar ao login </span></a></p>
      </div>
      @else
      <h4 class="escrito-entrar text-black text-center">Enviar e-mail</h4>
      <form action="{{route('password.email')}}" method="POST" novalidate>
        @csrf
        <div class="mb-3">
           <label for="usuario">E-mail</label>
          <div>
            <input type="email" class="input-form" id="email" placeholder="usuario@mail.com" name="email">
          </div>
        </div>
        <p class="text-center"><a href="{{route('login')}}" class="text-blue-500">Lembrei minha senha</a></p>
        <div class="mb-3 text-center">
          <button type="submit" class="btn-main">Enviar</button>
        </div>
        @endif
      </form>



    </div>
  </main>
</x-main-layout>