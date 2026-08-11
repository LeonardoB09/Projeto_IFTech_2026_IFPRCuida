<?php 
include("conexaoBD.php");
include("header.php"); 

// Trava de segurança: Redireciona para o login se o usuário não estiver logado
if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header("Location: formLogin.php");
    exit();
}

$idUsuario = $_SESSION['idUsuario'];

// Busca apenas os agendamentos do usuário logado
$sql = "SELECT * FROM agendamento WHERE id_usuario = '$idUsuario' ORDER BY data_agendamento DESC, horario_agendamento DESC";
$resultado = mysqli_query($conn, $sql);
?>

<div class="container my-5" style="max-width: 900px;">
    
    <!-- Cabeçalho da Página -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="bi bi-calendar-check me-2"></i>Meus Agendamentos</h2>
        <a href="formAgendamento.php" class="btn btn-outline-dark">
            <i class="bi bi-plus-lg me-1"></i>Novo Agendamento
        </a>
    </div>

    <?php if ($resultado && mysqli_num_rows($resultado) > 0): ?>
        <!-- Tabela de Agendamentos -->
        <div class="table-responsive shadow-sm rounded">
            <table class="table table-hover table-striped align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Data</th>
                        <th scope="col">Horário</th>
                        <th scope="col">Motivo</th>
                        <th scope="col" class="text-center">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($linha = mysqli_fetch_assoc($resultado)): 
                        $dataFormatada    = date("d/m/Y", strtotime($linha['data_agendamento']));
                        $horarioFormatado = date("H:i", strtotime($linha['horario_agendamento']));
                        
                        $statusRaw  = strtolower($linha['status_agendamento']);
                        $badgeClass = 'bg-secondary';

                        if ($statusRaw == 'pendente') {
                            $badgeClass = 'bg-warning text-dark';
                        } elseif ($statusRaw == 'concluido' || $statusRaw == 'concluído') {
                            $badgeClass = 'bg-success';
                        } elseif ($statusRaw == 'cancelado') {
                            $badgeClass = 'bg-danger';
                        }
                    ?>
                        <tr>
                            <td class="fw-bold"><?php echo $dataFormatada; ?></td>
                            <td><?php echo $horarioFormatado; ?></td>
                            <td><?php echo htmlspecialchars($linha['motivo_agendamento']); ?></td>
                            <td class="text-center">
                                <span class="badge <?php echo $badgeClass; ?> px-3 py-2">
                                    <?php echo ucfirst(htmlspecialchars($linha['status_agendamento'])); ?>
                                </span>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>

    <?php else: ?>
        <!-- Card exibido caso não existam agendamentos registrados -->
        <div class="card text-center p-4 shadow-sm border-0" style="border-radius: 15px; background-color: #f8f9fa;">
            <div class="card-body">
                <div class="mb-3">
                    <i class="bi bi-calendar-x text-muted" style="font-size: 3.5rem;"></i>
                </div>
                <h4 class="card-title fw-bold text-muted mb-2">Nenhum agendamento encontrado</h4>
                <p class="card-text text-muted mb-4">
                    Você ainda não possui solicitações de atendimento registradas.
                </p>
                <a href="formAgendamento.php" class="btn btn-success btn-lg fs-6 fw-bold" style="background-color: #00a84f; border: none;">
                    <i class="bi bi-calendar-plus me-2"></i>Solicitar Agendamento
                </a>
            </div>
        </div>
    <?php endif; ?>

</div>

<?php include("footer.php"); ?>