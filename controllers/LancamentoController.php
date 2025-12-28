<?php
require '../config/database.php';
session_start();

header('Content-Type: application/json');

// Verifica se está logado
if (!isset($_SESSION['usuario_id'])) {
    echo json_encode([
        'status' => 'erro',
        'msg' => 'Usuário não autenticado'
    ]);
    exit;
}

// Apenas POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode([
        'status' => 'erro',
        'msg' => 'Método não permitido'
    ]);
    exit;
}

// Recebe dados
$data = $_POST['data'] ?? '';
$descricao = trim($_POST['descricao'] ?? '');
$valor = $_POST['valor'] ?? '';
$tipo = $_POST['tipo'] ?? '';

// Validação básica
if ($data === '' || $descricao === '' || $valor === '' || $tipo === '') {
    echo json_encode([
        'status' => 'erro',
        'msg' => 'Preencha todos os campos'
    ]);
    exit;
}

try {
    $stmt = $pdo->prepare("
        INSERT INTO lancamentos (data, descricao, valor, tipo)
        VALUES (:data, :descricao, :valor, :tipo)
    ");

    $stmt->execute([
        ':data' => $data,
        ':descricao' => $descricao,
        ':valor' => $valor,
        ':tipo' => $tipo
    ]);

    echo json_encode([
        'status' => 'ok',
        'msg' => 'Lançamento salvo com sucesso'
    ]);

} catch (PDOException $e) {
    echo json_encode([
        'status' => 'erro',
        'msg' => 'Erro ao salvar lançamento'
    ]);
}
