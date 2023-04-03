<?php
session_start();
include_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(to right, rgb(34, 1, 221), rgb(0, 255, 255));
        }    
        .Selection{
            letter-spacing: 1px;
            background-color: rgba(0, 0, 0, 0.8);
            border-radius: 15px;
            padding: 20px;
            color: white;
        }
        fieldset{
            border: 3px solid dodgerblue;
        }
        legend{
            border: 3px solid dodgerblue;
            border-radius: 8px;
            padding: 10px;
            text-align: center;
            background-color: dodgerblue;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="Selection">
        <btns>
            <input type="submit" 
            style="background-color: dodgerblue; 
            border: none; 
            border-radius: 10px;
            cursor: pointer;
            padding: 5px; 
            color: white; 
            font-size: 15px "
            value="Nova Prescrição" 
            onclick="location.href='formulario.php'">
        </btns>
        <fieldset>
        <legend>Lista de Prescrições Incorretas</legend>
        <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
            }
            $result = "SELECT * FROM usuarios";
            $resultado_usuarios = mysqli_query($conexao, $result);
            while($row_usuario = mysqli_fetch_assoc($resultado_usuarios)){
                echo "<b><font color=\"#836FFF\">Nome: </b></font>" . $row_usuario['nome'] . "<br>";	
                "//<br />";
                echo "<b><font color=\"#836FFF\">E-mail: </b></font>" . $row_usuario['email'] . "<br>";
                echo "<b><font color=\"#836FFF\">Categoria: </b></font>" . $row_usuario['categoria'] . "<br>";
                echo "<b><font color=\"#836FFF\">Descrição: </b></font>" . $row_usuario['descricao'] . "<br>";
                echo "<b><font color=\"#836FFF\">Arquivo de Prescrição Incorreta: </b></font>" . $row_usuario['imagem'] . "<br>";
                echo "<td><font color=\"#836FFF\"><a class='btn btn-sm btn-primary' href='editar_usuario.php?id=$row_usuario[id]'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-fill' viewBox='0 0 16 16'>
                <path d='M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z'/>
              </svg>Editar</a></font></td>";
                echo "<hr>";
            ?>
            <?php	} ?>
        </fieldset>
    </div>
</body>
</html>
