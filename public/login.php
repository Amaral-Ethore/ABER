<div class="dropdown">
    <i id="dropbtn" class="fa-solid fa-user" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside"></i>
    </button>
    <form id="myDropdown" class="dropdown-menu p-4 login-form" method="POST" action="../controller/login.controller.php">
        <div class="mb-3">
            <label for="mail" class="form-label">Email </label>
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
</div>