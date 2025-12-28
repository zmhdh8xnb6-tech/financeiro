<?php
session_start();
require 'config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);
    $usuario = $stmt->fetch();

    if ($usuario && password_verify($senha, $usuario['senha'])) {
        $_SESSION['usuario_id'] = $usuario['id'];
        header('Location: dashboard.php');
        exit;
    }

    // ERRO → salva na sessão e redireciona
    $_SESSION['erro_login'] = 'Email ou senha inválidos';
    header('Location: index.php');
    exit;
}

?>


<!DOCTYPE html>
<html>

<head>
    <title>SistemaPhinance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light d-flex justify-content-center align-items-center" style="height:100vh">


    <div class="card p-4 shadow" style="width:350px">
        <h4 class="mb-3 text-center">Login Phinance</h4>
        <?php if (!empty($_SESSION['erro_login'])): ?>
            <div class="alert alert-danger">
                <?= $_SESSION['erro_login']; ?>
            </div>
            <?php unset($_SESSION['erro_login']); ?>
        <?php endif; ?>
        <form method="post">
            <input class="form-control mb-2" name="email" placeholder="Email" required>
            <input type="password" class="form-control mb-3" name="senha" placeholder="Senha" required>
            <button class="btn btn-primary w-100">Entrar</button>
        </form>
    </div>


</body>

</html>