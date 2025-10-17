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

            <h4>Outras documentações</h4>
            <p> Outras documentações para consultas durante desenvolvimento do projeto.</p>
            <ul>
                <li>
                    <P>
                        Documentação oficial do PHP:
                        <a href="https://www.php.net/manual/pt_BR/language.basic-syntax.php" target="_blank">
                           Manual PHP <i class="bi bi-arrow-up-right-square"></i>
                        </a>
                    </P>
                </li>
                <li>
                    <P>
                        Faker é uma biblioteca PHP que gera dados falsos para você. Seja para inicializar seu banco de dados, criar documentos XML atraentes, preencher sua persistência para testes de estresse ou tornar anônimos dados obtidos de um serviço de produção:
                        <a href="https://fakerphp.github.io/" target="_blank">
                           Faker PHP Documentation <i class="bi bi-arrow-up-right-square"></i>
                        </a>
                    </P>
                </li>
            </ul>

        </div>

        <div class="card">

            <h4>Atividade 01 - Migrations no Laravel</h4>
            <p>
                Use <strong> migrations </strong> no Laravel para criar, modificar e gerenciar a estrutura de tabelas no banco de dados. A atividade envolve a criação de tabelas, aplicação de constraints e definição de relacionamentos entre elas.
            </p>
            <h6>Tarefa: Gerenciamento de um Sistema de Biblioteca</h6>
            <p>
                Nesta atividade, deverá ser criado um sistema básico de gerenciamento de biblioteca que inclui tabelas para <strong> Books, Categories, Publishers </strong> e <strong> Authors </strong>.
            </p>
            <h5>Resolução da atividade:</h5>
            <p>
                Migrations criadas e de acordo com os requisitos que se pede na atividade.
            </p>
            <p>

            </p>
            <lu>
                <li>
                    <p>
                        Ver todos os registros dessa atividade no GitHub (Commit):
                        <a href="https://github.com/MaviMelo/web2/commit/c5d3c2c9479eccbc92611d16a37a346d5bdf489e" target="_blank">
                                MaviMelo/web2 <i class="bi bi-arrow-up-right-square"></i>
                        </a>
                    </p>
                </li>
            </lu>

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

        <div class="card">

            <h4>Atividade 03 - Models, Seeds e Factories no Laravel</h4>
            <p>
                O objetivo desta atividade é entender como criar modelos, configurar relacionamentos, utilizar seeds e factories no Laravel para popular o banco de dados com dados predefinidos e fake.
            </p>
            <h6>Tarefa: Popular o Sistema de Gerenciamento de Biblioteca</h6>
            <p>
                Nesta atividade, você irá criar os modelos para <strong> Book, Category, Publisher </strong> e <strong> Author </strong>, configurar os relacionamentos entre eles e usar factories para gerar melhares de registros de livros e autores utilizando dados fake.
            </p>
            <h5>Resolução da atividade:</h5>
            <p>
                Models, Seeds, e Factories foram criados. As Migrations já criadas e de acordo com os requisitos para fucionar com o que se pede na atividade.
            </p>
            <p>

            </p>
            <lu>
                <li>
                    <p>
                        Ver todos os registros dessa atividade no GitHub (Commit):
                        <a href="https://github.com/MaviMelo/web2/commit/78c8cb36a71bf583c2ce7b7d4da3043fdb92cbbe" target="_blank">
                                MaviMelo/web2 <i class="bi bi-arrow-up-right-square"></i>
                        </a>
                    </p>
                </li>
            </lu>

        </div>

    </main>

</body>

</html>
