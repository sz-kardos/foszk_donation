<div class="container">
    <form action="./logicals/loginAttempt.php" method="post">
        <h2> Bejelentkezés</h2>
        <div class="input-group">
        <label for="username">Felhasználónév</label>
        <input type="text" id="username" name="username" required>
        </div>
        <div class="input-group">
        <label for="password">Jelszó</label>
        <input type="password" id="password" name="password" required>
        </div>
        <button type="submit" class="btn">Bejelentkezés</button>
        <button type="submit" class="btn-r"><a href="signUp.html">Regisztráció</a></button>
    </form>
</div>