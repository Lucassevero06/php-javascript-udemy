<h2>Login</h2>
<?php echo getFlash('message'); ?>

<form id="box-login" action="/login" method="post">
    <input type="text" name="email" placeholder="Seu email" value="lucas@exemplo.com">
    <input type="password" name="password" placeholder="Sua senha" value="123">
    <button type="submit">Login</button>
</form>
