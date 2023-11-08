<?php
// Inclui o arquivo que contém a definição da classe Turma
require_once 'MensagemClass.php';

// Obtém o valor do parâmetro "id" da URL e armazena em variável
$id = $_GET['id'];

// Cria um novo objeto Turma
$mensagem = new Mensagem($id);

// Chama o método "excluir" do objeto Turma
$mensagem->excluir();

// Redireciona o usuário para a página "turmas-listar.php"
header('Location: mensagens-adm.php');
?>