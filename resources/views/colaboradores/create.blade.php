@extends('layouts.app')
@section('title', 'Página Inicial')

@section('content')
    <h1>Cadastrar Colaborador</h1>
    <form action="{{ route('colaboradores.store') }}" method="post">
        @csrf

        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome">
        </div>

        <div class="mb-3">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" class="form-control" name="cpf" id="cpf">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email">
        </div>

        <div class="mb-3">
            <label for="unidade_id" class="form-label">Unidade</label>
            <select class="form-select" name="unidade_id" id="unidade_id">
                <option value="" selected disabled>Selecione</option>
                @foreach($unidades as $unidade)
                    <option value="{{ $unidade->id }}">{{ $unidade->nome_fantasia }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="cargo_id" class="form-label">Cargo</label>
            <select class="form-select" name="cargo_id" id="cargo_id">
                <option value="" selected disabled>Selecione</option>
                @foreach($cargos as $cargo)
                    <option value="{{ $cargo->id }}">{{ $cargo->cargo }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>

@endsection
