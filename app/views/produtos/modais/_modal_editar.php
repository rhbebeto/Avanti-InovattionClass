<?php
// A mesma lista de categorias
$categorias = ['Vestuário', 'Eletrônicos', 'Móveis', 'Alimentos', 'Escritório', 'Outros'];
?>

<div id="modalEditar" class="modal-overlay">
    <div class="modal-container">
        
        <form action="/produtos/update" method="POST" enctype="multipart/form-data">

            
            <input type="hidden" name="id" id="editProdutoId">

            <div class="modal-header">
                <h3 class="modal-title">_<i class="fa-solid fa-pencil"></i> Editar Produto</h3>
                <button type="button" onclick="fecharModalEditar()" class="modal-close-btn">&times;</button>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <label for="editNome">Nome do Produto</label>
                    <input type="text" id="editNome" name="nome" required>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="editSku">SKU</label>
                        <input type="text" id="editSku" name="sku">
                    </div>
                    <div class="form-group">
                        <label for="editCategoria">Categoria</label>
                        <select id="editCategoria" name="categoria">
                            <?php foreach ($categorias as $categoria): ?>
                                <option value="<?php echo $categoria; ?>"><?php echo $categoria; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="editPreco">Preço</label>
                        <input type="number" id="editPreco" name="preco" step="0.01" required>
                    </div>
                    <div class="form-group">
                        <label for="editQuantidade">Quantidade em Estoque</label>
                        <input type="number" id="editQuantidade" name="quantidade" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="editFornecedor">Fornecedor</label>
                    <input type="text" id="editFornecedor" name="fornecedor">
                </div>

                <div class="form-group">
                    <label for="editDescricao">Descrição</label>
                    <textarea id="editDescricao" name="descricao" rows="7"></textarea>
                    <small>Inclua informações como material, dimensões ou cuidados.</small>
                </div>
                
                 <div class="form-group">
                    <label for="editImagem">Imagem do Produto</label>
                    <div class="file-drop-area">
                        <i class="fa-solid fa-image"></i>
                        <span class="file-message">Arraste e solte uma nova imagem ou mantenha a atual</span>
                        <input type="file" id="editImagem" name="imagem" class="file-input">
                    </div>
                </div>
                
            </div>

            <div class="modal-footer-alt">
                <button type="button" onclick="fecharModalEditar()" class="btn btn-secondary">Descartar</button>
                <button type="submit" class="btn btn-primary">
                    <i class="fa-solid fa-check"></i> Atualizar Produto
                </button>
            </div>
        </form>
    </div>
</div>