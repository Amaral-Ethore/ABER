<?php require_once('header.php'); ?>
<div class="container">
    <?php require_once('nav.php') ?>
    <main>
        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
            <div class=" bnrs carousel-inner">
                <div class="b b1 carousel-item active" data-bs-interval="2000">
                    <img src="../imagens/banners/0500346001598558021.png" class="d-block w-100 b b1" alt="Banner1">
                </div>
                <div class="b b2 carousel-item" data-bs-interval="2000">
                    <img src="../imagens/banners/0882329001595854637.png" class="d-block w-100 b b2" alt="Banner2">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="content">
            <h2>
                Promoções
            </h2>
            <?php
            include_once(str_replace('\\', '/', dirname(__FILE__, 2)) . "../classes/produtos.class.php");
            include_once(str_replace('\\', '/', dirname(__FILE__, 2)) . "../controller/produto.controller.php");
            include_once(str_replace('\\', '/', dirname(__FILE__, 2)) . "../config/config.php");
            $controller = new ProdutoController();
            $produto = $controller->buscarTodos();
            ?>
            <div class="cards">
                <?php
                foreach ($produto as $p) {
                ?>
                    <div class="card h-100 border">
                        <img src="../imagens/uploads/<?= $p->getImagem(); ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $p->getNome() ?></h5>
                            <p class="card-text"><?= $p->getMarca(); ?></p>
                            <p class="card-text"><?= $p->getDescricao(); ?></p>
                        </div>
                    </div>
                <?php
                } ?>
            </div>
            <div class="btns">
                <div class="btn1">
                    <a href="http://">Ofertas do dia</a>
                </div>
                <div class="btn1">
                    <a href="">Ofertas da Semana</a>
                </div>
            </div>
        </div>
        <?php require_once('footer.php'); ?>
    </main>
</div>