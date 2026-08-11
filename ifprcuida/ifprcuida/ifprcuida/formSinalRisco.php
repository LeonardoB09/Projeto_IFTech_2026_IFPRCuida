<?php 
include("header.php"); 

// Trava de segurança: Redireciona para o login se o usuário não estiver logado
if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header("Location: formLogin.php");
    exit();
}
?>

<div class="d-flex justify-content-center">
    <h2>Sinalizar Sinal de Risco de Colega:</h2>
</div>

<div class="d-flex justify-content-center">
    <form action="actionSinalRisco.php" method="POST" class="was-validated" style="width: 100%; max-width: 500px;">
        
        <!-- Nome do Colega -->
        <div class="form-floating mt-3 mb-3">
            <input type="text" name="nomeColega" id="nomeColega" class="form-control" placeholder="Nome completo do colega" required>
            <label for="nomeColega">Nome do Colega</label>
            <div class="valid-feedback"></div>
            <div class="invalid-feedback">Por favor, informe o nome do colega.</div>
        </div>

        <!-- Turma ou Matrícula do Colega (Opcional) -->
        <div class="form-floating mt-3 mb-3">
            <input type="text" name="turmaColega" id="turmaColega" class="form-control" placeholder="Turma ou Matrícula (se souber)">
            <label for="turmaColega">Turma / Curso / Matrícula (Opcional)</label>
        </div>

        <!-- Nível de Urgência -->
        <div class="form-floating mt-3 mb-3">
            <select name="nivelUrgencia" id="nivelUrgencia" class="form-select" required>
                <option value="baixo">Baixo (Mudança leve de comportamento)</option>
                <option value="medio" selected>Médio (Isolamento, queda no rendimento)</option>
                <option value="alto">Alto (Relatos de sofrimento intenso)</option>
                <option value="critico">Crítico (Risco imediato à integridade)</option>
            </select>
            <label for="nivelUrgencia">Nível de Urgência Observado</label>
            <div class="invalid-feedback">Por favor, selecione um nível de urgência.</div>
        </div>

        <!-- Descrição dos Sinais Observados -->
        <div class="form-floating mt-3 mb-3">
            <textarea name="descricaoSinal" id="descricaoSinal" placeholder="Descreva os comportamentos observados" class="form-control" style="height: 140px;" required></textarea>
            <label for="descricaoSinal">Descreva os sinais observados (comportamentos, falas, etc.)</label>
            <div class="valid-feedback"></div>
            <div class="invalid-feedback">Por favor, descreva detalhadamente os sinais observados.</div>
        </div>

        <button type="submit" class="btn btn-outline-danger w-100 py-2">Enviar Sinalização</button>

    </form>
</div>

<?php include("footer.php"); ?>