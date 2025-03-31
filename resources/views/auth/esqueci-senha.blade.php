<x-main-layout titulo="Esqueci minha senha" color="fundo-login">
    <main class="container-completo m-8 d-flex justify-content-center align-items-center">
      <div class="w-7xs imagem">
        <img src="{{asset('imagens/imagem-logo-2.png')}}">
      </div>
      <div class="container bg-white rounded-md">
      <h4 class="escrito-entrar text-black text-center mt-50">Enviar e-mail</h4>
      <form action="{{route('password.email')}}" method="POST" novalidate>
        @csrf
      <div class="mb-3">
    <div class="form-group">
      <label for="usuario" >E-mail</label>
      <input type="email" class="form-control" id="email" placeholder="usuario@mail.com" name="email">
  </div>
    </div>
    <p class="text-center"><a href="{{route('login')}}" class="link-underline-dark">Lembrei minha senha</a></p>
    <div class="mb-3">
    <button type="submit" class="btn btn-primary">Enviar</button>
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
  @if(session('status'))
  <div class="container alert alert-primary w-100 text-center">
    <p>E-mail enviado com sucesso, siga as intruções para recuperar a sua senha.</p>
  </div>
  @endif
 
      </div>
  </main>
  </x-main-layout>