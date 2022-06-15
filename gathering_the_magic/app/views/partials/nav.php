<div class="container">
        <div class="row">
                <div class="col my-auto">
                        <?php
                        if (isset($_SESSION['message'])) {
                        ?>

                                <p id="Test" class="text-danger"><?= htmlentities($_SESSION['message']) ?></p>
                                <script>
                                        var timeout;
                                        var elem = document.getElementById("Test");
                                        clearTimeout(timeout);
                                        timeout = setTimeout(function() {
                                                elem.innerHTML = "";
                                        }, 3000);
                                </script>
                        <?php

                                unset($_SESSION['message']);
                                //header("refresh: 10");
                        }
                        ?>
                </div>
                <div class="col-16">

                        <nav>
                                <a id="nav-text"><?= isset($_SESSION['Username']) ? htmlentities($_SESSION['Username']) : "No one is logged in" ?></a>
                                <a id="nav-text" href="home">Home</a>
                                <a id="nav-text" href="advanced_research">Advanced Research</a>
                                <a id="nav-text" href="collection">Collection</a>
                                <a id="nav-text" href="extensions">Extensions</a>
                                <a id="nav-text" href="decks">Decks</a>
                                <a id="nav-text" href="new_cards">New Cards</a>
                                <?php
                                if (sizeof($_SESSION["newcards"]) > 0) { ?>
                                        <a id="nav-text"><img src="public/images/idea.png" width="14" height="14" alt="New Card Added" /></a>
                                <?php
                                } else { ?>
                                        <a id="nav-text"><img src="public/images/bulb.png" width="14" height="14" alt="No New Card Added" /></a>
                                <?php
                                }
                                ?>


                        </nav>


                </div>
                <div class="col-2 my-auto mx-auto">
                        <?php
                        if (!isset($_SESSION["User_id"])) {
                        ?>
                                <form method="post" action="login">
                                        <input type="submit" name="login" value="Login!" />
                                </form>
                        <?php
                        } else { ?>
                                <form method="post" action="parse_logout">
                                        <input type="submit" name="logout" value="Logout!" />
                                </form>

                        <?php
                        } ?>
                </div>

        </div>
</div>