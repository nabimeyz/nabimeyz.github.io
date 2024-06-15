<?php 
    require __DIR__ . '/../carrito/database.php';
    $db = new Database ();
    $con = $db->conectar();

    $sql = $con->prepare("SELECT id_productos, nombre, precio FROM productos WHERE existencia = 1 AND id_grupo = 1");
    $sql->execute();
    $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
?>

<!--metadatos-->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0  maximum-scale=1.0, user-scalable=no">
    <!--Titulo e icono de barra de navegación-->
    <title>Bunnielody - BTS</title>
    <link rel="icon" href="/imagenes/conejito.png" type="image/x-icon">

    <!--enlaces a hojas de estilo-->
    <link rel="stylesheet" href="/styles/btsMain.css">

    <!--Importación de fuentes externas: tipografías-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!--bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
    

<!--inicio del body-->
<body>
    
    <header> <!--Parte superior de la página-->

        <div> <!--Logo-->
           <a href="/index.php"><img id="logobunny" src="/sobreMi/imagenes/logo.jpg" alt="logo de la página"></a> 
        </div>
    
        <nav> <!--Barra de navegación-->
            <ul>
                <a href="/bts/bts.php"><li>BTS</li></a>
                <a href="/nj/newJeans.php"><li>NewJeans</li></a>
                <a href="/txt/tubatu.php"><li>TXT</li></a>
                <a href="/quienesSomos/quienesSomos.html"><li>Quienes Somos</li></a>
                <a href="/carrito/carrito.php"><img id="carrito" src="/imagenes/carrito.png" alt="carrito"></a> 
            </ul>
        </nav>
    </header>

    <main>
        <!--presentación de formulario-->
            <section id="presentacion">
               <h2>Compra tus productos favoritos de BTS</h2> 
               <br>
               <p>La icónica banda de K-pop que ha conquistado el mundo con su música y talento. En nuestra tienda, puedes encontrar álbumes y DVDs con ediciones especiales y coleccionables. También disponemos de ropa y accesorios, como camisetas, sudaderas y gorras, todos con diseños exclusivos. No pueden faltar los lightsticks y merchandising de conciertos, incluyendo los emblemáticos lightsticks ARMY Bomb, pósters y programas de sus giras mundiales. Además, ofrecemos figuras y coleccionables perfectos para cualquier fanático.<br> <br><strong>Nota:</strong> por el momento solo contamos con stock de albumes, espera al restock del siguiente mes</p>
            </section>
            
            <section id="sectionGroup">
                <img id="imgGroup" src="https://i.pinimg.com/736x/71/72/11/717211acfd7564ad69ae5aa5ae80c012.jpg" alt="icono del grupo">
            </section>
    </main>

    <div class="separacion"> <!--Seṕaración y título de sección-->
        <h2>Productos disponibles</h2>
    </div>

<!--Listado de productos en venta-->
<section id="productos">

<div class="album py-5 bg-body-tertiary">

    <div class="container">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    <?php foreach ($resultado as $row) { ?>
        <div class="col">
        <div class="card shadow-sm">

        <?php 
        $id = $row["id_productos"];
        $imagen = "../imagenes/productos/$id/item.jpg";

        if (!file_exists(__DIR__ . "/$imagen")) {
            $imagen = "../imagenes/nofoto.jpg"; // Ruta a la imagen de "No disponible"
        }
        ?>
        <img src="<?php echo $imagen?>" alt="imagen del producto">
            <div class="card-body">
                <h5 class="card-title"><?php echo $row['nombre']; ?></h5>
                <p class="card-text">$<?php echo $row['precio']; ?> MXN</p>
            <div class="d-flex justify-content-between align-items-center"></div>
                <div class="btn-group">
                    <a href="" class="btn btn-success">Al carrito</a>
                </div>
            </div>
            </div>
        </div>
    <?php  }?>

        


    </div>
</div>
</section>       

   <footer>
        <section id="etiquetas">
            <h4>Sitios de interés</h4> <br>
            <ul id="sitiosInteres">
                <a href="/index.php"><li>Inicio</li></a>
                <a href="/sobreMi/sobreMi.html"><li>¿Quién creó el sitio?</li></a>
                <a href="/formContacto/formContacto.html"><li>Contáctanos</li></a>
                <a href="/metodoPago/pago.html"><li>Métodos de pago</li></a>
            </ul>
        </section>
    
        <section id="logo">
            <img src="/sobreMi/imagenes/logo.jpg" alt="logo">
            <p>© 2024. Metztli Huertero Granada</p>
        </section>
    </footer>
</body>

</html>