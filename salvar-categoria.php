<?php

switch($_REQUEST["acao"]){
    case "cadastrar":
        $nome = $_POST["nome_categoria"];

        $sql = "INSERT INTO categoria (nome_categoria) VALUES ('{$nome}')";

        $res = $conn->query($sql);

        if($res==true){
            print "<script>alert('Categoria cadastrada com sucesso');</script>";
            print "<script>location.href='index.php?page=listar-categoria';</script>";
        }else{
            print "<script>alert('Não foi possível cadastrar a categoria');</script>";
            print "<script>location.href='index.php?page=listar-categoria';</script>";
        }
        break;

    case "editar":
        $id_categoria = $_POST["id_categoria"];
        $nome = $_POST["nome_categoria"]; 
        
        $sql = "UPDATE categoria SET nome_categoria ='{$nome}' WHERE id_categoria=".$_REQUEST["id_categoria"];

        $res = $conn->query($sql);
        if($res==true){
            print "<script>alert('Categoria editada com sucesso');</script>";
            print "<script>location.href='index.php?page=listar-categoria';</script>";
        }
        else{
            print "<script>alert('Não foi possível editar a categoria');</script>";
        }
        break;
        
    case "excluir":
        $sql = "DELETE FROM categoria WHERE id_categoria=".$_REQUEST["id_categoria"];
        $res = $conn->query($sql);
        if($res==true){
            print "<script>alert('Categoria excluída com sucesso');</script>";
            print "<script>location.href='index.php?page=listar-categoria';</script>";
        }else{
            print "<script>alert('Não foi possível excluir a categoria');</script>";
            print "<script>location.href='index.php?page=listar-categoria';</script>";
        }
        break;
}
?>