<?php
while($row = $sql->fetch(PDO::FETCH_ASSOC))
{
  
  $query2 = $connexion->prepare(" SELECT * FROM messages WHERE (incoming_msg_id  = :user_id  OR outgoing_msg_id = :user_id ) AND (outgoing_msg_id = :user_id OR incoming_msg_id = :user_id ) ORDER BY msg_id DESC LIMIT 1");
  $query2->bindValue(":user_id" , $_SESSION["unique_id"]);
  $query2->execute();
  $row2 = $query2->fetch(PDO::FETCH_ASSOC);
  $result = "";
  $you = "";
  $row = 0;
  if($query2->rowCount()  ==  0)
  {
    $result = "No message yet";
  }else
  {
    $result = $row2["msg"];
  }
  
  if(strlen($result) > 28)
    {
      $msg = substr($result , 0 , 28 ) .'......';
    }else
    {
      $msg = $result;
    }
  if($outgoing_id == $row2['unique_id'])
    {
      $you = "You";
    }else
    {
      $you ="";
    }
   #(last_seen($row["last_seen"]) === "Active" ) ? $online = "online" : $online = "offline";
    $output.='<a href="chat.php?user_id='.$row["unique_id"].'">
  <div class="content">
   <img src="php/uploads/'.$row["img"].'" alt="">
   <div class="details">
    <span>'.$row["fname"].' ' . $row["lname"] .'</span>
     <p>'.$you.$msg.'</p>
 </div>
  </div>
  
 </a>';
 #<div class="status-dot'.$online.'""><i class=" fas fa-circle"></i></div>
}