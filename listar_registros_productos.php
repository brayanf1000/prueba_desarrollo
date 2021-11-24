<?php
	  
	  
    include("conexion/conexion.php");
    
    $consulta_usuarios = "SELECT * FROM productos";
	$resultado = $conn->query($consulta_usuarios);         

    $wpurl2 = 'assets/vendors/bootstrap-icons/bootstrap-icons.svg#justify';   
                       

?>

                <table id="listado_registros_activos_productos" class="display" style="width:100%;font-size: 11px;">
                          <thead>  
                               <tr style="background: #FF0066;color: #FFFF;">  
                                    <td style="text-align: center;">Categoria</td>  
                                    <td style="text-align: center;">Código</td>
                                    <td style="text-align: center;">Nombre producto</td>
                                    <td style="text-align: center;">Precio</td>
                                    <td style="text-align: center;">Cantidad</td>
                                    <td style="text-align: center;">Editar</td>
                                    <td style="text-align: center;">Eliminar</td>
                               </tr>  
                          </thead>  
                          <?php  
                          while ($activos = mysqli_fetch_array($resultado)) 
                          {  
                             
                              $id_categoria= $activos["id_categoria"];
                              $result = mysqli_query($conn, "SELECT * FROM categoria WHERE id_categoria = '$id_categoria'");
                              $filas = mysqli_fetch_array($result);


                               echo '  
                               <tr>  
                                    <td style="text-align: center;">'.$filas["categoria"].'</td>  
                                    <td style="text-align: center;">'.$activos["codigo"].'</td>  
                                    <td style="text-align: center;">'.$activos["nombre_producto"].'</td>  
                                    <td style="text-align: center;">'.$activos["precio"].'</td>  
                                    <td style="text-align: center;">'.$activos["cantidad"].'</td>  
                                    <td style="text-align: center;" onclick="listar_generico_productos(\''.$activos["id_producto"].'\')">
                                     <button class="btn btn-primary primary-icon-notika btn-reco-mg btn-button-mg" type="button" class="btn btn-outline-primary block" data-bs-toggle="modal"
                                        data-bs-target="#modal_edicion_datos"><svg class="bi" width="1em" height="1em" fill="currentColor">
                                                <use
                                                    xlink:href="'.$wpurl2.'" />
                                            </svg></button>       
                                    </td>

                                    <td style="text-align: center;">
                                         <button class="btn btn-primary primary-icon-notika btn-reco-mg btn-button-mg" type="button" class="btn btn-outline-primary block" onclick="eliminar(\''.$activos["id_producto"].'\')"><svg class="bi" width="1em" height="1em" fill="currentColor">
                                                    <use
                                                        xlink:href="'.$wpurl.'" />
                                                </svg></button>       
                                   </td>
    
                                </tr>    ';       

                          }
                          
                          ?>  
                     </table>