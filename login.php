<?php
require "header.php";
?>
<body>
  <div class="wrapper">
    <section class="form login ">
      <header>
        Realtime Chat App
      </header>
      <form action="" method="post">
        <div class="error-txt"></div>
          <div class="field input ">
                    <label for="email"> Email</label>
                    <input type="email" name="email" id="" placeholder="email">
          </div>
          <div class="field input">
        <label for="password">Password</label>
        <input type="password" name="password" id="" placeholder="password">
        <i class="fas fa-eye"></i>
          </div>
          <div class="field button ">
            <input type="submit" value="Continue to chat">
          </div>
          <div class="link">Not yet signed up?
            <a href="index.php">Sign up now</a>
          </div>
      </form>
    </section>
  </div>
  <script src="./javascript/pass-show-hide.js"></script>
  <script src="./javascript/login.js"></script>
</body>
</html>