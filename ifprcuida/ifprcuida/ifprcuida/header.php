<?php
// Inicia a sessão se ela ainda não estiver ativa
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>IFPR CUIDA</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        
        <style>
            body {
                display: flex;
                flex-direction: column;
                min-height: 100vh;
            }

            .custom-header {
                background-color: #90eb64;
                padding: 1rem 0;
                width: 100%;
                box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            }

            .header-container {
                display: flex;
                align-items: center;
                max-width: 1320px;
                margin: 0 auto;
                padding: 0 1.5rem;
            }

            .logo-link {
                display: flex;
                align-items: center;
                text-decoration: none;
                color: inherit;
            }

            .logo-group {
                display: flex;
                align-items: center;
                gap: 1rem;
            }

            .logo-img {
                height: 110px; /* Altura ideal para o cabeçalho */
                width: auto;  /* Mantém a proporção da imagem */
                object-fit: contain;
            }

            .logo-title {
                margin: 0;
                font-size: 1.5rem;
                font-weight: 700;
                color: #000;
            }

            .logo-subtitle {
                margin: 0;
                font-size: 0.75rem;
                color: #000;
            }

            .custom-nav {
                flex-grow: 1;
                display: flex;
                justify-content: flex-end; /* Alinha o menu e perfil à direita */
            }

            .nav-list {
                list-style: none;
                padding: 0;
                margin: 0;
                display: flex;
                align-items: center; /* Centraliza verticalmente o ícone e os links */
                gap: 2rem;
            }

            .nav-list li a {
                text-decoration: none;
                color: #000;
                text-transform: uppercase;
                font-weight: 600;
                font-size: 0.95rem;
            }

            /* Estilo específico para o menu do usuário logado */
            .user-menu {
                text-transform: none !important;
                display: flex;
                align-items: center;
                gap: 0.5rem;
                background-color: rgba(255, 255, 255, 0.4);
                padding: 0.4rem 0.8rem;
                border-radius: 20px;
                transition: background 0.2s;
            }

            .user-menu:hover {
                background-color: rgba(255, 255, 255, 0.7);
            }

            main {
                flex: 1; /* Garante que o conteúdo empurre o rodapé para o final da página */
            }
        </style>
    </head>
    <body>
        <header class="custom-header">
            <div class="header-container">
                <a href="index.php" class="logo-link">
                    <div class="logo-group">
                        <img src="img/Gemini_Generated_Image_5zjl5x5zjl5x5zjl (2).png" alt="Logo IFPR CUIDA" class="logo-img">
                        <div class="logo-text">
                            <h2 class="logo-title">IFPR CUIDA</h2>
                            <p class="logo-subtitle">Sistema de Apoio à Saúde Mental Estudantil</p>
                        </div>
                    </div>
                </a>
                <nav class="custom-nav">
                    <ul class="nav-list">
                        <li><a href="index.php">INÍCIO</a></li>
                        <li><a href="meusAgendamentos.php">AGENDAMENTOS</a></li>
                        <li><a href="formSinalRisco.php">SINALIZAR AJUDA</a></li>
                        <li><a href="index.php#contact">CONTATOS</a></li>

                        <?php if (isset($_SESSION['logado']) && $_SESSION['logado'] === true): ?>
                            <!-- EXIBIDO APENAS QUANDO LOGADO -->
                            <li class="dropdown">
                                <a href="#" class="user-menu dropdown-toggle text-dark" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-person-circle fs-5"></i>
                                    <span><?php echo htmlspecialchars($_SESSION['nomeUsuario']); ?></span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="dropdownUser">
                                    <li>
                                        <span class="dropdown-item-text text-muted small">
                                            Nível: <strong><?php echo htmlspecialchars($_SESSION['nivelUsuario']); ?></strong>
                                        </span>
                                    </li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <a class="dropdown-item text-danger" href="logout.php">
                                            <i class="bi bi-box-arrow-right me-2"></i>Sair
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        <?php else: ?>
                            <!-- EXIBIDO APENAS QUANDO DESLOGADO -->
                            <li><a href="formUsuario.php">CADASTRAR-SE</a></li>
                            <li><a href="formLogin.php">LOGIN</a></li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
        </header>

        <!-- Abertura do conteúdo principal -->
        <main class="py-5">