<x-main-layout titulo="Cadastro fornecedores" color="fundo-padrao">
  <x-logo-component />
  <main class="main-container !h-180">
    <x-menu-component />
    <x-area-component>
      <div class="container bg-white rounded-md">
        <h1 class="escrito-entrar text-black text-center mt-50">Cadastrar</h1>
        <form action="{{route('cadastro_fornecedores_submit')}}" method="POST" novalidate>
          @csrf
          <div class="mb-3">
            <div class="form-group">
              <label for="usuario">Nome</label>
              <input type="text" class="form-control" id="name" name="nome" value="{{old('name')}}">
              @error('name')
              <span class="text-danger mt-1">{{$message}}</span>
              @enderror
            </div>
          </div>
          <div class="mb-3">
            <div class="form-group">
              <label for="cnpj">CNPJ</label>
              <input type="text" class="form-control" id="cnpj" name="cnpj" value="{{old('cnpj')}}">
              @error('cnpj')
              <span class="text-danger mt-1">{{$message}}</span>
              @enderror
            </div>
          </div>
          <div class="mb-3">
            <div class="form-group">
              <label for="usuario">E-mail</label>
              <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">
              @error('email')
              <span class="text-danger mt-1">{{$message}}</span>
              @enderror
            </div>
          </div>
    
          <div class="mb-3 text-center">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
          </div>
        </form>
      </div>
    </x-area-component>
    <main>
</x-main-layout>