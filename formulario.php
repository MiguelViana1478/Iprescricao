<?php

    if(isset($_POST['submit']))
        {
        include_once('conexao.php');

        $nome=$_POST['nome'];
        $email=$_POST['email'];
        $categoria=$_POST['categoria'];
        $descricao=$_POST['descricao'];
        $imagem=$_POST['imagem'];

        $resultado = mysqli_query($conexao, "INSERT INTO usuarios(nome, email, categoria, descricao, imagem) VALUES ('$nome', '$email', '$categoria', '$descricao', '$imagem')");
        }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prescricao</title>

    <!-- styles -->

    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(to right, rgb(34, 1, 221), rgb(0, 225, 255));}
        .box{position: absolute; top:50%; left:50%; transform: translate(-50%,-50%);
            background-color: rgba(0, 0, 0, 0.8); padding: 15px; border-radius: 15px; width: 41.43%; color: white}
        fieldset{border: 3px solid dodgerblue;}
        legend{border: 1px solid dodgerblue;
        padding: 10px; text-align: center; background-color: dodgerblue;
        border-radius: 8px;}
        .inputbox{position: relative;}
        .inputUser{background: none;
        border: none;
        border-bottom: 1px solid white;
        outline: none;
        color: white;
        font-size: 15px;
        width: 100%;
        letter-spacing: 2px;
        }
        #submit{background-image: linear-gradient(to right, rgb(34, 1, 221), rgb(0, 225, 255));
        width: 100%;
        border: none;
        padding: 15px;
        color: white;
        font-size: 15px;
        cursor: pointer;
        border-radius: 10px;
        }
        #submit:hover{
        background-image: linear-gradient(to right, rgb(55, 28, 211),rgb(98, 214, 230))
        }
    </style>



</head>
<body>
    <div class="box">
        <form action="formulario.php" method="post">
        <btns>
            <input type="submit" 
            style="background-color: dodgerblue; 
            border: none; 
            border-radius: 10px;
            cursor: pointer;
            padding: 5px; 
            color: white; 
            font-size: 15px " 
            value="Listar " 
            onclick="location.href='listar_usuario.php'">
        </btns>
            <fieldset>

                <!-- Logo Central Iprescrição -->
                <legend><b>Iprescrição</b></legend>
                <br>

                <!-- nome -->
                <div class="inputbox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome">Nome Completo</label>
                </div>

                <br>
                
                <!-- e-mail -->
                <div class="inputbox">
                    <input type="email" name="email" id="email" class="inputUser" required>
                    <label for="nome">E-mail</label>
                </div>

                <!-- categoria -->
                <p>Categoria:</p>
                <input type="radio" id="Perguntas" name="categoria" value="Perguntas" required>
                <label for="Perguntas">Perguntas</label>

                <input type="radio" id="Discutir um assunto" name="categoria" value="Discutir um assunto" required>
                <label for="Discutir um assunto">Discutir um assunto</label>

                <input type="radio" id="Problema de dosagem" name="categoria" value="Problema de dosagem" required>
                <label for="Problema de dosagem">Problema de dosagem</label>

                <input type="radio" id="Outros" name="categoria" value="Outros" required>
                <label for="Outros">Outros</label>

                <br><br>
                
                <!-- descrição -->
                <label for="descricao">Descrição:</label>
                <br>
                <textarea type="text" name="descricao" id="descricao" class="inputUser" style="height: 114px; width: 319px;" required></textarea>
                <br><br>

                <!-- arquivo prescrição -->
                <label for="imagem">arquivo prescrição incorreta:</label>
                <input type="file" id="imagem" name="imagem">
                <br><br>

                <!-- botão enviar -->
                <input type="submit" name="submit" id="submit">

            </fieldset>
        </form>
    </div>
</body>
</html>