<?php
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . "../DAO/carrinhoDAO.php");
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . "../classes/carrinho.class.php");

class CarrinhoController
{

    public function buscarTodos()
    {
        $dao = new CarrinhoDAO();
        return $dao->buscarTodos();
    }

    public function buscarTodosPorCompra($id_compra)
    {
        $dao = new CarrinhoDAO();
        return $dao->buscarTodosPorCompra($id_compra);
    }

    public function buscarPorId($id)
    {
        $dao = new CarrinhoDAO();
        return $dao->buscarUm($id);
    }

    public function buscarNome($id)
    {
        $dao = new CarrinhoDAO();
        $carrinho = $dao->buscarNome($id);
        return $carrinho->getNome();
    }

    public function salvar($carrinho)
    {
        $dao = new CarrinhoDAO();
        return $dao->criarCarrinho($carrinho);
    }
}
