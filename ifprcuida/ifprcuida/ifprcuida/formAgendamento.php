<?php 
include("header.php"); 

// Trava de segurança: Redireciona para o login se o usuário não estiver logado
if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header("Location: formLogin.php");
    exit();
}
?>

<div class="d-flex justify-content-center">
    <h2>Agendar Atendimento:</h2>
</div>

<div class="d-flex justify-content-center">
    <form action="actionAgendamento.php" method="POST" class="was-validated" style="width: 100%; max-width: 500px;">
        
        <!-- Data do Agendamento -->
        <div class="form-floating mt-3 mb-3">
            <input type="date" name="dataAgendamento" id="dataAgendamento" class="form-control" required min="<?php echo date('Y-m-d'); ?>">
            <label for="dataAgendamento">Data do Atendimento</label>
            <div class="valid-feedback"></div>
            <div class="invalid-feedback">Por favor, selecione uma data válida.</div>
        </div>

        <!-- Horário do Agendamento -->
        <div class="form-floating mt-3 mb-3">
            <input type="time" name="horarioAgendamento" id="horarioAgendamento" class="form-control" required>
            <label for="horarioAgendamento">Horário</label>
            <div class="valid-feedback"></div>
            <div class="invalid-feedback">Por favor, selecione um horário.</div>
        </div>

        <!-- Motivo do Agendamento -->
        <div class="form-floating mt-3 mb-3">
            <textarea name="motivoAgendamento" id="motivoAgendamento" placeholder="Descreva o motivo" class="form-control" style="height: 120px;" required></textarea>
            <label for="motivoAgendamento">Motivo (Atendimento Psicológico, Pedagógico, etc.)</label>
            <div class="valid-feedback"></div>
            <div class="invalid-feedback">Por favor, descreva brevemente o motivo.</div>
        </div>

        <button type="submit" class="btn btn-outline-dark w-100 py-2">Confirmar Agendamento</button>

    </form>
</div>

<?php include("footer.php"); ?>