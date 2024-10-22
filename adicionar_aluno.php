<?php
include 'db.php';

if ($_SEVER['REQUEST_METHOD'] = 'POST'){
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $stmt = $pdo->prepare("INSERT INTO alunos (nome,email) VALUES (:nome, :email)");
    $stmt ->execute(['nome' => $nome, 'email' => $email]);

    header('location: listar_alunos.php');

}?>

<h2>Adicionar Novo Aluno</h2>
<from method= "POST" action="">
    <label>nome:</label>
    <input type="text" name="nome" required>
    <br>
    <label>Email:</label>
    <input type="email" name="email" required>
    <br>
    <input type= "submit" value="salavar">
</form>
