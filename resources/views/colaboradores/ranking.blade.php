@extends('layouts.app')
@section('title', 'Página Inicial')

@section('content')
    <h1>Colaboradores</h1>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">CPF</th>
                <th scope="col">E-mail</th>
                <th scope="col">Unidade</th>
                <th scope="col">Cargo</th>
                <th scope="col">Nota</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($colaboradores as $colaborador)
                <tr>
                    <td>{{ $colaborador->nome }}</td>
                    <td>{{ $colaborador->cpf }}</td>
                    <td>{{ $colaborador->email }}</td>
                    <td>{{ $colaborador->unidade->nome_fantasia }}</td>
                    <td>
                        @if ($colaborador->cargoColaborador)
                            {{ $colaborador->cargoColaborador->cargo->cargo }}
                        @endif
                    </td>
                    <td>{{ $colaborador->cargoColaborador->nota_desempenho ?? 'N/A' }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

{{ $colaboradores->links('pagination::bootstrap-5') }}
@endsection
