<?php
// Inclui o arquivo que contém a definição da classe Turma
require_once "MensagemClass.php";

// Cria um novo objeto Turma
$mensagem = new Mensagem();

// Define as propriedades descTurma e ano do objeto Turma com os valores enviados pelo formulário
$mensagem->email = $_POST['email'];
$mensagem->mensagem = $_POST['mensagem'];

// Chama o método inserir() no objeto Turma para inserir os dados da nova turma no banco de dados
$mensagem->inserir();

?>