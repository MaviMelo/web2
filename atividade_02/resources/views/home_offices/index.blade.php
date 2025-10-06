<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Colaboradores em Modalidade de Trabalho Home-office</title>

    <!-- Inclui os assets compilados pelo Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Link para a biblioteca Bootstrap Icons via CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body>
    <h2> Lista de Colaboradores em Modalidade de Trabalho Home-office</h2>
    <main>
        <table>
            <tr>
                <th>ID</th>
                <th>Colaborador</th>
                <th>Endereço</th>
                <th>Data de Nascimento</th>
                <th>Função</th>
                <th>Remuneração</th>
                <th>Início de trabalho Remoto</th>
                <th>Opções</th>
            </tr>
            @foreach($home_offices as $home_office)
            <tr>
                <td>{{ $home_office-> id }}</td>
                <td>{{ $home_office-> collaborator }}</td>
                <td>{{ $home_office-> address }}</td>
                <td>{{ $home_office-> date_of_birth }}</td>
                <td>{{ $home_office-> function }}</td>
                <td>{{ $home_office-> salary }}</td>
                <td>{{ $home_office->timestampss }}</td>
                <td></td>
            </tr>
            @endforeach
        </table>
    </main>
</body>

</html>