<?php include "Views/Templates/header1.php";?> 

<!--HISTORIAL--> 

<style>
  .tooltip-container {
    position: relative;
  }

  .tooltip-container::before {
    content: attr(data-tooltip);
    position: absolute;
    top: -30px; /* Ajusta la posición vertical del mensaje flotante */
    left: 0;
    background-color: #007bff; /* Color de fondo azul */
    color: #fff;
    padding: 5px;
    border-radius: 3px;
    font-size: 14px;
    white-space: nowrap;
    opacity: 0;
    transition: opacity 0.3s;
  }

  .tooltip-container:hover::before {
    opacity: 1;
  }
</style>
<?php date_default_timezone_set('America/La_Paz'); ?>                
<form action="<?php echo base_url;?>Ventas/pdf" method="POST" target="_blank">
                <div class="row">
                    <div class="col-md-2"> 
                        <div class="form-group">
                            <label for="min"> <i class="fas fa-calendar-plus"></i> Desde</label>
                            <input id="min" name="desde" type="date" value="<?php echo date('Y-m-d');?>">  
                        </div>
                    </div>
                    <div class="col-md-2"> 
                        <div class="form-group">
                            <label for="hasta"><i class="fas fa-calendar-check"></i>  Hasta</label>
                            <input id="hasta" name="hasta" type="date" value="<?php echo date('Y-m-d');?>">  
                        </div>
                    </div>
                    <div class="col-md-2"> 
                        <div class="form-group">
                            <label for="ci"><i class="fas fa-user-plus"></i> C. I</label>
                            <input id="ci" class="form-control" name="ci" type="text" pattern="[A-Za-z0-9]{6,}" title="El carnet de identidad debe contener al menos 6 números">  
                        </div>
                    </div>
                    <div class="col-md-2"> 
                        <div class="form-group">
                            <label for="usuario"><i class="fas fa-users"></i> Usuario</label>
                            <input id="usuario" class="form-control" name="usuario" type="text"  pattern="[A-Za-z0-9]+" title="Solo se permiten letras y números" >  
                        </div>
                    </div>
                    <div class="col-md-3"> 
                        <div class="form-group">
                            <button type="submit" class="btn btn-danger">PDF</button> 
                        </div>
                    </div>
                    
                </div>
</form>
<div class="card my-2">
    <div class="card-header bg-dark text-white">
        <h5>Ventas</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-light table-bordered table-hover" id="t_historial_r" style="width:100%">    
            <thead class="table table-primary">   
                    <tr>
                        <th>#</th>
                        <th>Fecha</th>
                        <th>Total</th>
                        <th ><div class="tooltip-container" data-tooltip="Cliente">Ci </div></th> 
                        <th ><div class="tooltip-container" data-tooltip="Cliente">Nombres</div></th>
                        <th ><div class="tooltip-container" data-tooltip="Cliente">Apellidos</div></th> 
                        <th><div class="tooltip-container" data-tooltip="Usuario">Usuario</th>
                        <th><div class="tooltip-container" data-tooltip="Usuario">Nombres</th>
                        <th><div class="tooltip-container" data-tooltip="Usuario">Apellidos</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="t_historial_r">
                </tbody>
            </table>
        </div>   
    </div>
</div>
<?php include "Views/Templates/footer.php";?>