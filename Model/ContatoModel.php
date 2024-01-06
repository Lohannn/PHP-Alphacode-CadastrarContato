<?php

class ContatoModel{
    public $id, $nome, $email, 
    $data_nascimento, $profissao, $telefone, 
    $celular, $tem_whatsapp, $notificacao_sms, 
    $notificacao_email;

    public $rows;

    public function save(){
        include 'DAO/ContatoDAO.php';

        $dao = new ContatoDAO();
        
        $dao->insert($this);

        $this->rows = $dao->select();
    }

    public function update(){
        include 'DAO/ContatoDAO.php';

        $dao = new ContatoDAO();
        
        $dao->update($this);

        $this->rows = $dao->select();
    }

    public function getAllContacts(){
        include 'DAO/ContatoDAO.php';

        $dao = new ContatoDAO();

        $this->rows = $dao->select();
    }

    public function getContactById($id){
        include_once 'DAO/ContatoDAO.php';

        $dao = new ContatoDAO();
        return $dao->selectById($id);
    }

    public function delete($id){
        include_once 'DAO/ContatoDAO.php';

        $dao = new ContatoDAO();
        $dao->delete($id);
    }
}