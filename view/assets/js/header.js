const header = document.querySelector("header");

fetch('../templates/header.php')  // Cargar el archivo PHP
  .then(response => response.text())
  .then(data => {
    header.innerHTML = data;
  })
  .catch(err => console.log("Error cargando el archivo de header: ", err));
