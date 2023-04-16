<?php require_once('header.php'); ?>
<div class="container">
    <?php require_once('nav.php') ?>
    <main>
        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
            <div class=" bnrs carousel-inner">
                <div class="b b1 carousel-item active" data-bs-interval="2000">
                    <img src="../imagens/banners/0500346001598558021.png" class="d-block w-100 b b1" alt="...">
                </div>
                <div class="b b2 carousel-item" data-bs-interval="2000">
                    <img src="../imagens/banners/0882329001595854637.png" class="d-block w-100 b b2" alt="...">
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
            <div class="cards">
                <?php
                include_once(str_replace('\\', '/', dirname(__FILE__, 2)) . "../classes/produtos.class.php");
                include_once(str_replace('\\', '/', dirname(__FILE__, 2)) . "../controller/produto.controller.php");
                include_once(str_replace('\\', '/', dirname(__FILE__, 2)) . "../config/config.php");
                $controller = new ProdutoController();
                $produto = $controller->buscarTodos();
                var_dump($produto);
                foreach ($produto as $p) {
                ?>
                    <div class="card">
                        <div class="img">
                            <img src="../imagens/uploads/<?php $p->getImagem(); ?>" alt="Imagem">
                        </div>
                        <div class="info">
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="btns">
                <div class="btn1">
                    <a href="http://">Ofertas do dia</a>
                </div>
                <div class="btn1">
                    <a href="">Ofertas da Semana</a>
                </div>
            </div>
            <h2>Mais Vendidos</h2>
            <div class="cards">
                <div class="card"></div>
                <div class="card"></div>
                <div class="card"></div>
                <div class="card"></div>
                <div class="card"></div>
                <div class="card"></div>
                <div class="card"></div>
                <div class="card"></div>
                <div class="card"></div>
                <div class="card"></div>
            </div>

        </div>
        <?php require_once('footer.php');
        ?>
    </main>
</div>