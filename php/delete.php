<?php
$msg_id = $_GET["msg_id"];
  require "config.php";
  $msg_suppr = "Message supprimé";
   $sql = $connexion->prepare("UPDATE messages SET msg =  '{$msg_suppr}' WHERE msg_id  = '{$msg_id}'");
   $sql->execute();
   if($sql->execute() ==  true)
   {
    header("Location:".$_SERVER["HTTP_REFERER"]);
   }else
   {
    header("Location:".$_SERVER["HTTP_REFERER"]);
   }
?>