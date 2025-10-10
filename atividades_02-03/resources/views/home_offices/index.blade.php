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

    <nav>
        <h2>Atividade 02</h2>
        <div>
            <a href="{{ url('/') }}">Home </a>
            <div class="dropdown">
                <button class="dropbtn">Opções<i class="bi bi-three-dots-vertical"></i></button>
                <div class="dropdown-content">
                    <a href="{{ route('home_offices.create') }}">Cadastrar Novo Colaborador</a>
                </div>
            </div>
        </div>
    </nav>

    <h2> Lista de Colaboradores em Modalidade de Trabalho Home-office</h2>

    <main>
        <table>
            <tr>
                <th>ID</th>
                <th>Colaborador</th>
                <th>Endereço</th>
                <th>Data de Nascimento</th>
                <th>Função</th>
                <th>Remuneração (R$)</th>
                <th>Início de trabalho Remoto</th>
                <th>Opções</th>
            </tr>
            @forelse($home_offices as $home_office)
            <tr>
                <td>{{ $home_office-> id }}</td>
                <td>{{ $home_office-> collaborator }}</td>
                <td>{{ $home_office-> address }}</td>
                <td>{{ $home_office-> date_of_birth }}</td>
                <td>{{ $home_office-> function }}</td>
                <td class="hide">{{ $home_office-> salary }}</td>
                <td>{{ $home_office->created_at }}</td>
                <td>
                    <a href="{{ route('home_offices.show', $home_office) }}">Visualizar</a>
                    <a href="{{ route('home_offices.edit', $home_office) }}">Editar</a>
                    <form action="{{ route('home_offices.destroy', $home_office) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button class="delete" type="submit"> Deletar <i class="bi bi-trash3"></i> </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8">Nenhum registro econtrado. Adicione registros à base de dados primeiro.</td>
            </tr>
            @endforelse
        </table>
    </main>
</body>

</html>
