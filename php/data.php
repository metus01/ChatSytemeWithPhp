<?php
  $user_id = $_SESSION["unique_id"];
  while ($row = $sql->fetch(PDO::FETCH_ASSOC))
  {
    $req = $connexion->prepare("SELECT * FROM messages WHERE (incoming_msg_id = :user_id AND outgoing_msg_id = :user1_id ) OR  (outgoing_msg_id = :user_id AND  incoming_msg_id  = :user1_id)");
    $req->bindValue(":user_id" , $user_id);
    $req->bindValue(":user1_id" , $row["unique_id"]);
    $req->execute();
    
    $you = "";
    $result = "";
    $row1 = $req->fetch(PDO::FETCH_ASSOC);
    if($req->rowCount() == 0)
    {
      $result = " No message yet ";
    }else
    {
     $result = $row1["msg"];
    }
    if(strlen($result) > 28)
    {
      $msg = substr($result , 0 , 28 ) .'......';
    }else
    {
      $msg = $result;
    }
    $output.='<a href="chat.php?user_id='.$row["unique_id"].'">
  <div class="content">
   <img src="php/uploads/'.$row["img"].'" alt="">
   <div class="details">
    <span>'.$row["fname"].' ' . $row["lname"] .'</span>
     <p>'.$you.$msg.'</p>
     
 </div>
  </div>
  
 </a>';
    
  }
?>
