<header>
            <div class="h-1">
                <div class="logo">
                    <a href="index.php">
                        <img class="logoimg" src="../imagens/aber-logo-zip-file/png/logo-no-background.png" alt="logo">
                    </a>
                </div>
                <div class="menu">
                    <ul>
                        <li>
                            <div class="search">
                                <input id="search" class="menu-input" type="text">
                                <i class=" lupa fa-solid fa-magnifying-glass"></i>
                            </div>
                        </li>
                        <li>
                            <i class="fa-solid fa-plus"></i>
                        </li>
                        <li>
                            <a href="">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </a>
                        </li>
                        <li class="hover">
                            <div class="dropdown">
                                <i id="dropbtn" class="fa-solid fa-user" data-bs-toggle="dropdown" aria-expanded="false"
                                    data-bs-auto-close="outside"></i>
                                </button>
                                <form id="myDropdown" class="dropdown-menu p-4 login-form" method="POST" action="../controller/login.controller.php">
                                    <div class="mb-3">
                                        <label for="mail" class="form-label">Email </label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="email@examplo.com">
                                    </div>
                                    <div class="mb-3">
                                        <label for="senha" class="form-label">Senha</label>
                                        <input type="password" class="form-control" id="senha" name="senha"
                                            placeholder="Senha">
                                    </div>
                                    
                                    <div>
                                        <input type="hidden" id="tipo" name="tipo" value="">
                                        <input type="checkbox" name="funcionario" id="chkfunc">
                                        <label for="funcionario">funcionario</label>
                                    </div><br>
                                    <button type="submit" class="btn btn-primary">Logar</button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="h-2">
                <div class="menu-2">
                    <ul>
                        <li>
                            <a href="">
                                Ofertas
                            </a>
                        </li>
                        <li>
                            <a href="">
                                Moda
                            </a>
                        </li>
                        <li>
                            <a href="">
                                Mais Acessados
                            </a>
                        </li>
                        <li>
                            <a href="">
                                Vender
                            </a>
                        </li>
                        <li>
                            <a href="./cad_cliente.php">
                                Contato
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
        <script src="../codigos/code.js"></script>