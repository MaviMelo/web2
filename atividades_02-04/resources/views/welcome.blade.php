<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Link para a biblioteca Bootstrap Icons via CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body>

    <h1>Tecnologia de Sistemas Para Internet</h1>
    <h3>IFPE</h3>
    <h3>Disciplina: Desenvolvimento WEB II</h3>


    <main>

        <div class="card">
            <h4>Documentação oficial do Laravel:</h4>
            <p> Laravel has an incredibly rich ecosystem. <br>We suggest starting with the following.</p>
            <ul>
                <li>
                    <P>Read the
                        <a href="https://laravel.com/docs" target="_blank">
                            Documentation <i class="bi bi-arrow-up-right-square"></i>
                        </a>
                    </P>
                </li>
                <li>
                    <P>
                        Watch video tutorials at
                        <a href="https://laracasts.com" target="_blank">
                            Laracasts <i class="bi bi-arrow-up-right-square"></i>
                        </a>
                    </P>
                </li>

            </ul>

        </div>

        <div class="card">

            <h4>Atividade 02 - Criar um CRUD no Laravel</h4>
            <p>
                Crie um CRUD no Laravel com um tema a sua escolha.
                Inclua pelo menos 5 campos com tipos de dados diferentes.
                Segue o código do crud de produto como base.
            </p>
            <h5>Resolução da atividade:</h5>
            <p>
                Foi criado o CRUD de gerenciamendo de lista de colaboradores em modalidade de trabalho home-office:
            </p>
            <p>

            </p>
            <lu>
                <li>
                    <p>
                        Ver todos os registros:
                        <a href="{{ route('home_offices.index') }}">
                            index <i class="bi bi-arrow-up-right-square"></i>
                        </a>
                    </p>
                </li>
                <li>
                    <p>
                        Criar novo registro na base de dados:
                        <a href="{{ route('home_offices.create') }}">
                            create <i class="bi bi-arrow-up-right-square"></i>
                        </a>
                    </p>
                </li>
            </lu>

        </div>

    </main>

</body>

</html>