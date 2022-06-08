<?php
$title = "Authentification";
require('partials/header.php');
?>
<h1>Authentification</h1>

<p>
<form class="form_display" action="parse_login" method="post">
    <label id="title">Username: <input type="text" name="user_input" id="user_input" autofocus required /></label>
    <label id="title">Password: <input type="password" name="password_input" id="password_input" required /></label>
    <label id="btnSubmit"><input type="submit" value="login"></label>

</form>
</p>

<?php require('partials/footer.php') ?>