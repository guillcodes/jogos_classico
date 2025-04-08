
<?php
session_start();
$erro = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usuario = $_POST['usuario'] ?? '';
    $senha = $_POST['senha'] ?? '';

    if (isset($_SESSION['usuarios'][$usuario]) && password_verify($senha, $_SESSION['usuarios'][$usuario])) {
        $_SESSION['logado'] = $usuario;
        header("Location: protegido.php");
        exit();
    } else {
        $erro = "Usuário ou senha inválidos!";
    }
}
?>
<?php include('includes/header.php'); ?>
<div class="container">
    <h2>Login</h2>
    <?php if ($erro): ?><div class="alert alert-danger"><?= $erro ?></div><?php endif; ?>
    <?php if (!empty($_SESSION['mensagem'])): ?>
        <div class="alert alert-success"><?= $_SESSION['mensagem']; unset($_SESSION['mensagem']); ?></div>
    <?php endif; ?>
    <form method="POST">
        <div class="mb-3">
            <label for="usuario" class="form-label">Usuário</label>
            <input type="text" class="form-control" name="usuario" required>
        </div>
        <div class="mb-3">
            <label for="senha" class="form-label">Senha</label>
            <input type="password" class="form-control" name="senha" required>
        </div>
        <button type="submit" class="btn btn-primary">Entrar</button>
    </form>
</div>
<link rel="stylesheet" href="estilo.css">
<?php include('includes/footer.php'); ?>
