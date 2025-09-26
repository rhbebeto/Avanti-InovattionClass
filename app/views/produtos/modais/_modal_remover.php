<div id="modalExclusao" class="modal-overlay">
    <div class="modal-container">
        <div class="modal-header">
            <h3 class="modal-title">Excluir Produto</h3>
            <button onclick="fecharModalExclusao()" class="modal-close-btn">&times;</button>
        </div>
        <div class="modal-body">
            <p>Tem certeza que deseja excluir este produto? Esta ação não pode ser desfeita.</p>
            <div class="modal-product-info">
                <div class="info-grid">
                        <div>
                            <span>Produto</span>
                            <strong id="modalNomeProduto"></strong>
                        </div>
                        <div>
                            <span>SKU</span>
                            <strong id="modalSku"></strong>
                        </div>
                        <div>
                            <span>Estoque</span>
                            <strong id="modalEstoque"></strong>
                        </div>
                        <div>
                            <span>Preço</span>
                            <strong id="modalPreco"></strong>
                        </div>
                    </div>
                </div>
            <div class="modal-alert-danger">
                <strong><i class="fa-solid fa-trash-can"></i> Ação permanente</strong>
            </div>
        </div>
        <div class="modal-footer">
            <button onclick="fecharModalExclusao()" class="btn btn-secondary">Cancelar</button>
            <a id="linkConfirmarExclusao" href="#" class="btn btn-danger"><i class="fa-regular fa-trash-can"></i> Excluir Produto</a>
        </div>
    </div>
</div>