document.addEventListener('DOMContentLoaded', () => {
    // Función para manejar el avance/retroceso del carrusel
    function moveCarrusel(containerId, direction) {
        const container = document.getElementById(containerId.substring(1)); // Obtener el contenedor por ID
        if (!container) return;

        const items = container.querySelectorAll('.carrusel-item');
        if (items.length === 0) return;
        
        const itemsPerPage = parseInt(container.querySelector('.carrusel-wrapper').dataset.itemsPerPage) || 5;

        // Encontrar el índice del primer elemento visible (el que no tiene display: none)
        let firstVisibleIndex = Array.from(items).findIndex(item => item.style.display !== 'none');
        if (firstVisibleIndex === -1) firstVisibleIndex = 0; // Si todos están ocultos, empezar desde el principio

        let newStartIndex = firstVisibleIndex;

        if (direction === 'next') {
            newStartIndex = Math.min(firstVisibleIndex + itemsPerPage, items.length - itemsPerPage);
            // Si el nuevo índice es el mismo y no estamos al inicio, significa que ya llegamos al final.
            if (newStartIndex === firstVisibleIndex && firstVisibleIndex !== 0) {
                 newStartIndex = items.length - itemsPerPage; // Asegura que mostramos los últimos 5
            }
        } else if (direction === 'prev') {
            newStartIndex = Math.max(firstVisibleIndex - itemsPerPage, 0);
        }

        // Si hay menos de 5 elementos, newStartIndex puede ser negativo. Lo limitamos a 0.
        newStartIndex = Math.max(0, newStartIndex);
        
        // Ocultar todos los elementos y mostrar solo el nuevo grupo
        items.forEach((item, index) => {
            if (index >= newStartIndex && index < newStartIndex + itemsPerPage) {
                item.style.display = 'table-row'; // Muestra la fila
            } else {
                item.style.display = 'none'; // Oculta la fila
            }
        });
    }

    // Inicializar carruseles para mostrar solo los primeros 5 elementos
    document.querySelectorAll('.crud-section .carrusel-wrapper').forEach(wrapper => {
        const items = wrapper.querySelectorAll('.carrusel-item');
        const itemsPerPage = parseInt(wrapper.dataset.itemsPerPage) || 5;

        items.forEach((item, index) => {
            if (index >= itemsPerPage) {
                item.style.display = 'none';
            }
        });
    });

    // Añadir listeners a los botones
    document.querySelectorAll('.next-btn').forEach(button => {
        button.addEventListener('click', (e) => {
            const target = e.target.dataset.target; // e.g., #grupos
            moveCarrusel(target, 'next');
        });
    });

    document.querySelectorAll('.prev-btn').forEach(button => {
        button.addEventListener('click', (e) => {
            const target = e.target.dataset.target; // e.g., #grupos
            moveCarrusel(target, 'prev');
        });
    });
});