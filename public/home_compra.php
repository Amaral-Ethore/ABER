<?php

require_once('./header.php');
/* require_once(str_replace('\\', '/', dirname(__FILE__, 2)) .'/acoes/verifica_sessao.php'); */
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) .'../controller/produto.controller.php');
$controller = new ProdutoController();
$produto = $controller->buscarTodos();

?>
<div class="container">
    <?php require_once('nav.php'); ?>

    <h1>Carrinho</h1>

    <table class="table table-striped table-hover" >
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Compra</th>
                <th scope="col">Produto</th>
                <th scope="col">Quantidade</th>
                <th scope="col">Preço</th>
                
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($produto as $p) :
            ?>
            <!--     <tr>
                    <td><?= $p->getId(); ?></td>
                    <td><?= $p->getCompra(); ?></td>
                    <td><?= $p->getProduto(); ?></td>
                    <td><?= $p->getQuantpro(); ?></td>
                    <td><?= $p->getPreco(); ?></td>
                    <td>
                        <a class="btn btn-link" href="../acoes/excluir.produtos.php?key=<?=$p->getId()?>">Excluir</a>
                    </td>
                </tr> -->
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