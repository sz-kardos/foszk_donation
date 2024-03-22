<?php 
    session_start();
    include_once("./includes/config.inc.php");
?>
<nav class="nav">
    <div class="nav-menu flex-row">
        <div class="logo">
            <a href="#" class="text-gray">Kutyásodj</a>
        </div>
        <div class="toggle-collapse">
            <div class="toggle-icons">
                <i class="fas fa-bars"></i>
            </div>
        </div>
        <div>
            <ul class="nav-items">
            <?php
                foreach ($ALWAYS as $item) {
                    $text = $item["text"];
                    echo "<li class='nav-link'><a href='#'>${text}</a></li>";
                }
            ?>
            </ul>
        </div>
        <div class="social login"> 
            <?php
                if (isset($_SESSION["loggedInAs"])) {
                    foreach ($LOGGEDIN as $item) {
                        $text = $item["text"] ? $item["text"] : $_SESSION["loggedInAs"];
                        $link = $item["link"];
                        echo "<a href=${link}>${text}<i class='fa-solid fa-user'></i></a>";
                    }
                } else {
                    foreach ($LOGGEDOUT as $item) {
                        $text = $item["text"];
                        $link = $item["link"];
                        echo "<a href=${link}>${text}<i class='fa-solid fa-user'></i></a>";
                    }
                }
            ?>
        </div>

        <div class="social text-gray">
            <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
            <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
            <a href="https://www.twitter.com/"><i class="fab fa-twitter"></i></a>
            <a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>
        </div>
    </div>
</nav>