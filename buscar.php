<?php
    
   
    include("conexion/conexion.php");
    
    $id_producto=($_POST["id_producto"]);
    $result = mysqli_query($conn, "SELECT * FROM productos WHERE id_producto = '$id_producto'");
    $filas = mysqli_fetch_array($result);

    $id_categoria = $filas['id_categoria'];
    $result2 = mysqli_query($conn, "SELECT * FROM categoria WHERE id_categoria = '$id_categoria'");
    $filas2 = mysqli_fetch_array($result2);
?>  
    <form method="POST" id='editar_formulario_productos' enctype="multipart/form-data">
      <table  class="table table-hover">
        <input type="hidden" name="id_producto" value="<?php echo $id_producto ?>">
          <tr>
            <td>Código producto: </td>
            <td>
              <input class="form-control" type="text" value="<?php echo $filas['codigo'] ?>" name="codigo" id="codigo">
            </td>
            <td>Nombre producto: </td>
            <td>
              <input class="form-control" type="text" value="<?php echo $filas['nombre_producto'] ?>" name="nombre_producto" id="nombre_producto">
            </td>
          </tr>
          <tr>
            <td>Precio: </td>
            <td>
              <input class="form-control" type="text" value="<?php echo $filas['precio'] ?>" name="precio" id="precio">
            </td>
            <td>Cantidad: </td>
            <td>
              <input class="form-control" type="text" value="<?php echo $filas['cantidad'] ?>" name="cantidad" id="cantidad">
            </td>
          </tr> 
          <tr> 
            <td>Categoria:</td>
            <td>
                <select id="id_categoria" name="id_categoria" class="form-control">
                   <option value="<?php echo $filas2["id_categoria"] ?>"><?php echo $filas2["categoria"] ?></option>
                   <?php
                    $query ="SELECT * FROM categoria";
                    $results = $conn->query($query);
                   ?>
                   <?php
                      while($rs=$results->fetch_assoc()) {
                   ?>
                      <option value="<?php echo $rs["id_categoria"]; ?>"><?php echo $rs["categoria"]; ?></option>
                   <?php
                      }
                   ?>           
                </select>
            </td> 
          </tr>

        </table>
          
                                                    
            <button type="button" onclick="modificar_productos()" class="btn btn-primary ml-1"
                                                        data-bs-dismiss="modal">
                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Guardar</span>
            </button>
        
  </form>