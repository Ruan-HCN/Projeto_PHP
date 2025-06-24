<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');
        /* Fonte similar à da imagem */

        html {
            height: 100%;
            margin: 0;
            font-family: 'Poppins', sans-serif;
            /* Usando Poppins */
            overflow-x: hidden;
            /* Evitar scroll horizontal */

        }

        .main-container {
            min-height: 100vh;
            background-image: url('../../assets/images/Background.png');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
            display: flex;
            align-items: stretch;
            /* Faz as colunas terem a mesma altura */
        }

        .row.g-0 {
            flex-grow: 1;
            /* Permite que a row ocupe todo o espaço do container */
        }

        .form-column {
            background-color: transparent;
            /* A coluna do formulário em si é transparente */
        }

        .logo-container .logo-img {
            width: 140px;
            /* Ajuste o tamanho conforme seu logo */
            height: 150px;

        }

        .logo-container .logo-text {
            color: #3E6B3E;
            /* Verde escuro para o texto do logo */
            font-weight: 700;
            font-size: 1.8rem;
            /* Tamanho da fonte para "CHECK-UP TIME" */
            letter-spacing: 1px;
        }

        .login-form-wrapper {
            background-color: #94B994;
            /* Verde médio para a caixa do formulário */
            border-radius: 25px;
            /* Bordas bem arredondadas */
            width: 100%;
            max-width: 400px;
            /* Largura máxima da caixa do formulário */
        }

        .input-group-custom {
            position: relative;
        }

        .input-group-custom .input-icon {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: #757575;
            /* Cor cinza para os ícones */
            font-size: 1.1rem;
            z-index: 3;
            /* Para garantir que o ícone fique sobre o input */
        }

        .input-group-custom .input-icon.bi {
            font-size: 1.2rem;
        }


        .form-control-custom {
            background-color: #FFFFFF;
            border-radius: 25px;
            /* Bordas totalmente arredondadas */
            border: 1px solid #E0E0E0;
            /* Borda sutil, quase invisível */
            height: 50px;
            /* Altura dos campos de input */
            padding-left: 50px;
            /* Espaço para o ícone */
            font-size: 0.95rem;
            color: #333;
        }

        .form-control-custom:focus {
            box-shadow: 0 0 0 0.25rem rgba(62, 107, 62, 0.25);
            /* Sombra de foco verde */
            border-color: #3E6B3E;
        }

        .form-control-custom::placeholder {
            color: #A0A0A0;
        }

        .btn-entrar {
            background-color: #689068;
            /* Verde para o botão "Entrar" */
            color: #FFFFFF;
            border: none;
            border-radius: 10px;
            /* Bordas arredondadas para o botão */
            padding: 12px 0;
            font-weight: 600;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }

        .btn-entrar:hover {
            background-color: #5A7F5A;
            /* Tom mais escuro no hover */
            color: #FFFFFF;
            transform: scale(1.05);
            /* Efeito de zoom suave */
        }

        .forgot-password-link {
            color: #505050;
            /* Cinza escuro para o link "Esqueci minha senha" */
            text-decoration: none;
            font-size: 0.85rem;
        }

        .forgot-password-link:hover {
            color: #3E6B3E;
            /* Verde escuro no hover */
            text-decoration: underline;
        }

        .sign-up-text {
            color: #505050;
            /* Cinza escuro */
            font-size: 0.9rem;
        }

        .sign-up-link {
            color: #3E6B3E;
            /* Verde escuro para o link "Clique aqui" */
            font-weight: 600;
            text-decoration: none;
        }

        .sign-up-link:hover {
            color: #305230;
            /* Tom mais escuro no hover */
            text-decoration: underline;
        }

        .image-column {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            /* Espaçamento para não colar nas bordas */
        }

        .stethoscope-img {
            max-width: 85%;
            /* Controla o tamanho máximo do estetoscópio */
            max-height: 85vh;
            object-fit: contain;
            /* Garante que a imagem inteira seja visível */
        }

        /*RESPONSIVIDADE*/

        /* Para telas de tablets e celulares maiores (menores que 768px) */
        @media (max-width: 767.98px) {
            .hero-title {
                font-size: 2.2rem;
                /* Diminui o título principal */
            }

            .hero-text {
                font-size: 1.1rem;
                /* Diminui o texto de apoio */
            }

            .cta-wrapper {
                padding: 15px 30px;
                /* Diminui o padding do wrapper do botão */
            }

            .btn-cta {
                font-size: 1.1rem;
                /* Diminui a fonte do botão */
            }
        }

        /* Para telas de celulares menores (menores que 480px) */
        @media (max-width: 480px) {
            .hero-title {
                font-size: 1.8rem;
                /* Diminui ainda mais o título */
            }

            .hero-text {
                font-size: 1rem;
                /* Diminui ainda mais o texto de apoio */
            }
        }

        /*ESTILOS ADICIONAIS PARA PÁGINA HOME*/

        /* --- BARRA DE NAVEGAÇÃO --- */
        .navbar {
            background-color: transparent;
            position: absolute;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 10;
            padding: 15px 0;
        }

        .logo-img-nav {
            width: 50px;
            /* Tamanho menor para o logo na nav */
            height: auto;
            margin-right: 10px;
        }

        .logo-text-nav {
            color: #3E6B3E;
            font-weight: 700;
            font-size: 1.2rem;
            letter-spacing: 1px;
        }

        /* --- ESTILOS DA BUSCA E ÍCONES --- */
        .search-form {
            position: relative;
        }

        .search-input {
            border-radius: 25px;
            border: 1px solid #ccc;
            padding-left: 20px;
            height: 40px;
            width: 250px;
        }

        .search-input:focus {
            box-shadow: 0 0 0 0.25rem rgba(62, 107, 62, 0.25);
            border-color: #3E6B3E;
        }

        .search-btn {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #757575;
            padding: 0;
        }

        .nav-icon {
            background: none;
            border: none;
            color: #3E6B3E;
            font-size: 2rem;
            /* Tamanho dos ícones de home e menu */
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .nav-icon:hover {
            color: #305230;
        }

        /* --- ESTILOS DO MENU DROPDOWN --- */
        .dropdown-menu {
            border-radius: 15px;
            border: 1px solid #E0E0E0;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 10px 0;
        }

        .dropdown-item {
            color: #333;
            font-weight: 500;
            padding: 8px 20px;
        }

        .dropdown-item:hover {
            background-color: #f0f0f0;
            color: #3E6B3E;
        }

        .dropdown-divider {
            border-top: 1px solid #e9ecef;
        }

        /* --- CONTEÚDO PRINCIPAL --- */
        .main-container-home {
            min-height: 100vh;
            background-image: url(/Projeto_PHP/assets/Background/Background.png), url(/Projeto_PHP/assets/images/image_6a3b60.jpg);
            /* Fallback se o primeiro falhar */
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
            display: flex;
            align-items: center;
            position: relative;
            /* Para o estetoscópio */
        }

        /* Adicionando o estetoscópio como pseudo-elemento para não interferir no conteúdo */
        .main-container-home::after {
            content: '';
            position: absolute;
            right: 0;
            bottom: 0;
            width: 100%;
            /* Ajuste a largura conforme necessário */
            height: 85%;
            /* Ajuste a altura conforme necessário */
            background-image: url(/Projeto_PHP/assets/images/Background.png);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
            display: flex;

        }

        .hero-content {
            position: relative;
            z-index: 2;
            /* Garante que o texto fique na frente da imagem ao fundo. */
            color: #000000;
        }

        .hero-title {
            font-weight: 700;
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .hero-text {
            font-size: 1.1rem;
            line-height: 1.6;
        }

        .cta-wrapper {
            display: inline-block;
            background-color: #689068;
            /* Reutilizando o estilo da caixa de login */
            border-radius: 25px;
            padding: 20px 30px;
            margin-top: 15px;
        }

        .btn-cta {
            color: #FFFFFF;
            font-weight: 700;
            font-size: 1.2rem;
            text-decoration: none;
            transition: transform 0.3s ease;

        }

        .btn-cta:hover {
            color: #FFFFFF;
            transform: scale(1.05);
            /* Efeito de zoom suave */
        }
    </style>

</head>

<body>

    <header class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="index.php?rota=dashboard">
                <img src="/Projeto_PHP/assets/images/logo_clinica-removebg.png" alt="Check-Up Time Logo"
                    class="logo-img-nav">
                <span class="logo-text-nav"></span>
            </a>

            <div class="d-flex align-items-center">
                <form class="search-form me-3 d-none d-lg-flex" role="search">
                    <input class="form-control search-input" type="search" placeholder="Pesquisar..."
                        aria-label="Search">
                    <button class="search-btn" type="submit"><i class="bi bi-search"></i></button>
                </form>

                <div class="dropdown">
                    <button class="nav-icon" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-list"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="index.php?rota=dashboard">Home</a></li>
                        <li><a class="dropdown-item" href="index.php?rota=consulta_create">Agendar</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="index.php?rota=dashboard_usuario">Minha conta</a></li>
                        <li><a class="dropdown-item" href="index.php?rota=consulta_list">Minhas consultas</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <main class="main-container-home">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 mx-auto text-center hero-content">
                    <h1 class="hero-title">BEM VINDO (A) A CHECK-UP TIME!</h1>
                    <p class="hero-text">
                        Aqui na Check-Up Time, sua saúde é nossa prioridade. Contamos com atendimento agendado, médicos
                        qualificados e preços acessíveis para cuidar de você com eficiência e carinho.
                    </p>
                    <p class="hero-text">
                        Estamos sempre perto de você! Visite nossas unidades e faça seus exames ou consultas com
                        conforto e pontualidade.
                    </p>
                    <p class="hero-text mb-4">
                        Clique no botão abaixo e agende agora mesmo seu atendimento!
                    </p>

                    <div class="cta-wrapper">
                        <a href="/Projeto_PHP/views/auth/atendimento.html" class="btn btn-cta">AGENDAR CONSULTA OU
                            EXAME</a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>