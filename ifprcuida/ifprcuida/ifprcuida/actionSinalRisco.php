<?php
include "conexaoBD.php";
session_start();

// 1. Verifica se o usuário está logado
if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header("Location: formLogin.php");
    exit();
}

// 2. Captura e filtra os dados do formulário e da sessão
$idUsuarioNotificante = $_SESSION['idUsuario'];
$nomeColega          = mysqli_real_escape_string($conn, $_POST['nomeColega']);
$turmaColega         = mysqli_real_escape_string($conn, $_POST['turmaColega']);
$nivelUrgencia       = mysqli_real_escape_string($conn, $_POST['nivelUrgencia']);
$descricaoSinal      = mysqli_real_escape_string($conn, $_POST['descricaoSinal']);
$statusSinalizacao   = "pendente"; // Status inicial do registro

// Mapeamento de cores da Badge para a Urgência
$badgeUrgencia = 'bg-secondary';
if ($nivelUrgencia == 'baixo') {
    $badgeUrgencia = 'bg-info text-dark';
} elseif ($nivelUrgencia == 'medio') {
    $badgeUrgencia = 'bg-warning text-dark';
} elseif ($nivelUrgencia == 'alto') {
    $badgeUrgencia = 'bg-danger';
} elseif ($nivelUrgencia == 'critico') {
    $badgeUrgencia = 'bg-dark';
}

// 3. Insere no banco de dados
$sql = "INSERT INTO sinais_risco (id_usuario_notificante, nome_colega, turma_matricula_colega, nivel_urgencia, descricao_sinal, status_sinalizacao) 
        VALUES ('$idUsuarioNotificante', '$nomeColega', '$turmaColega', '$nivelUrgencia', '$descricaoSinal', '$statusSinalizacao')";

if (mysqli_query($conn, $sql)) {
    
    include "header.php";
    ?>

    <!-- Redireciona automaticamente para o index.php após 4 segundos -->
    <meta http-equiv="refresh" content="4;url=index.php">

    <div class="container d-flex justify-content-center align-items-center my-5">
        <div class="card text-center p-4 shadow-sm border-0" style="max-width: 480px; width: 100%; border-radius: 15px; background-color: #f8f9fa;">
            <div class="card-body">
                
                <!-- Ícone de Sucesso -->
                <div class="mb-3">
                    <i class="bi bi-shield-check text-success" style="font-size: 3.5rem;"></i>
                </div>

                <!-- Título e Mensagem -->
                <h3 class="card-title fw-bold mb-2" style="color: #2b4c2a;">Sinalização Registrada!</h3>
                <p class="card-text text-muted mb-3">
                    A sua sinalização foi enviada com sucesso para a SEPAE.
                </p>

                <!-- Tabela de Resumo dos Dados Sinalizados -->
                <table class="table table-bordered table-sm text-start mb-4">
                    <tr>
                        <th class="bg-light" style="width: 40%;">COLEGA:</th>
                        <td><?php echo htmlspecialchars($nomeColega); ?></td>
                    </tr>
                    <tr>
                        <th class="bg-light">TURMA/CURSO:</th>
                        <td><?php echo !empty($turmaColega) ? htmlspecialchars($turmaColega) : '<em>Não informado</em>'; ?></td>
                    </tr>
                    <tr>
                        <th class="bg-light">URGÊNCIA:</th>
                        <td><span class="badge <?php echo $badgeUrgencia; ?>"><?php echo ucfirst(htmlspecialchars($nivelUrgencia)); ?></span></td>
                    </tr>
                    <tr>
                        <th class="bg-light">SINAIS:</th>
                        <td><?php echo htmlspecialchars($descricaoSinal); ?></td>
                    </tr>
                    <tr>
                        <th class="bg-light">STATUS:</th>
                        <td><span class="badge bg-warning text-dark">Pendente</span></td>
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
    echo "<div class='container my-5 text-center' style='max-width: 600px;'>";
    echo "<div class='alert alert-danger'>Erro ao registrar sinalização de risco: " . mysqli_error($conn) . "</div>";
    echo "<a href='javascript:history.back()' class='btn btn-dark mt-2'>Voltar e Tentar Novamente</a>";
    echo "</div>";
    include "footer.php";
}
?>