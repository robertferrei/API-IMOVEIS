@extends('layout.app')
@section('content')

<div class="container">
    <!-- Mensagem de sucesso (se existir) -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card p-4">
        <h2 class="text-center mb-4">Edição de corretor</h2>
        <form action="{{ route('imoveis-update', ['id' => $imoveis->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group row">
                <div class="col">
                    <label for="cpf">Digite seu CPF:</label>
                    <input type="text" class="form-control @error('cpf') is-invalid @enderror" name="cpf" id="cpf" value="{{ old('cpf', $imoveis->cpf) }}" placeholder="CPF">
                    @error('cpf')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label for="creci">Digite seu CRECI:</label>
                    <input type="text" class="form-control @error('creci') is-invalid @enderror" name="creci" id="creci" value="{{ old('creci', $imoveis->creci) }}" placeholder="CRECI">
                    @error('creci')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="nome">Digite seu nome:</label>
                <input type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" id="nome" value="{{ old('nome', $imoveis->nome) }}" placeholder="Nome">
                @error('nome')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
    </div>
</div>

@endsection
