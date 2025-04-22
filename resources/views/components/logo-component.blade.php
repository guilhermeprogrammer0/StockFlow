<div class="logo d-flex justify-center items-center ">
   <img src="{{asset('imagens/imagem-logo-3.png')}}" class="w-40">
   <h1 class="color-text">Gerenciamento de estoque</h1>
   <p class="absolute top-0 right-0 m-2">Olá, <strong> {{Auth::user()->name}}</strong>!</p>
   <form action="{{route('logout')}}" method="POST">
      @csrf
      <button type="submit" class="absolute fa-solid fa-right-from-bracket fa-2x bottom-0 right-0 m-2 text-red-600 cursor:pointer"></button>
   </form>
</div>