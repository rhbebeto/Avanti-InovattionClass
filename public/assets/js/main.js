// ==========================================================================
// CONTROLE DOS MODAIS
// ==========================================================================

// 1. Seleciona todos os elementos dos modais no início
const modalAdicionar = document.getElementById('modalAdicionar');
const modalEditar = document.getElementById('modalEditar');
const modalExclusao = document.getElementById('modalExclusao');

// --- Funções do Modal de ADICIONAR ---
function abrirModalAdicionar() {
    if (modalAdicionar) {
        modalAdicionar.querySelector('form').reset();
        modalAdicionar.style.display = 'flex';
    }
}
function fecharModalAdicionar() {
    if (modalAdicionar) {
        modalAdicionar.style.display = 'none';
    }
}

// --- Funções do Modal de EDITAR ---
async function abrirModalEdicao(id) {
    if (!modalEditar) return;

    try {
        const response = await fetch(`/api/produto?id=${id}`);
        if (!response.ok) {
            throw new Error('Produto não encontrado.');
        }
        const produto = await response.json();

        // Preenche os campos do formulário
        document.getElementById('editProdutoId').value = produto.id;
        document.getElementById('editNome').value = produto.nome;
        document.getElementById('editSku').value = produto.sku;
        document.getElementById('editCategoria').value = produto.categoria;
        document.getElementById('editQuantidade').value = produto.quantidade;
        document.getElementById('editPreco').value = produto.preco;
        document.getElementById('editFornecedor').value = produto.fornecedor;
        document.getElementById('editDescricao').value = produto.descricao;
        
        // Mostra o modal (apenas uma vez)
        modalEditar.style.display = 'flex';

    } catch (error) {
        console.error('Erro ao buscar dados do produto:', error);
        alert('Não foi possível carregar os dados para edição.');
    }
}
function fecharModalEditar() {
    if (modalEditar) {
        modalEditar.style.display = 'none';
    }
}

// --- Funções do Modal de EXCLUIR ---
function abrirModalExclusao(id, nome, sku, estoque, preco) {
    if (modalExclusao) {
        // A função agora usa os parâmetros recebidos diretamente
        document.getElementById('modalNomeProduto').textContent = nome;
        document.getElementById('modalSku').textContent = sku;
        document.getElementById('modalEstoque').textContent = estoque + ' unidades';
        document.getElementById('modalPreco').textContent = preco;

        // Atualiza o link de confirmação
        document.getElementById('linkConfirmarExclusao').href = `/produtos/excluir?id=${id}`;

        // Mostra o modal
        modalExclusao.style.display = 'flex';
    }
}

function fecharModalExclusao() {
    if (modalExclusao) {
        modalExclusao.style.display = 'none';
    }
}

// --- Evento ÚNICO para fechar modais ao clicar no fundo ---
window.addEventListener('click', function(event) {
    if (event.target == modalAdicionar) {
        fecharModalAdicionar();
    }
    if (event.target == modalEditar) {
        fecharModalEditar();
    }
    if (event.target == modalExclusao) {
        fecharModalExclusao();
    }
});

// Função para o novo botão Limpar
function limparFormularioAdicionar() {
    if (modalAdicionar) {
        modalAdicionar.querySelector('form').reset();
    }
}