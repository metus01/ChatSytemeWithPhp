<?php
session_start();
if(!isset($_SESSION["unique_id"]))
{
  header("Location:login.php");
}
?>
<?php
require "header.php";
?>
<body>
  <div class="wrapper">
    <section class="chat-area">
      <header>
        <?php
        
        require "php/config.php";
        require "php/functions/online.php";
        $user_id = htmlentities(htmlspecialchars($_GET["user_id"]));
        $sql = $connexion->query("SELECT * FROM users WHERE unique_id = '{$user_id}'");
        $row = $sql->fetch(PDO::FETCH_ASSOC);
        ?>
        <a href="user.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
       <div class="content">
        <img src="php/uploads/<?=$row["img"]?>"alt="">
         <div class="details">
               <span><?=$row["fname"] ." ". $row["lname"] .last_seen($row["last_seen"])?></span>
              
        </div>
       </div>
      </header> 
      <div class="chat-box">
      </div>
      <form action="" class="typing-area" autocomplete="off">
        <input type="text" name="outgoing_id"  value="<?= $_SESSION["unique_id"]?>" id="" hidden>
        <input type="text" name="incoming_id" id="" value="<?= $user_id?>" hidden>
        <input type="text" class="input-field" name="message" id="" placeholder="Type a message here ...">
        
         <button type="submit"><i class="fab fa-telegram-plane"></i></button>
         
      </form>
      </div>
    </section>
  <!-- </div>
  <script src="./javascript/chat.js"></script> -->
  <script src="./javascript/chat1.js"></script>
</body>
</html>