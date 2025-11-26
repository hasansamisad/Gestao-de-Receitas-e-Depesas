<?php
require_once 'config.php';

function atualizar_saldo($conn, $valor, $tipo, $acao) {

    $valor_ajuste = ($tipo == 'DESPESA') ? -$valor : $valor;

    if ($acao == 'excluir') {
        $valor_ajuste = -$valor_ajuste;
    }
    $valor_escapado = $conn->real_escape_string($valor_ajuste);
    $sql_update = "UPDATE saldo SET saldo_total = saldo_total + {$valor_escapado} WHERE id_saldo = 1";
    
    if (!$conn->query($sql_update)) {
        return "Erro ao atualizar o saldo: " . $conn->error;
    }
    return true;
}

switch($_REQUEST["acao"]){
    case "cadastrar":
        $observacoes = $conn->real_escape_string($_POST["observacoes"] ?? '');
        $valor = (float)$_POST["valor"];
        $tipo = $conn->real_escape_string($_POST["tipo"]);
        $id_categoria = (int)$_POST["id_categoria"];
        $data_lancamento = $conn->real_escape_string($_POST["data_lancamento"] ?? date('Y-m-d H:i:s')); 
        $sql = "INSERT INTO lancamento (id_categoria, tipo, valor, observacoes, data_lancamento) 
                VALUES ('{$id_categoria}', '{$tipo}', '{$valor}', '{$observacoes}', '{$data_lancamento}')";
        $res = $conn->query($sql);

        if($res){
            $res_saldo = atualizar_saldo($conn, $valor, $tipo, 'cadastrar');

            if ($res_saldo === true) {
                $msg = "Lançamento cadastrado com sucesso e saldo atualizado!";
            } else {
                $msg = "Lançamento cadastrado, mas com erro ao atualizar o saldo: " . $res_saldo;
            }
        } else {
            $msg = "Não foi possível cadastrar o lançamento: " . $conn->error;
        }
        break;

    case "editar":
        $id_lancamento = (int)$_POST["id_lancamento"];
        $sql_old = "SELECT valor, tipo FROM lancamento WHERE id_lancamento = '{$id_lancamento}'";
        $res_old = $conn->query($sql_old);
        $lancamento_antigo = $res_old->fetch_assoc();
        
        if ($lancamento_antigo) {
            $valor_antigo = $lancamento_antigo['valor'];
            $tipo_antigo = $lancamento_antigo['tipo'];
            $reverter_valor = ($tipo_antigo == 'DESPESA') ? $valor_antigo : -$valor_antigo;
            $conn->query("UPDATE saldo SET saldo_total = saldo_total + {$reverter_valor} WHERE id_saldo = 1");

            if ($res_old) $res_old->free();

            $observacoes_nova = $conn->real_escape_string($_POST["observacoes"] ?? '');
            $valor_novo = (float)$_POST["valor"];
            $tipo_novo = $conn->real_escape_string($_POST["tipo"]);
            $id_categoria_nova = (int)$_POST["id_categoria"];
            $data_lancamento_nova = $conn->real_escape_string($_POST["data_lancamento"] ?? date('Y-m-d H:i:s'));

            $sql_update = "UPDATE lancamento SET 
                            observacoes = '{$observacoes_nova}', 
                            valor = '{$valor_novo}', 
                            tipo = '{$tipo_novo}', 
                            id_categoria = '{$id_categoria_nova}', 
                            data_lancamento = '{$data_lancamento_nova}' 
                            WHERE id_lancamento = '{$id_lancamento}'";

            $res = $conn->query($sql_update);

            if ($res) {

                $res_saldo = atualizar_saldo($conn, $valor_novo, $tipo_novo, 'cadastrar'); 
                
                if ($res_saldo === true) {
                    $msg = "Lançamento editado com sucesso e saldo atualizado!";
                } else {
                    $msg = "Lançamento editado, mas com erro ao atualizar o saldo: " . $res_saldo;
                }
            } else {
                $msg = "Não foi possível editar o lançamento: " . $conn->error;
            }
        } else {
             $msg = "Lançamento não encontrado para edição.";
        }
        break;

    case "excluir":
        $id_lancamento = (int)$_REQUEST["id_lancamento"];
        $sql_old = "SELECT valor, tipo FROM lancamento WHERE id_lancamento = '{$id_lancamento}'";
        $res_old = $conn->query($sql_old);
        $lancamento_antigo = $res_old->fetch_assoc();
        
        if ($lancamento_antigo) {
            $valor_antigo = $lancamento_antigo['valor'];
            $tipo_antigo = $lancamento_antigo['tipo'];

            if ($res_old) $res_old->free();
            $sql_delete = "DELETE FROM lancamento WHERE id_lancamento = '{$id_lancamento}'";
            $res = $conn->query($sql_delete);
            
            if($res){
                $res_saldo = atualizar_saldo($conn, $valor_antigo, $tipo_antigo, 'excluir');
                
                if ($res_saldo === true) {
                    $msg = "Lançamento excluído com sucesso e saldo revertido!";
                } else {
                    $msg = "Lançamento excluído, mas com erro ao reverter o saldo: " . $res_saldo;
                }
            } else {
                $msg = "Não foi possível excluir o lançamento: " . $conn->error;
            }
        } else {
            $msg = "Lançamento não encontrado para exclusão.";
        }
        break;
}

print "<script>alert('{$msg}');</script>";
print "<script>location.href='index.php?page=listar-lancamento';</script>";
exit; 
?>