<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Colaborador</title>

    @vite('resources/css/app.css', 'resources/js/app.js')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body>

    <nav class="header">
        <h2>Atividade 02</h2>
        <div>
            <a href="{{ url('/') }}">Home </a>
            <div class="dropdown">
                <button class="dropbtn">Opções <i class="bi bi-three-dots-vertical"></i></button>
                <div class="dropdown-content">
                    <a href="{{ route('home_offices.index') }}">Lista de Colaboradores</a>
                    <a href="{{ route('home_offices.create') }}">Cadastrar Novo Colaborador</a>
                </div>
            </div>
        </div>
    </nav>

    <h2>Detalhes do Colaborador</h2>

    <div class="card">
        <p><strong>ID:</strong> {{ $home_office ->id }}</p>
        <p><strong>Nome:</strong> {{ $home_office->collaborator }}</p>
        <p><strong>Endereço:</strong> {{ $home_office->address}}</p>
        <p><strong>Descrição de cargo:</strong> {{ $home_office -> function }}</p>
        <p><strong>Data de Nascimento:</strong> {{ $home_office ->  date_of_birth }}</p>
        <p><strong>Salário:</strong> {{ $home_office ->  salary }}</p>
        <p><strong>Dados atualizados em:</strong> {{ $home_office ->  updated_at }}</p>
        <a class="btn" href="{{ route('home_offices.edit', $home_office) }}">Editar</a>
    </div>
</body>

</html>