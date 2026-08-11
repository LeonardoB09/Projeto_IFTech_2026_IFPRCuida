<?php
    include "conexaoBD.php"; // Inclui o arquivo de conexão com o BD para consultar usuários
    session_start(); // Função para iniciar uma sessão

    // CORREÇÃO 1: Ajustado para capturar os nomes exatos do formulário (sem o underline)
    $emailUsuario = mysqli_real_escape_string($conn, $_POST['emailUsuario']);
    $senhaUsuario = mysqli_real_escape_string($conn, $_POST['senhaUsuario']);

    // CORREÇÃO 2: Nome da tabela alterado para 'usuarios' em minúsculo
    $buscarLogin = "SELECT *
                    FROM usuarios
                    WHERE email_usuario = '$emailUsuario'
                    AND senha_usuario = md5('$senhaUsuario')";

    // Executa a QUERY
    $efetuarLogin = mysqli_query($conn, $buscarLogin);

    // Verifica se a consulta encontrou algum registro associado
    if($registro = mysqli_fetch_assoc($efetuarLogin)){
        // Criar variáveis de sessão
        $_SESSION['idUsuario']    = $registro['id_usuario'];
        $_SESSION['nomeUsuario']  = $registro['nome_usuario'];
        $_SESSION['emailUsuario'] = $registro['email_usuario'];
        $_SESSION['nivelUsuario'] = $registro['nivel_usuario'];
        $_SESSION['logado']       = true;

        // Redireciona o usuário para a página inicial
        header("Location: index.php");
        exit();
    }
    else{
        // Redireciona o usuário para o formLogin
        header("Location: formLogin.php?erroLogin=dadosInvalidos");
        exit();
    }
?>