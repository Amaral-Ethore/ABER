<?php 
require_once('header.php');

include_once(str_replace('\\', '/', dirname(__FILE__, 2)) . "../classes/produtos.class.php");
include_once(str_replace('\\', '/', dirname(__FILE__, 2)) . "../controller/produto.controller.php");
include_once(str_replace('\\', '/', dirname(__FILE__, 2)) . "../config/config.php");

$produto = new Produtos();

if (isset($_GET) && isset($_GET['key'])) {
    $id = filter_input(INPUT_GET, 'key');
    $controller = new ProdutoController();
    $produto = $controller->buscarPorId($id);
}
?>

<head>
    <link rel="stylesheet" href="../style/pagitem.css">
</head>

<body>
    <div class="container">
        <?php require_once('nav.php') ?>
        <main>
            <div class="topo">
                <div id="carouselItens" class="carousel slide">
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

                    <span class="nome"> <?= $produto->getNome() ?> </span>

                    <div class="flex-between">
                        <p>Marca: <?= $produto->getMarca() ?> </p> <span>Garantia: x meses</span>
                    </div>

                    <div class="flex-between">
                        <div class="preco">
                            <del>Preço original</del>
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
                        <p>R$n no cartão</p>
                        <p>até n vezes de n reais </p>
                    </div>

                    <div class="divisao">
                        <p></p>
                    </div>
                    
                    <div class="pagamento">
                        <div class="flex-around">
                            <div>
                                <p>n de vezes + preço</p>
                                <p>n de vezes + preço</p>
                                <p>n de vezes + preço</p>
                                <p>n de vezes + preço</p>
                                <p>n de vezes + preço</p>
                            </div>
                            <div>
                                <p>n de vezes + preço</p>
                                <p>n de vezes + preço</p>
                                <p>n de vezes + preço</p>
                                <p>n de vezes + preço</p>
                                <p>n de vezes + preço</p>
                            </div>
                        </div>

                        <div class="opcpagamento flex-between">
                            adsad
                        </div>
                    </div>


                    <div class="divisao">
                        <p></p>
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
                            <?= $produto->getDescricao()?>
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
</body>

</html>