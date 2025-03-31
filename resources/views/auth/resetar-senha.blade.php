<x-main-layout titulo="Resetar senha" color="fundo-login">
    <main class="container-completo m-8 d-flex justify-content-center align-items-center">
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
    </div>
    </div>
        <div class="mb-3 ">
    <div class="form-group">
      <label for="senha">Senha</label>
      <input type="password" class="form-control" id="password" placeholder="********" name="password">
    </div>
    <div class="mb-3 ">
        <div class="form-group">
          <label for="senha">Confirmar senha</label>
          <input type="password" class="form-control" id="password_confirmation" placeholder="********" name="password_confirmation"> 
      </div>
        </div>
    <div class="mb-3">
    <button type="submit" class="btn btn-primary">Recuperar</button>
    </div>
    @if($errors->any())
    <div class="text-danger">
      <ul> @foreach($errors->all() as $error)
          <li>{{$error}}</li> 
          @endforeach 
         </ul> 
     </div> 
     @endif
  </form>
 
      </div>
  </main>
  </x-main-layout>