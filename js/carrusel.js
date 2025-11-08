const carrusel = document.querySelector(".noticias-carrusel");
const prev = document.getElementById("prev");
const next = document.getElementById("next");

const firstCard = carrusel ? carrusel.querySelector(".card") : null;

if (carrusel && prev && next && firstCard) {
    let cardWidth = firstCard.getBoundingClientRect().width;
    const gapStyle = getComputedStyle(carrusel).gap;
    let gap = parseFloat(gapStyle) || 0; 
    
    // Desplazamiento de exactamente una tarjeta completa
    let scrollAmount = cardWidth + gap;
    
    // Variable para prevenir clicks múltiples durante la animación
    let isScrolling = false;

    // Función para recalcular scrollAmount en resize
    window.addEventListener('resize', () => {
        cardWidth = firstCard.getBoundingClientRect().width;
        gap = parseFloat(getComputedStyle(carrusel).gap) || 0;
        scrollAmount = cardWidth + gap;
    });

    next.addEventListener("click", function() {
        if (isScrolling) return;
        isScrolling = true;
        
        // Calcula si hay espacio para scrollear más
        const maxScroll = carrusel.scrollWidth - carrusel.clientWidth;
        if (carrusel.scrollLeft < maxScroll) {
            carrusel.scrollBy({ left: scrollAmount, behavior: "smooth" });
        }
        
        // Libera después de la animación (ajusta el tiempo si es necesario)
        setTimeout(() => {
            isScrolling = false;
        }, 400);
    });

    prev.addEventListener("click", function() {
        if (isScrolling) return;
        isScrolling = true;
        
        // No scrollea si ya está al inicio
        if (carrusel.scrollLeft > 0) {
            carrusel.scrollBy({ left: -scrollAmount, behavior: "smooth" });
        }
        
        setTimeout(() => {
            isScrolling = false;
        }, 400);
    });
} else {
    console.error("No se pudieron encontrar todos los elementos del carrusel.");
}