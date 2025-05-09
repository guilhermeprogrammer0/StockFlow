<x-main-layout titulo="Editar fornecedores" color="fundo-padrao">
  <x-logo-component />
  <main class="main-container !h-180">
    <x-menu-component />
    <x-area-component tipoAlinhamento2="items-start">
      <div class="container bg-white rounded-md mt-2">
        <div class="mt-2">
          @if(session('sucesso'))
          <div class="alert alert-success text-center">{{session('sucesso')}}</div>
          @endif
          @if(session('erro'))
          <div class="alert alert-success text-center">{{session('erro')}}</div>
          @endif
        </div>
        <h1 class="escrito-entrar text-black text-center mt-50">Edição de fornecedores</h1>
        <form action="{{route('editar_fornecedor_submit')}}" method="POST" novalidate>
          @csrf
          <input type="hidden" name="id" value="{{$fornecedor->id}}">
          <div class="mb-3">
            <div class="form-group">
              <label for="usuario">Nome</label>
              <input type="text" class="form-control" id="name" name="nome" value="{{old('nome',$fornecedor->nome)}}">
              @error('nome')
              <span class="text-danger mt-1">{{$message}}</span>
              @enderror
            </div>
          </div>
          <div class="mb-3">
            <div class="form-group">
              <label for="cnpj">CNPJ</label>
              <input type="text" class="form-control" id="cnpj" name="cnpj" value="{{old('cnpj',$fornecedor->cnpj)}}">
              @error('cnpj')
              <span class="text-danger mt-1">{{$message}}</span>
              @enderror
            </div>
          </div>
          <div class="mb-3">
            <div class="form-group">
              <label for="usuario">E-mail</label>
              <input type="email" class="form-control" id="email" name="email" value="{{old('email',$fornecedor->email)}}">
              @error('email')
              <span class="text-danger mt-1">{{$message}}</span>
              @enderror
            </div>
          </div>
    
          <div class="mb-3 text-center">
            <button type="submit" class="btn btn-primary">Editar</button>
          </div>
        </form>
      </div>
    </x-area-component>
    <main>
</x-main-layout>