<?php include("header.php"); ?>

<style>
    /* Estilos específicos para a página principal */
    .hero-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        padding: 2rem 1rem;
    }

    .logo-sepae {
        max-width: 260px;
        height: auto;
        margin-bottom: 2.5rem;
    }

    .hero-title {
        color: #2b4c2a; /* Verde escuro institucional */
        font-size: 1.75rem;
        font-weight: 800;
        letter-spacing: 0.5px;
        margin-bottom: 1.25rem;
        text-transform: uppercase;
    }

    .hero-subtitle {
        color: #4a5568;
        font-size: 1.05rem;
        font-weight: 600;
        max-width: 520px;
        margin-bottom: 2.5rem;
        line-height: 1.4;
    }

    .button-group {
        display: flex;
        flex-direction: column;
        gap: 1rem;
        width: 100%;
        align-items: center;
    }

    /* Estilo dos botões pill (arredondados) em verde */
    .btn-green-action {
        background-color: #00a84f; /* Verde vibrante da imagem */
        color: #ffffff !important;
        font-weight: 700;
        font-size: 1rem;
        padding: 0.9rem 2rem;
        border-radius: 50px; /* Bordas totalmente arredondadas */
        border: none;
        width: 100%;
        max-width: 440px;
        transition: background-color 0.2s, transform 0.2s, box-shadow 0.2s;
        text-decoration: none;
        display: inline-block;
        text-transform: uppercase;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    }

    .btn-green-action:hover {
        background-color: #008c42;
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
    }
</style>

<div class="container hero-container">
    
    
    <img src="img/Gemini_Generated_Image_pi4g6dpi4g6dpi4g.png" alt="Logo SEPAE - Seção Pedagógica e de Assuntos Estudantis" class="logo-sepae"  style="width: 100%; max-width: 400px;">

    <h1 class="hero-title">CUIDANDO DO SEU BEM ESTAR NO IFPR</h1>

    <p class="hero-subtitle">
        Agende atendimentos psicológicos e pedagógicos<br class="d-none d-md-block"> de forma sigilosa e prática.
    </p>

    <div class="button-group">
        <a href="formAgendamento.php" class="btn-green-action">
            AGENDAR ATENDIMENTO
        </a>
        <a href="formSinalRisco.php" class="btn-green-action">
            SINALIZAR AJUDA A UM COLEGA
        </a>
    </div>

</div>

<?php include("footer.php"); ?>