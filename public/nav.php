<header>
    <div class="h-1">
        <div class="logo">
            <a href="index.php">
                <img class="logoimg" src="../imagens/aber-logo-zip-file/png/logo-no-background.png" alt="logo">
            </a>
        </div>
        <div class="menu">
            <ul>
                <li class="search-li">
                    <div class="search">
                        <input id="search" class="menu-input" type="text">
                        <i class=" lupa fa-solid fa-magnifying-glass"></i>
                    </div>
                </li>
                <?php if (!isset($_SESSION) || !isset($_SESSION['tipo'])) { ?>
                    <li class="h-li">
                        <div class="dropdown drop-login">
                            <span>Faça
                                <span id="dropbtn" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" class="hover">
                                    LOGIN
                                </span>
                                <form id="myDropdown" class="dropdown-menu p-4 login-form" method="POST" action="../controller/login.controller.php">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="email@examplo.com">
                                    </div>
                                    <div class="mb-3">
                                        <label for="senha" class="form-label">Senha</label>
                                        <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha">
                                    </div>
                                    <div>
                                        <input type="hidden" id="tipo" name="tipo" value="">
                                        <input type="checkbox" name="funcionario" id="chkfunc">
                                        <label for="funcionario">funcionario</label>
                                    </div><br>
                                    <button type="submit" class="btn btn-primary">Logar</button>
                                </form>
                                ou <br> crie seu <a id="cad_clie" href="./cad_cliente.php">CADASTRO</a>
                            </span>
                        </div>
                    </li>
                <?php } ?>
                <?php if (isset($_SESSION) && isset($_SESSION['tipo']) && $_SESSION['tipo'] == "cliente") { ?>
                    <li>
                        <a href="./home_compra.php">
                            <i class="fa-solid fa-cart-shopping fa-flip-horizontal"></i>
                        </a>
                    </li>
                    <li class="dropdown">
                        <i class="fa-solid fa-user" type="button" data-bs-toggle="dropdown" aria-expanded="false"></i>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="../acoes/logout.php">Sair</a></li>
                        </ul>
                    </li>
                <?php } ?>

                <?php if (isset($_SESSION) && isset($_SESSION['tipo']) && $_SESSION['tipo'] == "func") { ?>
                    <li>
                        <a href="./gerenciamento.php">
                            <i class="fa-solid fa-address-book align-middle"></i>
                        </a>
                    </li>
                    <li class="dropdown">
                        <i class="fa-solid fa-user align-middle" type="button" data-bs-toggle="dropdown" aria-expanded="false"></i>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="../acoes/logout.php">Sair</a></li>
                        </ul>
                    </li>


                <?php } ?>
            </ul>
        </div>
    </div>
    <div class="h-2">
        <div class="menu-2">
            <ul>
                <li>
                    <a href="">
                        DEPARTAMENTOS
                    </a>
                </li>
                <li>
                    <a href="">
                        Carrinho
                    </a>
                </li>
                <li>
                    <a href="">PC Gamer</a>
                </li>
                <li>
                    <a href="">TV</a>
                </li>
                <li>
                    <a href="">Oferta do Dia</a>
                </li>
            </ul>
        </div>
    </div>
</header>