<x-main-layout titulo="Login" color="fundo-login">
    <div class="container w-50 p-8 bg-white">
    <form>
    <div class="mb-3">
  <div class="form-group">
    <label for="usuario">Usuário</label>
    <input type="text" class="form-control" id="usuario" placeholder="usuario@mail.com">
    <small  class=""></small>
  </div>
  </div>
  <div class="mb-3">
  <div class="form-group">
    <label for="senha">Senha</label>
    <input type="password" class="form-control" id="senha" placeholder="********">
  </div>
  <div class="mb-3">
  <button type="submit" class="btn btn-primary">Entrar</button>
  </div>
</form>
    </div>
</x-main-layout>