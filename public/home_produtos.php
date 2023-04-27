<?php

require_once('./header.php');
/* require_once(str_replace('\\', '/', dirname(__FILE__, 2)) .'/acoes/verifica_sessao.php'); */
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . '../classes/produtos.class.php');
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . '../controller/produto.controller.php');

$controller = new ProdutoController();
$produto = $controller->buscarTodos();

require_once('nav.php'); ?>
<div class="container">

    <h1>Lista de Produtos</h1>
    <a class="btn btn-primary" href="./cad_produto.php">Novo Produto</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Descricao</th>
                <th scope="col">Marca</th>
                <th scope="col">Preço</th>
                <th scope="col">Validade</th>
                <th scope="col">Setor</th>
                <th scope="col">Codigo de Barras</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produto as $p) { ?>
                <tr>
                    <td><?= $p->getId(); ?></td>
                    <td><?= $p->getNome(); ?></td>
                    <td><?= $p->getDescricao(); ?></td>
                    <td><?= $p->getMarca(); ?></td>
                    <td><?= $p->getPreco(); ?></td>
                    <td><?= $p->getValidade(); ?></td>
                    <td><?= $p->getSetor(); ?></td>
                    <td><?= $p->getCodeBar(); ?></td>
                    <td>
                        <a class="btn btn-light" href="./cad_produto.php?key=<?= $p->getId() ?>"><i class="fa-solid fa-pen-clip"></i></a>
                        <a class="btn btn-light " href="../acoes/excluir.produto.php?key=<?= $p->getId(); ?>">
                            <i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <?php
    if (isset($_SESSION) && isset($_SESSION['sucesso']) && $_SESSION['sucesso'] == TRUE && isset($_SESSION['mensagem'])) {
    ?>
        <div class="alert alert-success" role="alert">
            <?= $_SESSION['mensagem']; ?>
        </div>
    <?php
    }
    if (isset($_SESSION) && isset($_SESSION['sucesso']) && $_SESSION['sucesso'] == false && isset($_SESSION['mensagem'])) {
    ?>
        <div class="alert alert-danger" role="alert">
            <?= $_SESSION['mensagem']; ?>
        </div>
    <?php
    }
    unset($_SESSION['sucesso'], $_SESSION['mensagem']);
    ?>

</div>

<?php
require_once('./footer.php');
