const carrusel = document.querySelector(".noticias-carrusel");
const prev = document.getElementById("prev");
const next = document.getElementById("next");

const firstCard = carrusel ? carrusel.querySelector(".card") : null;

if (carrusel && prev && next && firstCard) {
    const cardWidth = firstCard.getBoundingClientRect().width;
    const gapStyle = getComputedStyle(carrusel).gap;
    const gap = parseFloat(gapStyle) || 0; 
    
    // Desplazamiento de exactamente una tarjeta completa
    const scrollAmount = cardWidth + gap;
    
    // Variable para prevenir clicks múltiples durante la animación
    let isScrolling = false;

    next.addEventListener("click", function() {
        if (isScrolling) return;
        
        isScrolling = true;
        carrusel.scrollBy({ left: scrollAmount, behavior: "smooth" });
        
        // Libera después de la animación (ajusta el tiempo si es necesario)
        setTimeout(() => {
            isScrolling = false;
        }, 400);
    });

    prev.addEventListener("click", function() {
        if (isScrolling) return;
        
        isScrolling = true;
        carrusel.scrollBy({ left: -scrollAmount, behavior: "smooth" });
        
        setTimeout(() => {
            isScrolling = false;
        }, 400);
    });
} else {
    console.error("No se pudieron encontrar todos los elementos del carrusel.");
}