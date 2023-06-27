const form = document.querySelector(".typing-area"),
inputField = form.querySelector(".input-field"),
  sendBtn = form.querySelector("button");
const chatBox = document.querySelector(".chat-box");
form.onsubmit = (e) =>
{
  e.preventDefault();
}
sendBtn.onclick = () => {
  let xhr = new XMLHttpRequest(); //creation de l'objet xml;
   xhr.open("POST","php/insert-chat.php", true);
 xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
     if (xhr.status === 200) {
      
      }
    }
     }
    let formData = new FormData(form);
   xhr.send(formData);
 }
 setInterval(() => {
  let xhr = new XMLHttpRequest(); //creation de l'objet xml;
  xhr.open("POST", "php/get-chat.php" , true);
  xhr.onload = () => {
       if (xhr.readyState === XMLHttpRequest.DONE) {
   if (xhr.status === 200) {
      let data = xhr.response;
       //chatBox.innerHTML = data;
     }
    }
   }
   let form = new FormData(form)
   xhr.send(formData);
} , 500);