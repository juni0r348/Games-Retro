<?php
include 'db/conexao.php';

// busca todos os jogos no banco de dados 
$sql = "SELECT id, nome, DATE_FORMAT(data_lancamento, '%d/%m/%Y') AS data_lancamento_formatada, plataforma FROM games";
$resultado = $conexao->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Games Retro</title>

    <!-- Importação do google fonts-->
    <link rel="stylesheet" href="css/estilo.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Press+Start+2P&family=Jersey+25&family=VT323&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&display=swap');
        
        /* Adiciona pontos entras as informaçõs na tabela para adicionar um estilo retro como dos games  */
        td, th {
            padding-right: 15px;  
        }

        
        td::after {
            content: "....................................";  
            padding-left: 10px;  
        }

        
        td:last-child::after {
            content: ""; 
        }

        
        th::after {
            content: "";
        }
    </style>
</head>
<body>
    <!-- Título -->
    <h1>GAMES RETRO</h1>

    <!-- Subtítulo -->
    <p class="subtitulo">List!</p>

    <!-- Botão de Adicionar -->
    <a href="adicionar.php">
        <button class="botao-quadrado">ADICIONAR GAME</button>
    </a>

    <!-- Tabela dor de cabeça -->
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Data de Lançamento</th>
            <th>Plataforma</th>
            <th>Ações</th>
        </tr>
        <?php while ($linha = $resultado->fetch_assoc()): ?>
        <tr>
            <td><?= $linha['id'] ?></td>
            <td><?= $linha['nome'] ?></td>
            <td><?= $linha['data_lancamento_formatada'] ?></td>
            <td><?= $linha['plataforma'] ?></td>
            <td>
                <a href="editar.php?id=<?= $linha['id'] ?>">Editar</a>
                <a href="deletar.php?id=<?= $linha['id'] ?>">Deletar</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
