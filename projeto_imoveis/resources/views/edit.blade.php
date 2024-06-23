@extends('layout.app')
@section('content')

<div class="container">
    <div class="card p-4">
        <h2 class="text-center mb-4">Edição de corretor</h2>
        <form action="{{route('imoveis-update',['id'=>$imoveis->id])}}" method="POST">
          @csrf
          @method('PUT')
            <div class="form-group row">
                <div class="col">
                    <label for="cpf">Digite seu CPF:</label>
                    <input type="text" class="form-control" name="cpf" id="cpf" value="{{$imoveis->cpf}}" placeholder="CPF" >
                </div>
                <div class="col">
                    <label for="creci">Digite seu CRECI:</label>
                    <input type="text" class="form-control" name="creci" id="creci" value="{{$imoveis->creci}}"  placeholder="CRECI" >
                </div>
            </div>
            <div class="form-group">
                <label for="nome">Digite seu nome:</label>
                <input type="text" class="form-control" name="nome" id="nome" value="{{$imoveis->nome}}" placeholder="Nome" >
            </div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
    </div>
  </div>

  @endsection
  