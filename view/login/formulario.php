<?php include __DIR__ . '/../inicio-html-login.php'; ?>
    <!-- Mensagens de validacao de formulario -->
    <?php include __DIR__ . '/../mensagem-validacao-form.php'; ?>
    
    <form action="/realiza-login" method="post" class="user">
        <div class="form-group">
            <input type="text" class="form-control form-control-user" id="nomeUsuario" name="nomeUsuario" aria-describedby="usuarioHelp" placeholder="Usuário">
        </div>
        
        <div class="form-group">
            <input type="password" class="form-control form-control-user" id="senhaUsuario" name="senhaUsuario" placeholder="Senha">
        </div>

        <div class="form-group">
            <div class="custom-control custom-checkbox small">
            <input type="checkbox" class="custom-control-input" id="customCheck">
            <label class="custom-control-label" for="customCheck">Lembrar</label>
            </div>
        </div>

        <button class="btn btn-primary btn-user btn-block">
            Entrar
        </button>
        
    </form>
    <hr>
    <div class="text-center">
        <a class="small" href="forgot-password.html">Esqueceu sua Senha?</a>
    </div>
    
    <div class="text-center">
        <a class="small" href="register.html">Crie sua conta!</a>
    </div>
</div>
</div>
</div>
</div>
</div>

</div>

</div>

</div>


</body>
     
<?php include __DIR__ . '/../fim-html.php'; ?>