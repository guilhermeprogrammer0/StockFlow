<x-main-layout titulo="Cadastro clientes" color="fundo-padrao">
  <x-logo-component />
  <main class="main-container !h-180">
    <x-menu-component />
    <x-area-component>
      <div class="formulario p-2 mt-3 bg-white rounded">
          <div class="mt-2">
                    @if(session('sucesso'))
                    <div class="text-green-400 text-2xl bg-green-100 text-center">{{session('sucesso')}}</div>
                    @endif
                    @if(session('erro'))
                    <div class="text-red-400 text-2xl bg-red-100 text-center">{{session('erro')}}</div>
                    @endif
                </div>
        <h1 class="escrito-entrar">Cadastro de clientes</h1>
        <form action="{{route('cadastro_clientes_submit')}}" method="POST" novalidate>
          @csrf
          <div class="mb-3">
             <label for="usuario">Nome</label>
            <div>
              <input type="text" class="input-form" id="name" name="nome" value="{{old('nome')}}">
            </div>
              @error('nome')
              <span class="text-red-500 mt-1">{{$message}}</span>
              @enderror
          </div>
          <div class="mb-3">
             <label for="usuario">E-mail</label>
            <div>
              <input type="email" class="input-form" id="email" name="email" value="{{old('email')}}">
            </div>
              @error('email')
              <span class="text-red-500 mt-1">{{$message}}</span>
              @enderror
          </div>
          <div class="mb-3">
            <button type="submit" class="btn-main">Cadastrar</button>
          </div>
        </form>
      </div>
    </x-area-component>
    <main>
</x-main-layout>