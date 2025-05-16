<x-main-layout titulo="Novo usuário - Definir senha" color="fundo-login">
    <main class="container-completo flex justify-center items-center">
        <div class="w-md imagem">
            <img src="{{asset('imagens/imagem-logo-2.png')}}">
        </div>
        <div class="w-md p-5 mt-3 bg-white rounded flex flex-col justify-center">
            <h1 class="escrito-entrar text-center">Definir senha</h1>
            <form action="{{route('novo_usuario_senha')}}" method="POST" novalidate>
                @csrf
                <input type="hidden" name="token" value="{{$token}}">
                <div class="mb-3">
                     <label for="senha">Senha</label>
                    <div>
                        <input type="password" class="input-form senha" id="password" name="password">
                    </div>
                     @error('password')
                        <span class="text-red-500 mt-1">{{$message}}</span>
                        @enderror
                </div>
                <div class="mb-3">
                     <label for="senha">Confirmar senha</label>
                    <div>
                        <input type="password" class="input-form senha" id="password_confirmation" name="password_confirmation">
                        <i class="fa-solid fa-eye mt-2" id="btn_senha"></i>
                    </div>
                      @error('password_confirmation')
                        <span class="text-red-500 mt-1">{{$message}}</span>
                        @enderror
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn-main">Entrar</button>
                </div>
            </form>
        </div>
    </main>
</x-main-layout>