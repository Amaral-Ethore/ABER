<?php
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . "../DAO/compraDAO.php");
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . "../classes/compra.class.php");

class CompraController{
    public function criarCompra($compra)
    {
        $dao = new CompraDAO();
        $lastCompra = $dao->buscarPorCliente($compra->getCliente());
        if ($lastCompra != NULL) {
            return $lastCompra->getId();
        }
        return $dao->inserirCompra($compra);
    }
}
?>