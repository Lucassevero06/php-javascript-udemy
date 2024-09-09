<?php $this->layout('master', ['title' => 'Login']) ?>
<?php if(!logged()) : ?>
    <h2>Login</h2>
    <?php echo getFlash('message'); ?>
    <form id="box-login" action="/login" method="post">
        <input type="text" name="email" placeholder="Seu email" value="rosa@teste.com.br">
        <input type="password" name="password" placeholder="Sua senha" value="1234">
        <button type="submit">Login</button>
    </form>
<?php else : ?>
    <h2>Já está logado!</h2>
<?php endif; ?>