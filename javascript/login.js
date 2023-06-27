const form = document.querySelector(".login form"),
  continueBtn = form.querySelector(".button input "),
   errorText = form.querySelector(".error-txt");
form.onsubmit = (e) => {
  e.preventDefault();
  }
continueBtn.onclick = () => {
  /* c'est l'heure de s'amuser avec AJAX  ,  allons travaillons  ,  je taff */
  let xhr = new XMLHttpRequest(); //creation de l'objet xml;
  xhr.open("POST", "php/login.php" , true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        console.log(data);
         if (data == "success")
         {
          errorText.textContent = data;
           errorText.style.display = "block";
           location.href = "./user.php"
        } else {
          errorText.textContent = data;
          errorText.style.display = "block";
          }
       }
    }
  }
  /*les données seront envoyées de ajax vers php automatiquement*/
  /*creation d'un nouvel objet de formData;*/
  let formData = new FormData(form);
  xhr.send(formData);
  //envoie des donne vers php
  }
