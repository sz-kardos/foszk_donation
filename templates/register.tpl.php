<div class="container">
    <h2>Regisztráció</h2>
    <form id="signup_form" action="./logicals/registerAttempt.php" method="post">
      <div class="input-group">
        <label for="username">Felhasználónév</label>
        <input type="text" id="username" name="username" required>
      </div>
      <div class="input-group">
        <label for="email">Email cím</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div class="input-group">
        <label for="password">Jelszó</label>
        <input type="password" id="password" name="password" minlength="8" required>
      </div>
      <div class="input-group">
        <label for="password_repeat">Jelszó ismét</label>
        <input type="password" id="password_repeat" name="password_repeat" minlength="8" required>
      </div>
      <button type="button" onclick="submitRegistration('signup_form', 'username', 'email', 'password', 'password_repeat')" class="btn">Regisztráció</button>
    </form>
</div>