<?php

function cors()
{
  // Permitir requisições de qualquer origem
  header("Access-Control-Allow-Origin: *");

  // Métodos permitidos
  header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");

  // Cabeçalhos permitidos
  header("Access-Control-Allow-Headers: Content-Type, Authorization");

  // Permitir credenciais (cookies, cabeçalhos de autenticação)
  header("Access-Control-Allow-Credentials: true");

  // Se a requisição for OPTIONS, retorne imediatamente com os cabeçalhos CORS
  if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    header("HTTP/1.1 200 OK");
    exit();
  }

  // Verificar se o método de requisição é permitido
  if (!in_array($_SERVER['REQUEST_METHOD'], ['GET', 'POST', 'PUT', 'DELETE'])) {
    header("HTTP/1.1 405 Method Not Allowed");
    exit();
  }
}
