const footer = document.querySelector("footer");

fetch('../../assets/templates/footer.html')  // Subimos dos niveles
  .then(response => response.text())
  .then(data => {
    footer.innerHTML = data;
  })
  .catch(err => console.error("Error cargando el footer:", err));
