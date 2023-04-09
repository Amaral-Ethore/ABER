<?php
require_once(str_replace('\\', '/', dirname(__FILE__, 2)). '/config/functions.php');
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) .'/classes/funcionario.class.php');

class FuncionarioDAO
{
    public function buscarTodos()
    {
        $pdo = conectDb();
        try {
            $stmt = $pdo->prepare("SELECT * FROM funcionarios;");
            $stmt->execute();
            $funcionario = new funcionario();
            $retorno = array();
            while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                $funcionario->setId($rs->id);
                $funcionario->setNome(($rs->nome));
                $funcionario->setEmail(($rs->email));
                $funcionario->setSenha(($rs->senha));
                $funcionario->setTelefone($rs->telefone);
                $funcionario->setAtivo($rs->ativo);
                $retorno[] = clone $funcionario;
            }
            return $retorno;
        } catch (PDOException $ex) {
            echo "Erro ao buscar funcionario: " . $ex->getMessage();
            die();
        }
    }

    public function buscarUm($id)
    {
        $pdo = conectDb();
        try {
            $stmt = $pdo->prepare("SELECT * FROM funcionarios WHERE id = :id;");
            $stmt->bindValue(":id", $id);
            $stmt->execute();
            $funcionario = new Funcionario();
            while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                $funcionario->setId($rs->id);
                $funcionario->setNome(($rs->nome));
                $funcionario->setEmail(($rs->email));
                $funcionario->setSenha(($rs->senha));
                $funcionario->setTelefone($rs->telefone);
                $funcionario->setAtivo($rs->ativo);
            }
            return $funcionario;
        } catch (PDOException $ex) {
            echo "Erro ao buscar funcionario: " . $ex->getMessage();
            die();
        }
    }

    public function buscarPorEmail($mail)
    {
        $pdo = conectDb();
        try {
            $stmt = $pdo->prepare("SELECT * FROM funcionarios WHERE email = :email;");
            $stmt->bindValue(":email", $mail);
            $stmt->execute();
            $funcionario = new funcionario();
            while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                $funcionario->setId($rs->id);
                $funcionario->setNome(($rs->nome));
                $funcionario->setSenha(($rs->senha));
                $funcionario->setEmail(($rs->email));
                $funcionario->setAtivo($rs->ativo);
                $funcionario->setTelefone($rs->telefone);
            }
            return $funcionario;
        } catch (PDOException $ex) {
            echo "Erro ao buscar funcionario: " . $ex->getMessage();
            die();
        }
    }

    public function removeFuncionario($id)
    {
        $pdo = conectDb();
        $pdo->beginTransaction();
        try {
            $stmt = $pdo->prepare('DELETE FROM funcionarios WHERE id = :id');
            $stmt->bindValue(":id", $id);
            $stmt->execute();
            if ($stmt->rowCount()) {
                $pdo->commit();
            }
            return $stmt->rowCount();
        } catch (PDOException $ex) {
            echo "Erro ao excluir funcionario: " . $ex->getMessage();
            $pdo->rollBack();
            die();
        }
    }

    public function inserirFuncionario(Funcionario $funcionario)
    {
        $pdo = conectDb();
        $pdo->beginTransaction();
        try {
            $stmt = $pdo->prepare("INSERT INTO funcionarios (nome, email, senha, telefone, ativo) VALUES (:nome,:email, :senha, :tel, :ativo)");
            $stmt->bindValue(":nome", $funcionario->getNome());
            $stmt->bindValue(":email", $funcionario->getEmail());
            $stmt->bindValue(":senha", $funcionario->getSenha());
            $stmt->bindValue(":tel", $funcionario->getTelefone());
            $stmt->bindValue(":ativo", $funcionario->getAtivo());
            $stmt->execute();
            if ($stmt->rowCount()) {
                $pdo->commit();
                return TRUE;
            }
            return FALSE;
        } catch (PDOException $ex) {
            echo "Erro ao inserir funcionario: " . $ex->getMessage();
            $pdo->rollBack();
            die();
        }
    }

    public function atualizaFuncionario(Funcionario $funcionario)
    {
        $pdo = conectDb();
        $pdo->beginTransaction();
        try {
            $stmt = $pdo->prepare("UPDATE funcionarios SET nome = :nome, email = :email, senha = :senha, telefone = :tel, ativo = :ativo WHERE id = :id");
            $stmt->bindValue(":nome", $funcionario->getNome());
            $stmt->bindValue(":email", $funcionario->getEmail());
            $stmt->bindValue(":senha", $funcionario->getSenha());
            $stmt->bindValue(":tel", $funcionario->getTelefone());
            $stmt->bindValue(":ativo", $funcionario->getAtivo());
            $stmt->execute();
            if ($stmt->rowCount()) {
                $pdo->commit();
                return TRUE;
            }
            return FALSE;
        } catch (PDOException $ex) {
            $pdo->rollBack();
            echo "Erro ao atualizar funcionario: " . $ex->getMessage();
            die();
        }
    }
}
