<?php

    require_once '../vendor/autoload.php';

    use Firebase\JWT\JWT;
    
    $pdo = new \PDO(
        "mysql:host=db;dbname=autenticacao;charset=utf8",
        "autenticacaouser",
        "password" 
    );

    $login = 'eduardo@teste.com';
    $senhaTexto = '123456';


    $sql = 'SELECT * FROM usuarios WHERE email = ?';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(1, $login);
    $stmt->execute();

    $usuario = $stmt->fetch(\PDO::FETCH_ASSOC);


    if(password_verify($senhaTexto, $usuario['senha'])){
        echo JWT::encode(['user' => $usuario['email']], 'minha_chave_secreta', 'HS256');
    }else {
        echo 'Senha inválida';
    }