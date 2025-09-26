<?php 
// Inclui o cabeçalho
require_once __DIR__ . '/../layouts/header.php'; 
?>

<div class="page-header">
    
    <div class="page-header-title">
        <h2>Produtos</h2>
    </div>

    <form action="/dashboard" method="GET" class="search-form">
        <div class="search-bar">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" name="busca" placeholder="Buscar por nome..." value="<?php echo htmlspecialchars($termoBusca ?? ''); ?>">
        </div>
    </form>

    <div class="page-header-actions">
        <button class="btn btn-primary" onclick="abrirModalAdicionar()">
            <i class="fa-solid fa-plus"></i>
            Adicionar Produto
        </button>
    </div>

</div>

<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Quantidade</th>
                <th>Preço</th>
                <th>Cadastrado por</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($produtos)): ?>
                <tr>
                    <td colspan="5" style="text-align:center;">Nenhum produto cadastrado no sistema.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($produtos as $produto): ?>
                    <tr>
                        <td data-label="Nome"><?php echo htmlspecialchars($produto['nome']); ?></td>
                        <td data-label="Quantidade"><?php echo htmlspecialchars($produto['quantidade']); ?></td>
                        <td data-label="Preço">R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></td>
                        <td data-label="Cadastrado Por"><?php echo htmlspecialchars($produto['username']); ?></td>
                        <td class="actions">
                            <?php if ($produto['usuario_id'] == $usuario_id_logado): ?>
                                <button class="btn btn-edit" onclick="abrirModalEdicao(<?php echo $produto['id']; ?>)">
                                    <i class="fa-solid fa-pencil"></i> Editar
                                </button>
                                <button class="btn btn-delete" 
                                        onclick="abrirModalExclusao(
                                            <?php echo $produto['id']; ?>, 
                                            '<?php echo htmlspecialchars($produto['nome'], ENT_QUOTES); ?>',
                                            '<?php echo htmlspecialchars($produto['sku'] ?? 'N/A', ENT_QUOTES); ?>',
                                            '<?php echo $produto['quantidade']; ?>',
                                            'R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?>'
                                        )">
                                    <i class="fa-solid fa-trash-can"></i> Excluir
                                </button>
                            <?php else: ?>
                                -
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php require_once __DIR__ . '/modais/_modal_adicionar.php'; ?>
<?php require_once __DIR__ . '/modais/_modal_editar.php'; ?>
<?php require_once __DIR__ . '/modais/_modal_remover.php'; ?>


<?php 
// Inclui o rodapé
require_once __DIR__ . '/../layouts/footer.php'; 
?>