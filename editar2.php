<?php
include 'conexion_2.php';

if(isset($_POST["edid"])){
    if(!empty($_POST["codigo"]) and !empty($_POST["descripcion"]) and !empty($_POST["cantidad"]) and !empty($_POST["unidad"]) and !empty($_POST["precio_compra"])      
    and !empty($_POST["porcentage"])  and !empty($_POST["precio_venta"])  and !empty($_POST["margen_ganancia"])  and !empty($_POST["compra_suplidor"])  and !empty($_POST["venta_producto"]) ){
        $cdnew = $_POST['codigo'];
        $danew = $_POST['descripcion'];
        $canew = $_POST['cantidad'];
        $uanew = $_POST['unidad'];
        $pcanew = $_POST['precio_compra'];
        $panew = $_POST['porcentage'];
        $pvanew = $_POST['precio_venta'];
        $mgnew = $_POST['margen_ganancia'];
        $csnew = $_POST['compra_suplidor'];
        $vpnew = $_POST['venta_producto'];
    
        $SQLL = "UPDATE articulos_v1 SET codigo = '$cdnew', descripcion = '$danew', cantidad = '$canew', unidad = '$uanew', precio_c = '$pcanew', porcentage = '$panew', precio_v = '$pvanew', margen_g = '$mgnew', compra_p_s = '$csnew'
        ,venta_p_n = '$vpnew' WHERE id_articulo = '$id'";
        $tll = mysqli_query($conexion, $SQLL);
        $cc = $cdnew; 
        $dd = $danew;
        $cct = $canew;
        $uu = $uanew; 
        $ppc = $pcanew; 
        $pp = $panew;
        $ppv = $pvanew; 
        $mmg = $mgnew;
        $ccs = $csnew;
        $vvp = $vpnew; 
        echo' <div class="EDID" >Editado Exitosamente </div>  ';
    }

    }
      



?>