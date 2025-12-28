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
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <!-- preenchido via JS -->
            </tbody>
        </table>

    </div>


    <?php include 'views/modal_lancamento.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('formLancamento').addEventListener('submit', function (e) {
            e.preventDefault();

            const form = this;
            const dados = new FormData(form);

            fetch('controllers/LancamentoController.php', {
                method: 'POST',
                body: dados
            })
                .then(res => res.json())
                .then(data => {
                    if (data.status === 'ok') {
                        alert('Lançamento salvo!');
                        form.reset();
                        bootstrap.Modal.getInstance(
                            document.getElementById('modalLancamento')
                        ).hide();
                    } else {
                        alert(data.msg);
                    }
                });
        });
    </script>
    <script>
        function carregarLancamentos() {
            fetch('controllers/listar_lancamentos.php')
                .then(res => res.json())
                .then(dados => {
                    const tbody = document.querySelector('#tabelaLancamentos tbody');
                    tbody.innerHTML = '';

                    dados.forEach(item => {
                        const tr = document.createElement('tr');

                        const cor = item.tipo === 'entrada' ? 'text-success' : 'text-danger';
                        const sinal = item.tipo === 'entrada' ? '+' : '-';

                        tr.innerHTML = `
                            <td>${item.data}</td>
                            <td>${item.descricao}</td>
                            <td class="${cor} fw-bold">
                                ${sinal} R$ ${parseFloat(item.valor).toFixed(2)}
                            </td>
                            <td>${item.tipo}</td>
                        `;


                        tbody.appendChild(tr);
                    });
                });
        }

        // chama ao carregar a página
        carregarLancamentos();
    </script>

</body>

</html>