<?php
include 'db/conexao.php';

// Verifica se o ID foi enviado
if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit;
}

$id = $_GET['id'];

// Deleta o jogo do banco
$sql = "DELETE FROM games WHERE id = $id";
if ($conexao->query($sql)) {
    header('Location: index.php');
    exit;
} else {
    echo 'Erro ao deletar jogo: ' . $conexao->error;
}
?>
