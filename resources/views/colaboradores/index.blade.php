@extends('layouts.app')
@section('title', 'Página Inicial')

@section('content')
    <h1>Colaboradores</h1>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Nome</th>
                <th>CPF</th>
                <th>E-mail</th>
                <th>Unidade</th>
                <th>Cargo</th>
                <th>Ações</th>
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
                    <td>
                        <a href="{{ route('colaboradores.gradeedit', ['colaborador' => $colaborador->id]) }}" class="btn btn-primary">Alterar Nota</a>
                        <!-- Adicione mais ações conforme necessário -->
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    {{ $colaboradores->links('pagination::bootstrap-5') }}
@endsection
