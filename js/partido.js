/**
 * partido.js
 * Script para cargar datos de un partido de fútbol dinámicamente usando FETCH (simulado).
 */

// --- PASO 1: SIMULACRO DE API (Datos Reales de River 2-3 Boca, 21/04/2024) ---
const mockDatosDelPartido = {
    id: 851234,
    fecha: "21 de Abril de 2024",
    hora: "15:30",
    estadio: "Estadio Mario Alberto Kempes",
    arbitro: "Yael Falcón Pérez",
    clima: "Soleado, 24°C",
    transmision: ["ESPN Premium", "TNT Sports"],
    equipos: {
        // En la data real, River es Local, Boca es Visitante.
        local: {
            nombre: "River Plate",
            logo: "../img/riber.png"
        },
        visitante: {
            nombre: "Boca Juniors",
            logo: "../img/boca.png"
        }
    },
    alineaciones: {
        local: {
            dt: "Martín Demichelis",
            jugadores: [
                { pos: "ARQ", nombre: "Franco Armani", num: 1 },
                { pos: "DEF", nombre: "Andrés Herrera", num: 15 },
                { pos: "DEF", nombre: "Leandro González Pirez", num: 14 },
                { pos: "DEF", nombre: "Paulo Díaz", num: 17 },
                { pos: "DEF", nombre: "Enzo Díaz", num: 13 },
                { pos: "MED", nombre: "Rodrigo Villagra", num: 23 },
                { pos: "MED", nombre: "Ignacio Fernández", num: 26 },
                { pos: "MED", nombre: "Claudio Echeverri", num: 19 },
                { pos: "DEL", nombre: "Facundo Colidio", num: 11 },
                { pos: "DEL", nombre: "Miguel Borja", num: 9 },
                { pos: "DEL", nombre: "Pablo Solari", num: 36 }
            ]
        },
        visitante: {
            dt: "Diego Martínez",
            jugadores: [
                { pos: "ARQ", nombre: "Sergio Romero", num: 1 },
                { pos: "DEF", nombre: "Luis Advíncula", num: 17 },
                { pos: "DEF", nombre: "Cristian Lema", num: 2 },
                { pos: "DEF", nombre: "Marcos Rojo", num: 6 },
                { pos: "DEF", nombre: "Lautaro Blanco", num: 23 },
                { pos: "MED", nombre: "Guillermo Fernández", num: 8 },
                { pos: "MED", nombre: "Ezequiel Fernández", num: 21 },
                { pos: "MED", nombre: "Kevin Zenón", num: 22 },
                { pos: "MED", nombre: "Jabes Saralegui", num: 47 },
                { pos: "DEL", nombre: "Miguel Merentiel", num: 16 },
                { pos: "DEL", nombre: "Edinson Cavani", num: 10 }
            ]
        }
    }
};

// --- PASO 2: FUNCIÓN PARA SIMULAR LA LLAMADA FETCH ---
function fetchDatosDelPartido(partidoId) {
    // Si tienes una API real, reemplaza esto:
    // return fetch(`URL_DE_TU_API/partidos/${partidoId}`).then(res => res.json());

    // SIMULACIÓN:
    return new Promise((resolve) => {
        setTimeout(() => {
            resolve(mockDatosDelPartido);
        }, 1000); // Simula 1 segundo de latencia de red
    });
}

// --- PASO 3: FUNCIÓN PARA RELLENAR EL HTML CON DATOS ---
function mostrarDatosEnHTML(datos) {
    const { equipos, alineaciones, fecha, hora, estadio, arbitro, clima, transmision } = datos;

    // 1. Sección #vs (Ajustamos al orden de tu HTML: Equipo 1=Boca (Visitante), Equipo 2=River (Local))
    
    // Equipo 1 (Boca)
    document.querySelector('#equipo-1 img').src = equipos.visitante.logo;
    document.querySelector('#equipo-1 img').alt = equipos.visitante.nombre + " Logo";
    document.querySelector('#equipo-1 h2').textContent = equipos.visitante.nombre;
    
    // Equipo 2 (River)
    document.querySelector('#equipo-2 img').src = equipos.local.logo;
    document.querySelector('#equipo-2 img').alt = equipos.local.nombre + " Logo";
    document.querySelector('#equipo-2 h2').textContent = equipos.local.nombre;

    // 2. Sección #info-detalles
    document.querySelector('#info-detalles p:nth-child(2)').textContent = `Equipo Local: ${equipos.local.nombre}`;
    document.querySelector('#info-detalles p:nth-child(3)').textContent = `Equipo Visitante: ${equipos.visitante.nombre}`;
    document.querySelector('#info-detalles p:nth-child(4)').textContent = `Árbitro: ${arbitro}`;
    document.querySelector('#info-detalles p:nth-child(5)').textContent = `Clima: ${clima}`;

    // 3. Sección #info-general
    document.querySelector('#info-general h3').textContent = `${equipos.local.nombre} vs ${equipos.visitante.nombre}`;
    document.querySelector('#info-general p:nth-child(2)').textContent = `Fecha: ${fecha}`;
    document.querySelector('#info-general p:nth-child(3)').textContent = `Hora: ${hora}`;
    document.querySelector('#info-general p:nth-child(4)').textContent = `Lugar: ${estadio}`;

    // 4. Sección #info-trans
    const transDiv = document.querySelector('#info-trans');
    transDiv.innerHTML = '<h3>Transmisión en Vivo</h3>'; // Limpiar y poner el título
    transmision.forEach(canal => {
        transDiv.innerHTML += `<p>${canal}</p>`; // Añadir cada canal
    });

    // 5. Alineaciones (Ajustamos al orden de tu HTML: Alineación 1=Boca, Alineación 2=River)
    popularTabla(
        '#alineaciones .alineacion:nth-child(1) table', // Selector de la tabla de Boca
        '#alineaciones .alineacion:nth-child(1) h3',    // Selector del título de Boca
        alineaciones.visitante.jugadores, 
        alineaciones.visitante.dt,
        equipos.visitante.nombre
    );
    popularTabla(
        '#alineaciones .alineacion:nth-child(2) table', // Selector de la tabla de River
        '#alineaciones .alineacion:nth-child(2) h3',    // Selector del título de River
        alineaciones.local.jugadores, 
        alineaciones.local.dt,
        equipos.local.nombre
    );
}

// --- PASO 4: FUNCIÓN AUXILIAR PARA CREAR LAS TABLAS DE ALINEACIÓN ---
function popularTabla(selectorTabla, selectorTitulo, jugadores, dt, nombreEquipo) {
    const tabla = document.querySelector(selectorTabla);
    const titulo = document.querySelector(selectorTitulo);
    
    if (!tabla || !titulo) {
        console.error(`Error: No se encontró el elemento con el selector: ${selectorTabla} o ${selectorTitulo}`);
        return; 
    }

    // Actualizar el título del equipo
    titulo.textContent = nombreEquipo;

    // Obtener y limpiar la tabla
    const encabezado = tabla.rows[0].innerHTML;
    tabla.innerHTML = `<tr>${encabezado}</tr>`; // Limpiar dejando solo el encabezado

    // Añadir cada jugador
    jugadores.forEach(jugador => {
        const fila = document.createElement('tr');
        fila.innerHTML = `
            <td>${jugador.pos}</td>
            <td>${jugador.nombre}</td>
            <td>${jugador.num}</td>
        `;
        tabla.appendChild(fila);
    });

    // Añadir el DT
    const filaDT = document.createElement('tr');
    filaDT.classList.add('dt'); 
    filaDT.innerHTML = `
        <td>DIR</td>
        <td>${dt}</td>
        <td>DT</td>
    `;
    tabla.appendChild(filaDT);
}

// --- PASO 5: EJECUTAR LA LÓGICA CUANDO EL DOM ESTÉ CARGADO ---
document.addEventListener('DOMContentLoaded', () => {
    // Si estás usando PHP para pasar un ID real, lo harías aquí.
    fetchDatosDelPartido(123) 
        .then(datos => {
            mostrarDatosEnHTML(datos);
        })
        .catch(error => {
            console.error("Error al cargar datos del partido:", error);
            document.querySelector('h1').textContent = 'Error al cargar el partido. Revisa la consola (F12).';
        });
});