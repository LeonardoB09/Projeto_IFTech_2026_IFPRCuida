<?php
// 1. Inicia e encerra a sessão com segurança
session_start();
session_unset();   // Limpa todas as variáveis de sessão
session_destroy(); // Destrói a sessão ativa

// 2. Inclui o cabeçalho do site
include "header.php";
?>

<!-- Redirecionamento automático após 5 segundos para a página de login -->
<meta http-equiv="refresh" content="5;url=formLogin.php">

<div class="container d-flex justify-content-center align-items-center" style="min-height: 50vh;">
    <div class="card text-center p-4 shadow-sm border-0" style="max-width: 450px; width: 100%; border-radius: 15px; background-color: #f8f9fa;">
        <div class="card-body">
            
            <!-- Ícone de Sucesso -->
            <div class="mb-3">
                <i class="bi bi-check-circle-fill text-success" style="font-size: 3.5rem;"></i>
            </div>

            <!-- Título e Mensagem -->
            <h3 class="card-title fw-bold mb-2">Você saiu do sistema!</h3>
            <p class="card-text text-muted mb-4">
                Sua sessão foi encerrada com segurança. Esperamos te ver em breve!
            </p>

            <!-- Ações -->
            <div class="d-grid gap-2">
                <a href="formLogin.php" class="btn btn-dark btn-lg fs-6">
                    <i class="bi bi-box-arrow-in-right me-2"></i>Fazer Login Novamente
                </a>
                <a href="index.php" class="btn btn-outline-secondary">
                    <i class="bi bi-house-door me-2"></i>Voltar para o Início
                </a>
            </div>

            <p class="text-muted small mt-3 mb-0">
                Você será redirecionado para o login em 5 segundos...
            </p>

        </div>
    </div>
</div>

<?php 
// 3. Inclui o rodapé do site
include "footer.php"; 
?>