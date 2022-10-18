<?php

include('../Controller/DAO/Conexao.php');
if (!isset($_SESSION)) {
    session_start();
}


$pdo = conectar();

$nome = $_POST['nome'];
$usuario = $_POST['usuario'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);


try {
    
    $stmt = $pdo->prepare("Insert into Contas values(0, :nome, :usuario, :senha);");
    $stmt->bindParam(":nome", $nome);
    $stmt->bindParam(":usuario", $usuario);
    $stmt->bindParam(":senha", $senha);
    $stmt->execute();


} catch (\Throwable $th) {
    echo "Não deu certo";
    echo $th->getMessage();
}



function Criptografar($senhaCriptografada){
    return password_hash($senhaCriptografada, PASSWORD_DEFAULT);
}