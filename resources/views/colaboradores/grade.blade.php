<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alterar Nota</title>
</head>
<body>
    <form action="{{ route('colaboradores.gradeupdate', ['colaborador_id' => $colaborador->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="nota_desempenho">Nota de Desempenho</label>
        <input type="number" name="nota_desempenho" id="nota_desempenho" value="{{ $colaborador->nota_desempenho }}">
        <button type="submit">Alterar</button>
    </form>
</body>
</html>
