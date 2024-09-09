<h2>Create</h2>

<form action="/user/store" method="post">
    <input type="text" name="name" placeholder="Seu Nome">
    <?php echo getFlash('name'); ?>
    <br>
    <input type="text" name="email" placeholder="Seu E-mail">
    <?php echo getFlash('email'); ?>
    <br>
    <input type="password" name="password" placeholder="Sua Senha">
    <?php echo getFlash('password'); ?>
    <br>
    <button type="submit">Create</button>
</form>