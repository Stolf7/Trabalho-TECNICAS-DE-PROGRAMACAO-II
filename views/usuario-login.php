<?php

$nome = $_POST["nome"];
$senha = $_POST["senha"];

$sql = "SELECT * FROM usuarios WHERE nome = :nome AND senha = :senha";

$conexao = new PDO('mysql:host=Localhost;dbname=VoltaAoMundo', 'root', '');

$statement = $conexao->prepare($sql);
$statement->bindParam(':nome', $nome);
$statement->bindParam(':senha', $senha);

$statement->execute();
$linha = $statement->fetch();
$usuario_logado = $linha['nome'];

if ($usuario_logado == null) {
    // Usuário ou senha inválida
    header('Location: erro-login.html');
} else {
    session_start();
    $_SESSION['usuario_logado'] = $usuario_logado;
    header('Location: indexAdm.html');
}
