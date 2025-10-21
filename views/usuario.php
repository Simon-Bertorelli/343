<?php 
session_start(); 

if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../Inicio-sesion-html.php");
    exit;
}

$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "343db";

// Conexión a la base de datos
$conn = new mysqli($servername, $db_username, $db_password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$user_id = $_SESSION['usuario_id'];

// Consulta: unir usuario con su equipo favorito (si existe)
$sql = "
    SELECT 
        u.id_usuario,
        u.nombre_usuario,
        u.email,
        u.descripcion,
        e.nombre AS club_favorito
    FROM usuario u
    LEFT JOIN equipo e ON u.id_equipo_favorito = e.id_equipo
    WHERE u.id_usuario = ?
";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $db_data = $result->fetch_assoc();
    
    $club_favorito_nombre = $db_data['club_favorito'] ?? 'Ninguno';
    
    // Generación de ruta de imagen (Asumimos que el logo se llama: 'ClubNombreSinEspacios.png')
    if ($club_favorito_nombre != 'Ninguno' && $club_favorito_nombre != '') {
        $club_logo_path = "../img/" . str_replace(' ', '', $club_favorito_nombre) . ".png";
    } else {
        // Imagen por defecto si no hay club favorito
        $club_logo_path = "../img/sin-equipo.png";
    }
    
    $user_data = [
        'nombre_usuario' => $db_data['nombre_usuario'],
        'email' => $db_data['email'],
        'descripcion' => $db_data['descripcion'] ?? '',
        'club_favorito' => $club_favorito_nombre,
        'club_logo' => $club_logo_path,
        'foto_perfil' => '../img/user-sin-foto.png' // Se mantiene la foto de perfil estática por ahora
    ];
} else {
    // Si no se encuentra el usuario (caso raro)
    $user_data = [
        'nombre_usuario' => 'Desconocido',
        'email' => '',
        'descripcion' => '',
        'club_favorito' => 'Ninguno',
        'club_logo' => '../img/sin-equipo.png',
        'foto_perfil' => '../img/user-sin-foto.png'
    ];
}

$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario - 343</title>
    <link rel="icon" href="../img/343-logo.png" type="image/png">
    <link rel="stylesheet" href="../css/usuario.css">
</head>
<body>
    <?php include 'header.php'; // Suponiendo que este archivo existe ?>
    
    <main class="profile-container">

        <?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-<?php echo $_SESSION['msg_type']; ?>">
                <?php echo $_SESSION['message']; ?>
            </div>
            <?php
                // Limpiar la sesión para que el mensaje no se muestre de nuevo
                unset($_SESSION['message']);
                unset($_SESSION['msg_type']);
            ?>
        <?php endif; ?>
        
        <div class="profile-header">
            <div class="profile-photo-container">
                <img src="<?php echo $user_data['foto_perfil']; ?>" alt="Foto de Perfil" id="profile-photo">
                <button type="button" class="edit-btn photo-edit-btn" title="Cambiar Foto">&#9998;</button>
                <input type="file" id="photo-upload" style="display: none;">
            </div>
            <h1 class="user-title"><?php echo htmlspecialchars($user_data['nombre_usuario']); ?></h1>
        </div>

        <!-- La acción del formulario apunta correctamente a procesar_actualizacion.php -->
        <form action="../procesar_actualizacion.php" method="POST" class="profile-form">
            
            <section class="form-section">
                <h2>Datos de Acceso</h2>
                
                <div class="form-group">
                    <label for="nombre">Nombre de Usuario</label>
                    <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($user_data['nombre_usuario']); ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="email">Correo Electrónico (Email)</label>
                    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user_data['email']); ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="password">Cambiar Contraseña</label>
                    <input type="password" id="password" name="password" placeholder="Dejar vacío para no cambiar">
                    <small>Mínimo 8 caracteres. (Si dejas vacío, no se modificará)</small>
                </div>
            </section>
            
            <section class="form-section">
                <h2>Descripción / Biografía</h2>
                <div class="form-group">
                    <textarea id="descripcion" name="descripcion" rows="4"><?php echo htmlspecialchars($user_data['descripcion']); ?></textarea>
                </div>
            </section>
            
            <section class="form-section">
                <h2>Equipo Favorito</h2>
                <div class="form-group club-selector">
                    <label for="club-input">Buscar y Seleccionar tu Club</label>
                    
                    <!-- CAMPO DE AUTOCOMPLETADO (Reemplaza al SELECT) -->
                    <input 
                        type="text" 
                        id="club-input" 
                        name="club_favorito" 
                        list="clubes-disponibles" 
                        value="<?php echo htmlspecialchars($user_data['club_favorito'] == 'Ninguno' ? '' : $user_data['club_favorito']); ?>"
                        placeholder="Escribe el nombre de tu club..."
                    >
                    
                    <!-- Datalist, se rellena dinámicamente con JS -->
                    <datalist id="clubes-disponibles"></datalist>

                    
                    <div class="current-club-display" id="club-display">
                        <span class="club-label">Club Actual:</span>
                       
                        <span id="club-name-span"><?php echo htmlspecialchars($user_data['club_favorito']); ?></span>
                    </div>
                </div>
            </section>

            <div class="submit-area">
                <button type="submit" class="save-btn">Guardar Cambios</button>
            </div>
        </form>
    </main>
    
    <?php include 'footer.php'; // Suponiendo que este archivo existe ?>

    <!-- BLOQUE JAVASCRIPT PARA EL AUTOCOMPLETADO Y VISUALIZACIÓN -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const clubInput = document.getElementById('club-input');
            const datalist = document.getElementById('clubes-disponibles');
            const clubLogoImg = document.getElementById('club-logo-img');
            const clubNameSpan = document.getElementById('club-name-span');
            const clearClubBtn = document.getElementById('clear-club-btn');
            
            let fetchTimeout;
            
            // Función para obtener equipos mediante AJAX
            const fetchClubs = (term) => {
                clearTimeout(fetchTimeout);
                
                // Mínimo 2 caracteres para buscar en la DB
                if (term.length < 2) { 
                    datalist.innerHTML = '';
                    return;
                }
                
                // Retraso de 300ms para evitar llamadas excesivas
                fetchTimeout = setTimeout(async () => {
                    // LLAMADA AL ENDPOINT: views/buscar_equipos.php
                    const response = await fetch(`buscar_equipos.php?term=${encodeURIComponent(term)}`);
                    if (!response.ok) {
                        console.error('Error al buscar equipos.');
                        return;
                    }

                    const clubs = await response.json();

                    datalist.innerHTML = ''; // Limpia la lista anterior
                    
                    if (clubs.length > 0) {
                        clubs.forEach(club => {
                            const option = document.createElement('option');
                            option.value = club;
                            datalist.appendChild(option);
                        });
                    }
                }, 300);
            };

            // Función auxiliar para actualizar la visualización del club
            function updateClubDisplay(name, path) {
                const safeName = name === '' ? 'Ninguno' : name;
                const safePath = path || '../img/sin-equipo.png';

                clubNameSpan.textContent = safeName;
                clubLogoImg.src = safePath;
                clubLogoImg.alt = safeName;
                
                // Configurar el handler de error para la imagen
                clubLogoImg.onerror = () => {
                    clubLogoImg.src = '../img/sin-equipo.png';
                    clubLogoImg.alt = 'Sin equipo';
                };
            }

            // 1. Manejar la escritura para el autocompletado
            clubInput.addEventListener('input', (e) => {
                fetchClubs(e.target.value);
            });

            // 2. Manejar la selección de un equipo
            clubInput.addEventListener('change', () => {
                const selectedClubName = clubInput.value.trim();
                
                if (selectedClubName.length > 0) {
                    // Normalizamos el nombre para buscar la imagen (quitando espacios)
                    const imageFileName = selectedClubName.replace(/\s/g, '') + '.png';
                    const imagePath = `../img/${imageFileName}`;
                    
                    updateClubDisplay(selectedClubName, imagePath);
                } else {
                    updateClubDisplay('Ninguno', '../img/sin-equipo.png');
                }
            });
            
            // 3. Botón para limpiar la selección
            clearClubBtn.addEventListener('click', () => {
                clubInput.value = '';
                updateClubDisplay('Ninguno', '../img/sin-equipo.png');
            });

            // 4. Funcionalidad de cambio de foto de perfil (simulado)
            const photoUpload = document.getElementById('photo-upload');
            const profilePhotoContainer = document.querySelector('.profile-photo-container');

            profilePhotoContainer.querySelector('.photo-edit-btn').addEventListener('click', () => {
                photoUpload.click();
            });

            photoUpload.addEventListener('change', (event) => {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        document.getElementById('profile-photo').src = e.target.result;
                        // Nota: La subida real de la imagen al servidor y la base de datos 
                        // requeriría una llamada AJAX separada al presionar "Guardar Cambios".
                        console.log('Previsualización de foto de perfil lista.');
                    };
                    reader.readAsDataURL(file);
                }
            });
            
            // Inicializar la visualización del club actual al cargar la página
            const initialClubName = "<?php echo htmlspecialchars($user_data['club_favorito']); ?>";
            const initialClubLogo = "<?php echo htmlspecialchars($user_data['club_logo']); ?>";
            updateClubDisplay(initialClubName, initialClubLogo);

        });
    </script>
</body>
</html>
