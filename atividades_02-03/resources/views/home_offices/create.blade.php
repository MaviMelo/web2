<!DOCTYPE html>
<html lang="br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Resgistro de Home Office</title>
    
     <!-- Inclui os assets compilados pelo Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
      <!-- Link para a biblioteca Bootstrap Icons via CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
 
</head>

    <nav>
        <h2>Atividade 02</h2>
        <div>
            <a href="{{ url('/') }}">Home </a>
            <div class="dropdown">
                <button class="dropbtn">Opções <i class="bi bi-three-dots-vertical"></i></button>
                <div class="dropdown-content">
                    <a href="{{ route('home_offices.index') }}">Lista de Colaboradores</a>
                </div>
            </div>
        </div>
    </nav>
<body>
    <h1>Adicionar Resgistro de Home Office</h1>
    <form class="form" action="{{ route('home_offices.store') }}" method="POST">
        @csrf
        <div >
            <label for="collaborator" >Nome do colaborador:</label>
            <input type="text" placeholder="preencha os dados." id="collaborator" name="collaborator" required>            
        </div>

        <div >
        <label for="address" >Endereço: </label>
        <input type="text" placeholder="preencha os dados." id="address" name="address" required>            
        </div>

        <div >
            <label for="function" >Descrição de função: </label>            
            <textarea name="function" id='function' rows="4" cols="50" placeholder="Descreva a função de cargo" required> Cargo: {{"\n"}} Função: {{"\n"}} Observações: {{ old('function') }} </textarea>

        <div >
            <label for="salary" >Valor da remuneração: </label>
            <input type="number" step='0.01' placeholder="preencha os dados." id="salary" name="salary" required>            
        </div>

        <div >
            <label for="date_of_birth" > Data de nascimento: </label>
            <input type="date" placeholder="preencha os dados." id="date_of_birth" name="date_of_birth" required>            
        </div>
        
        <button type="submit" class="btn">
            Salvar <i class="bi bi-send"></i>
        </button>
        
    </form>
</body>
</html>