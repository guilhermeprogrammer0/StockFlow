<x-main-layout titulo="Editar fornecedores" color="fundo-padrao">
  <x-logo-component />
  <main class="main-container !h-180">
    <x-menu-component />
    <x-area-component>
      <div class="formulario p-2 mt-3 bg-white rounded text-center">
        <div class="mt-2">
          @if(session('sucesso'))
          <div class="text-green-600 text-2xl bg-green-100 text-center">{{session('sucesso')}}</div>
          @endif
          @if(session('erro'))
          <div class="text-red-600 text-2xl bg-red-100 text-center">{{session('erro')}}</div>
          @endif
        </div>
        <h1 class="escrito-entrar">Edição de fornecedores</h1>
        <form action="{{route('editar_fornecedor_submit')}}" method="POST" novalidate>
          @csrf
          <input type="hidden" name="id" value="{{$fornecedor->id}}">
          <div class="mb-3">
            <label for="usuario">Nome</label>
            <div>
              <input type="text" class="input-form" id="name" name="nome" value="{{old('nome',$fornecedor->nome)}}">
            </div>
            @error('nome')
            <span class="text-red-500 mt-1">{{$message}}</span>
            @enderror
          </div>
          <div class="mb-3">
            <label for="cnpj">CNPJ</label>
            <div>
              <input type="text" class="input-form" id="cnpj" name="cnpj" value="{{old('cnpj',$fornecedor->cnpj)}}">
            </div>
            @error('cnpj')
            <span class="text-red-500 mt-1">{{$message}}</span>
            @enderror
          </div>
          <div class="mb-3">
            <label for="usuario">E-mail</label>
            <div>
              <input type="email" class="input-form" id="email" name="email" value="{{old('email',$fornecedor->email)}}">
            </div>
            @error('email')
            <span class="text-red-500 mt-1">{{$message}}</span>
            @enderror
          </div>
          <div class="mb-3">
              <div><button type="submit" class="btn-main">Editar</button></div>
            <div class="mt-2"><a href="{{route('lista_fornecedores')}}" class="text-blue-500"> Lista de fornecedores </a></div>
          </div>
        </form>
      </div>
    </x-area-component>
    <main>
</x-main-layout>