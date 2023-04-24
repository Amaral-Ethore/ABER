<?php
// str_replace('\\', '/', dirname(__FILE__, 2)) . 
include_once("./header.php");
include_once("./nav.php");
?>
<div class="container">
    <h2>Administração</h2>
    <div class="container-ger">
        <?php if (isset($_SESSION) && isset($_SESSION['tipo']) && $_SESSION['tipo'] == "func") { ?>
            <?php if (isset($_SESSION) && isset($_SESSION['privilegio']) && $_SESSION['privilegio'] == "admin") { ?>
                <div class="cartao-gerenciamento">
                    <a href="./home_produtos.php">
                        <div class="cartao-gerenciamento-int">
                            <i class="fa-brands fa-product-hunt"></i>
                            <h3>Gerenciamento de Produtos</h3>
                            <p>Listagem, criação e alteração de produtos</p>

                        </div>
                    </a>
                </div>
                <div class="cartao-gerenciamento">
                    <a href="./home_cliente.php">
                        <div class="cartao-gerenciamento-int">
                            <i class="fa-solid fa-address-book"></i>
                            <h3>Gerenciamento de Clientes</h3>
                            <p>Listagem, criação e alteração de Clientes</p>
                        </div>
                    </a>
                </div>
                <div class="cartao-gerenciamento">
                    <a href="./home_func.php">
                        <div class="cartao-gerenciamento-int">
                            <i class="fa-solid fa-address-book"></i>
                            <h3>Gerenciamento de Funcionarios</h3>
                            <p>Listagem, criação e alteração de funcionarios</p>
                        </div>
                    </a>
                </div>
            <?php } ?>
            <?php if (isset($_SESSION) && isset($_SESSION['privilegio']) && $_SESSION['privilegio'] == "func") { ?>
                <div class="cartao-gerenciamento">
                    <a href="./home_cliente.php">
                        <div class="cartao-gerenciamento-int">
                            <i class="fa-solid fa-address-book"></i>
                            <h3>Gerenciamento de Clientes</h3>
                            <p>Listagem, criação e alteração de Clientes</p>
                        </div>
                    </a>
                </div>
                <div class="cartao-gerenciamento">
                    <a href="./home_func.php">
                        <div class="cartao-gerenciamento-int">

                            <i class="fa-solid fa-address-book"></i>

                            <h3>Gerenciamento de Funcionarios</h3>
                            <p>Listagem, criação e alteração de funcionarios</p>
                        </div>
                    </a>
                </div>
            <?php } ?>
    </div>
<?php } ?>
</div>
</div>
<?php
unset($_SESSION['mensagem']);
include_once("./footer.php");
