<x-main-layout titulo="Boas vindas" color="fundo-login">
    <main class="container-completo d-flex justify-content-center align-items-center">
        <div class="w-7xs imagem">
            <img src="{{asset('imagens/imagem-logo-2.png')}}">
        </div>
        <div class="container bg-white rounded-md h-50">
            <h1 class="text-blue-200 text-center">Bem - vindo(a)</h1>
            <p class="text-center">Faça login agora mesmo: <a href="{{route('login')}}" class="btn btn-secondary" > login </a></p>
          
    </main>
</x-main-layout>