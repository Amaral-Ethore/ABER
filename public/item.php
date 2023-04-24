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
                            <img src="..." class="d-block w-100" alt="bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb">
                        </div>
                        <div class="carousel-item">
                            <img src="..." class="d-block w-100" alt="ccccccccccccccccccccccccccccccc">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselItens" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselItens" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

                <div class="bloco">
                    <form action="../acoes/carrinho.add.php" method="post">

                        <strong class="nome"> <?= $produto->getNome() ?> </strong>

                        <div class="flex-between">
                            <p>Marca: <?= $produto->getMarca() ?> </p> <span>Garantia: x meses</span>
                        </div>

                        <div class="divisao">
                            <p></p>
                        </div>

                        <div class="flex-between">
                            <div class="preco">
                                <del>R$<?= round(($produto->getPreco() * $perc) / 30, 2); ?></del>
                                <br>
                                <span> R$<?= $produto->getPreco() ?></span>
                                <p>à vista com desconto</p>
                            </div>
                            <div class="compra">
                                <button class="btn_comprar">Comprar</button>
                                <br>
                                <button class="btn_carrinho">Carrinho</button>
                            </div>
                        </div>

                        <div>
                            <p>R$<?= round(($produto->getPreco() * $perc) / 80, 2); ?> no cartão</p>
                            <p>até 12x de R$<?= round($produto->getPreco() / 12, 2); ?> </p>
                        </div>

                        <div class="divisao">
                            <p></p>
                        </div>

                        <div class="pagamento">
                            <div class="flex-around">
                                <div>
                                    <p>2x de R$<?= round($produto->getPreco() / 2, 2); ?></p>
                                    <p>3x de R$<?= round($produto->getPreco() / 3, 2); ?></p>
                                    <p>4x de R$<?= round($produto->getPreco() / 4, 2); ?></p>
                                    <p>5x de R$<?= round($produto->getPreco() / 5, 2); ?></p>
                                    <p>6x de R$<?= round($produto->getPreco() / 6, 2); ?></p>
                                </div>
                                <div>
                                    <p>7x de R$<?= round($produto->getPreco() / 7, 2); ?></p>
                                    <p>8x de R$<?= round($produto->getPreco() / 8, 2); ?></p>
                                    <p>9x de R$<?= round($produto->getPreco() / 9, 2); ?></p>
                                    <p>10x de R$<?= round($produto->getPreco() / 10, 2); ?></p>
                                    <p>11x de R$<?= round($produto->getPreco() / 11, 2); ?></p>
                                </div>
                            </div>

                            <div class="opcpagamento flex-between">
                                adsad
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
                            <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                        </div>
                    </div>
                </div>
            </div>
        </main>


    </div>

    <?php require_once('footer.php') ?>