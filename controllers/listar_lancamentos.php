<?php
require '../config/database.php';
session_start();

header('Content-Type: application/json');

// Verifica se usuário está logado
if (!isset($_SESSION['usuario_id'])) {
    echo json_encode([
        'status' => 'erro',
        'msg' => 'Usuário não autenticado'
    ]);
    exit;
}

try {
    $stmt = $pdo->prepare("
        SELECT id, data, descricao, valor, tipo
        FROM lancamentos
        ORDER BY data DESC
    ");

    $stmt->execute();
    $lancamentos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($lancamentos);

} catch (PDOException $e) {
    echo json_encode([
        'status' => 'erro',
        'msg' => 'Erro ao buscar lançamentos'
    ]);
}

