@extends('layouts.app')
@section('title', 'Página Inicial')

@section('content')
    <h1>Unidades</h1>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Nome Fantasia</th>
                <th scope="col">Razão Social</th>
                <th scope="col">CNPJ</th>
                <th scope="col">Total de Colaboradores</th>
            </tr>
            </thead>
            <tbody>
            @foreach($unidades as $unidade)
                <tr>
                    <td>{{ $unidade->nome_fantasia }}</td>
                    <td>{{ $unidade->razao_social }}</td>
                    <td>{{ $unidade->cnpj }}</td>
                    <td>{{ $unidade->colaboradores->count() }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    {{ $unidades->links('pagination::bootstrap-5') }}
@endsection
