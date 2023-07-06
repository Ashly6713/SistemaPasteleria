<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Iniciar Sesión</title>
        <link href="<?php echo base_url; ?>Assets/css/styles.css" rel="stylesheet" />
        <script src="<?php echo base_url; ?>Assets/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary bg-opacity-50">
<div id="registro_cliente" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary opacity-50">
                <h5 class="modal-title text-white" id="title">Nuevo Usuario</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="frmUsuarios">
                    <div class="form-group">
                        <label for="usuario">Usuario</label>
                        <input type="hidden" id="id" name = "id">
                        <input id="usuario" class="form-control" type="text" name="usuario" placeholder="Usuario">
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombres</label>
                        <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombres">
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellidos</label>
                        <input id="apellido" class="form-control" type="text" name="apellido" placeholder="Apellido">
                    </div>
                    <div class="form-group">
                        <label for="correo">Correo</label>
                        <input id="correo" class="form-control" type="email" name="correo" placeholder="Correo">
                    </div>
                   <div class="row" id="claves">
                    <div class="col-md-6">
                       <div class="form-group">
                        <label for="clave">Contraseña</label>
                        <input id="clave" class="form-control" type="password" name="clave" placeholder="Contrasena" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required title="La contraseña debe tener al menos 8 caracteres, una letra mayúscula, una letra minúscula y un número.">
                       </div>
                    </div>
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="confirmar">Confirmar contraseña</label>
                          <input id="confirmar" class="form-control" type="password" name="confirmar" placeholder="Confirmar Contraseña">
                       </div>
                    </div>
                   </div>
                    
                    <div class="form-group">
                        <label for="rol">Rol</label>
                        <select id="rol" class="form-control" name="rol">
                            <option value="<?php echo 3;?>">Cliente </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <select id="estado" class="form-control" name="estado">
                            <option value="<?php echo 1;?>">Activo</option>
                        </select>
                    </div>
                    <div class="alert alert-danger text-center d-none" id="alertaU" role="alert">El campo Usuario no puede tener caracteres especiales (?@#$% ...) ni espacios</div>
                    <div class="alert alert-danger text-center d-none" id="alertaL" role="alert">Los campos de Nombres y Apellidos sólo pueden tener letras</div>
                    <div class="alert alert-danger text-center d-none" id="alertaC" role="alert">Ingrese un correo valido Ej: alguien@algunlugar.com </div>
                   <button class="btn btn-primary" type="button" onclick="registrarUserCli(event);" id="btnAccion">Registrar</button>
                   <button class="btn btn-danger"  data-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>

     <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
            <section class="d-flex flex-column min-vh-100 justify-content-center aling-items-center">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-10 mx-auto rounded shadow bg-white">
                               <div class="row">
                                  <div class="col-md-6">
                                     <div class="m-5 text-center">
                                      <h1>Bienbenido!</h1>
                                      </div>
                                
                                    <div class="card-body">
                                        <form class="m-5" id="frmLogin">
                                            <div class="form-floating mb-3">
                                                <input class="form-control py-4.5" id="usuarioL" name="usuarioL" type="text" placeholder="Ingrese usuario" />
                                                <label class="small mb-1"  for="usuario"><i class="fas fa-user"></i>  Usuario</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                 <input class="form-control py-4.5" id="claveL" name="claveL" type="password"  placeholder="Ingrese Contraseña" />
                                                <label class="small mb-1" for="clave"><i class="fas fa-key"></i>  Contraseña</label>
                                                </div>
                                            <div class="alert alert-danger text-center d-none" id="alerta" role="alert"></div>
                                            <div claa="form-group d-flex align-items-center justify-content-between mt-4 " >
                                                <button class="form-control btn btn-primary mt-3" id="login" name="login" type="submit" onclick="frmLogin(event);">Log In</button>
                                            </div>
                                            <button class="btn btn-outline-primary btn-lg mb-2" type="button" onclick="frmNuevoCliente();"><i class="fas fa-plus"></i> Registrarse</button>
                                        </form> 
                                            
                                    </div>
                                </div>
                                    <div class="col-md-6">
                                         <div >
                                              <img src="Swampy.webp" alt="login" class="img-fluid p-5">
                                         </div>
                                    </div>
                             </div>
                          </div>
                        </div>
                    </div>
             </section>



            </div>
            
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted"> <a href="https://es-la.facebook.com/Saunaminerva/" target="_blank" rel="noopener nooferrer"><i class="fa-brands fa-facebook" aria-hidden="true"></i>Página de Faceboock </a><?php echo date("Y"); ?></div>
            
                        </div>
                    </div>
                </footer>
            </div>
        </div>


        <script src="<?php echo base_url; ?>Assets/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url; ?>Assets/js/scripts.js"></script>
        <script src="<?php echo base_url; ?>Assets/js/jquery-3.6.4.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>'
        <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.0/dist/chart.umd.min.js"></script>'
        <script>
            const base_url = "<?php echo base_url; ?>";
        </script>
        <script src="<?php echo base_url; ?>Assets/js/sweetalert2.all.min.js"></script>
        <script src="<?php echo base_url; ?>Assets/js/funciones.js"></script>
    </body>




</html>
