<?php
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . '/config/functions.php');
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . '/classes/cliente.class.php');

class ClienteDAO
{

    public function buscarTodos()
    {
        $pdo = conectDb();
        try {
            $stmt = $pdo->prepare("SELECT * FROM clientes ORDER BY id asc;");
            $stmt->execute();
            $cliente = new Cliente();
            $retorno = array();
            while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                $cliente->setId($rs->id);
                $cliente->setNome($rs->nome);
                $cliente->setEndereco($rs->endereco);
                $cliente->setSenha($rs->senha);
                $cliente->setEmail($rs->email);
                $cliente->setCpfCnpj($rs->cpfcnpj);
                $cliente->setTelefone($rs->telefone);
                $retorno[] = clone $cliente;
            }
            return $retorno;
        } 
        catch (PDOException $ex) {
            echo "Erro ao buscar cliente: " . $ex->getMessage();
            die();
        }
    }

    public function buscarUm($id)
    {
        $pdo = conectDb();
        try {
            $stmt = $pdo->prepare("SELECT * FROM clientes WHERE id = ?;");
            $stmt->bindValue(1, $id);
            $stmt->execute();
            $cliente = new Cliente();
            while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                $cliente->setId($rs->id);
                $cliente->setNome($rs->nome);
                $cliente->setEndereco($rs->endereco);
                $cliente->setSenha($rs->senha);
                $cliente->setEmail($rs->email);
                $cliente->setCpfCnpj($rs->cpfcnpj);
                $cliente->setTelefone($rs->telefone);
            }
            return $cliente;
        } 
        catch (PDOException $ex) {
            echo "Erro ao buscar cliente: " . $ex->getMessage();
            die();
        }
    }

    public function buscarPorEmail($mail)
    {
        $pdo = conectDb();
        try {
            $stmt = $pdo->prepare("SELECT * FROM clientes WHERE email = :email;");
            $stmt->bindValue(":email", $mail);
            $stmt->execute();
            $cliente = new Cliente();
            $result = null;
            while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                $cliente->setId($rs->id);
                $cliente->setNome(($rs->nome));
                $cliente->setEndereco(($rs->endereco));
                $cliente->setSenha(($rs->senha));
                $cliente->setEmail(($rs->email));
                $cliente->setCpfCnpj($rs->cpfcnpj);
                $cliente->setTelefone($rs->telefone);
                $result = clone $cliente;
            }
            return $result;
        } 
        catch (PDOException $ex) {
            echo "Erro ao buscar cliente: " . $ex->getMessage();
            die();
        }
    }

    public function removeCliente($id)
    {
        $pdo = conectDb();
        $pdo->beginTransaction();
        try {
            $stmt = $pdo->prepare('DELETE FROM clientes WHERE id = :id');
            $stmt->bindValue(":id", $id);
            $stmt->execute();
            if ($stmt->rowCount()) {
                $pdo->commit();
            }
            return $stmt->rowCount();
        } 
        catch (PDOException $ex) {
            echo "Erro ao excluir cliente: " . $ex->getMessage();
            $pdo->rollBack();
            die();
        }
    }

    public function inserirCliente(Cliente $cliente)
    {
        $pdo = conectDb();
        $pdo->beginTransaction();
        try {
            $stmt = $pdo->prepare("INSERT INTO clientes (nome,email,senha,endereco, cpfcnpj, telefone) VALUES (:nome,:email, :senha, :endereco, :cpf, :tel)");
            $stmt->bindValue(":nome", $cliente->getNome());
            $stmt->bindValue(":email", $cliente->getEmail());
            $stmt->bindValue(":senha", $cliente->getSenha());
            $stmt->bindValue(":endereco", $cliente->getEndereco());
            $stmt->bindValue(":cpf", $cliente->getCpfCnpj());
            $stmt->bindValue(":tel", $cliente->getTelefone());
            $stmt->execute();
            if ($stmt->rowCount()) {
                $pdo->commit();
                return TRUE;
            }
            return FALSE;
        } 
        catch (PDOException $ex) {
            echo "Erro ao inserir cliente: " . $ex->getMessage();
            $pdo->rollBack();
            die();
        }
    }

    public function atualizaCliente(Cliente $cliente)
    {
        $pdo = conectDb();
        $pdo->beginTransaction();
        try {
            $stmt = $pdo->prepare("UPDATE clientes SET nome = :nome, email = :email, senha = :senha, endereco = :endereco, cpfcnpj = :cpf, telefone = :tel WHERE id = :id");
            $stmt->bindValue(":nome", $cliente->getNome());
            $stmt->bindValue(":email", $cliente->getEmail());
            $stmt->bindValue(":senha", $cliente->getSenha());
            $stmt->bindValue(":endereco", $cliente->getEndereco());
            $stmt->bindValue(":cpf", $cliente->getCpfCnpj());
            $stmt->bindValue(":tel", $cliente->getTelefone());
            $stmt->bindValue(":id", $cliente->getId());
            $stmt->execute();
            if ($stmt->rowCount()) {
                $pdo->commit();
                return TRUE;
            }
            return FALSE;
        } 
        catch (PDOException $ex) {
            $pdo->rollBack();
            echo "Erro ao atualizar cliente: " . $ex->getMessage();
            die();
        }
    }
}
