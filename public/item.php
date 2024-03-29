<?php
require_once('header.php');

include_once(str_replace('\\', '/', dirname(__FILE__, 2)) . "../classes/produtos.class.php");
include_once(str_replace('\\', '/', dirname(__FILE__, 2)) . "../controller/produto.controller.php");
include_once(str_replace('\\', '/', dirname(__FILE__, 2)) . "../config/config.php");

$produto = new Produtos();
$perc = 90;

if (isset($_GET) && isset($_GET['key'])) {
    $id = filter_input(INPUT_GET, 'key');
    $controller = new ProdutoController();
    $produto = $controller->buscarPorId($id);
}
?>

<head>

</head>

<?php require_once('nav.php') ?>
<div class="container">
    <main>
        <div class="topo">
            <div id="carouselItens" class="carousel carousel_item slide">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselItens" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselItens" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselItens" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="../imagens/uploads/<?= $produto->getImagem(); ?>" class="d-block w-100" alt="aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa">
                    </div>
                    <div class="carousel-item">
                        <img src="../imagens/aber-logo-zip-file/png/logo-no-background.png" class="d-block w-100" alt="alt">
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselItens" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselItens" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>


                    <iframe class="carousel-item" src="http://eelslap.com/" width="300" height="300">
                        <p>Your browser does not support iframes.</p>
                    </iframe>
                    
                </div>
            </div>

            <div class="bloco">
                <form action="../acoes/carrinho.add.php" method="post">

                    <strong class="nome"> <?= $produto->getNome() ?> </strong>

                    <div class="flex-between espaco">
                        <p>Marca: <?= $produto->getMarca() ?> </p> <span>Garantia: infinita</span>
                    </div>

                    <div class="divisao espaco">
                        <p></p>
                    </div>

                    <div class="flex-between espaco">
                        <div class="preco">
                            <del>R$<?= str_replace(".", ",", round(($produto->getPreco() * $perc) / 30, 2)); ?></del>
                            <br>
                            <span> R$<?= str_replace(".", ",", strval($produto->getPreco())) ?></span>
                            <p>à vista com desconto</p>
                        </div>
                        <div class="compra">

                            <input type="hidden" name="id_produto" value="<?= $produto->getId(); ?>">
                            <input type="hidden" name="preco_produto" value="<?= $produto->getPreco(); ?>">
                            <button type="submit" class="btn_carrinho">Carrinho</button>
                        </div>
                    </div>

                    <div espaco>
                        <p>R$<?= str_replace(".", ",", round(($produto->getPreco() * $perc) / 80, 2)); ?> no cartão</p>
                        <p>até 12x de R$<?= str_replace(".", ",", round(($produto->getPreco()) / 12, 2)); ?> </p>
                    </div>

                    <div class="divisao espaco">
                        <p></p>
                    </div>

                    <div class="pagamento">
                        <div class="flex-around">
                            <div>
                                <p>2x de R$<?= str_replace(".", ",", round(($produto->getPreco()) / 2, 2)); ?></p>
                                <p>3x de R$<?= str_replace(".", ",", round(($produto->getPreco()) / 3, 2)); ?></p>
                                <p>4x de R$<?= str_replace(".", ",", round(($produto->getPreco()) / 4, 2)); ?></p>
                                <p>5x de R$<?= str_replace(".", ",", round(($produto->getPreco()) / 5, 2)); ?></p>
                                <p>6x de R$<?= str_replace(".", ",", round(($produto->getPreco()) / 6, 2)); ?></p>
                            </div>
                            <div>
                                <p>7x de R$<?= str_replace(".", ",", round(($produto->getPreco()) / 7, 2)); ?></p>
                                <p>8x de R$<?= str_replace(".", ",", round(($produto->getPreco()) / 8, 2)); ?></p>
                                <p>9x de R$<?= str_replace(".", ",", round(($produto->getPreco()) / 9, 2)); ?></p>
                                <p>10x de R$<?= str_replace(".", ",", round(($produto->getPreco()) / 10, 2)); ?></p>
                                <p>11x de R$<?= str_replace(".", ",", round(($produto->getPreco()) / 11, 2)); ?></p>
                            </div>
                        </div>

                        <div class="opcpagamento flex-around">
                            <img src="../imagens/img cartao/mastercard_logo.png" />
                            <img src="../imagens/img cartao/visa_logo.png" />
                        </div>
                    </div>

                </form>

            </div>
        </div>


        <div class="accordion" id="accordionDetalhes">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                        Descrição Geral
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseOne" class="accordion-collapse bs-warning-bg-subtle collapse show">
                    <div class="accordion-body">
                        <?= $produto->getDescricao() ?>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                        Informações Técnicas
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        Em todos esses anos nessa indústria vital, essa é a primeira vez que encontro um produto tão magnífico quanto este. Isso seria capaz de alimentar famílias, fazer nascer rosas no seu quintal, e estabilizar a economia brasileira. A vontade de chorar é imensa, mas a de comemorar a chegada deste produto é maior.
                    </div>
                </div>
            </div>
        </div>
    </main>


</div>

<?php require_once('footer.php') ?>