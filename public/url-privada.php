<?php

    require_once '../vendor/autoload.php';

    use Firebase\JWT\JWT;
    use Firebase\JWT\Key;

    $token = $_SERVER['HTTP_AUTHORIZATION'];
    $token = str_replace('Bearer', '', $token);

    $tokenDecodificado = JWT::decode($token, new Key('minha_chave_secreta', 'HS256'));
    
    echo $tokenDecodificado->user;

    /*

    --COLAR NO CONSOLE--

        fetch('http://localhost:8000/url-privada.php', {
        headers: {
            Authorization: 'BearereyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyIjoiZWR1YXJkb0B0ZXN0ZS5jb20ifQ.7eN_-abpJK5ad_cB9n_qlX4sxrCNrPrKag_46R5cpvw'
        }
    })
        .then(res => res.text())
        .then(usuario => console.log(usuario));

    */