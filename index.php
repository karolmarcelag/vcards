<?php
    include "funciones/conexion.php";

    $correo = $_GET["mail"];

    $consulta = mysqli_query($conexion,"select * from vcard.usuario where correo='$correo'");
    $tabla = mysqli_fetch_array($consulta);

    $nombre = $tabla["nombre"]." ".$tabla["apellido"];
    $puesto = $tabla["puesto"];
    $empresa = $tabla["empresa"];
    $direccion = $tabla["direccion"];
    $direccion2 = $tabla["codigoPostal"]." ".$tabla["ciudad"]." ".$tabla["estado"]." ".$tabla["pais"];
    $paginaWeb = $tabla["web"];
    $descripcion_telefono1 = $tabla["tel1_tipo"];
    $telefono1 = $tabla["tel1_prefijo"]." ".$tabla["tel1_telefono"];
    $descripcion_telefono2 = $tabla["tel2_tipo"];
    $telefono2 = $tabla["tel2_prefijo"]." ".$tabla["tel2_telefono"];
    $descripcion_telefono3 = $tabla["tel3_tipo"];
    $telefono3 = $tabla["tel3_prefijo"]." ".$tabla["tel3_telefono"];
    $descripcion_cuenta1 = $tabla["otros1_tipo"];
    $cuenta1 = $tabla["otros1_cuenta"];
    $descripcion_cuenta2 = $tabla["otros2_tipo"];
    $cuenta2 = $tabla["otros2_cuenta"];
    $descripcion_cuenta3 = $tabla["otros3_tipo"];
    $cuenta3 = $tabla["otros3_cuenta"];
    $imagen = $tabla["imagenBase64"];
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>vcards</title>
    <link href="/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link href="estilos/estilo.css" rel="stylesheet">
    <script src="scripts/jquery-3.6.0.js"></script>
    <script src="scripts/jquery-3.6.0.min.js"></script>
    <script src="scripts/script.js"></script>
</head>

<body>
    <div class="contenedor_principal">
        <img class="circular--square" src="<?php echo $imagen?>">
        <div class="nombre"><?php echo $nombre?></div>
        <div class="puesto" style="font-size: 16px;"><?php echo $puesto ?><br><?php echo $empresa?></div>
        
        <!--<div class="cuadros">
            <img class="icono" src="imagenes/llamar.png" alt=""><br>llamar
        </div>
        <div class="cuadros">
            <img class="icono" src="imagenes/skype.png" alt=""><br>Skype
        </div>
        <div class="cuadros">
            <img class="icono" src="imagenes/wechat.png" alt=""><br>weChat
        </div>
        <div class="cuadros">
            <img class="icono" src="imagenes/linkedin.png" alt=""><br>LinkedIn
        </div>-->
        
        <div class="seccion">   <!--style="margin-top: 77px;"-->
            <?php echo $descripcion_telefono1?><div class="variable" target="_blank" style="text-decoration-line: none;" onclick="copiar('<?php echo $telefono1?>'), mensaje()"><?php echo $telefono1?></div>
            <?php 
                if($descripcion_telefono2 && $telefono2 != "")
                {
                    echo $descripcion_telefono2?><div class="variable" onclick="copiar('<?php echo $telefono2?>')"><?php echo $telefono2?></div><?php
                }
                    else
                    {
                        ?><div class="variable" style="display: none;"></div><?php
                    }
                if($descripcion_telefono3 && $telefono3 != "")
                {
                    echo $descripcion_telefono3?><div class="variable" onclick="copiar('<?php echo $telefono3?>')"><?php echo $telefono3?></div><?php
                }
                    else
                    {
                        ?><div class="variable" style="display: none;"></div><?php
                    }
            ?>
        </div>

        <div class="seccion">Email
            <div class="variable" onclick="copiar('<?php echo $correo?>')"><?php echo $correo?></div>
        </div>

        <div class="seccion">Website
            <div class="variable"><a href="<?php echo $paginaWeb?>" target="_blank" style="text-decoration-line: none;"><?php echo $paginaWeb?></a></div>
        </div>

        <?php
        if($cuenta1 || $cuenta2 || $cuenta3 != "")
        {?>
            <div class="seccion">
                <?php 
                    if($descripcion_cuenta1 && $cuenta1 != "")
                    {
                        echo $descripcion_cuenta1?><div class="variable" onclick="copiar('<?php echo $cuenta1?>')"><?php echo $cuenta1?></div><?php
                    }
                        else
                        {
                            ?><div class="variable" style="display: none;"></div><?php
                        }
                    if($descripcion_cuenta2 && $cuenta2 != "")
                    {
                        echo $descripcion_cuenta2?><div class="variable" onclick="copiar('<?php echo $cuenta2?>')"><?php echo $cuenta2?></div><?php
                    }
                        else
                        {
                            ?><div class="variable" style="display: none;"></div><?php
                        }
                    if($descripcion_cuenta3 && $cuenta3 != "")
                    {
                        echo $descripcion_cuenta3?><div class="variable" onclick="copiar('<?php echo $cuenta3?>')"><?php echo $cuenta3?></div><?php
                    }
                        else
                        {
                            ?><div class="variable" style="display: none;"></div><?php
                        }
                ?>
            </div>
        <?php}
        else
        {
            ?><div class="seccion" style="display: none;"></div><?php
        }?>

        <div class="seccion">Address
            <div class="variable" onclick="copiar('<?php echo $direccion.' '.$direccion2?>')"><?php echo $direccion?><br><?php echo $direccion2?></div>
        </div>

        <div class="seccion" style="background-color: #007aff;">
            <div class="variable" style="background-color: #007aff; color: #fff; text-align: center;">Download Contact</div>
        </div>
    </div>

    <span class="mensaje">Copied to clipboard</span>

</body>
</html>