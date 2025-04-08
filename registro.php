
<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usuario = $_POST['usuario'] ?? '';
    $senha = $_POST['senha'] ?? '';

    if (!empty($usuario) && !empty($senha)) {
        $_SESSION['usuarios'][$usuario] = password_hash($senha, PASSWORD_DEFAULT);
        $_SESSION['mensagem'] = "Usuário registrado com sucesso! Faça o login.";
        header("Location: login.php");
        exit();
    }
}
?>
<?php include('includes/header.php'); ?>
<div class="container">
    <h2>Criar Conta</h2>
    <form method="POST">
        <div class="mb-3">
            <label for="usuario" class="form-label">Usuário</label>
            <input type="text" class="form-control" name="usuario" required>
        </div>
        <div class="mb-3">
            <label for="senha" class="form-label">Senha</label>
            <input type="password" class="form-control" name="senha" required>
        </div>
        <button type="submit" class="btn btn-success">Registrar</button>
    </form>
</div>
<link rel="stylesheet" href="estilo.css">
<?php include('includes/footer.php'); ?>
