<?php include "Views/Templates/header.php";?>
<ol class="breadcrumb mb-4">
     <h1><li class="breadcrumb-item active">Productos</li></h1>
</ol>

<button class="btn btn-outline-primary btn-lg mb-2" type="button" onclick="frmProducto();"><i class="fas fa-plus"></i> Nuevo</button>
<script>localStorage.removeItem("selectedValue");</script>
<script>
    window.onload = function() {
      document.title = "Productos";
    };
</script>
<style>
    .badge-primary {
   color: #ebeef0;
   background-color: #B23CFD;
}

.badge-secondary{
   color: #ebeef0;
   background-color: #6c757d;
}

.badge-success {
   color: #ebeef0;
   background-color: #198754;
}

.badge-danger{
   color: #ebeef0;
   background-color: #dc3545;
}

.badge-warning {
   color: #ebeef0;
   background-color: #5f3cfd;
}

.badge-info {
   color: #ebeef0;
   background-color: #fd3c46;
}
.badge-light {
   color: #ebeef0;
   background-color: #3cfdbd;
}
.badge-dark {
   color: #ebeef0;
   background-color: #064118;
}
  
    </style>
<table class="table table-sm table-hover" id="tblProductos" style="width:100%">
    <thead class="table-primary">
    <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Precio</th>
            <th>Disponibilidad</th>
            <th>Estado</th>
            <th>Categoria</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td></td>
        </tr>
    </tbody>
</table>
<div id="nuevo_producto" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary opacity-50">
                <h5 class="modal-title text-white" id="title">Nuevo Producto</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="frmProducto">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="hidden" id="id" name = "id">
                        <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre de producto">
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripcion</label>
                        <input id="descripcion" class="form-control" type="text" name="descripcion" placeholder="Descripcion">
                    </div>
                    <div class="form-group">
                        <label for="precio">Precio</label>
                        <input id="precio" class="form-control" type="text" name="precio" placeholder="Precio">
                    </div>
                    <div class="form-group">
                        <label for="disponibilidad">Disponibilidad</label>
                        <select id="disponibilidad" class="form-control" name="disponibilidad">
                            <option value="<?php echo 1;?>">Disponible</option>
                            <option value="<?php echo 0;?>">Agotado</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <select id="estado" class="form-control" name="estado">
                            <option value="<?php echo 1;?>">Activo</option>
                            <option value="<?php echo 0;?>">Inactivo</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="categoria">Categoria</label>
                        <select id="categoria" class="form-control" name="categoria">
                        <?php foreach ($data['categorias'] as $row){ ?>
                            <option value="<?php echo $row['id'];?>"><?php echo $row['nombre']; ?></option>
                           <?php } ?>
                        </select>
                    </div>
                    <div class="alert alert-danger text-center d-none" id="alertaL" role="alert">Los campos Nombre y descripcion solo aceptan letras</div>
                    <div class="alert alert-danger text-center d-none" id="alertaN" role="alert">El campo precio solo admite numeros con decimal ej.: 99.80</div>
                   <button class="btn btn-primary" type="button" onclick="registrarProducto(event);" id="btnAccion">Registrar</button>
                   <button class="btn btn-danger"  data-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php  include "Views/Templates/footer.php"; ?>

