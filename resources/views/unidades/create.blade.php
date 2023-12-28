@extends('layouts.app')
@section('title', 'Página Inicial')

@section('content')
    <form action="{{ route('unidades.store') }}" method="post">
        @csrf

        <div class="mb-3">
            <label for="nome_fantasia" class="form-label">Nome Fantasia</label>
            <input type="text" class="form-control" name="nome_fantasia" id="nome_fantasia">
        </div>

        <div class="mb-3">
            <label for="razao_social" class="form-label">Razão Social</label>
            <input type="text" class="form-control" name="razao_social" id="razao_social">
        </div>

        <div class="mb-3">
            <label for="cnpj" class="form-label">CNPJ</label>
            <input type="text" class="form-control" name="cnpj" id="cnpj">
        </div>

        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>

@endsection
