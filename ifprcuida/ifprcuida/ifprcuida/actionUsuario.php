<?php
// 1. Requer a conexão no início do arquivo.
require_once "conexaoBD.php";

// Função para filtrar entrada de dados
function filtrar_entrada($dado){
    $dado = trim($dado); // Remove espaços desnecessários
    $dado = stripslashes($dado); // Remove barras invertidas
    $dado = htmlspecialchars($dado); // Converte caracteres especiais em entidades HTML
    return $dado;
}

// Verifica se o método de envio do formUsuario é POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Cria variáveis para armazenar as informações passadas pelo $_POST[]
    $nomeUsuario = $matriculaUsuario = $emailUsuario = $senhaUsuario = $confirmarSenhaUsuario = "";

    // Variável booleana para controle de erros de preenchimento
    $erroPreenchimento = false;

    // Guardaremos as mensagens de erro para exibir formatadas
    $mensagensErro = [];

    // Validação do campo nomeUsuario
    if (empty($_POST["nomeUsuario"])) {
        $mensagensErro[] = "O campo <strong>NOME</strong> é obrigatório!";
        $erroPreenchimento = true;
    } else {
        $nomeUsuario = filtrar_entrada($_POST["nomeUsuario"]);

        if (!preg_match('/^[\p{L} ]+$/u', $nomeUsuario)) {
            $mensagensErro[] = "O campo <strong>NOME</strong> deve conter apenas letras!";
            $erroPreenchimento = true;
        }
    }

    // Validação do campo matriculaUsuario
    if (empty($_POST["matriculaUsuario"])) {
        $mensagensErro[] = "O campo <strong>MATRÍCULA</strong> é obrigatório!";
        $erroPreenchimento = true;
    } else {
        $matriculaUsuario = filtrar_entrada($_POST["matriculaUsuario"]);
    }

    // Validação do campo emailUsuario
    if (empty($_POST["emailUsuario"])) {
        $mensagensErro[] = "O campo <strong>EMAIL</strong> é obrigatório!";
        $erroPreenchimento = true;
    } else {
        $emailUsuario = filtrar_entrada($_POST["emailUsuario"]);
    }

    // Validação do campo senhaUsuario
    if (empty($_POST["senhaUsuario"])) {
        $mensagensErro[] = "O campo <strong>SENHA</strong> é obrigatório!";
        $erroPreenchimento = true;
    } else {
        $senhaUsuario = md5(filtrar_entrada($_POST["senhaUsuario"]));
    }

    // Validação do campo confirmarSenhaUsuario
    if (empty($_POST["confirmarSenhaUsuario"])) {
        $mensagensErro[] = "O campo <strong>CONFIRMAR SENHA</strong> é obrigatório!";
        $erroPreenchimento = true;
    } else {
        $confirmarSenhaUsuario = md5(filtrar_entrada($_POST["confirmarSenhaUsuario"]));

        if ($senhaUsuario != $confirmarSenhaUsuario) {
            $mensagensErro[] = "As <strong>SENHAS</strong> informadas são diferentes!";
            $erroPreenchimento = true;
        }
    }

    // SE HOUVER ERROS DE PREENCHIMENTO:
    if ($erroPreenchimento) {
        include "header.php";
        echo "<div class='container my-4' style='max-width: 600px;'>";
        foreach ($mensagensErro as $erro) {
            echo "<div class='alert alert-warning text-center'>$erro</div>";
        }
        echo "<div class='text-center mt-3'><a href='javascript:history.back()' class='btn btn-dark'>Voltar e Corrigir</a></div>";
        echo "</div>";
        include "footer.php";
    } 
    // SE NÃO HOUVER ERROS: Tenta gravar no banco e exibe a Tela de Sucesso
    else {
        
        // Ajustado para 'usuarios' em minúsculo (evita incompatibilidades no MySQL/Linux)
        $inserirUsuario = "INSERT INTO usuarios (nome_usuario, matricula_usuario, email_usuario, senha_usuario, nivel_usuario)
                           VALUES ('$nomeUsuario', '$matriculaUsuario', '$emailUsuario', '$senhaUsuario', 'Estudante')";

        if (mysqli_query($conn, $inserirUsuario)) {
            
            include "header.php";
            ?>

            <!-- Redireciona automaticamente para o index.php após 4 segundos -->
            <meta http-equiv="refresh" content="4;url=index.php">

            <div class="container d-flex justify-content-center align-items-center my-5">
                <div class="card text-center p-4 shadow-sm border-0" style="max-width: 480px; width: 100%; border-radius: 15px; background-color: #f8f9fa;">
                    <div class="card-body">
                        
                        <!-- Ícone de Sucesso -->
                        <div class="mb-3">
                            <i class="bi bi-check-circle-fill text-success" style="font-size: 3.5rem;"></i>
                        </div>

                        <!-- Título e Mensagem -->
                        <h3 class="card-title fw-bold mb-2" style="color: #2b4c2a;">Cadastro Realizado!</h3>
                        <p class="card-text text-muted mb-3">
                            Os dados do usuário foram cadastrados com sucesso.
                        </p>

                        <!-- Tabela de Confirmação dos Dados Cadastrados -->
                        <table class="table table-bordered table-sm text-start mb-4">
                            <tr>
                                <th class="bg-light" style="width: 35%;">NOME:</th>
                                <td><?php echo $nomeUsuario; ?></td>
                            </tr>
                            <tr>
                                <th class="bg-light">MATRÍCULA:</th>
                                <td><?php echo $matriculaUsuario; ?></td>
                            </tr>
                            <tr>
                                <th class="bg-light">EMAIL:</th>
                                <td><?php echo $emailUsuario; ?></td>
                            </tr>
                        </table>

                        <!-- Botão de Ação Imediata -->
                        <div class="d-grid gap-2">
                            <a href="index.php" class="btn btn-success btn-lg fs-6 fw-bold" style="background-color: #00a84f; border: none;">
                                <i class="bi bi-house-door me-2"></i>Ir para o Início
                            </a>
                        </div>

                        <p class="text-muted small mt-3 mb-0">
                            Redirecionando para a página inicial em 4 segundos...
                        </p>

                    </div>
                </div>
            </div>

            <?php
            include "footer.php";

        } else {
            include "header.php";
            echo "<div class='container my-4 text-center' style='max-width: 600px;'>";
            echo "<div class='alert alert-danger'>Erro ao tentar cadastrar <strong>USUÁRIO</strong> no banco de dados: " . mysqli_error($conn) . "</div>";
            echo "<a href='javascript:history.back()' class='btn btn-dark mt-2'>Voltar</a>";
            echo "</div>";
            include "footer.php";
        }
    }
} else {
    header("location:formUsuario.php");
    exit();
}
?>