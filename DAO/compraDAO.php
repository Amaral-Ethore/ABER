<?php
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . '../config/functions.php');
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . '../classes/compra.class.php');

class CompraDAO{
    function inserirCompra(Compra $compra)
    {
        $pdo = conectDb();
        $pdo->beginTransaction();
        try {
            $stmt = $pdo->prepare("INSERT INTO compra (cliente) VALUES (:cliente)");
            $stmt->bindValue(":cliente", $compra->getCliente());
            $stmt->execute();
            $lastId = $pdo->lastInsertId();
            if ($lastId > 0) {
                $pdo->commit();
            }
            return $lastId;
        } catch (PDOException $ex) {
            echo "Erro ao inserir compra: " . $ex->getMessage();
            $pdo->rollBack();
            die();
        }
    }

    function buscarPorCliente($id)
    {
        $pdo = conectDb();
        try {
            $stmt = $pdo->prepare("SELECT * FROM `compra` WHERE cliente = :id LIMIT 1; ");
            $stmt->bindValue(":id", $id);
            $stmt->execute();
            
            if ($stmt->rowCount() > 0) {
                $compra = new Compra();
                while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                    $compra->setId($rs->id);
                    $retorno = clone $compra;
                }

                return $retorno;
            } else {
                return NULL;
            }
        } catch (PDOException $ex) {
            echo "Erro ao buscar compra: " . $ex->getMessage();
            die();
        }
    }
}
?>


