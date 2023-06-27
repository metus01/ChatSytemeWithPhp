 <?php
  session_start();
  include_once "config.php";
  $fname = htmlspecialchars($_POST['fname']);
  $lname = htmlspecialchars($_POST['lname']);
  $email = htmlspecialchars($_POST['email']);
  $password = htmlspecialchars($_POST['password']);
  
  if (!empty($fname)  && !empty($lname) && !empty($email) && !empty($password)) {
    // verification de la validité de l'email de  user
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
      // voir si l'email exist dejà
      $sql = $connexion->query("SELECT email FROM  users WHERE email = '{$email}'");
      
      if ($sql->rowCount() > 0) {
        echo " Email already exist";
      } else {
        // voir si elle a uploader un fichier ou non;
        if (isset($_FILES['file'])) { //var_dump($_FILES);
          //die("Fichier trouvé");
          $img_name = $_FILES['file']['name'];
          // type de l'image;
          $tmp_name = $_FILES['file']['tmp_name']; //extensions de l'image
          // format du fichier
          $img_expload  = explode('.', $img_name);
          $img_ext = end($img_expload); // reception de l'extension du fichier;
          $extensions = ["png", "jpg", "jpeg"];
          if (in_array($img_ext, $extensions) === true) {
            $time = time();
            // transfert du fichier de l'utilisateur dans un chemin  propre;
            $new_img_name = $time . $img_name;
            if (move_uploaded_file($tmp_name, './uploads/' . $new_img_name) === true) // apres l'envoie du fichier de l'utilisateur dans le dossier ;
            {
              $status  = "Active Now";
              $random_id = rand(time(), 1000000000); //id aleatoire
              // insertion des informations dans la base de données ;
              $sql2 = $connexion->prepare("INSERT INTO users(unique_id,fname,lname,email ,password,img, status)VALUES($random_id , $fname , $lname , $email , $password , $new_img_name , $status)");
              $sql2->execute();
              var_dump($sql2);
              die("okay");
              if ($sql2) {
                $sql3 = $connexion->prepare("SELECT * FROM users WHERE email = ?");
                $sql3->execute(array($email));
                if ($sql3->rowCount() > 0) {
                  $row  = $sql3->fetch(PDO::FETCH_NAMED);
                  $_SESSION['unique_id'] = $row['unique_id'];
                  echo "success";
                }
              } else {
                echo " Erreur de transfert de données";
              }
            }
          } else {
            echo " Please enter an file with a correct extension ......";
          }
        } else {
          echo "Please select one image file ";
        }
      }
    } else {
      echo $email . " Your email is not valid";
    }
  } else {
    echo "All input  field required!!! ";
  }
  ?>