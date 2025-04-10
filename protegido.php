<?php
session_start();
include 'includes/autentica.php'; // Garante que o usuário esteja logado

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'] ?? '';
    $descricao = $_POST['descricao'] ?? '';
    $imagem = $_POST['imagem'] ?? '';
    $genero = $_POST['genero'] ?? '';

    if ($titulo && $descricao && $imagem && $genero) {
        $novo_jogo = [
            'titulo' => $titulo,
            'descricao' => $descricao,
            'imagem' => $imagem,
            'genero' => $genero
        ];

        $_SESSION['jogos'][] = $novo_jogo;

        // Redireciona de volta ao catálogo
        header("Location: index.php");
        exit;
    }
}

include 'includes/header.php';
?>

<div class="container mt-4">
    <h2>📥 Cadastrar Novo Jogo</h2>
    <form method="post" class="mt-3">
        <div class="mb-3">
            <label for="titulo" class="form-label">Título do jogo</label>
            <input type="text" name="titulo" id="titulo" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea name="descricao" id="descricao" class="form-control" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label for="genero" class="form-label">Gênero</label>
            <input type="text" name="genero" id="genero" class="form-control" placeholder="Ex: Aventura, Luta, Plataforma" required>
        </div>

        <div class="mb-3">
            <label for="imagem" class="form-label">URL da Imagem</label>
            <input type="url" name="imagem" id="imagem" class="form-control" placeholder="https://exemplo.com/imagem.jpg" required>
        </div>

        <button type="submit" class="btn btn-success">Cadastrar Jogo</button>
        <a href="index.php" class="btn btn-secondary">Voltar ao Catálogo</a>
    </form>
</div>

<?php include 'includes/footer.php'; ?>
