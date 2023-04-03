<?php

    if(!empty($_GET['id']))
    {
        include_once('conexao.php');

        $id = $_GET['id'];

        $sqlSelect = "SELECT * FROM usuarios WHERE id=$id";

        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0)
        {
            while($user_data = mysqli_fetch_assoc($result))
            {
                $nome=$user_data['nome'];
                $email=$user_data['email'];
                $categoria=$user_data['categoria'];
                $descricao=$user_data['descricao'];
                $imagem=$user_data['imagem']; 
            }
        }
        else
        {
            header('Location: listar_usuario.php');
        }




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
        #update{background-image: linear-gradient(to right, rgb(34, 1, 221), rgb(0, 225, 255));
        width: 100%;
        border: none;
        padding: 15px;
        color: white;
        font-size: 15px;
        cursor: pointer;
        border-radius: 10px;
        }
        #update:hover{
        background-image: linear-gradient(to right, rgb(55, 28, 211),rgb(98, 214, 230))
        }
    </style>



</head>
<body>
    <div class="box">
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
        <form action="SaveEdit.php" method="post">
            <fieldset>

                <!-- Logo Central Iprescrição -->
                <legend><b>Iprescrição</b></legend>
                <br>

                <!-- nome -->
                <div class="inputbox">
                    <input type="text" name="nome" id="nome" class="inputUser" value="<?php echo $nome ?>" required>
                    <label for="nome">Nome Completo</label>
                </div>

                <br>
                
                <!-- e-mail -->
                <div class="inputbox">
                    <input type="email" name="email" id="email" class="inputUser" value="<?php echo $email ?>" required>
                    <label for="nome">E-mail</label>
                </div>

                <!-- categoria -->
                <p>Categoria:</p>

                <!-- perguntas -->
                <input type="radio" id="Perguntas" name="categoria" value="Perguntas" <?php echo ($categoria == 'Perguntas') ? 'checked' : '' ?> required>
                <label for="Perguntas">Perguntas</label>

                <!-- discutir um assunto -->
                <input type="radio" id="Discutir um assunto" name="categoria" value="Discutir um assunto" <?php echo ($categoria == 'Discutir um assunto') ? 'checked' : '' ?> required>
                <label for="Discutir um assunto">Discutir um assunto</label>

                <!-- problema de dosagem -->
                <input type="radio" id="Problema de dosagem" name="categoria" value="Problema de dosagem" <?php echo ($categoria == 'Problema de dosagem') ? 'checked' : '' ?> required>
                <label for="Problema de dosagem">Problema de dosagem</label>

                <!-- outros -->
                <input type="radio" id="Outros" name="categoria" value="Outros" <?php echo ($categoria == 'Outros') ? 'checked' : '' ?> required>
                <label for="Outros">Outros</label>

                <br><br>
                <br><br>
                
                <!-- descrição -->
                <label for="descricao">Descrição:</label>
                <br>
                <input type="text" name="descricao" id="descricao" class="inputUser" value="<?php echo $descricao ?>" required></input>
                
                <br><br>
                <br><br>

                <!-- arquivo prescrição -->
                <label for="imagem">Novo arquivo:</label>
                <input type="file" id="imagem" name="imagem">
                
                <br><br>
                <br><br>

                <!-- id -->
                <input type="hidden" name="id" value="<?php echo $id ?>">

                <!-- botão enviar -->
                <input type="submit" name="update" id="update" value="Salvar">
            </fieldset>
        </form>
    </div>
</body>
</html>