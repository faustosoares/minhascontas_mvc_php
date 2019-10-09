<?php include __DIR__ . '/../inicio-html-login.php'; ?>
    <!-- Mensagens de validacao de formulario -->
    <?php include __DIR__ . '/../mensagem-validacao-form.php'; ?>
    
    <form action="/realiza-login" method="post">
        <div class="form-group">
            <label for="nomeUsuario">Usuário:</label>
            <input type="text" name="nomeUsuario" id="nomeUsuario" class="form-control">
        </div>
        <div class="form-group">
            <label for="senhaUsuario">Senha:</label>
            <input type="password" name="senhaUsuario" id="senhaUsuario" class="form-control">
        </div>
        <button class="btn btn-primary">
            Entrar
        </button>
    </form>
<?php include __DIR__ . '/../fim-html.php'; ?>