<?php
$title = "Home";
require('partials/header.php');
?>
<h1>Home Page</h1>

<p>
    Welcome on Gathering the Magic.
</p>

<p>
    On this website you can manage your collection and explore for new cards.
</p>

<p>
    This website was made by Benjamin and Guillaume Mouchet.
</p>
<?php

if (!isset($_SESSION["User_id"])) {
?>
    <form id="btnSubmit" method="post" action="login">
        <input type="submit" name="login" value="Login !" />
    </form>
<?php
} else { ?>
    <form id="btnSubmit" method="post" action="parse_logout">
        <input type="submit" name="logout" value="Logout!" />
    </form>

<?php
} ?>
<div class="div-wrapper"><img src="public/images/logoTrans.png" alt="Logo He-arc" /></div>

<?php require('partials/footer.php') ?>