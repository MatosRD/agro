<?php
session_start();
if(empty($_SESSION["id"])){
    header("location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Cotizacion</title>

</head>
<body>

<div class="container" >
<div class="nav" style="background: orange;" >
    <div class="nav_sub">

        <a href="cerrar.php"  style="z-index: 100;"><img src="salir.png" alt=""></a>
    </div>
</div>


    <div class="cabez1">
        <div class="ttd">
        <div class="imagen1">
            <img src="logo.png" alt="logo">
        </div>
        <div class="text_1">
        <h1 class="titulo" style="color:black;">--<?php echo $_SESSION["nombres"];?>--</h1> 
        
        </div>
        </div>
    </div>
    <div class="correr">
    
    <a href="vendedor.php" style="margin-left: 25px;" >Volver a Venta</a>
    </div>
<div class="linea_1">

<div class="junt">
                <img  class="muvi" src="logonew.png" alt="">
                <div class="buscar">
                <h1> Cotizacion Articulo </h1>
                    <form action="" method="post" >
                        <input type="text" name="busc" placeholder="codigo, producto" >
                        <button id = "buscar_c" >Buscar</button>
                    </form>
                   
                </div>
                
            
                <div class="tabl_1">
                <table  >
                    <thead  >
                        <tr>
                            <th style="background: orange; color:black;">Codigo</th>
                            <th  style="background: orange; color:black; " >Descripcion</th> 
                            <th style="background: orange; color:black;" >Cantidad</th>
                            <th  style="background: orange; color:black; ">Itbis</th>
                            <th  style="background: orange; color:black; ">Precio de venta</th>
                            <th  style="background: orange; color:black; ">accion</th>
                        </tr>
                    </thead>
                    <tbody>
             
        
                    <?php 
                    include 'conexion_2.php';
                    include 'punto1.php';
            if(!empty("buscar_c")){ 
            if(!empty($_POST['busc'])){ 
                $bus = $_POST['busc'];
                $sentencia = "SELECT * FROM articulos_v1 WHERE descripcion like '%$bus%' or codigo = '$bus' ";
                    $total = mysqli_query($conexion, $sentencia);
                    if(mysqli_num_rows($total) > 0) {
                        echo '<style>.linea_1 .junt .muvi{
                            display: none;
                            }
                            </style>';
                           
                        echo '<a href="vendedor.php"><button  style="display:flex; color: white; background: blue;
                        padding: 8px 15px; border:none; border-radius:10px;text-decoration: none;  margin-left: 5px; cursor: pointer; "> Limpiar pantalla</button></a>';
                        while($fila = mysqli_fetch_assoc($total)){
                            echo '<tr class="no2">';   
                           ?> <form action="" method="post" > <?php
                                $mx = $fila['codigo'];
                                echo '<td>';   ?> <input type="text"  name="mu" value="<?php  echo $mx;  ?>" style="border: none; background:#ddd; ">  <?php         echo '</td>';
                                echo '<td>'; echo $fila['descripcion']; echo '</td>';
                               ?><td> <input type="text" name="bu" value="1" style="width: 30px;" ></td>
                                <td> <label for="country">
                                <select id="country" name="country">
                                <option value="0">0.00</option>
                                <option value="54">18%</option>
                                </select></td><?php 
                                echo '<td>'; echo $fila['precio_v']; echo '</td>';
                                echo '<td>';  
                                        echo"<button id='KK' style='padding: 8px 15px; background: orange; color:black; border-radius:10px; borber:none; cursor:pointer; '>Facturar<button> "  ;  
                                echo '</td>';
                                ?> </form> <?php 
                        echo '</tr>';
                        
                         }    
                         
                    }else{
                
        
                        echo '<div class="cliente" style="margin-left: 30px;">articulo no encotrado</div>';
                    }
                }
            }
            ?>       
        
        
        
        
        
                                    
                    </tbody>
                </table>
        
            </div>
            </div> 



        <div class="pro">
        <h1>Cotizacion</h1>
    </div>
        <div class="fac1">
                <table class="um" >
                    <thead>
                        <tr>
                            <th>Descripcion</th>
                            <th>cantidad</th>
                            <th>Precio</th>
                            <th>itbis 18%</th>
                            <th>sub total</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                include 'conexion_2.php';
                $total = 0;
                
                $mostrar_q = "SELECT * FROM cotizacion_1";
                $total_q = mysqli_query($conexion, $mostrar_q);
                $numero_aleatorio = rand(100000,10000000);
                ?>
                <?php  while($fila_q = mysqli_fetch_assoc($total_q)) { ?>
                    
                    <tr class="no1">
                                               
                    <td><?php echo $fila_q['descripcion_c'] ?> </td>
                    <td><?php echo $fila_q['cantidad_c']   ?></td>
                    <td><?php echo $fila_q['precio_c'] ?>.00</td>
                    <td><?php echo $fila_q['itbis_c'] ?>.00 </td>
                    <td><?php echo $mtotal= $fila_q['sub_c'];
                    
                   
                    $total += $mtotal;
                                        ?>.00  </td>
                        <td><button id="ex" ><?php echo"<a href='eliminar_c.php?id=".$fila_q['id_cotizacion']."'>Eliminar</a>"; ?> 
                         
              </button></td> 
                    <?php } ?>
                </tr>
                    </tbody><a href="" target="_blank"></a>
                    <tfoot  style="height: 60px;" >
                        <tr>
                            <td colspan="3" style="font-size: 24px;">TOTAL</td>
                            <td style="color: yellow; font-size: 24px;" >RD</td>
                            <td style="color: yellow; font-size: 24px;" ><?php  echo $total ?>.00</td>
                          
                            <td style="background:red;" ><a href="eliminar_c_t.php" style=" text-decoration:none; color:white; " ;>limpiar todo</a></td>
                            
                        </tr>
                    </tfoot>


                    <button id="procesar" ><?php  echo' <a href="as1.php?nun='.$numero_aleatorio.'" target="_blank">Imprimir</a> ';  ?></button>
                </table>
        </div>
        </div>
        



          

    </div>
    
    
    
    
    
    </div>





    

   
    
  </body>
</body>
</html>