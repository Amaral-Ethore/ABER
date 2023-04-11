<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.css">
    <link rel="stylesheet" href="../style/geral.css">
    <link rel="stylesheet" href="../style/pagitem.css">
    <link rel="shortcut icon" href="imagens/aber-logo-zip-file/png/logo-no-background.png" type="image/x-icon">
</head>

<body>
    <div class="container">
        <?php require_once("nav.php") ?>
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
                            <img src="a" class="d-block w-100" alt="aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa">
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
                    <span>Nome do item Nome do item Nome do item Nome do item Nome do item Nome do item</span>
                    <div class="flex-between">
                        <p>Estoque do item</p> <span>Garantia: x meses</span>
                    </div>
                    <div class="flex-between">
                        <div class="preco">
                            <span>Preço</span>
                            <p>à vista com desconto</p>
                        </div>
                        <div class="compra">
                            <button>Comprar</button>
                            <br>
                            <button>Carrinho</button>
                        </div>
                    </div>

                    <div>
                        <p>R$n no cartão</p>
                        <p>até n vezes de n reais </p>
                    </div>

                    <div>
                        <p>------------------------------------------------------------------------------------</p>
                    </div>

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

                </div>
            </div>


            <div class="accordion" id="accordionDetalhes">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                            Descrição Geral
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                        <div class="accordion-body">
                            <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>