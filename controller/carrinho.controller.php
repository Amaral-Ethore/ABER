<?php
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . "../DAO/carrinhoDAO.php");
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . "../classes/carrinho.class.php");
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . "../classes/compra.php");

class CarrinhoController
{

    public function buscarTodos()
    {
        $dao = new CarrinhoDAO();
        return $dao->buscarTodos();
    }

    public function buscarPorId($id)
    {
        $dao = new CarrinhoDAO();
        return $dao->buscarUm($id);
    }
    public function criarCompra($compra)
    {
        $dao = new CarrinhoDAO();
        return $dao->inserirCompra($compra);
    }
    public function buscarNome($id) {
        $dao = new CarrinhoDAO();
        $carrinho = $dao->buscarNome($id);
        return $carrinho->getNome();
    }

}