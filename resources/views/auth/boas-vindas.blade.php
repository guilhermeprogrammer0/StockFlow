<x-main-layout titulo="Boas vindas" color="fundo-login">
    <main class="container-completo flex justify-center items-center">
        <div class="w-md imagem">
            <img src="{{asset('imagens/imagem-logo-2.png')}}">
        </div>
        <div class="w-md p-2 mt-3 bg-white rounded flex flex-col justify-center h-50">
            <p class="text-center">Bem-vindo! Faça login agora mesmo:</p>
           <p class="text-center mt-5"> <a href="{{route('login')}}" class="btn-main"> login </a></p>
        </div>
    </main>
</x-main-layout>