
<?php
    include '../Controler/DAO/Conexao.php';

    if (isset($_POST['usuario']) || isset($_POST['senha'])) {
        if (strlen($_POST['usuario']) == 0) {
            echo "Preencha seu usuario!";
        }elseif (strlen($_POST['senha']) == 0) {
            echo "Preencha sua senha!";
        }else {
            
            
            //evita que tenha caracteres especiais(alguns) na string
            $usuario = $mysqli->real_escape_string($_POST['usuario']);
            $senha = $mysqli->real_escape_string($_POST['senha']);

            $sql_code =  "select * from contas where usuario = '$usuario' LIMIT 1";
            $sql_query = $mysqli->query($sql_code) or die("Falha na excução do código SQL: ". $mysqli->error);

            $quantidade = $sql_query->num_rows;

          $conta = $sql_query->fetch_assoc();

            if (password_verify($senha, $conta['senha'])) {

                if (!isset($_SESSION)) {
                    session_start();
                }

               
                $_SESSION['id'] = $conta['id'];
                $_SESSION['nome'] = $conta['nome'];
                
                header("Location: painel.php");

                
            }else {
                echo "Falha ao logar.  Usuario ou senha incorretos!";
            }


        }
    }
    


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=
    
    , initial-scale=1.0">
    <title>Document</title>
</head>


<body>

    <form action="" method="POST">
        <p>
        <label> Usuario</label>
        <input type="text" name="usuario">
        </p>

        <p>
            <label>Senha</label>
            <input type="password" name="senha">
        </p>

        <p>
            <button type="submit">Entrar</button>
        </p>
    </form>


    
</body>
</html>



















<!-- //evita que tenha caracteres especiais(alguns) na string
            $usuario = $mysqli->real_escape_string($_POST['usuario']);
            $senha = $mysqli->real_escape_string($_POST['senha']);

            $sql_code =  "select * from contas where usuario = '$usuario' and senha = '$senha'";
            $sql_query = $mysqli->query($sql_code) or die("Falha na excução do código SQL: ". $mysqli->error);

            $quantidade = $sql_query->num_rows;

            if ($quantidade == 1) {

                $conta = $sql_query->fetch_assoc(); -->