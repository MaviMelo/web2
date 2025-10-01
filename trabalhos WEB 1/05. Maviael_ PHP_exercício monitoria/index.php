
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício Monitoria</title>
</head>
<body>
<h1>Exercício Monitoria</h1>    

<h3>Aluno: Maviael Melo</h3>

<h2>Questão 1:</h2>

<p>Classificar e exibir no navegador o valor da média de todos os estudantes como aprovado (>6), reprovado (<`4) e em recuperação (caso comtrário). </p>

<form method="POST" action="">
    <label for="nota">Nota do aluno(a):</label>
    <input type="number" id="nota" name="nota" step="0.1" placeholder=" Ex.: 8,5" required>
    <button type="submit">Resultado</button>
</form>



<?php 
    if (isset($_POST['nota'])) {
        $nota = floatval($_POST['nota']);

        echo "<h3>Resultado:</h3>";

        if ($nota > 6) {
            echo "<p>Aprovado(a) com nota ".$nota."</p>";
        } elseif ($nota < 4) {
            echo "<p> Reprovado(a) com nota ".$nota."</p>";
        } else {
            echo "Em recuperação (nota: " .$nota. ")</p>";
        };
    };

?>

<h2>Questão 2:</h2>

<p>Receber uma string e exibir quantas vogais há nessa string.</p>

<form method="post" action="">
    <label for="string">Escreva aqui:</label>
    <input type="text" id="string" name="string" placeholder="string" required>
    <button type="submit">Contar vogais</button>
</form>

<?php
    if (isset($_POST['string']) && !empty($_POST['string'])) {
        $string = $_POST['string'];

        $contador_vogais = preg_match_all('/[aeiouáéíóúàãõâêô]/iu', $string);

        echo "<h3>Resultado:</h3>";
        echo "<p>O texto tem <strong>" . $contador_vogais . "</strong> vogais.</p>";
    }
?>





</body>
</html>