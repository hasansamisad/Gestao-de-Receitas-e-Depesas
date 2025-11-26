<?php
require_once 'config.php';

$sql_saldo = "SELECT saldo_total FROM saldo WHERE id_saldo = 1";
$res_saldo = $conn->query($sql_saldo);
$saldo_row = $res_saldo->fetch_object();

$saldo_total = $saldo_row->saldo_total ?? 0.00;

if ($res_saldo) $res_saldo->free();

$total_receitas = 0;
$total_despesas = 0;
?>

<h1 class="page-title">Consultar Saldo Atual</h1>

<div class="card shadow p-4">
    <?php $saldo_classe = ($saldo_total >= 0) ? 'text-success' : 'text-danger'; ?>
    
    <h2 class="mb-3">
        Saldo Total: 
        <span class="fw-bold <?= $saldo_classe ?>">R$ <?= number_format($saldo_total, 2, ',', '.') ?></span>
    </h2>
    <hr>
    
    <p class="text-muted">Total de Receitas (Geral ou Período): R$ <?= number_format($total_receitas, 2, ',', '.') ?></p>
    <p class="text-muted">Total de Despesas (Geral ou Período): R$ <?= number_format($total_despesas, 2, ',', '.') ?></p>
</div>