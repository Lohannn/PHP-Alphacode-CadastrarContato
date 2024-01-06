<?php

include 'Controller/ContatoController.php';

//Para rodar o servidor php use o comando no terminal
//php -S localhost:8000 -c php.ini

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($url) {

    case '/':
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
            ContatoController::getContactById();
        } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty($_POST['id'])) {
                ContatoController::put();
            } else {
                ContatoController::save();
            }
        } else {
            ContatoController::index();
        }
        break;

    case '/deletar':
        ContatoController::delete();
        break;
}