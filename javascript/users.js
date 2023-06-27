const searchBar = document.querySelector ('.users .search input '),
  searchBtn = document.querySelector ('.users .search button'),
  userList = document.querySelector ('.users .user-list');
searchBtn.onclick = () => {
  searchBar.classList.toggle ('active');
  searchBar.focus ();
  searchBtn.classList.toggle ('active');
  searchBar.value = '';
};
searchBar.onkeyup = () => {
  let searchTerm = searchBar.value;
  let xhr = new XMLHttpRequest (); //creation de l'objet xml;
  if (searchTerm != '') {
    searchBar.classList.add ('active');
  } else {
    searchBar.classList.remove ('active');
  }
  xhr.open ('POST', 'php/search.php', true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        userList.innerHTML = data;
      }
    }
  };
  xhr.setRequestHeader ('Content-type', 'application/x-www-form-urlencoded');
  xhr.send ('searchTerm=' + searchTerm);
};

setInterval (() => {
  let xhr = new XMLHttpRequest();
  //creation de l'objet xml;
  xhr.open ('GET', 'php/user.php', true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        if (!searchBar.classList.contains ('active')) {
          userList.innerHTML = data;
        }
      }
    }
  };
  xhr.send ();
}, 500);
