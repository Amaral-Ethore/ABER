<?php
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . '/config/functions.php');
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . '/classes/produtos.class.php');

class ProdutoDAO
{
    public function buscarTodos()
    {
        $pdo = conectDb();
        try {
            $stmt = $pdo->prepare("SELECT * FROM produtos;");
            $stmt->execute();
            $produto = new Produtos();
            $retorno = null;
            while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                $produto->setId($rs->id);
                $produto->setNome(($rs->nome));
                $produto->setDescricao($rs->descricao);
                $produto->setPreco($rs->preco);
                $produto->setMarca($rs->marca);
                $produto->setValidade($rs->validade);
                $produto->setSetor($rs->setor);
                $produto->setCodebar($rs->codebar);
                $produto->setImagem($rs->imagem);
                $retorno[] = clone $produto;
            }
            return $retorno;
        } catch (PDOException $ex) {
            echo "Erro ao buscar produto: " . $ex->getMessage();
            die();
        }
    }

    public function buscarUm($id)
    {
        $pdo = conectDb();
        try {
            $stmt = $pdo->prepare("SELECT * FROM produtos WHERE id = :id;");
            $stmt->bindValue(":id", $id);
            $stmt->execute();
            $produto = new Produtos();
            
            while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                $produto->setId($rs->id);
                $produto->setNome(($rs->nome));
                $produto->setDescricao($rs->descricao);
                $produto->setPreco($rs->preco);
                $produto->setMarca($rs->marca);
                $produto->setValidade($rs->validade);
                $produto->setSetor($rs->setor);
                $produto->setCodebar($rs->codebar);
                $produto->setImagem($rs->imagem);
            }
            return $produto;
        } catch (PDOException $ex) {
            echo "Erro ao buscar produto: " . $ex->getMessage();
            die();
        }
    }

    public function removeProduto($id)
    {
        $pdo = conectDb();
        $pdo->beginTransaction();
        try {
            $stmt = $pdo->prepare('DELETE FROM produtos WHERE id = :id');
            $stmt->bindValue(":id", $id);
            $stmt->execute();
            if ($stmt->rowCount()) {
                $pdo->commit();
            }
            return $stmt->rowCount();
        } catch (PDOException $ex) {
            echo "Erro ao excluir produto: " . $ex->getMessage();
            $pdo->rollBack();
            die();
        }
    }

    public function inserirProduto(Produtos $produto)
    {
        $pdo = conectDb();
        $pdo->beginTransaction();
        try {
            $stmt = $pdo->prepare("INSERT INTO produtos (nome, descricao, preco, codebar, marca, setor, validade, imagem) VALUES (:nome, :descricao, :preco, :codebar,:marca,:setor, :validade, :img)");
            $stmt->bindValue(":nome", $produto->getNome());
            $stmt->bindValue(":descricao", $produto->getDescricao());
            $stmt->bindValue(":preco", $produto->getPreco());
            $stmt->bindValue(":codebar", $produto->getCodebar());
            $stmt->bindValue(":marca", $produto->getMarca());
            $stmt->bindValue(":setor", $produto->getSetor());
            $stmt->bindValue(":validade", $produto->getValidade());
            $stmt->bindValue(":img", $produto->getImagem());
            $stmt->execute();
            if ($stmt->rowCount()) {
                $pdo->commit();
                return TRUE;
            }
            return FALSE;
        } 
        catch (PDOException $ex) {
            echo "Erro ao inserir produto: " . $ex->getMessage();
            $pdo->rollBack();
            die();
        }
    }

    public function atualizaproduto(Produtos $produto)
    {
        $pdo = conectDb();
        $pdo->beginTransaction();
        try {
            $stmt = $pdo->prepare("UPDATE produtos SET nome = :nome, descricao = :descricao, codigo_barras = :codigo_barras, qtde_estoque = :qtde_estoque, imagem = :img WHERE id = :id");
            $stmt->bindValue(":nome", $produto->getNome());
            $stmt->bindValue(":descricao", $produto->getDescricao());
            $stmt->bindValue(":preco", $produto->getPreco());
            $stmt->bindValue(":codebar", $produto->getCodebar());
            $stmt->bindValue(":marca", $produto->getMarca());
            $stmt->bindValue(":setor", $produto->getSetor());
            $stmt->bindValue(":validade", $produto->getValidade());
            $stmt->bindValue(":id", $produto->getId());
            $stmt->bindValue(":img", $produto->getImagem());
            $stmt->execute();
            if ($stmt->rowCount()) {
                $pdo->commit();
                return TRUE;
            }
            return FALSE;
        } 
        catch (PDOException $ex) {
            $pdo->rollBack();
            echo "Erro ao atualizar produto: " . $ex->getMessage();
            die();
        }
    }
}
