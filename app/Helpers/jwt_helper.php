<?php

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

function generateJWT($userData, $expireInSeconds = 3600) {
    $key = getenv('JWT_SECRET_KEY');
    $payload = [
        'iss' => 'mybrada',         // Issuer
        'aud' => 'mybrada-users',   // Audience
        'iat' => time(),            // Issued At
        'exp' => time() + $expireInSeconds,
        'user' => $userData
    ];
    return JWT::encode($payload, $key, 'HS256');
}

function decodeJWT($jwt) {
    $key = getenv('JWT_SECRET_KEY');
    return JWT::decode($jwt, new Key($key, 'HS256'));
}
