<?php

session_start();

// Verificar se a sessão de administrador não está definida
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    // Redirecionar para a página de login ou exibir uma mensagem de erro
    header("Location: pagina_de_login.php");
    exit();
}

    require_once "MensagemClass.php";
    $mensagem = new mensagem();
    $mensagens = $mensagem->listar();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Meu css -->
    <link rel="stylesheet" href="../css/style.css">

    <style>
        /* Estilo para a caixa de login */
        .caixa-administrador {
            background-color: #000;
            padding: 20px;
            border-radius: 5px;
            margin-top: 20px;
        }

        /* Estilizando texto dentro da caixa de login */
        .caixa-administrador label {
            color: #fff; /* Cor do texto */
        }

        /* Estilizando inputs dentro da caixa de login */
        .caixa-administrador input {
            background-color: #333;
            color: #fff;
            border: 1px solid #666;
        }

        /* Estilizando botão dentro da caixa de login */
        .caixa-administrador button {
            background-color: #fff; /* Alterado para branco */
            color: #000; /* Cor do texto do botão */
            border: 1px solid #fff; /* Adiciona uma borda branca para destacar o botão */
        }

        .caixa-administrador button:hover {
            background-color: transparent;
            border-color: white;
        }
    </style>

    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">

    <title>Argentina | Ler Mensagens</title>
</head>
<body>

<header>

    <nav class="navbar nav-texto-index navbar-expand-lg navbar-light bg-personalizado-sobre">
        <div class="d-flex navbar-brand">
            <img class="icone-nav-branco" src="../img/aviao.png" width="65" height="65" alt="" srcset="">
            <div class="barra-pequena-branca"><span class="texto-logo">Argentina</span></div>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link texto-nav" href="../views/index.html">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link texto-nav" href="../views/sobre.html">Sobre</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link texto-nav" href="../views/fale-conosco.html">Fale Conosco</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link texto-nav" href="pagina-login.html">Entrar</a>
                </li>
            </ul>
        </div>
    </nav>
    </header>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2 class="text-center mt-2" style="color: black; text-transform: uppercase;">Mensagens</h2>
                
                    
                    <!-- Lista de mensagens recebidas com opção de dar baixa -->
                    <?php
foreach ($mensagens as $a) {
    // Verifica se a chave 'id' está definida no array $a antes de acessá-la
    if (isset($a['id'])) {
        echo '<div class="caixa-administrador mt-5 mb-5">';
        echo '<div class="mensagem text-white">';
        echo '<p>E-mail: ' . $a['email'] . '</p>';
        echo '<p>Mensagem: ' . $a['mensagem'] . '</p>';
        echo '<a href="mensagens-excluir.php?id=' . $a['id'] . '" class="btn btn-primary">Dar Baixa</a>';
        echo '</div>';
        echo '</div>';
    } else {
        // Trate o caso em que 'id' não está definido no array
        echo 'ID não encontrado para esta mensagem.';
    }
}
?>


                    <!-- Mais mensagens aqui -->
                
            </div>
        </div>
    </div>


</body>
</html>
