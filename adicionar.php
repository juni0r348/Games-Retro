<?php
include 'db/conexao.php';

// Verificar formulário, dor de cabeça
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $data_lancamento = $_POST['data_lancamento'];
    $plataforma = $_POST['plataforma'];

    // banco de dados inserir , dor de cabe
    $sql = $conexao->prepare("INSERT INTO games (nome, data_lancamento, plataforma) VALUES (?, ?, ?)");
    $sql->bind_param("sss", $nome, $data_lancamento, $plataforma);

    if ($sql->execute()) {
        echo "Novo jogo adicionado com sucesso!";
    } else {
        echo "Erro ao adicionar jogo: " . $conexao->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Jogo</title>

    <!-- importação para a fonte -->
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">

    <!-- importação do CSS -->
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>

    <!-- Título da Página -->
    <h1 class="tituloadd">Adicionar Jogo</h1>

    <!-- formulaário adicionar (C)  -->
    <form action="adicionar.php" method="POST">
        <label for="nome">Nome do Jogo:</label>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="data_lancamento">Data de Lançamento:</label>
        <input type="date" id="data_lancamento" name="data_lancamento" required><br><br>

        
        <label for="plataforma">Plataforma:</label>
        <select name="plataforma" id="plataforma" required>
            <option value="PlayStation 1">PlayStation 1</option>
            <option value="PlayStation 2">PlayStation 2</option>
            <option value="Super Nintendo">Super Nintendo</option>
            <option value="Nitendinho">Nitendinho</option>
            <option value="Nintendo 64">Nintendo 64</option>
            <option value="Xbox">Xbox</option>
            <option value="Xbox 360">Xbox 360</option>
            <option value="NES">NES</option>
            <option value="Game Boy Color">Game Boy Color</option>
            <option value="PC">PC</option>
            <option value="Mega Drive">Mega Drive</option>
            <option value="Master System">Master System</option>
            <option value="Fliperama">Fliperama</option>
            <option value="Atari">Atari</option>
        </select><br><br>

        <!-- botão de Adicionar Jogo -->
        <button type="submit" class="botao-jogo">Adicionar Jogo</button>
    </form>

    <!-- botão de Voltar -->
    <a href="index.php">
        <button class="botao-voltar">Voltar</button>
    </a>

</body>
</html>
