<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestão de Receitas e Despesas</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-lg sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold fs-4" href="#">
                <i class="bi bi-currency-dollar me-2"></i>Gestão Financeira
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                    data-bs-target="#navbarNav" aria-controls="navbarNav" 
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php"><i class="bi bi-house-door-fill me-1"></i>Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="bi bi-journal-text me-1"></i>Lançamentos
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item" href="cadastrar-lancamento.php">Cadastrar</a></li>
                            <li><a class="dropdown-item" href="listar-lancamento.php">Listar</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="bi bi-tags-fill me-1"></i>Categorias
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item" href="cadastrar-categoria.php">Cadastrar</a></li>
                            <li><a class="dropdown-item" href="listar-categoria.php">Listar</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="consultar-saldo.php"><i class="bi bi-cash-stack me-1"></i>Consultar Saldo</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container my-5">
        <header class="p-4 p-md-5 mb-4 text-center text-white bg-primary rounded-3 shadow">
            <h1 class="display-4 fw-light page-title">Bem-vindo à Gestão de Receitas e Despesas</h1>
            <p class="lead">Mantenha seu controle financeiro organizado e acessível.</p>
        </header>

        <section class="row g-4">
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-success shadow-sm hover-grow">
                    <div class="card-body text-center">
                        <i class="bi bi-plus-circle-fill text-success" style="font-size: 3rem;"></i>
                        <h5 class="card-title mt-3">Novo Lançamento</h5>
                        <p class="card-text text-muted">Registre receitas ou despesas rapidamente.</p>
                        <a href="cadastrar-lancamento.php" class="btn btn-success mt-2">Cadastrar</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-info shadow-sm hover-grow">
                    <div class="card-body text-center">
                        <i class="bi bi-list-columns-reverse text-info" style="font-size: 3rem;"></i>
                        <h5 class="card-title mt-3">Ver Lançamentos</h5>
                        <p class="card-text text-muted">Visualize e edite todas as suas transações.</p>
                        <a href="listar-lancamento.php" class="btn btn-info text-white mt-2">Listar</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-12 col-lg-4">
                <div class="card h-100 border-warning shadow-sm hover-grow">
                    <div class="card-body text-center">
                        <i class="bi bi-wallet-fill text-warning" style="font-size: 3rem;"></i>
                        <h5 class="card-title mt-3">Consultar Saldo</h5>
                        <p class="card-text text-muted">Acompanhe o saldo atual das suas contas.</p>
                        <a href="consultar-saldo.php" class="btn btn-warning text-dark mt-2">Saldo</a>
                    </div>
                </div>
            </div>

        </section>
    </main>

    <footer class="bg-dark text-white-50 text-center py-3 mt-5">
        <div class="container">
            <small>&copy; 2024 Gestão Financeira. Todos os direitos reservados.</small>
        </div>
    </footer>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>