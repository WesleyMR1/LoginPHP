<?php
include('../Controller/DAO/Conexao.php');
if (!isset($_SESSION)) {
    session_start();
}


$pdo = conectar();

// 


if (isset($_POST['usuario']) || isset($_POST['senha'])) {
    if (strlen($_POST['usuario']) == 0) {
        $_SESSION['msg'] = "Preencha seu usuario!";
        header("Location: ../View/index.php");
    }elseif (strlen($_POST['senha']) == 0) {
        $_SESSION['msg'] = "Preencha sua senha!";
        header("Location: ../View/index.php");
    }else {
        
        
        //evita que tenha caracteres especiais(alguns) na string
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];

        // $sql_code =  "select * from contas where usuario = '$usuario' LIMIT 1";
        $result = $pdo->query("select * from contas where usuario = '$usuario' LIMIT 1");
        // $sql_query = $mysqli->query($sql_code) or die("Falha na excução do código SQL: ". $mysqli->error);

        // $quantidade = $sql_query->num_rows;
        $conta = $result->fetch(PDO::FETCH_ASSOC);

        if (password_verify($senha, $conta['senha'])) {

            if (!isset($_SESSION)) {
                session_start();
            }

           
            $_SESSION['id'] = $conta['id'];
            $_SESSION['nome'] = $conta['nome'];
            
            header("Location: ../View/painel.php");

            
        }else {
            $_SESSION['msg'] = "Falha ao logar.<Br/>  Usuario ou senha incorretos!";
            header("Location: ../View/index.php");
        }


    }
}




?>