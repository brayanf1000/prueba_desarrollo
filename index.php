<?php
include("plantilla.php");
?>
<style type="text/css">

    .col-md-2 {
                flex: 0 0 auto !important;
                width: 24.666667% !important;
              }
</style>

                <section style="padding: 3rem;border: 0px solid #ccc;/* IMPORTANTE */  text-align: center;border-radius: 5px;width: 100%;">
                   
                    <div class="row match-height">
                        <div class="col-12">
                            <div>
                                <div class="card-header" style="background-color: #220e0e00 !important;">
                                    <h4 class="card-title" style="color:#FFFF;">Tienda online.com</h4>
                                    
                                </div>
                                
                            <div class="card-body">
                                    
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home"
                                                role="tab" aria-controls="home" aria-selected="false">Registrar productos</a>
                                        </li>
                                        
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="consulta_usuarios-tab" data-bs-toggle="tab" href="#consulta_usuarios"
                                                role="tab" aria-controls="consulta_usuarios" aria-selected="false" onclick="listar_registros_productos()">Resumen carrito</a>
                                        </li>
                                        
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                      
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                            </br></br></br>



                        <div class="card-body">
                            <form method="POST" id='formulario_productos' enctype="multipart/form-data">  
                            <div class="row">
                                
                            
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="basicInput" style="color:#FFFF;">Código producto</label>
                                            <input type="text" class="form-control" name="codigo" id="codigo">
                                        </div>
                                    </div>
                                
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="basicInput" style="color:#FFFF;">Nombre producto</label>
                                            <input type="text" class="form-control" name="nombre_producto" id="nombre_producto">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="basicInput" style="color:#FFFF;">Precio</label>
                                            <input type="text" class="form-control" name="precio" id="precio">
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="basicInput" style="color:#FFFF;">Cantidad</label>
                                            <input type="text" class="form-control" name="cantidad" id="cantidad">
                                        </div>
                                    </div>

                                    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="basicInput" style="color:#FFFF;">Categoria</label>
                                                <select name="id_categoria" id="id_categoria" class="form-select">
                                                <option value="">Por favor seleccione</option>
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
                                        </div>
                                    </div>


                        </div>
                        </div>
                         <div style="text-align: left;padding: 1rem;">
                            <button type="button" class="btn btn-primary me-1 mb-1" onclick='registrar_producto()'>Registrar producto</button>
                         </div>         
                                </form>
                        </div>
                        
                        <div class="tab-pane fade" id="consulta_usuarios" role="tabpanel" aria-labelledby="consulta_usuarios-tab">
                            
                           <div id="listar_registro_productos"></div>
                        </div> 

                        </div>
                    </div>                        
                </section>


                                     <!--Basic Modal -->
                                     <div class="modal fade text-left" id="modal_edicion_datos" tabindex="-1" role="dialog"
                                                aria-labelledby="myModalLabel17" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg"
                                                    role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel1">Editar información</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <div id="actualizar_informacion_datos">
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
