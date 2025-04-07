<div class="logo d-flex justify-center items-center">
   <img src="{{asset('imagens/imagem-logo-3.png')}}" class="w-40">
   <h1 class="color-text">Gerenciamento de estoque</h1>
   <form action="{{route('logout')}}" method="POST">
      @csrf
      <button type="submit" class="absolute btn btn-danger bottom-0 right-0 m-2"> Sair </button>
   </form>
</div>