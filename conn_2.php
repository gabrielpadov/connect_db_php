<?php

define("SERVER", "servidor");
define("DATABASE","nome_banco");
define("USERNAME","usuario_banco");
define("PASSWORD","senha_banco");

define("MSG_NOT_AUTHORIZED", "Acesso não autorizado. ");
define("MSG_NOT_CONNECTED", "Nenhum usuário conectado ao sistema. ");
define("MSG_REQUEST_ERROR", "Erro de requisição. ");
define("MSG_REQUEST_SUCCESS", "Requisição realizada com sucesso. ");
define("MSG_LOGOUT", "Usuário desconectado do sistema. ");
define("MSG_LOGIN_FAILED", "Usuário e senha não combinam. ");
define("MSG_LOGIN_SUCCESS", "Usuário conectado. Bem-vindo. ");
define("MSG_EMPTY_FIELDS", "É obrigatório preencher todos os campos.");
define("MSG_DUPLICATE_REGISTER", "Já existe no nosso banco de dados.");
define("MSG_NO_REGISTER", "Registro não encontrado");

try {
    $database = new PDO("mysql:host=".SERVER.";dbname=".DATABASE.";charset=utf8", USERNAME, PASSWORD);
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e) {
    $response = array('error'=>true, 'message'=>$e->getMessage());
    echo json_encode($response);
    die();
}
?>
