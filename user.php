<?php
session_start();
if (!isset($_SESSION["unique_id"])) {
  header("Location:login.php");
}
require "header.php";
require "./php/config.php";

?>

<body>
  <div class="wrapper">
    <section class="users">
      <header>
        <?php
        $sql = $connexion->query("SELECT * FROM users WHERE unique_id = '{$_SESSION["unique_id"]}'");
        if ($sql->rowCount() > 0) {
          $row = $sql->fetch(PDO::FETCH_ASSOC);
        }
        ?>
        <div class="content">
          <img src="php/uploads/<?= $row["img"] ?>" alt="">
          <div class="details">
            <span><?= $row["fname"] . " " . $row["lname"]; ?></span>
            
          </div>
        </div>
        <a href="./php/logout.php?logout_id=<?= $row['unique_id']; ?>" class="logout">Logout</a>
      </header>
      <div class="search">
        <span class="text">Select an user to start chat</span>
        <input type="text" name="" id="" placeholder="Enter name to search">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="user-list">
      </div>
    </section>
  </div>
  <script src="./javascript/users.js"></script>
</body>

</html>