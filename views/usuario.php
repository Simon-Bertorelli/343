<?php 
session_start(); 

// 1. Seguridad de Sesión
if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../Inicio-sesion-html.php");
    exit;
}

// 2. Inicialización de variables por defecto (Evita errores si falla la DB)
$user_data = [
    'nombre_usuario' => 'Cargando...',
    'email' => '',
    'descripcion' => '',
    'club_favorito' => 'Ninguno',
    'club_logo' => '../img/sin-equipo.png',
    'foto_perfil' => '../img/user-sin-foto.png'
];

// 3. Conexión a la Base de Datos (Exclusiva para esta página)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "343db";

$conn = new mysqli($servername, $username, $password, $dbname);

if (!$conn->connect_error) {
    $user_id = $_SESSION['usuario_id'];

    // Consulta completa recuperando datos del usuario y del equipo
    $sql = "
        SELECT 
            u.id_usuario,
            u.nombre_usuario,
            u.email,
            u.descripcion,
            u.foto_perfil,
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
        
        // Lógica del Club Favorito
        $club_favorito_nombre = $db_data['club_favorito'] ?? 'Ninguno';
        
        // Generación de ruta de imagen del club (Lógica original restaurada)
        if ($club_favorito_nombre != 'Ninguno' && $club_favorito_nombre != '') {
            $club_logo_path = "../img/" . str_replace(' ', '', $club_favorito_nombre) . ".png";
        } else {
            $club_logo_path = "../img/sin-equipo.png";
        }
        
        // Lógica de la Foto de Perfil (Con corrección de ruta relativa)
        $foto_perfil_path = $db_data['foto_perfil'] ?? '../img/user-sin-foto.png';
        
        // Si la foto viene de 'uploads/' y no tiene '../', se lo agregamos para que se vea desde 'views/'
        if (strpos($foto_perfil_path, 'uploads/') !== false && strpos($foto_perfil_path, '../') === false) {
            $foto_perfil_path = '../' . $foto_perfil_path;
        }

        // Asignación final
        $user_data = [
            'nombre_usuario' => $db_data['nombre_usuario'],
            'email' => $db_data['email'],
            'descripcion' => $db_data['descripcion'] ?? '',
            'club_favorito' => $club_favorito_nombre,
            'club_logo' => $club_logo_path,
            'foto_perfil' => $foto_perfil_path
        ];
    } 
    $stmt->close();
    // Mantenemos la conexión abierta hasta el final del HTML por seguridad, aunque el header usa la suya propia.
}
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
    <?php include 'header.php'; ?>
    
    <main class="profile-container">

        <?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-<?php echo $_SESSION['msg_type']; ?>">
                <?php echo $_SESSION['message']; ?>
            </div>
            <?php
                unset($_SESSION['message']);
                unset($_SESSION['msg_type']);
            ?>
        <?php endif; ?>
        
        <div class="profile-header">
            <div class="profile-photo-container">
                <img src="<?php echo htmlspecialchars($user_data['foto_perfil']); ?>" alt="Foto de Perfil" id="profile-photo">
                
                <button type="button" class="edit-btn photo-edit-btn" title="Cambiar Foto">&#9998;</button>
                <input type="file" id="photo-upload" style="display: none;" accept="image/jpeg, image/png">
            </div>
            <h1 class="user-title"><?php echo htmlspecialchars($user_data['nombre_usuario']); ?></h1>
        </div>

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
                    
                    <input 
                        type="text" 
                        id="club-input" 
                        name="club_favorito" 
                        list="clubes-disponibles" 
                        value="<?php echo htmlspecialchars($user_data['club_favorito'] == 'Ninguno' ? '' : $user_data['club_favorito']); ?>"
                        placeholder="Escribe el nombre de tu club..."
                    >
                    
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
    
    <?php include 'footer.php'; ?>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            
            // ---------------------------------------------------------
            // 1. LÓGICA DE CLUBES (Autocompletado y Visualización)
            // ---------------------------------------------------------
            const clubInput = document.getElementById('club-input');
            const datalist = document.getElementById('clubes-disponibles');
            const clubNameSpan = document.getElementById('club-name-span');
            // const clubLogoImg = document.getElementById('club-logo-img'); // Si usas imagen de club
            
            let fetchTimeout;
            
            const fetchClubs = (term) => {
                clearTimeout(fetchTimeout);
                if (term.length < 2) { 
                    datalist.innerHTML = '';
                    return;
                }
                
                fetchTimeout = setTimeout(async () => {
                    // Asume que tienes un archivo buscar_equipos.php funcional
                    try {
                        const response = await fetch(`buscar_equipos.php?term=${encodeURIComponent(term)}`);
                        if (!response.ok) return;
                        const clubs = await response.json();
                        datalist.innerHTML = '';
                        if (clubs.length > 0) {
                            clubs.forEach(club => {
                                const option = document.createElement('option');
                                option.value = club;
                                datalist.appendChild(option);
                            });
                        }
                    } catch (e) {
                        console.error("Error buscando equipos", e);
                    }
                }, 300);
            };

            function updateClubDisplay(name) {
                const safeName = name === '' ? 'Ninguno' : name;
                clubNameSpan.textContent = safeName;
                
                // Lógica opcional para actualizar logo del club en JS si existe la etiqueta img
                /*
                if (clubLogoImg) {
                   if(safeName !== 'Ninguno') {
                       const imgName = safeName.replace(/\s/g, '') + '.png';
                       clubLogoImg.src = '../img/' + imgName;
                   } else {
                       clubLogoImg.src = '../img/sin-equipo.png';
                   }
                }
                */
            }

            clubInput.addEventListener('input', (e) => {
                fetchClubs(e.target.value);
            });

            clubInput.addEventListener('change', () => {
                const selectedClubName = clubInput.value.trim();
                updateClubDisplay(selectedClubName);
            });


            // ---------------------------------------------------------
            // 2. LÓGICA DE FOTO DE PERFIL (AJAX)
            // ---------------------------------------------------------
            const photoUpload = document.getElementById('photo-upload');
            const profilePhoto = document.getElementById('profile-photo');
            const profilePhotoContainer = document.querySelector('.profile-photo-container');
            const initialPhotoPath = "<?php echo $user_data['foto_perfil']; ?>"; 

            // Click en el botón lápiz activa el input oculto
            profilePhotoContainer.querySelector('.photo-edit-btn').addEventListener('click', () => {
                photoUpload.click();
            });

            photoUpload.addEventListener('change', async (event) => {
                const file = event.target.files[0];
                if (!file) return;

                // A. Previsualización
                const reader = new FileReader();
                reader.onload = (e) => {
                    profilePhoto.src = e.target.result;
                };
                reader.readAsDataURL(file);

                // B. Subida al servidor
                const formData = new FormData();
                formData.append('profile_photo', file);
                
                try {
                    const response = await fetch('../subir_foto_perfil.php', {
                        method: 'POST',
                        body: formData
                    });

                    const result = await response.json();

                    if (result.success) {
                        console.log('✅ Foto actualizada.');
                    } else {
                        alert('Error: ' + result.message);
                        profilePhoto.src = initialPhotoPath; // Revertir
                    }
                } catch (error) {
                    console.error('Error de red:', error);
                    alert('Error de conexión.');
                    profilePhoto.src = initialPhotoPath; // Revertir
                }
                
                event.target.value = null; 
            });
        });
    </script>
</body>
</html>
<?php
// Cierre de conexión seguro al final
if (isset($conn) && $conn instanceof mysqli) {
    $conn->close();
}
?>