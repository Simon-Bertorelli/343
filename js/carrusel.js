const carrusel = document.querySelector(".noticias-carrusel");
const prev = document.getElementById("prev");
const next = document.getElementById("next");

const scrollAmount = carrusel.offsetWidth;

next.addEventListener("click", () => {
  carrusel.scrollBy({ left: scrollAmount, behavior: "smooth" });
});

prev.addEventListener("click", () => {
  carrusel.scrollBy({ left: -scrollAmount, behavior: "smooth" });
});