<?php
require "header.php";
?>
<body>
  <div class="wrapper">
    <section class="form signup">
      <header>
        Realtime Chat App
      </header>
      <form action="" method="post" enctype="multipart/form-data">
        <div class="error-txt">This is an error message</div>
        <div class="name-details">
          <div class="field input ">
            <label for="fname">Fist Name</label>
            <input type="text" name="fname" id="" placeholder="first name">
          </div>
          <div class="field input ">
            <label for="lname">Fist Name</label>
            <input type="text" name="lname" id="" placeholder="last name">
          </div>
        </div>
          <div class="field input ">
                    <label for="email"> Email</label>
                    <input type="email" name="email" id="" placeholder="email">
          </div>
          <div class="field input">
        <label for="password">Password</label>
        <input type="password" name="password" id="" placeholder="password">
        <i class="fas fa-eye"></i>
          </div>
          <div class="field image ">
            <label for="image">Select Image</label>
            <input type="file" name="image" id="">
          </div>
          <div class="field button ">
            <input type="submit" value="Continue to chat">
          </div>
          <div class="link">Already signed up? 
            <a href="login.php">Login</a>
          </div>
      </form>
    </section>
  </div>
  <script src="./javascript/pass-show-hide.js"></script>
  <script src="./javascript/signup.js"></script>
</body>
</html>