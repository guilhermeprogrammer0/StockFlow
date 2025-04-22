<x-main-layout titulo="Esqueci minha senha" color="fundo-login">
  <main class="container-completo d-flex justify-content-center align-items-center">
    <div class="w-7xs imagem">
      <img src="{{asset('imagens/imagem-logo-2.png')}}">
    </div>
    <div class="container bg-white rounded-md">
      @if(session('status'))
      <div class="container alert alert-primary w-100 text-center mt-3">
        <p>E-mail enviado com sucesso, siga as intruções para recuperar a sua senha.</p>
        <p><a href="{{route('login')}}"><span class="badge badge-primary p-3 cursor-pointer "> Voltar ao login </span></a></p>
      </div>
      @else
      <h4 class="escrito-entrar text-black text-center mt-50">Enviar e-mail</h4>
      <form action="{{route('password.email')}}" method="POST" novalidate>
        @csrf
        <div class="mb-3">
          <div class="form-group">
            <label for="usuario">E-mail</label>
            <input type="email" class="form-control" id="email" placeholder="usuario@mail.com" name="email">
          </div>
        </div>
        <p class="text-center"><a href="{{route('login')}}" class="link-underline-dark">Lembrei minha senha</a></p>
        <div class="mb-3 text-center">
          <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
        @endif
      </form>



    </div>
  </main>
</x-main-layout>