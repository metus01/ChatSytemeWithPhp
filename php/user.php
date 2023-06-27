<?php
  session_start();
  $outgoing_id  = $_SESSION["unique_id"];
  require  "config.php";
  $sql = $connexion->prepare("SELECT * FROM users WHERE  unique_id != ?");
  $sql->execute(array($outgoing_id));
  $output = "";
  if ($sql->rowCount() == 0) 
    {
    $output .= "No user are avalable to chat !!!!";
    }else
    {
      include "data.php";
    }
  echo $output;
