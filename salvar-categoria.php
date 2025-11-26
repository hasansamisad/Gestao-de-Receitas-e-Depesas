<?php

$msg = ""; 

switch($_REQUEST["acao"]){
    case "cadastrar":
        $nome = $conn->real_escape_string($_POST["nome_categoria"]);

        $sql = "INSERT INTO categoria (nome_categoria) VALUES ('{$nome}')";

        $res = $conn->query($sql);

        if($res){
            $msg = "Categoria cadastrada com sucesso!";
        } else {
            if ($conn->errno == 1062) {
                 $msg = "Erro: Já existe uma categoria com o nome '{$nome}'.";
            } else {
                 $msg = "Não foi possível cadastrar a categoria: " . $conn->error;
            }
        }
        break;

    case "editar":
        $id_categoria = (int)$_POST["id_categoria"]; 
        $nome = $conn->real_escape_string($_POST["nome_categoria"]); 
        $sql = "UPDATE categoria SET nome_categoria ='{$nome}' WHERE id_categoria='{$id_categoria}'";

        $res = $conn->query($sql);
        
        if($res){
            if ($conn->affected_rows > 0) {
                 $msg = "Categoria editada com sucesso!";
            } else {
                 $msg = "Categoria editada com sucesso (ou nenhum dado alterado).";
            }
        } else {
            if ($conn->errno == 1062) {
                 $msg = "Erro: Já existe outra categoria com o nome '{$nome}'.";
            } else {
                 $msg = "Não foi possível editar a categoria: " . $conn->error;
            }
        }
        break;
        
    case "excluir":
        $id_categoria = (int)$_REQUEST["id_categoria"]; 
        $sql = "DELETE FROM categoria WHERE id_categoria='{$id_categoria}'";
        $res = $conn->query($sql);
        
        if($res){
            $msg = "Categoria excluída com sucesso! Os lançamentos associados também foram removidos.";
        }else{
             $msg = "Não foi possível excluir a categoria: " . $conn->error;
        }
        break;
        
    default:
        $msg = "Ação inválida!";
        break;
}

print "<script>alert('{$msg}');</script>";
print "<script>location.href='index.php?page=listar-categoria';</script>";
exit;
?>