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
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalLancamento">
                + Novo
            </button>
        </div>

        <table class="table table-striped mt-4" id="tabelaLancamentos">
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Descrição</th>
                    <th>Valor</th>
                    <th>Tipo</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>

    </div>

    <?php include 'views/modal_lancamento.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/dashboard.js"></script>

</body>

</html>