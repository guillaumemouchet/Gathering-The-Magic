<?php
    $title = "Authentification";
    require('partials/header.php')
?>
<h1>Authentification</h1>

<p>
    <form action="login" method="post">
        <label id="title" for="user_input">Username:</label>
        <input type="text" name="user_input" autofocus required>
        <label  id="title" class="auth" for="password_input">Password:</label>
        <input type="password" name="password_input" required>
        <input type="submit" value="login">
    </form>
</p>

<?php require('partials/footer.php') ?>
