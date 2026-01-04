
document.addEventListener('DOMContentLoaded', () => {
    carregarLancamentos();

    document
        .getElementById('formLancamento')
        .addEventListener('submit', salvarLancamento);
});

function salvarLancamento(e) {
    e.preventDefault();

    const form = e.target;
    const dados = new FormData(form);

    fetch('/financeiro/controllers/LancamentoController.php', {
        method: 'POST',
        body: dados
    })
        .then(res => res.json())
        .then(data => {
            if (data.status === 'ok') {
                form.reset();
                bootstrap.Modal.getInstance(
                    document.getElementById('modalLancamento')
                ).hide();
                carregarLancamentos();
            } else {
                alert(data.msg);
            }
        });
}

function carregarLancamentos() {
    fetch('/financeiro/controllers/listar_lancamentos.php')
        .then(res => res.json())
        .then(dados => {
            const tbody = document.querySelector('#tabelaLancamentos tbody');
            tbody.innerHTML = '';

            dados.forEach(item => {
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td>${item.data}</td>
                    <td>${item.descricao}</td>
                    <td class="${item.tipo === 'entrada' ? 'text-success' : 'text-danger'}">
                        ${item.tipo === 'entrada' ? '+' : '-'} R$ ${item.valor}
                    </td>
                    <td>${item.tipo}</td>
                `;
                tbody.appendChild(tr);
            });
        });
}
