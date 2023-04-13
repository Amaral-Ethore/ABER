<?php
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . '../config/functions.php');
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . '../classes/carrinho.class.php');

class CarrinhoDAO
{

    public function buscarTodos()
    {
        $pdo = conectDb();
        try {
            $stmt = $pdo->prepare("SELECT * FROM carrinho;");
            $stmt->execute();
            $compra = new Carrinho();
            $retorno = array();
            while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                $compra->setId($rs->id);
                $compra->setCompra(($rs->compra));
                $compra->setProduto(($rs->produto));
                $compra->setQuantProd(($rs->quantprod));
                $compra->setPreco(($rs->preco));
                $retorno[] = clone $compra;
            }
            return $retorno;
        } catch (PDOException $ex) {
            echo "Erro ao buscar compra: " . $ex->getMessage();
            die();
        }
    }

    public function buscarUm($id)
    {
        $pdo = conectDb();
        try {
            $stmt = $pdo->prepare("SELECT * FROM carrinho WHERE id = :id;");
            $stmt->bindValue(":id", $id);
            $stmt->execute();
            $compra = new Carrinho();
            while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                $compra->setId($rs->id);
                $compra->setCompra(($rs->compra));
                $compra->setProduto(($rs->produto));
                $compra->setQuantProd(($rs->quantprod));
                $compra->setPreco(($rs->preco));
            }
            return $compra;
        } catch (PDOException $ex) {
            echo "Erro ao buscar compra 2: " . $ex->getMessage();
            die();
        }
    }

     function inserirCompra(Compra $compra)
    {
        $pdo = conectDb();
        $pdo->beginTransaction();
        try {
            $stmt = $pdo->prepare("INSERT INTO compra (cliente) VALUES (:cliente)");
            $stmt->bindValue(":cliente", $compra->getCliente());
            $stmt->execute();
            if ($stmt->rowCount()) {
                $pdo->commit();
                return TRUE;
            }
            return FALSE;
        } catch (PDOException $ex) {
            echo "Erro ao inserir compra: " . $ex->getMessage();
            $pdo->rollBack();
            die();
        }
    }
}
