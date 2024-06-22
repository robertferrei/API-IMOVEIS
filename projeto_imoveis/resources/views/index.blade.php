@extends('layout.app')
@section('content')

<div class="container">
  <div class="card p-4">
      <h2 class="text-center mb-4">Cadastro de corretor</h2>
      <form>
          <div class="form-group row">
              <div class="col">
                  <label for="cpf">Digite seu CPF:</label>
                  <input type="text" class="form-control" id="cpf" placeholder="CPF">
              </div>
              <div class="col">
                  <label for="creci">Digite seu CRECI:</label>
                  <input type="text" class="form-control" id="creci" placeholder="CRECI">
              </div>
          </div>
          <div class="form-group">
              <label for="nome">Digite seu nome:</label>
              <input type="text" class="form-control" id="nome" placeholder="Nome">
          </div>
          <button type="submit" class="btn btn-primary">Enviar</button>
      </form>
  </div>
</div>
@endsection