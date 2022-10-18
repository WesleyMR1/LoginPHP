
<?php
    if (!isset($_SESSION)) {
        session_start();
    }

    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
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

    <form action="../Controller/LoginController.php" method="POST">
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


    <br/>
    <br/>
    <br/>
    <br/>

    <a href="cadastrar.php">
        <input type="button" value="Cadastrar">
    </a>


    
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