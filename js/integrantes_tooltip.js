document.addEventListener('DOMContentLoaded', () => {
    const infoCards = document.querySelectorAll('.info-card');
    const tooltip = document.getElementById('dynamic-tooltip');
    const tooltipTitle = document.getElementById('tooltip-title');
    const tooltipDetail = document.getElementById('tooltip-detail');

    if (!tooltip) {
        console.error("❌ Error: Elemento #dynamic-tooltip no encontrado.");
        return;
    }

    // --- CÁLCULO DE TAMAÑO SEGURO ---
    // Hacemos visible el tooltip temporalmente fuera de pantalla para medir sus dimensiones.
    tooltip.style.left = '-9999px';
    tooltip.classList.add('visible'); 
    const tooltipWidth = tooltip.offsetWidth; 
    const tooltipHeight = tooltip.offsetHeight; 
    
    // Devolvemos al estado oculto y sin posición
    tooltip.classList.remove('visible'); 
    tooltip.style.left = ''; 
    
    const MARGIN = 8; // Distancia en píxeles entre la tarjeta y el tooltip

    // --- EVENT LISTENERS ---
    infoCards.forEach((card) => {
        card.addEventListener('mouseenter', () => {
            // Obtener datos
            tooltipTitle.innerText = card.dataset.titulo;
            tooltipDetail.innerText = card.dataset.detalle;

            // 1. Calcular la posición y dimensiones de la tarjeta
            const rect = card.getBoundingClientRect();
            const cardCenterX = rect.left + (rect.width / 2); // Centro horizontal de la tarjeta
            
            // 2. Posicionar (APARECE ARRIBA)
            
            // Posición TOP: Borde superior de la tarjeta (rect.top) 
            // - Alto del tooltip (tooltipHeight) 
            // - Margen (MARGIN)
            let topPos = rect.top - 100; 

            // Posición LEFT: Centrar el tooltip bajo la tarjeta.
            let leftPos = cardCenterX - (tooltipWidth / 2); 

            // 3. Manejar Borde de Pantalla (Evitar que se salga de los límites de la ventana)
            const viewportWidth = window.innerWidth;
            
            // Ajuste si se sale por la DERECHA
            if (leftPos + tooltipWidth > viewportWidth - MARGIN) {
                leftPos = viewportWidth - tooltipWidth - MARGIN; 
            }
            // Ajuste si se sale por la IZQUIERDA
            if (leftPos < MARGIN) {
                leftPos = MARGIN; 
            }
            // Ajuste si se sale por ARRIBA
            if (topPos < MARGIN) {
                 // Si no cabe arriba, lo forzamos a aparecer abajo
                topPos = rect.bottom + MARGIN;
                // NOTA: Si quisieras que se pegue al borde superior si no cabe, usa: topPos = MARGIN;
            }


            // Aplicar posición y mostrar
            tooltip.style.left = `${leftPos}px`;
            tooltip.style.top = `${topPos}px`;
            tooltip.classList.add('visible');
        });

        card.addEventListener('mouseleave', () => {
            // Ocultar usando la clase CSS
            tooltip.classList.remove('visible');
        });
    });
});