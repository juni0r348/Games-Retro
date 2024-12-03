<?php
include 'db/conexao.php';
//dados do GET *-*
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Busca os dados do jogo no banco de dadios
    $sql = "SELECT * FROM games WHERE id = $id";
    $resultado = $conexao->query($sql);

    if ($resultado->num_rows > 0) {
        $jogo = $resultado->fetch_assoc();
    } else {
        echo "Jogo não encontrado.";
        exit;
    }
} else {
    echo "ID não fornecido.";
    exit;
}

// Atualiza os dados do jogo, não esquecer de atualizar o mysql
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $data_lancamento = $_POST['data_lancamento'];
    $plataforma = $_POST['plataforma'];

    $sql = "UPDATE games SET nome = '$nome', data_lancamento = '$data_lancamento', plataforma = '$plataforma' WHERE id = $id";

    if ($conexao->query($sql) === TRUE) {
        header("Location: index.php");
        exit;
    } else {
        echo "Erro ao atualizar jogo: " . $conexao->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Game</title>
    <link rel="stylesheet" href="css/estilo.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap');
    </style>
</head>
<body>
    <h1 class="titulo-adicionar">Editar Game</h1>

    <!-- formulário para editar o jogo -->
    <form action="" method="POST">
        <label for="nome">Nome do Jogo:</label>
        <input type="text" id="nome" name="nome" value="<?= $jogo['nome'] ?>" required><br><br>

        <label for="data_lancamento">Data de Lançamento:</label>
        <input type="date" id="data_lancamento" name="data_lancamento" value="<?= $jogo['data_lancamento'] ?>" required><br><br>
        
           <label for="plataforma">Plataforma:</label> <!--para adiconar opçoes de jogos retro par inserir-->
        <select name="plataforma" id="plataforma" required>
            <option value="PlayStation 1" <?= $jogo['plataforma'] == 'PlayStation 1' ? 'selected' : '' ?>>PlayStation 1</option>
            <option value="PlayStation 2" <?= $jogo['plataforma'] == 'PlayStation 2' ? 'selected' : '' ?>>PlayStation 2</option>
            <option value="Super Nintendo" <?= $jogo['plataforma'] == 'Super Nintendo' ? 'selected' : '' ?>>Super Nintendo</option>
            <option value="Nitendinho" <?= $jogo['plataforma'] == 'Nitendinho' ? 'selected' : '' ?>>Nitendinho</option>
            <option value="Nintendo 64" <?= $jogo['plataforma'] == 'Nintendo 64' ? 'selected' : '' ?>>Nintendo 64</option>
            <option value="Xbox" <?= $jogo['plataforma'] == 'Xbox' ? 'selected' : '' ?>>Xbox</option>
            <option value="Xbox 360" <?= $jogo['plataforma'] == 'Xbox 360' ? 'selected' : '' ?>>Xbox 360</option>
            <option value="NES" <?= $jogo['plataforma'] == 'NES' ? 'selected' : '' ?>>NES</option>
            <option value="Game Boy Color" <?= $jogo['plataforma'] == 'Game Boy Color' ? 'selected' : '' ?>>Game Boy Color</option>
            <option value="PC" <?= $jogo['plataforma'] == 'PC' ? 'selected' : '' ?>>PC</option>
            <option value="Mega Drive" <?= $jogo['plataforma'] == 'Mega Drive' ? 'selected' : '' ?>>Mega Drive</option>
            <option value="Master System" <?= $jogo['plataforma'] == 'Master System' ? 'selected' : '' ?>>Master System</option>
            <option value="Fliperama" <?= $jogo['plataforma'] == 'Fliperama' ? 'selected' : '' ?>>Fliperama</option>
            <option value="Atari" <?= $jogo['plataforma'] == 'Atari' ? 'selected' : '' ?>>Atari</option>
        </select><br><br>

        <button type="submit" class="botao-adicionar">Salvar Alterações</button>
    </form>

    <!-- Botão para voltar -->
    <a href="index.php">
        <button class="botao-voltar">Voltar</button> <!--adiconar no css para estilizar botão-->
    </a>
</body>
</html>
