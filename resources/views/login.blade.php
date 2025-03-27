<x-main-layout titulo="Login" color="fundo-login">
  <main class="container-completo m-8 d-flex justify-content-center align-items-center">
    <div class="w-7xs imagem">
      <img src="{{asset('imagens/imagem-logo-2.png')}}">
    </div>
    <div class="container bg-white rounded-md">
    <h1 class="escrito-entrar text-black text-center mt-50">Entrar:</h1>
    <form action="{{route('login_submit')}}" method="POST">
      @csrf
    <div class="mb-3">
  <div class="form-group">
    <label for="usuario" >Usuário</label>
    <input type="text" class="form-control" id="usuario" placeholder="usuario@mail.com" name="usuario">
    @error('usuario')
    <div  class="text-red-700" role="alert">
    {{$message}}
</div>
    @enderror
  </div>
  </div>
  <div class="mb-3 ">
  <div class="form-group">
    <label for="senha">Senha</label>
    <input type="password" class="form-control" id="senha" placeholder="********" name="senha">
    @error('senha')
    <div  class="text-red-700" role="alert">
    {{$message}}
</div>
    @enderror
  </div>
  @if(session('login'))
    <div class="alert alert-danger">
        {{ session('login') }}
    </div>
@endif
  <div class="mb-3">
  <button type="submit" class="btn btn-primary">Entrar</button>
  </div>
</form>
    </div>
</main>
</x-main-layout>