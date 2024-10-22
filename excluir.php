<?php
require ‘db.php’;

if (isset($_GET[‘id’])) {
    $id = $_GET[‘id’];

    
    $stmt = $conn->prepare(“DELETE FROM alunos WHERE id = :id”);
    $stmt->bindParam(‘:id’, $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo “Aluno excluído com sucesso!”;
    } else {
        echo “Erro ao excluir o aluno.”;
    }
}
header(‘Location: listar_alunos.php’);
exit;
?>