<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestão Financeira</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <style>
        .navbar-custom {
            background-color: #0b632d; 
        }

        .navbar-custom .nav-link,
        .navbar-custom .navbar-brand {
            color: #ffffff;
            font-weight: 500;
        }

        .navbar-custom .nav-link:hover {
            color: #c6ffd1;
        }

        body {
            background-color: #f2f6f3;
        }

        .content-area {
            background: #ffffff;
            border-radius: 12px;
            padding: 40px;
            margin-top: 30px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.08);
        }
    </style>

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-custom shadow-sm">
        <div class="container-fluid">

            <a class="navbar-brand fw-bold" href="index.php">
                Gestão Financeira
            </a>

            <button class="navbar-toggler" type="button" 
                    data-bs-toggle="collapse" 
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" 
                    aria-expanded="false" 
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            Lançamentos
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="?page=cadastrar-lancamento">Cadastrar</a></li>
                            <li><a class="dropdown-item" href="?page=listar-lancamento">Listar</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            Categorias
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="?page=cadastrar-categoria">Cadastrar</a></li>
                            <li><a class="dropdown-item" href="?page=listar-categoria">Listar</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="?page=saldo">Saldo</a>
                    </li>

                </ul>
            </div>

        </div>
    </nav>

    <div class="container">
        <div class="content-area">

            <?php
                include("config.php");

                switch (@$_REQUEST["page"]) {

                    case "cadastrar-lancamento": include("cadastrar-lancamento.php"); break;
                    case "listar-lancamento": include("listar-lancamento.php"); break;
                    case "editar-lancamento": include("editar-lancamento.php"); break;
                    case "salvar-lancamento": include("salvar-lancamento.php"); break;

                    case "cadastrar-categoria": include("cadastrar-categoria.php"); break;
                    case "listar-categoria": include("listar-categoria.php"); break;
                    case "editar-categoria": include("editar-categoria.php"); break;
                    case "salvar-categoria": include("salvar-categoria.php"); break;

                    case "saldo": include("consultar-saldo.php"); break;

                    default:
                        echo "
                        <h1 class='text-center fw-bold text-success'>Bem-vindo à Gestão Financeira</h1>
                        <p class='text-center text-muted fs-5'>
                            Organize facilmente suas receitas, despesas e categorias financeiras.
                        </p>
                        ";
                }

            ?>

        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>

</body>
</html>
