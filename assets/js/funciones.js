function registrar_producto()
{

        var form = document.getElementById('formulario_productos');
        var formData = new FormData(form);
        var codigo = document.getElementById('codigo').value;
        var nombre_producto = document.getElementById('nombre_producto').value;
        var precio = document.getElementById('precio').value;
        var cantidad = document.getElementById('cantidad').value;
        var id_categoria = document.getElementById('id_categoria').value;
        
        var url = "../productos/registro_productos.php";

        
        if(codigo == null || codigo.length == 0 || /^\s+$/.test(codigo))
        {

                Swal.fire({
                icon: 'error',
                title: '!Error!',
                text: 'El código del producto es obligatorio'
                });  
                return false;
        }
    
        if(nombre_producto == null || nombre_producto.length == 0 || /^\s+$/.test(nombre_producto))
        {

                Swal.fire({
                icon: 'error',
                title: '!Error!',
                text: 'El nombre del producto es obligatorio'
                });  
                return false;
        }

            
        if(precio == null || precio.length == 0 || /^\s+$/.test(precio))
        {

                Swal.fire({
                icon: 'error',
                title: '!Error!',
                text: 'El precio es obligatorio'
                });  
                return false;
        }

            
        if(cantidad == null || cantidad.length == 0 || /^\s+$/.test(cantidad))
        {

                Swal.fire({
                icon: 'error',
                title: '!Error!',
                text: 'La cantidad es obligatorio'
                });  
                return false;
        }

            
        if(id_categoria == null || id_categoria.length == 0 || /^\s+$/.test(id_categoria))
        {

                Swal.fire({
                icon: 'error',
                title: '!Error!',
                text: 'La categoria es obligatorio'
                });  
                return false;
        }

            
        $.ajax({
            type:"POST",
            url:url,
            data:formData,
            contentType:false,
            processData:false,
            success:function(respuesta)
      
            {
            
          


                    Swal.fire({
                    icon: 'success',
                    title: '¡Éxito!',
                    text: 'Se registro el producto de forma exitosa'
                    });
                    $("#formulario_productos")[0].reset();
                    
               
            
            }
          })
        
}


function listar_registros_productos ()
{

      
          var url8 = "../productos/listar_registros_productos.php";   
          var url9 = "../productos/assets/images/2021-05-20.gif";   

          $.ajax({
                type: "POST",
                url:url8,

                 beforeSend: function(objeto){
                  $("#listar_registro_productos").html('<div><img style="display:block;margin-left:auto;margin-right:auto;margin-top:40px;width:25%;" src="'+url9+'"</div>');
                  },
                    success: function(datos){
                $("#listar_registro_productos").html(datos);


               

                $(document).ready(function() {
                $('#listado_registros_activos_productos').DataTable( {
                    
                    
                    language: {
                    "sProcessing": "Procesando...",
                    "sLengthMenu": "Mostrar _MENU_ registros",
                    "sZeroRecords": "No se encontraron resultados",
                    "sEmptyTable": "Ningún dato disponible en esta tabla",
                    "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sSearch": "Buscar:",
                    "sUrl": "",
                    "sInfoThousands": ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sLast": "Ultimo",
                        "sNext": "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortA v  scending": ": Activar para ordenar la columna de manera ascendente",
                        "sSortDesce nding": ": Activar para ordenar la columna de manera descendente"
                    }
                    },
                    //pageLength: 50
                    } );
                } );


                }
              });
     
}


function listar_generico_productos(id_producto)
{
  
    var url8 = "../productos/buscar.php";

      $.ajax({

                type:"POST",
                url:url8,
                data:("id_producto="+id_producto)
                }).done(function(respuesta){
                document.getElementById("actualizar_informacion_datos").innerHTML=respuesta;
            })
}



function modificar_productos()
{
         
          var url8 = "../productos/modificar_productos.php";
          var form = document.getElementById('editar_formulario_productos');
          var formData = new FormData(form);
          
     
           $.ajax({
           type:"POST",
           url:url8,
           data:formData,
           contentType:false,
           processData:false,
           success:function(respuesta)
           {
            
             
                      
                      Swal.fire({
                      icon: 'success',
                      title: '¡ÉXITO!',
                      text: 'Se ha modificado de manera correcta'
                      });
                      $("#editar_formulario_productos")[0].reset();
                      setTimeout(listar_registros_productos,1000);
                      
                   
               
           }
        })
}


function eliminar(id_producto) 
{
          
    var url8 = "../productos/eliminar.php";

    Swal.fire({
        title: "Advertencia",
        text: "¿Está seguró de eliminar el producto?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: "Aceptar",
        cancelButtonText: "Cancelar",
    })
    .then(resultado => {
        if (resultado.value) 
        {
            
                            
                            $.ajax({
                            url: url8,
                            type: "POST",
                            data:"id_producto="+id_producto,
                            dataType: "html",
                            success: function () {
                            
                              Swal.fire({
                              icon: 'success',
                              title: '¡ÉXITO!',
                              text: 'Se elimino el producto de forma correcta'
                              });
                              setTimeout(listar_registros_productos,1000);  
                            }
                            });
        } else 
        {
            
                              Swal.fire({
                              icon: 'error',
                              title: 'Error!',
                              text: 'Se ha cancelado la acción de eliminar el producto'
                              }); 
        }
    });                

}
