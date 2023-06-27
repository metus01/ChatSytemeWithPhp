<?php
  require_once "config.php";
  $fname = htmlentities(htmlspecialchars(trim($_POST["fname"])));
  $lname = htmlentities(htmlspecialchars(trim($_POST["lname"])));
  $email = htmlentities(htmlspecialchars(trim($_POST["email"])));
  $password = htmlentities(htmlspecialchars(trim($_POST["password"])));
  if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password))
    {
      if(filter_var($email , FILTER_VALIDATE_EMAIL))
        {
          #VOYONS SI LE MAIL EST DEJA PRIS
          $sql = $connexion->prepare("SELECT email FROM users WHERE email = '{$email}'");
          $sql->execute();
          if($sql->rowCount() > 0)
            {
              echo "$email - This mail is already taked";
            }else
            {
              if (isset($_FILES["image"]) && !empty($_FILES["image"]))
                {
                  
                  $img_name = $_FILES['image']['name'];
                  $img_type = $_FILES['image']['type'];
                  $tmp_name = $_FILES['image']['tmp_name'];
                  $img_explode = explode('.',$img_name);
                  $img_ext = end($img_explode);
                  $extensions = ['png' , 'jpg' , 'gif' , 'jpeg' , 'svg'];
                  if(in_array($img_ext , $extensions))
                    {
                      $time = time();
                      $new_img_name = $time.$img_name;
                      if(move_uploaded_file($tmp_name , "./uploads/".$new_img_name))
                        {
                          
                          $random_id = rand(time() , 1000000);
                          $sql2 = $connexion->prepare("INSERT INTO users (unique_id , fname , lname , email , pwd , img) VALUES (:unique_id , :fname , :lname , :email , :pwd , :img)");
                          $sql2->bindValue(":unique_id" , $random_id);
                          $sql2->bindValue(":fname" , $fname);
                          $sql2->bindValue(":lname" , $lname);
                          $sql2->bindValue(":email" , $email);
                          $sql2->bindValue(":pwd" , $password);
                          $sql2->bindValue(":img" , $new_img_name);
                          $infors = [$random_id , $fname , $lname , $email , $password , $new_img_name];
                          $sql2->execute();
                          
                          if($sql2->execute() == true)
                            {
                              $sql3 = $connexion->prepare("SELECT * FROM users WHERE email = ?");
                              $sql3->execute(array($email));
                              
                              if($sql3->rowCount() > 0)
                                {
                                  $row = $sql3->fetch(PDO::FETCH_NAMED);
                                  session_start();
                                  $_SESSION["unique_id"] = $row["unique_id"];
                                  echo "success";
                                
                                }
                            }else{
                              echo "Erreur lors de l'envoie des données";
                            }

                        }else{
                          echo "Entrez un fichier avec une extension correcte";
                        }
                    }
                }else{
                  echo "Veuillez choisir une image svp.Merci!";
                }
            }
        }else{
          echo "Veuillez entrez une adresse mail valide !";
        }
    }else
    {
      echo "Tous les champs sont requis  ...";
    }

?>