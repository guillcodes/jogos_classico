<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit();
}

$mensagem = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $novoJogo = [
        "nome" => $_POST['titulo'],
        "genero" => $_POST['genero'],
        "ano" => $_POST['ano'],
        "produtor" => $_POST['produtor'],
        "distribuidor" => $_POST['distribuidor'],
        "nota" => $_POST['nota'],
        "descricao" => $_POST['descricao'],
        "imagem" => $_POST['imagem']
    ];

    $_SESSION['novos_jogos'][] = $novoJogo;
    $mensagem = "Jogo cadastrado com sucesso!";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Novo Jogo</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand">Jogos Clássicos</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="index.php">Início</a></li>
                    <li class="nav-item"><a class="nav-link active" href="protegido.php">Área Protegida</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php">Sair</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <?php if ($mensagem): ?>
            <div class="alert alert-success"><?= $mensagem ?></div>
        <?php endif; ?>

        <h3 class="mb-4">Adicionar Novo Jogo</h3>
        <form method="POST">
            <div class="mb-3">
                <label>Título</label>
                <input type="text" name="titulo" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Gênero</label>
                <input type="text" name="genero" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Ano</label>
                <input type="number" name="ano" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Produtor</label>
                <input type="text" name="produtor" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Distribuidor</label>
                <input type="text" name="distribuidor" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Nota (0 a 10)</label>
                <input type="number" name="nota" step="0.1" max="10" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Descrição</label>
                <textarea name="descricao" class="form-control" rows="4" required></textarea>
            </div>
            <div class="mb-3">
                <label>URL da Imagem</label>
                <input type="url" name="imagem" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar Jogo</button>
        </form>
    </div>
</body>
</html>
