<div class="logo flex justify-center items-center">
   <img src="{{asset('imagens/imagem-logo-2.png')}}" class="w-1/8">
   <h1 class="color-text-2 text-center mt-2 text-xl lg:text-3xl">Gerenciamento de estoque</h1>
   <p class="absolute top-0 text-sm md:text-lg color-text-2">Olá, <strong> {{Auth::user()->name}}</strong>!</p>
   <form action="{{route('logout')}}" method="POST">
      @csrf
      <button type="submit" class="absolute fa-solid fa-right-from-bracket fa-2x bottom-0 right-0 m-2 text-white cursor-pointer"></button>
   </form>
</div>