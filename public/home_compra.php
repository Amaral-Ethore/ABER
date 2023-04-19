<?php

require_once('header.php');
/* require_once(str_replace('\\', '/', dirname(__FILE__, 2)) .'/acoes/verifica_sessao.php'); */
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . '../controller/carrinho.controller.php');
$controller = new CarrinhoController();
$carrinho = $controller->buscarTodos();

?>
<div class="container">
    <?php require_once('nav.php'); ?>
    <main>
        <h1>Carrinho</h1>

        <table class="table table-striped table-hover">
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
                foreach ($carrinho as $c) :
                ?>
                    <tr>
                        <td><?= $c->getId(); ?></td>
                        <td><?= $c->getCompra(); ?></td>
                        <td><?= $controller->buscarNome($c->getProduto()); ?></td>
                        <td><?= $c->getQuantprod(); ?></td>
                        <td><?= $c->getPreco(); ?></td>
                        <td>
                            <a class="btn btn-link" href="../acoes/excluir.produtos.php?key=<?= $c->getId() ?>">Excluir</a>
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

  
    </main>



</div>
<?php require_once('footer.php'); ?> 
