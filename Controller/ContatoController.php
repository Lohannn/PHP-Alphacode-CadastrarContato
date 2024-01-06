<?php

class ContatoController{

    public static function index(){
        include 'Model/ContatoModel.php';
        $model = new ContatoModel();
        $model->getAllContacts();

        include 'View/modules/Contato/FormContato.php';
    }

    public static function save(){
        include 'Model/ContatoModel.php';

        $model = new ContatoModel();
        $model->nome = $_POST['nome'];
        $model->email = $_POST['email'];
        $model->data_nascimento = $_POST['data_nascimento'];
        $model->profissao = $_POST['profissao'];
        $model->telefone = $_POST['telefone'];
        $model->celular = $_POST['celular'];
        $model->tem_whatsapp = isset($_POST['tem_whatsapp']) ? 1 : 0;
        $model->notificacao_sms = isset($_POST['notificacao_sms']) ? 1 : 0;
        $model->notificacao_email = isset($_POST['notificacao_email']) ? 1 : 0;

        $model->save();

        header('Location: /');
    }

    public static function put(){
        include 'Model/ContatoModel.php';

        $model = new ContatoModel();
        $model->id = $_POST['id'];
        $model->nome = $_POST['nome'];
        $model->email = $_POST['email'];
        $model->data_nascimento = $_POST['data_nascimento'];
        $model->profissao = $_POST['profissao'];
        $model->telefone = $_POST['telefone'];
        $model->celular = $_POST['celular'];
        $model->tem_whatsapp = isset($_POST['tem_whatsapp']) ? 1 : 0;
        $model->notificacao_sms = isset($_POST['notificacao_sms']) ? 1 : 0;
        $model->notificacao_email = isset($_POST['notificacao_email']) ? 1 : 0;

        $model->update();

        header('Location: /');
    }

    public static function getContactById(){
        include 'Model/ContatoModel.php';

        $model = new ContatoModel();
        echo json_encode($model->getContactById((int) $_GET['id']));
    }

    public static function delete(){
        include 'Model/ContatoModel.php';

        $model = new ContatoModel();
        $model->delete((int) $_GET['id']);

        header('Location: /');
    }
}