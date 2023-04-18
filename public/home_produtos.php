<?php

require_once('./header.php');
/* require_once(str_replace('\\', '/', dirname(__FILE__, 2)) .'/acoes/verifica_sessao.php'); */
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . '../controller/produto.controller.php');

$controller = new ProdutoController();
$produto = $controller->buscarTodos();

// SELECT cp.*, p.nome FROM `compra_produto` as cp INNER JOIN produtos as p ON p.id = cp.produto;

?>
<div class="container">
    <?php require_once('nav.php'); ?>

    <h1>Lista de Produtos</h1>
    <a class="btn btn-primary" href="">Novo Produto</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Descricao</th>
                <th scope="col">Marca</th>
                <th scope="col">Validade</th>
                <th scope="col">Setor</th>
                <th scope="col">Codigo de Barras</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($produto as $p) :
            ?>
                <tr>
                    <td><?= $p->getId(); ?></td>
                    <td><?= $p->getNome(); ?></td>
                    <td><?= $p->getDescricao(); ?></td>
                    <td><?= $p->getMarca(); ?></td>
                    <td><?= $p->getValidade(); ?></td>
                    <td><?= $p->getSetor(); ?></td>
                    <td><?= $p->getCodeBar(); ?></td>
                    <td>
                        <a class="btn btn-light" href="./cad_produto.php?key=<?= $p->getId() ?>">Editar</a>
                        <a class="btn btn-link" href="../acoes/excluir.produtos.php?key=<?= $p->getId() ?>">Excluir</a>
                    </td>
                </tr>
            <?php
            endforeach;
            ?>
        </tbody>
    </table>

    <?php
    if (isset($_SESSION) && isset($_SESSION['sucesso']) && $_SESSION['sucesso'] == TRUE) {
    ?>
        <div class="alert alert-success" role="alert">
            <?= $_SESSION['mensagem']; ?>
        </div>
    <?php
    }
    if (isset($_SESSION) && isset($_SESSION['sucesso']) && $_SESSION['sucesso'] == false) {
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
