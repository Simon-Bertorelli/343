const carrusel = document.querySelector(".noticias-carrusel");
const prev = document.getElementById("prev");
const next = document.getElementById("next");

// Se asegura que existan elementos antes de calcular
const firstCard = carrusel ? carrusel.querySelector(".card") : null;

if (carrusel && prev && next && firstCard) {
    // Obtiene el ancho real calculado de la primera tarjeta
    const cardWidth = firstCard.getBoundingClientRect().width;
    
    // Obtiene el valor numérico del gap (ej. "15px" -> 15)
    const gapStyle = getComputedStyle(carrusel).gap;
    const gap = parseFloat(gapStyle) || 0; 
    
    // La cantidad de desplazamiento es el ancho de una tarjeta más el gap
    const fullScrollAmount = cardWidth + gap;

    // -----------------------------------------------------------------
    // MODIFICACIÓN CLAVE: Reducir la distancia para mayor "fluidez"
    // -----------------------------------------------------------------
    // Reduce el desplazamiento al 75% de una tarjeta.
    // Puedes ajustar el 0.75 a un valor menor (ej. 0.5) para más fluidez, 
    // o a un valor mayor (ej. 1.2) si quieres que se mueva más rápido.
    const scrollFactor = 0.1; 
    const scrollAmount = fullScrollAmount * scrollFactor; 
    // -----------------------------------------------------------------

    next.addEventListener("click", function() {
        carrusel.scrollBy({ left: scrollAmount, behavior: "smooth" });
    });

    prev.addEventListener("click", function() {
        carrusel.scrollBy({ left: -scrollAmount, behavior: "smooth" });
    });
} else {
    console.error("No se pudieron encontrar todos los elementos del carrusel.");
}