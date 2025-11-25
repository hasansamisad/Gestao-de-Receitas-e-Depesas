<?php
require_once 'config.php';

switch($_REQUEST["acao"]){
    case "cadastrar":
        $descricao = $conn->real_escape_string($_POST["descricao"]);
        $valor = (float)$_POST["valor"];
        $tipo = $conn->real_escape_string($_POST["tipo"]); // 'RECEITA' ou 'DESPESA'
        $categoria = $conn->real_escape_string($_POST["id_categoria"]);
        $data = $conn->real_escape_string($_POST["data"]);

        $sql = "INSERT INTO movimentacoes (descricao, valor, tipo, id_categoria, data_movimento) 
                VALUES ('{$descricao}', '{$valor}', '{$tipo}', '{$categoria}', '{$data}')";
        $res = $conn->query($sql);

        if($res){
            print "<script>alert('Lançamento cadastrado com sucesso');</script>";
            print "<script>location.href='index.php?page=listar-lancamento';</script>";
        } else {
            print "<script>alert('Não foi possível cadastrar o lançamento');</script>";
            print "<script>location.href='index.php?page=listar-lancamento';</script>";
        }
        break;

    case "editar":
        $id_lancamento = $_POST["id_lancamento"];
        $descricao = $conn->real_escape_string($_POST["descricao"]);
        $valor = (float)$_POST["valor"];
        $tipo = $conn->real_escape_string($_POST["tipo"]);
        $categoria = $conn->real_escape_string($_POST["id_categoria"]);
        $data = $conn->real_escape_string($_POST["data"]);

        $sql = "UPDATE movimentacoes SET 
                descricao = '{$descricao}', 
                valor = '{$valor}', 
                tipo = '{$tipo}', 
                id_categoria = '{$categoria}', 
                data_movimento = '{$data}' 
                WHERE id_movimento = {$id_lancamento}";

        $res = $conn->query($sql);

        if($res){
            print "<script>alert('Lançamento editado com sucesso');</script>";
            print "<script>location.href='index.php?page=listar-lancamento';</script>";
        } else {
            print "<script>alert('Não foi possível editar o lançamento');</script>";
            print "<script>location.href='index.php?page=listar-lancamento';</script>";
        }
        break;

    case "excluir":
        $id_lancamento = $conn->real_escape_string($_REQUEST["id_lancamento"]);
        $sql = "DELETE FROM movimentacoes WHERE id_movimento = {$id_lancamento}";
        $res = $conn->query($sql);

        if($res){
            print "<script>alert('Lançamento excluído com sucesso');</script>";
            print "<script>location.href='index.php?page=listar-lancamento';</script>";
        } else {
            print "<script>alert('Não foi possível excluir o lançamento');</script>";
            print "<script>location.href='index.php?page=listar-lancamento';</script>";
        }
        break;
}
?>