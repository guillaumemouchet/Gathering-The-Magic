<nav>
    <ul>
        <?php 
        $str = '';
        $str .= '<div>';
        $str .= "<li><a href=\"index\">". "Home"."</a>";
        $str .= "<li><a href=\"advanced_research\">". "Advanced Research". "</a>";
        $str .= "<li><a href=\"collection\">"." Collection" ."</a>";
        $str .= "<li><a href=\"extensions\">". "Extensions". "</a>";
        $str .= "<li><a href=\"decks\">". "Decks". "</a>";
        $str .= "<li><a href=\"new_cards\">". "New Cards". "</a>";

        $str .= '</div>';
        echo $str;
        ?>
    </ul>
</nav>
