<?php require 'config/auth.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>


    <nav class="navbar navbar-dark bg-dark px-3">
        <span class="navbar-brand">Financeiro</span>
        <a href="logout.php" class="btn btn-outline-light btn-sm">Sair</a>
    </nav>


    <div class="container mt-4">
        <div class="row g-3">
            <div class="col-md-4">
                <div class="card p-3">Entradas</div>
            </div>
            <div class="col-md-4">
                <div class="card p-3">Saídas</div>
            </div>
            <div class="col-md-4">
                <div class="card p-3">Saldo</div>
            </div>
        </div>


        <div class="mt-4 d-flex justify-content-between">
            <h5>Lançamentos</h5>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalLancamento">+ Novo</button>
        </div>
    </div>


    <?php include 'views/modal_lancamento.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>