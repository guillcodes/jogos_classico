
<?php
session_start();
if (!isset($_SESSION['logado'])) {
    header("Location: login.php");
    exit();
}

if (!isset($_SESSION['jogos_adicionados'])) {
    $_SESSION['jogos_adicionados'] = [];
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST['nome'] ?? '';
    $descricao = $_POST['descricao'] ?? '';
    $imagem = $_POST['imagem'] ?? '';
    if ($nome && $descricao && $imagem) {
        $_SESSION['jogos_adicionados'][] = [
            'nome' => $nome,
            'descricao' => $descricao,
            'imagem' => $imagem
        ];
    }
}
?>
<?php include('includes/header.php'); ?>
<div class="container">
    <h2>Painel do Usuário</h2>
    <p>Olá, <?= $_SESSION['logado'] ?>! Adicione novos jogos ao catálogo:</p>
    <form method="POST">
        <div class="mb-3"><input type="text" name="nome" class="form-control" placeholder="Nome do Jogo" required></div>
        <div class="mb-3"><input type="text" name="descricao" class="form-control" placeholder="Descrição" required></div>
        <div class="mb-3"><input type="text" name="imagem" class="form-control" placeholder="URL da Imagem" required></div>
        <button type="submit" class="btn btn-success">Adicionar Jogo</button>
    </form>

    <hr>
    <h3>Jogos Adicionados por Você</h3>
    <div class='row'>
    <?php foreach ($_SESSION['jogos_adicionados'] as $jogo): ?>
        <div class='col-md-4'>
            <div class='card'>
                <img src='<?= $jogo['imagem'] ?>' class='card-img-top'>
                <div class='card-body'>
                    <h5 class='card-title'><?= $jogo['nome'] ?></h5>
                    <p class='card-text'><?= $jogo['descricao'] ?></p>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    </div>
</div>
<?php include('includes/footer.php'); ?>
