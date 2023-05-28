<!DOCTYPE html>
<html  >
<head>
  
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v5.7.12, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/imagen1-147x106.png" type="image/x-icon">
  <meta name="description" content="">
  
  
  <title>Evaluacion</title>
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons2/mobirise2.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/socicon/css/styles.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="preload" href="https://fonts.googleapis.com/css?family=Jost:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Jost:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap"></noscript>
  <link rel="preload" as="style" href="assets/mobirise/css/mbr-additional.css"><link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">

  
  
  
</head>
<body>
<section data-bs-version="5.1" class="menu cid-tEuiWd0Z8q" once="menu" id="menu1-2y">
    
    <nav class="navbar navbar-dropdown navbar-fixed-top navbar-expand-lg">
        <div class="container-fluid">
            <div class="navbar-brand">
                <span class="navbar-logo">
                    <a href="home.php">
                        <img src="assets/images/imagen1-147x106.png" alt="" style="height: 3.9rem;">
                    </a>
                </span>
                <span class="navbar-caption-wrap"><a class="navbar-caption text-white text-primary display-7" href="home.php">¡Bienvenido! Donaldo Ian López Zacaula</a></span>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-bs-toggle="collapse" data-target="#navbarSupportedContent" data-bs-target="#navbarSupportedContent" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true"><li class="nav-item"><a class="nav-link link text-white text-primary display-4" href="home.php" aria-expanded="false">Home</a></li>
                    <li class="nav-item"><a class="nav-link link text-white text-primary display-4" href="dashboard.php">Dashboard</a></li><li class="nav-item"><a class="nav-link link text-white text-primary display-4" href="rankin.php">Rankin</a></li></ul>

                <div class="navbar-buttons mbr-section-btn"><a class="btn btn-success display-4" href="home.php"><span class="mobi-mbri mobi-mbri-logout mbr-iconfont mbr-iconfont-btn"></span>Log Out</a></div>
            </div>
        </div>
    </nav>
</section>

<?php
// Realizar la conexión a la base de datos

// Configurar los datos de conexión
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ejemplo_eco";

// Crear la conexión
$pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);

// Realizar la consulta
$sql = "SELECT m.descripcion, m.imagen
        FROM tb_material AS m
        JOIN tb_niveles AS n ON m.id_nivel = n.id_nivel
        JOIN tb_modulo AS mo ON m.id_modulo = mo.id_modulo
        WHERE m.id_categoria = '12' AND n.id_nivel = '1' AND mo.id_modulo = '1'";
$query = $pdo->prepare($sql);
$query->execute();
$resultados = $query->fetchAll(PDO::FETCH_ASSOC);

// Mostrar los resultados en la vista
foreach ($resultados as $resultado) {
    $descripcion = $resultado['descripcion'];
    $imagen = $resultado['imagen'];

    // Aquí puedes mostrar la descripción y la imagen como desees
    echo '<p>'.$descripcion.'</p>';
    echo '<img src="'.$imagen.'" alt="Imagen">';
}

// Cerrar la conexión
$pdo = null;
?>




<section data-bs-version="5.1" class="image1 cid-tFkB1CiuHE mbr-fullscreen" id="image1-37">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-lg-6">
                <div class="image-wrapper">
                    <img <?php echo '<img src="' . $imagen . '"'; ?>alt="Imagen">  
                </div>
            </div>
            <div class="col-12 col-lg">
                <div class="text-wrapper">
                    <h3 class="mbr-section-title mbr-fonts-style mb-3 display-5">
                        <strong></strong></h3>
                    <p class="mbr-text mbr-fonts-style display-7">
                    <?php echo '<p>' . $descripcion . '</p>';?></p>
                </div>
            </div>
        </div>
    </div>
</section>







<section data-bs-version="5.1" class="footer4 cid-tEuiV9CT1M" once="footers" id="footer4-2x">
    <div class="container">
        <div class="row mbr-white">
            <div class="col-6 col-lg-3">
                <div class="media-wrap col-md-8 col-12">
                    <a href="https://lenguas.buap.mx/">
                        <img src="assets/images/logo-buap-2-397x298.png" alt="">
                    </a>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <h5 class="mbr-section-subtitle mbr-fonts-style mb-2 display-7">
                    <strong>ACERCA DE NOSOTROS</strong></h5>
                <p class="mbr-text mbr-fonts-style mb-4 display-4">La Facultad de Lenguas de la BUAP, es una institución educativa dedicada a la enseñanza de idiomas y la formación de profesionales en áreas relacionadas con los lenguajes y la comunicación.</p>
                <h5 class="mbr-section-subtitle mbr-fonts-style mb-3 display-7"><strong>¡SÍGUENOS!</strong></h5>
                <div class="social-row display-7">
                    <div class="soc-item">
                        <a href="https://www.facebook.com/lenguasbuap/" target="_blank">
                            <span class="mbr-iconfont socicon-facebook socicon"></span>
                        </a>
                    </div>
                    <div class="soc-item">
                        <a href="https://www.instagram.com/buapoficial/" target="_blank">
                            <span class="mbr-iconfont socicon-instagram socicon"></span>
                        </a>
                    </div>
                    <div class="soc-item">
                        <a href="https://twitter.com/buapoficial?lang=en" target="_blank">
                            <span class="mbr-iconfont socicon-twitter socicon"></span>
                        </a>
                    </div>
                    <div class="soc-item">
                        <a href="https://www.youtube.com/watch?v=waSCwnexsE0&ab_channel=DAUBUAP" target="_blank">
                            <span class="mbr-iconfont socicon-youtube socicon"></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <h5 class="mbr-section-subtitle mbr-fonts-style mb-2 display-7"><strong>&nbsp; &nbsp; &nbsp; FACULTAD DE LENGUAS</strong></h5>
                <ul class="list mbr-fonts-style display-4">
                    <li class="mbr-text item-wrap"><span style="font-size: 1.1rem;">&nbsp; &nbsp; &nbsp; 24 Norte #2003 Col.Humboldt</span></li><li class="mbr-text item-wrap">&nbsp; &nbsp; &nbsp; Puebla, Pue. C. P. 72430</li>
                    <li class="mbr-text item-wrap">&nbsp; &nbsp; &nbsp; Tel: 2295500 Ext: 5810</li>
                </ul>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <h5 class="mbr-section-subtitle mbr-fonts-style mb-2 display-7">
                    <strong>BUAP</strong></h5>
                <ul class="list mbr-fonts-style display-4">
                    <li class="mbr-text item-wrap">4 Sur 104 Centro Histórico C.P. 72000</li>
                    <li class="mbr-text item-wrap">Teléfono +52 (222) 229 55 00</li>
                    <li class="mbr-text item-wrap"><br></li>
                    <li class="mbr-text item-wrap"><br></li>
                </ul>
            </div>
            
        </div>
    </div>
</section><script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>  <script src="assets/smoothscroll/smooth-scroll.js"></script>  <script src="assets/ytplayer/index.js"></script>  <script src="assets/dropdown/js/navbar-dropdown.js"></script>  <script src="assets/theme/js/script.js"></script>  
  
  
</body>
</html>