<?php

    $servidor="localhost"; // conexión local
    $user="root";
    $password="";

    $nombre = $_POST['name'];
    $cedula = $_POST['cedula'];
    $anverso='';
    $reverso='';
    $carpeta = "fotos/";

    if(isset($_FILES["anverso"])){
        $file_a= $_FILES["anverso"];
        $nombre_a = $file_a["name"];
        $tipo_a = $file_a["type"];
        $ruta_provisoria_a = $file_a["tmp_name"];
        $size_a = $file_a["size"];
        if (($tipo_a == "image/jpg" || $tipo_a == 'image/JPG' || $tipo_a == 'image/jpeg' || $tipo_a == "image/png") && $size_a < 5*1024*1024){
            $src = $carpeta . "anverso-$cedula-$nombre_a";
            move_uploaded_file($ruta_provisoria_a, $src);
            $anverso = $src;
        }
    }

    if(isset($_FILES["reverso"])){
        $file_r= $_FILES["reverso"];
        $nombre_r = $file_r["name"];
        $tipo_r = $file_r["type"];
        $ruta_provisoria_r = $file_r["tmp_name"];
        $size_r = $file_r["size"];
        if (($tipo_r == "image/jpg" || $tipo_r == 'image/JPG' || $tipo_r == 'image/jpeg' || $tipo_r == "image/png") && $size_r < 5*1024*1024){
            $src = $carpeta . "reverso-$cedula-$nombre_r";
            move_uploaded_file($ruta_provisoria_r, $src);
            $reverso = $src;
        }
    }

    try{

        $connection= new PDO("mysql:host=$servidor;dbname=confirmacion", $user, $password);
        $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql="INSERT INTO `informacion_cliente` (`id`, `nombre`, `cedula`, `imagen_frontal`, `imagen_dorsal`) VALUES (NULL, '$nombre', '$cedula', '$anverso', '$reverso');";

        $connection->exec($sql);

        $title= "¡Datos Enviados!";
        $res="¡Tus datos fueron enviados con exito! Gracias por tu compra";
        $icon="<img data-aos='fade-up' src='assets/exito.png' alt=''>";

    }catch(PDOException $error){
        $title= "¡Ha ocurrido un problema!";
        $res="Tus datos no han podido ser enviados, por favor intenta de nuevo o sino comunicate con nuestro equipo.";
        $icon="<img data-aos='fade-up' src='assets/errir.png' alt=''>";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <title>Divino</title>
</head>
<body>

    <main>
        <div class="b-wrapper">
            <header>
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 517.2 262.3" style="enable-background:new 0 0 517.2 262.3;" xml:space="preserve">
                    <path class="st0" d="M328,161.6L309.6,112c-0.2-0.5-0.7-0.8-1.2-0.8c-0.7,0-1.3,0.6-1.3,1.3v0l1.1,32.5l0.6,15.3l0.1,1.3h-21.3  l0.1-1.3l0.6-15.3v-27.9l-0.6-15.4l0-0.7l0-0.7h35.4c2.2,0,4.1,1.3,4.9,3.1c0.1,0.3,0.3,0.6,0.3,0.9l16.8,45.6  c0.2,0.5,0.7,0.9,1.3,0.9c0.7,0,1.3-0.6,1.3-1.3l-1.1-32.4l-0.6-15.4l-0.1-1.3h21.3l0,0.7l0,0.7l-0.6,15.3V145l0.6,15.3l0,1.3H328z   M116.2,130.2c0,12.9-6.5,17.8-10.7,19.6c-3.4,1.4-9.9,2.5-14.5,2.5H71.8v-44.1H91c4.6,0,11.2,1.1,14.5,2.5  C109.7,112.5,116.2,117.4,116.2,130.2L116.2,130.2z M51.3,130.2c0,17.9-0.6,38.3-0.6,38.5l0,0.7l0.7,0l14.5-0.5l6.7-0.2h21.2  c8.5,0,15.5-1.5,22-4.6c6.6-3,11.8-7.4,15.5-12.9c1.2-1.7,2.2-3.8,3.1-6.2c1.6-4.4,2.5-9.6,2.5-14.5v-0.3V130c0-4.9-0.9-10-2.5-14.5  c-0.8-2.4-1.9-4.5-3.1-6.2c-3.7-5.6-8.9-9.9-15.5-12.9c-6.6-3-13.5-4.6-22-4.6H72.5l-6.7-0.2l-14.5-0.5l-0.7,0l0,0.7  C50.6,92,51.3,112.3,51.3,130.2 M421.5,155.1c4.8,0,9.1-1,12.8-3.1c3.7-2,6.6-4.9,8.6-8.6c2-3.7,3.1-7.9,3.2-12.6  c-0.1-4.7-1.1-9-3.2-12.7c-2-3.7-4.9-6.6-8.6-8.6c-3.7-2-8-3.1-12.8-3.1c-4.8,0-9.1,1-12.8,3.1c-3.7,2-6.6,4.9-8.6,8.6  c-2,3.7-3.1,8-3.2,12.7c0.1,4.7,1.1,8.9,3.2,12.6c2,3.6,4.9,6.5,8.6,8.6C412.3,154,416.6,155.1,421.5,155.1 M421.5,171.6  c-8.8,0-16.7-1.7-23.4-5.2c-6.8-3.4-12.2-8.3-15.9-14.5c-3.7-6.2-5.7-13.3-5.7-21.1c0.1-8,2-15.1,5.7-21.2  c3.7-6.1,9.1-10.9,15.9-14.4c6.8-3.4,14.7-5.2,23.4-5.2h0c8.8,0,16.7,1.7,23.4,5.2c6.8,3.4,12.2,8.3,15.9,14.4  c3.7,6.1,5.7,13.2,5.7,21.2c-0.1,7.9-2,15-5.7,21.1c-3.7,6.2-9.1,11-15.9,14.5C438.1,169.9,430.2,171.6,421.5,171.6L421.5,171.6z   M274.8,161l0-0.7l-0.6-15.3v-27.9l0.6-15.4l0-0.7l0-0.7h-21.3l0,0.7l0,0.7l0.6,15.4V145l-0.6,15.3l0,0.7l0,0.7h21.3L274.8,161z   M225.5,100.4l-0.3,0.9L211.9,150c-0.2,0.6-0.7,1-1.3,1c-0.6,0-1.2-0.4-1.3-1l0,0l0,0L196,101.4l-0.3-0.9h-23l0.8,1.8  c2.1,5.1,4.2,10.3,6.1,15.5c6,15.8,10.7,29.9,14.6,43l0.1,0.5l0.1,0.5h32.3l0.1-0.5l0.1-0.5c3.8-13.1,8.6-27.2,14.6-43  c2-5.2,4-10.4,6.1-15.5l0.8-1.8H225.5z M167.7,161l0-0.7l-0.6-15.3v-27.9l0.6-15.4l0-0.7l0-0.7h-21.3l0,0.7l0,0.7l0.6,15.4V145  l-0.6,15.3l0,0.7l0,0.7h21.3L167.7,161z"/>
                </svg>

                    <div>
                        <a href="https://api.whatsapp.com/send?phone=59892093467"><img src="assets/info.webp" alt="" class="info"></a>
                    </div>
            </header>

            <h1 data-aos="fade-up">
                <?php echo $title ?>
            </h1>

        </div>
    </main>

    <div class="response">
        
        <?php echo $icon?>

        <h2 class='con-s' data-aos="fade-up">
            <?php echo $res?>
        </h2>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>    
</body>
</html>