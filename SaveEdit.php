<?php

    include_once('conexao.php');

    if(isset($_POST['update']))
    {
        $id=$_POST['id'];
        $nome=$_POST['nome'];
        $email=$_POST['email'];
        $categoria=$_POST['categoria'];
        $descricao=$_POST['descricao'];
        $imagem=$_POST['imagem'];

        $sqlUpdate = "UPDATE usuarios SET nome='$nome', email='$email', categoria='$categoria', descricao='$descricao', imagem='$imagem'
        WHERE id='$id'";

        $result = $conexao->query($sqlUpdate);
    }

    header('Location: listar_usuario.php');

?>
