   @vite(['resources/css/app.css', 'resources/js/app.js'])

<div>

    <!-- Be present above all else. - Naval Ravikant -->
      <nav class="header">
        <a href="{{ url('/') }}" style="text-decoration: none"><h2>Biblioteca  Web 02</h2></a>
        <div>
            <a href="{{ url('/login') }}">Login </a>
            <a href="{{ url('/register') }}">Cadastro </a>
            <div class="dropdown">
                <button class="dropbtn">Opções <i class="bi bi-three-dots-vertical"></i></button>
                <div class="dropdown-content">
                    <a href="{{ route('home_offices.index') }}">Home-office (atividade 02).</a>
                    <a href="{{ route('books.index') }}">Lista de livros.</a>
                    <a href="{{ route('users.index') }}">Lista de usuários (só para administradores).</a>
                    <a href="{{ route('authors.index') }}">Lista de autores (só para admin.).</a>
                    <a href="{{ route('categories.index') }}">Lista de categorias (só para admin.).</a>
                    <a href="{{ route('publishers.index') }}">Lista de publicações (só para admin.).</a>
                </div>
            </div>
        </div>
    </nav>
</div>
