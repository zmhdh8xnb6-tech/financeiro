<div class="modal fade" id="modalLancamento" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Novo Lançamento</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <form id="formLancamento">
                    <div class="mb-3">
                        <label>Data</label>
                        <input type="date" name="data" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Descrição</label>
                        <input type="text" name="descricao" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Valor</label>
                        <input type="number" name="valor" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Tipo</label>
                        <select name="tipo" class="form-select" required>
                            <option value="">Selecione</option>
                            <option value="entrada">Entrada</option>
                            <option value="saida">Saída</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">
                        Salvar
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>