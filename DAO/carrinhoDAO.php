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

    public function buscarTodosPorCompra($id_compra)
    {
        $pdo = conectDb();
        try {
            $stmt = $pdo->prepare("SELECT * FROM carrinho WHERE compra = :id;");
            $stmt->bindValue(":id", $id_compra);
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
            return  $retorno;
        } catch (PDOException $ex) {
            echo "Erro ao buscar compra 2: " . $ex->getMessage();
            die();
        }
    }

    function buscarNome($id)
    {
        $pdo = conectDb();
        try {
            $stmt = $pdo->prepare("SELECT cp.*, p.nome FROM `carrinho` as cp INNER JOIN produtos as p ON p.id = " . $id);
            /*  $stmt->bindValue(":cp.produto", $id); */
            $stmt->execute();
            $compra = new Carrinho();
            while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                $compra->setNome(($rs->nome));
                $retorno = clone $compra;
            }

            return $retorno;
        } catch (PDOException $ex) {
            echo "Erro ao buscar compra: " . $ex->getMessage();
            die();
        }
    }

    function criarCarrinho(Carrinho $carrinho)
    {
        $pdo = conectDb();
        $pdo->beginTransaction();
        try {
            $stmt = $pdo->prepare("INSERT INTO carrinho(compra, produto, quantprod, preco, total) VALUES(:compra, :prod, :qtd, :preco, :total)");
            $stmt->bindValue(":compra", $carrinho->getCompra());
            $stmt->bindValue(":prod", $carrinho->getProduto());
            $stmt->bindValue(":qtd", $carrinho->getQuantprod());
            $stmt->bindValue(":preco", $carrinho->getPreco());
            $stmt->bindValue(":total", $carrinho->getPreco() * $carrinho->getQuantprod());

            $stmt->execute();
            $lastId = $pdo->lastInsertId();
            if ($lastId > 0) {
                $pdo->commit();
            }
            return $lastId;
        } catch (PDOException $ex) {
            echo "Erro ao buscar compra: " . $ex->getMessage();
            $pdo->rollBack();
            die();
        }
    }
}
