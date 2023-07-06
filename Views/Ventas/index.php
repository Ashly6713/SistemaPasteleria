<?php include "Views/Templates/header.php";
date_default_timezone_set('America/La_Paz'); ?>
<ol class="breadcrumb mb-4">
     <h1><li class="breadcrumb-item active"> <?php if($_SESSION['rol'] ==3) { ?> Pedido<?php } else{ ?>Nueva Venta<?php } ?></li></h1>
     <div class="col-md-2" style="position: absolute; top: 20px; right: 0;"> 
        <label for="fecha"><i class="fas fa-calendar-alt" ></i> Fecha: <?php echo date('d-m-Y');?></label>
     </div>
</ol>

<script>
    window.onload = function() {
      document.title = "Ventas";
    };
</script>
<!-- CLIENTE -->
<script>
 var selectedValue = localStorage.getItem("selectedValue");
 
 if(selectedValue > 0){
    document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("categoria").value = selectedValue;
    var selectElement = document.getElementById("categoria");
    document.getElementById("categoria").removeAttribute('disabled');
    var changeEvent = new Event("change");
    selectElement.dispatchEvent(changeEvent);
    });
 }else {
    document.addEventListener("DOMContentLoaded", function() {
      document.getElementById("categoria").value = '0';
    });
 } 
 /*
 */
</script>


<div id="nuevo_cliente" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary opacity-50">
                <h5 class="modal-title text-white" id="title">Nuevo Cliente</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="frmClientes">
                <div class="form-group">
                        <label for="ci">C. I.</label>
                        <input id="ci" class="form-control" type="text" name="ci" placeholder="Cedula de Identidad">
                        <input type="hidden" id="id" name = "id">
                    </div>
                    <div class="form-group">
                        <input id="nombre" class="form-control" type="hidden"name="nombre" value ="<?php echo $_SESSION['nombres'];?>" placeholder="Nombres">
                    </div>
                    <div class="form-group">
                        <input id="apellido" class="form-control" type="hidden" name="apellido" value ="<?php echo $_SESSION['apellido'];?>" placeholder="Apellidos">
                    </div>
                    <div class="form-group">
                        <label for="telefono">Telefono</label>
                        <input id="telefono" class="form-control" type="text" name="telefono" placeholder="Telefono o Celular">
                    </div>
                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <input id="direccion" class="form-control" type="text" name="direccion" placeholder="direccion o Celular">
                    </div>
                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <select id="estado" class="form-control" name="estado">
                            <option value="<?php echo 1;?>">Activo</option>
                        </select>
                    </div>
                    <div class="alert alert-danger text-center d-none" id="alertaCi" role="alert">El campo C. I. sólo admite numeros</div>
                    <div class="alert alert-danger text-center d-none" id="alertaL" role="alert">Los campos de Nombres y Apellidos sólo pueden tener letras</div>
                    <div class="alert alert-danger text-center d-none" id="alertaN" role="alert">El Telefono o celular sólo admite numero con 8 dígitos </div>
                   <button class="btn btn-primary" type="button" onclick="registrarCliente(event);" id="btnAccion">Registrar</button>
                   <button class="btn btn-danger"  data-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>



<form id="frmVenta">     
<?php if($_SESSION['rol'] !=3) { ?>
    <div class="card bg-white bg-opacity-10">
        <div class="card-header bg-secondary bg-opacity-25">
            <h6>Datos del Cliente </h6>
        </div>
        <div class="card-body">
                <div class="row">
                    <div class="col-md-2"> 
                        <div class="form-group">
                            <label for="ciV" class="font-weight-bold"><i class="fas fa-users"></i> Buscar Cliente</label>
                            <input id="ciV" class="form-control" type="text" name="ciV" placeholder="Cédula de Identidad" onkeyup="buscarCi(event);" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>  
                            <input type="hidden" id="id_cli" name="id_cli">
                        </div>
                    </div>
                    <div class="col-md-3"> 
                        <div class="form-group">
                            <label for="nombreV" class="font-weight-bold"><i class="fas fa-user"></i> Nombres</label>
                            <input id="nombreV" class="form-control" type="text" name="nombreV" placeholder="Nombres" disabled>  
                        </div>
                    </div>
                    <div class="col-md-3"> 
                        <div class="form-group">
                            <label for="apellidoV" class="font-weight-bold"><i class="far fa-user"></i> Apellidos</label>
                            <input id="apellidoV" class="form-control" type="text" name="apellidoV" placeholder="ApellidosV" disabled>  
                        </div>
                    </div>
                    <div class="col-md-2"> 
                        <div class="form-group">
                            <label for="telefonoV" class="font-weight-bold"><i class="fas fa-phone"></i> Teléfono</label>
                            <input id="telefonoV" class="form-control" type="text" name="telefono" placeholder="Telefono" disabled>  
                        </div>
                    </div>
                    <div class="col-md-2"> 
                        <div class="form-group">
                            <label for="direccionV" class="font-weight-bold"><i class="fas fa-phone"></i> Direccion</label>
                            <input id="direccionV" class="form-control" type="text" name="direccionV" placeholder="direccion" disabled>  
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <?php } else {?> 
        <div class="card bg-white bg-opacity-10">
        <div class="card-header bg-secondary bg-opacity-25">
            <h6>Datos del Cliente </h6>
        </div>
        <div class="card-body">
                <div class="row">
                    <div class="col-md-2"> 
                        <div class="form-group">
                            <label for="ciV" class="font-weight-bold"><i class="fas fa-users"></i> C. I. <?php echo $_SESSION['id_cli']?></label>
                            <input id="ciV" class="form-control" type="text" name="ciV" value="<?php echo $_SESSION['ci'];?>" placeholder="Cédula de Identidad" onkeyup="saltar(event,'categoria')"  onkeypress='return event.charCode >= 48 && event.charCode <= 57'>  
                            <input type="hidden" id="id_cli" name="id_cli" value ="<?php echo $_SESSION['id_cli']?>">
                        </div>
                    </div>
                    <div class="col-md-3"> 
                        <div class="form-group">
                            <label for="nombre" class="font-weight-bold"><i class="fas fa-user"></i> Nombres</label>
                            <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombres" value ="<?php echo $_SESSION['nombres'];?>" disabled>  
                        </div>
                    </div>
                    <div class="col-md-3"> 
                        <div class="form-group">
                            <label for="apellido" class="font-weight-bold"><i class="far fa-user"></i> Apellidos</label>
                            <input id="apellido" class="form-control" type="text" name="apellido" placeholder="Apellidos" value ="<?php echo $_SESSION['apellido'];?>" disabled>  
                        </div>
                    </div>
                    <div class="col-md-2"> 
                        <div class="form-group">
                            <label for="telefono" class="font-weight-bold"><i class="fas fa-phone"></i> Teléfono</label>
                            <input id="telefono" class="form-control" type="text" name="telefono" placeholder="Telefono" value ="<?php echo $_SESSION['telefono'];?>" disabled>  
                        </div>
                    </div>
                    <div class="col-md-2"> 
                        <div class="form-group">
                            <label for="direccion" class="font-weight-bold"><i class="fas fa-phone"></i> Dirección</label>
                            <input id="direccion" class="form-control" type="text" name="direccion" placeholder="direccion" value ="<?php echo $_SESSION['direccion'];?>" disabled>  
                        </div>
                    </div>
                    <div class="col-md-1"> 
                        <div style="display: table; height: 100%; width: 100%;">
                            <div style="display: table-cell; vertical-align: middle; ">
                            <?php if($_SESSION['ci'] == '') {?> 
                                <button id="nuevo" name="nuevo" class="btn btn-success mt-2 btn-block" type="button" onclick="frmCliente();"> <i class="fas fa-plus"></i> </button>
                                <?php } else {?> 
                                    <button id="editar" name="editar" class="btn btn-primary mt-2 btn-block" type="button" onclick="btnEditarCliente(<?php echo $_SESSION['id_cli']?>)"> <i class="fas fa-edit"></i> </button>
                               <?php } ?> 
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div> 
    <?php } ?> 


    <p></p><!-- PRODUCTOS -->
    <div class="card bg-white bg-opacity-10">
    <div class="card-header bg-secondary bg-opacity-25">
            <h6>Datos del Producto </h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="categoria"><i class="fas fa-layer-group"></i> Categoria</label>
                        <select id="categoria" class="form-control" name="categoria" onchange="cargarProd()"  onkeyup="saltar(event,'producto')" disabled required>
                        <option value="0">Seleccione categoria</option>
                        <?php foreach ($data['categorias'] as $row){ ?>
                            <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
                           <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="producto"><i class="fas fa-cake"></i> Producto</label>
                        <input type="hidden" id="id_pro" name="id_pro">
                        <select id="producto" class="form-control" name="producto" onchange="buscarProducto(event)" onkeyup="saltar(event,'cantidad')"  disabled required>
                            <option value="">Please select</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="descripcion"><i class="fas fa-calendar-plus"></i> Descripcion</label>
                        <input id="descripcion" class="form-control" type="text" name="descripcion" placeholder="Datos adicionales" disabled required>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="precio_unidad"><i class="fas fa-coins"></i> Precio por unidad</label>
                        <input id="precio_unidad" class="form-control" type="text" name="precio_unidad" placeholder="Bs." disabled>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="stock"><i class="fas fa-calendar-check"></i> Stock</label>
                        <input id="stock" class="form-control" type="text" name="stock" placeholder="Cantidad disponible" disabled>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="cantidad"><i class="fas fa-clock"></i> Cantidad</label>
                            <input id="cantidad" class="form-control" type="number" name="cantidad" placeholder="Cantidad" onkeyup="calcularPrecTotal(event);" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required disabled>
                        </div> 
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="precio_total"><i class="fas fa-dollar-sign"></i> Precio Total</label>
                            <input id="precio_total" class="form-control" type="text" name="precio_total" placeholder="precio_total de minutos" disabled>
                        </div> 
                    </div>
                </div>
                <div class="col-md-2"> 
                    <div style="display: table; height: 100%; width: 100%;">
                        <div style="display: table-cell; vertical-align: middle; ">
                             <button id="add" name="add" class="btn btn-success mt-2 btn-block" type="button" onclick="ingresar()" disabled> <i class="fas fa-plus"></i> </button>
                        </div>
                    </div>
                </div>
            </div>   
        </div>
    </div>
</form>


<p></p><!--tabla -->
<table class="table table-light table-bordered table-hover" style="width:100%">
    <thead class="table table-primary">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Precio</th>
            <th>Categoria</th>
            <th>Cantidad</th>
            <th>Precio Total</th>
            <th></th>
        </tr>
    </thead>
    <tbody id="tblDetalle">
    </tbody>
</table>

<div class="row justify-content-end ">
    <div class="col-md-2 ml-auto"> 
        <div class="form-group">
                <label for="total" class="font-weight-bold">Total</label>
                <input id="total" class="form-control" type="text" name="total" placeholder="Sub total" required>     
        </div>
    </div>
    <div class="col-md-2 ml-10"> 
        <button class="btn btn-primary mt-2 btn-block" type="button" onclick="generarVenta()">Registrar</button>
    </div>
</div>
<?php  include "Views/Templates/footer.php"; ?>

