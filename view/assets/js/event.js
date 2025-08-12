document.addEventListener("DOMContentLoaded", function () {
  // La vista PHP ya renderiza todo. Este script se deja para mejoras opcionales.
  // Evitamos tocar el DOM si no existen contenedores.
  const containers = document.querySelectorAll(".events-container");
  if (!containers.length) return;

  // EJEMPLOS de mejoras futuras (dejados comentados):
  // 1) Filtrado por texto:
  // const search = document.querySelector("#event-search");
  // if (search) {
  //   search.addEventListener("input", (e) => {
  //     const q = e.target.value.toLowerCase();
  //     document.querySelectorAll(".card-link .card__name").forEach(span => {
  //       const card = span.closest(".card-link");
  //       card.style.display = span.textContent.toLowerCase().includes(q) ? "" : "none";
  //     });
  //   });
  // }

  // 2) Scroll suave a secciones:
  // document.querySelectorAll("a[href^='#']").forEach(a => {
  //   a.addEventListener("click", (e) => {
  //     const id = a.getAttribute("href");
  //     const el = document.querySelector(id);
  //     if (el) {
  //       e.preventDefault();
  //       el.scrollIntoView({ behavior: "smooth", block: "start" });
  //     }
  //   });
  // });
});
