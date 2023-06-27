const form = document.querySelector ('.signup form'),
  continueBtn = form.querySelector ('.button input '),
  errorText = form.querySelector ('.error-txt');
form.onsubmit = e => {
  e.preventDefault ();
};
continueBtn.onclick = () => {
  let xhr = new XMLHttpRequest (); 
  xhr.open ('POST', 'php/signup1.php', true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        if (data == "success") {
          location.href = './login.php';
        } else {
          errorText.textContent = data;
          errorText.style.display = 'block';
          console.log(data);
        }
      }
    }
  };
  /*les données seront envoyées de ajax vers php automatiquement*/
  /*creation d'un nouvel objet formData;*/
  let formData = new FormData (form);
  xhr.send (formData);
  //envoie des donne vers php
};
