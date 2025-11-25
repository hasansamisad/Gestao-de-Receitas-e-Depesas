<?php
require_once 'config.php';

// Consulta para calcular o saldo total
$sql = "SELECT 
            SUM(CASE WHEN tipo = 'RECEITA' THEN quantidade ELSE 0 END) AS total_receitas,
            SUM(CASE WHEN tipo = 'DESPESA' THEN quantidade ELSE 0 END) AS total_despesas
        FROM 
            movimentacoes";

$res = $conn->query($sql);
$row = $res->fetch_object();

$total_receitas = $row->total_receitas ?? 0;
$total_despesas = $row->total_despesas ?? 0;
$saldo_total = $total_receitas - $total_despesas;
?>

<h1 class="page-title">Consultar Saldo</h1>

<div class="card shadow p-4">
    <h2>Saldo Total: R$ <?= number_format($saldo_total, 2, ',', '.') ?></h2>
    <p>Total de Receitas: R$ <?= number_format($total_receitas, 2, ',', '.') ?></p>
    <p>Total de Despesas: R$ <?= number_format($total_despesas, 2, ',', '.') ?></p>
</div>