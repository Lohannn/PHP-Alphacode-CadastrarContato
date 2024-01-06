<?php

class ContatoDAO
{

    private $conexao;

    public function __construct()
    {
        $dsn = "mysql:host=localhost;port=3306;dbname=db_alphacode_contacts";

        $this->conexao = new PDO($dsn, 'root', 'EkkoDeZa1');
        $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->conexao->exec("SET NAMES 'utf8mb4'");
    }

    public function insert(ContatoModel $model)
    {
        try {
            $sql = "insert into tbl_contato (
                nome,
                email,
                data_nascimento,
                profissao,
                telefone,
                celular,
                tem_whatsapp,
                notificacao_sms,
                notificacao_email
            )values(
                ?,
                ?,
                ?,
                ?,
                ?,
                ?,
                ?,
                ?,
                ?
            )";

            $stmt = $this->conexao->prepare($sql);

            $stmt->bindValue(1, $model->nome);
            $stmt->bindValue(2, $model->email);
            $stmt->bindValue(3, $model->data_nascimento);
            $stmt->bindValue(4, $model->profissao);
            $stmt->bindValue(5, $model->telefone);
            $stmt->bindValue(6, $model->celular);
            $stmt->bindValue(7, $model->tem_whatsapp);
            $stmt->bindValue(8, $model->notificacao_sms);
            $stmt->bindValue(9, $model->notificacao_email);

            $stmt->execute();
        } catch (Throwable $error) {
            echo "Ocorreu um erro no processo de insert: {$error->getMessage()}";
            die();
        }
    }

    public function update(ContatoModel $model)
    {

        try {
            $sql = "UPDATE tbl_contato SET
            nome = ?,
            email = ?,
            data_nascimento = ?,
            profissao = ?,
            telefone = ?,
            celular = ?,
            tem_whatsapp = ?,
            notificacao_sms = ?,
            notificacao_email = ?
            WHERE id = ?";

            $stmt = $this->conexao->prepare($sql);

            $stmt->bindValue(1, $model->nome);
            $stmt->bindValue(2, $model->email);
            $stmt->bindValue(3, $model->data_nascimento);
            $stmt->bindValue(4, $model->profissao);
            $stmt->bindValue(5, $model->telefone);
            $stmt->bindValue(6, $model->celular);
            $stmt->bindValue(7, $model->tem_whatsapp);
            $stmt->bindValue(8, $model->notificacao_sms);
            $stmt->bindValue(9, $model->notificacao_email);
            $stmt->bindValue(10, $model->id);

            $stmt->execute();
        } catch (Throwable $error) {
            echo "Ocorreu um erro no processo de update: {$error->getMessage()}";
            die();
        }
    }

    public function select()
    {
        try {
            $sql = "SELECT * FROM tbl_contato";

            $stmt = $this->conexao->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_CLASS);
        } catch (Throwable $error) {
            echo "Ocorreu um erro no processo de select: {$error->getMessage()}";
            die();
        }
    }

    public function selectById($id)
    {
        try {
            include_once 'Model/ContatoModel.php';
            $sql = "SELECT * FROM tbl_contato WHERE id = ?";

            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt->execute();

            return $stmt->fetchObject("ContatoModel");
        } catch (Throwable $error) {
            echo "Ocorreu um erro no processo de select pelo ID: {$error->getMessage()}";
            die();
        }
    }

    public function delete($id)
    {
        try {
            include_once 'Model/ContatoModel.php';
            $sql = "DELETE FROM tbl_contato WHERE id = ?";

            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt->execute();
        } catch (Throwable $error) {
            echo "Ocorreu um erro no processo de delete: {$error->getMessage()}";
            die();
        }
    }
}