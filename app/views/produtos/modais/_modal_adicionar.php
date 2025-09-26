<?php
$categorias = ['Vestuário', 'Eletrônicos', 'Móveis', 'Alimentos', 'Escritório', 'Outros'];
?>

<div id="modalAdicionar" class="modal-overlay">
    <div class="modal-container">
        <form action="/produtos/adicionarProduto" method="POST" enctype="multipart/form-data">
            <div class="modal-header">
                <h3 class="modal-title"><i class="fa-solid fa-cart-plus"></i> Adicionar Produto</h3>
                <button type="button" onclick="fecharModalAdicionar()" class="modal-close-btn">&times;</button>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <label for="addNome">Nome do Produto</label>
                    <input type="text" id="addNome" name="nome" placeholder="Ex.: Camiseta Básica Avanti" required>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="addSku">SKU</label>
                        <input type="text" id="addSku" name="sku" placeholder="AVT-001">
                    </div>
                    <div class="form-group">
                        <label for="addCategoria">Categoria</label>
                        <select id="addCategoria" name="categoria">
                            <?php foreach ($categorias as $categoria): ?>
                                <option value="<?php echo $categoria; ?>"><?php echo $categoria; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="addPreco">Preço</label>
                        <input type="number" id="addPreco" name="preco" step="0.01" placeholder="R$ 99,90" required>
                    </div>
                    <div class="form-group">
                        <label for="addQuantidade">Quantidade em Estoque</label>
                        <input type="number" id="addQuantidade" name="quantidade" placeholder="100" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="addFornecedor">Fornecedor</label>
                    <input type="text" id="addFornecedor" name="fornecedor" placeholder="Avanti Têxtil Ltda.">
                </div>
                <div class="form-group">
                    <label for="addDescricao">Descrição</label>
                    <textarea id="addDescricao" name="descricao" rows="7" placeholder="Camiseta 100% algodão, confortável e resistente."></textarea>
                    <small>Inclua informações como material, dimensões ou cuidados.</small>
                </div>
                <div class="form-group">
                    <label for="addImagem">Imagem do Produto</label>
                    <div class="file-drop-area">
                        <i class="fa-solid fa-image"></i>
                        <span class="file-message">Arraste e solte uma imagem ou clique para selecionar</span>
                        <input type="file" id="addImagem" name="imagem" class="file-input">
                    </div>
                </div>
            </div>

            <div class="modal-footer-alt">
                <button type="button" onclick="limparFormularioAdicionar()" class="btn btn-clear">
                    <i class="fa-solid fa-trash-can"></i> Limpar
                </button>
                <div>
                    <button type="button" onclick="fecharModalAdicionar()" class="btn btn-secondary">Cancelar</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa-solid fa-floppy-disk"></i> Salvar Produto
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>