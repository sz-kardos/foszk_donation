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
                foreach ($ALWAYS as $key => $item) {
                    $text = $item["text"];
                    $link = ($key=="/") ? "." : "?page=".$key;
                    echo "<li class='nav-link'><a href=${link}>${text}</a></li>";
                }
            ?>
            </ul>
        </div>
        <div class="social login"> 
            <?php
                if ($_SESSION["loggedInAs"]) {
                    foreach ($LOGGEDIN as $key => $item) {
                        $text = $item["text"];
                        $link = ($key=="/") ? "." : "?page=".$key;
                        echo "<a href=${link}>${text}<i class='fa-solid fa-user'></i></a>";
                    }
                } else {
                    foreach ($LOGGEDOUT as $key => $item) {
                        $text = $item["text"];
                        $link = ($key=="/") ? "." : "?page=".$key;
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