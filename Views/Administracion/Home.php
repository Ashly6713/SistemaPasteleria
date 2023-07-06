<?php include "Views/Templates/header1.php";?> 
    <script>
        localStorage.removeItem("selectedValue");
        localStorage.removeItem("selectedValue2");
        function abrirNuevaVentana(id, id2) {
        var selectValue = id;
        var selectValue2 = id2;
        localStorage.setItem("selectedValue", selectValue);
        localStorage.setItem("selectedValue2", selectValue2);
        window.location.href = "<?php echo base_url; ?>Ventas";
        }
    </script>
                        <ol class="breadcrumb mb-4">
                            <h1><li class="breadcrumb-item active">Panel Principal</li></h1>
                            <?php $esDomingo = (0 == 0);/*$esDomingo = (date('w') == 0);*/ if ($esDomingo) {?>
                            <div class="col-md-2" style="position: absolute; top: 20px; right: 0;"> 
                            <button class="btn btn-outline-danger btn-block" type="button"  onclick="funSor();"><i class="fas fa-ticket" ></i> Es domingo, desea Sortear?</button>
                            </div> <?php } ?>
                        </ol>
                        <?php if($_SESSION['rol'] !=3) {?>

                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body"><h4>Clientes: <?php echo count($data['clientes'])?>  <i class="fas fa-user-plus" style="float: right;"></i><h4> </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white" href="<?php echo base_url; ?>Clientes">Ver Clientes</a>
                                    </div>
                                </div>
                            </div><?php if($_SESSION['rol'] == 1) {?>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body"><h4>Usuarios: <?php echo count($data['usuarios'])?>  <i class="fas fa-users" style="float: right;"></i><h4> </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white" href="<?php echo base_url; ?>Usuarios">Ver Usuarios</a>
                                    </div>
                                </div>
                            </div><?php }?>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body"><h4>Ventas: <?php echo count($data['ventas'])?>  <i class="fas fa-ticket" style="float: right;"></i><h4> </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white" href="<?php echo base_url; ?>Ventas">Ver Ventas</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-secondary text-white mb-4">
                                    <div class="card-body"><h4>Productos: <?php echo count($data['productos'])?>  <i class="fas fa-bath" style="float: right;"></i><h4> </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between"> 
                                    <?php if($_SESSION['rol'] == 1) {?>
                                        <a class="small text-white" href="<?php echo base_url; ?>Productos">Ver productos</a> <?php } else{?>
                                            <span class="label">--------</span> <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div> <?php }?>

                        <!--CARDS-->
    <div class="card bg-white bg-opacity-25">
            <div class="card-header" style="max-height: 3rem;">
                <div class="row">
                    <div class="col-xl-3">
                        <h4>Estado de los Productos</h4>
                    </div>
                    <div class="col-xl-1">
                        <button onclick="togglePopup()" class="fas fa-angle-right text-primary"></button>
                    </div>
                    <div id="popup" style="display: none;" class="col-xl-4">
                        <span><i class="fas fa-crop-alt text-success"></i> Disponible</span>
                        <span><i class="fas fa-crop-alt text-danger"></i> No Disponible</span>
                        <span><i class="fas fa-crop-alt text-secondary"></i> Inactivo</span>
                    </div>    
                </div>
            </div>  
            <div class="card-body" > 
            <div class="row">
            <?php
              for($i=0;$i< count($data['productos']); $i++){
                $row[$i]= $data['productos'][$i];
            ?>
            <div class="col-xl-2">
                    <?php if($row[$i]['estado'] == 0){  ?>
                            <div class="card bg-secondary bg-opacity-25 mb-3" align="center" style="max-width: 16rem;">
                    <?php  } else if($row[$i]['disponibilidad'] == 1 && $row[$i]['estado'] == 1 ){  ?>
                            <div class="card bg-success bg-opacity-25 mb-3" align="center" style="max-width: 16rem;">
                    <?php  } else if($row[$i]['disponibilidad'] == 0 && $row[$i]['estado'] == 1 ){  ?>
                            <div class="card bg-danger bg-opacity-25 mb-3" align="center" style="max-width: 16rem;">
                                <?php  } ?> 
                            <div class="card-header" style="max-height: 2rem;">
                                <h5><p class="room_number" > <i class="fas fa-cake"></i><?php echo $row[$i]['nombre_c'];?></p>
                                </h5>
                            </div>
                            <div class="card-body" style="max-height: 5rem;">
                                <div class="row">
                                    <label class="categoria"><?php echo $row[$i]['nombre'];?></label>
                                </div>
                                <div class="row">
                                    <label class="categoria"><?php echo $row[$i]['precio'];?></label>
                                </div>
                            </div>
                            <?php  if($row[$i]['disponibilidad'] == 1 && $row[$i]['estado'] == 1 ){  ?>
                                        <button class="btn btn-light btn-block" type="button"  onclick="abrirNuevaVentana(<?php echo $row[$i]['categoria_id'];?>,<?php echo $row[$i]['id'];?>)">Añadir al carrito</button>
                                    <?php } ?> 
                     </div>
             </div>
                <?php  }  ?> 
                </div>
            </div>
    </div>
                        <img src="../logo3.png" width="150" height="200"  align="right">
<?php include "Views/Templates/footer.php";?>