<?php
include "conexaoBD.php";
session_start();

// 1. Verifica se o usuário está logado
if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header("Location: formLogin.php");
    exit();
}

// 2. Captura e filtra os dados do formulário e da sessão
$idUsuario          = $_SESSION['idUsuario'];
$dataAgendamento    = mysqli_real_escape_string($conn, $_POST['dataAgendamento']);
$horarioAgendamento = mysqli_real_escape_string($conn, $_POST['horarioAgendamento']);
$motivoAgendamento  = mysqli_real_escape_string($conn, $_POST['motivoAgendamento']);
$statusAgendamento  = "Pendente"; // Define o status inicial como Pendente

// Formata a data de AAAA-MM-DD para DD/MM/AAAA para exibir bonito no resumo
$dataFormatada = date("d/m/Y", strtotime($dataAgendamento));

// 3. Insere no banco de dados
$sql = "INSERT INTO agendamento (id_usuario, data_agendamento, horario_agendamento, motivo_agendamento, status_agendamento) 
        VALUES ('$idUsuario', '$dataAgendamento', '$horarioAgendamento', '$motivoAgendamento', '$statusAgendamento')";

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
                    <i class="bi bi-check-circle-fill text-success" style="font-size: 3.5rem;"></i>
                </div>

                <!-- Título e Mensagem -->
                <h3 class="card-title fw-bold mb-2" style="color: #2b4c2a;">Agendamento Solicitado!</h3>
                <p class="card-text text-muted mb-3">
                    Sua solicitação de atendimento foi registrada com sucesso.
                </p>

                <!-- Tabela de Resumo dos Dados Agendados -->
                <table class="table table-bordered table-sm text-start mb-4">
                    <tr>
                        <th class="bg-light" style="width: 35%;">DATA:</th>
                        <td><?php echo $dataFormatada; ?></td>
                    </tr>
                    <tr>
                        <th class="bg-light">HORÁRIO:</th>
                        <td><?php echo htmlspecialchars($horarioAgendamento); ?></td>
                    </tr>
                    <tr>
                        <th class="bg-light">MOTIVO:</th>
                        <td><?php echo htmlspecialchars($motivoAgendamento); ?></td>
                    </tr>
                    <tr>
                        <th class="bg-light">STATUS:</th>
                        <td><span class="badge bg-warning text-dark"><?php echo $statusAgendamento; ?></span></td>
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
    echo "<div class='alert alert-danger'>Erro ao agendar atendimento: " . mysqli_error($conn) . "</div>";
    echo "<a href='javascript:history.back()' class='btn btn-dark mt-2'>Voltar e Tentar Novamente</a>";
    echo "</div>";
    include "footer.php";
}
?>