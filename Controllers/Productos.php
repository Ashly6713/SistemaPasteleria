<?php
class Productos extends Controller{
   public function __construct(){
      session_start();
        parent::__construct();
  } 
public function index()
{
    $data['categorias'] = $this->model->getCategorias();
$this->views->getView($this, "index", $data);
}
public function listar()
{
   $data = $this->model->getProductos();
    
   for($i=0;$i< count($data); $i++){
      if($data[$i]['disponibilidad']==1) {
         $data[$i]['disponibilidad'] = '<p>Disponible</p>';
      }else{
         $data[$i]['disponibilidad'] = '<p>Agotado</p';
      }
      if($data[$i]['estado']==1) {
         $data[$i]['estado'] = '<span class="badge badge-success">Activo</span>';
         $data[$i]['acciones'] = '<div>
            <button class="btn btn-primary" type="button" onclick="btnEditarProducto('.$data[$i]['id'].');"><i class="fas fa-edit"></i></button>
            <button class="btn btn-danger" type="button" onclick="btnEliminarProducto('.$data[$i]['id'].');"><i class="fas fa-trash-alt"></i></button>
            <button class="btn btn-secondary" type="button" onclick="btnDeshabilitarProducto('.$data[$i]['id'].');"><i class="fas fa-circle"></i></button>
            </div>';
      }else{
         $data[$i]['estado'] = '<span class="badge badge-secondary">Inactivo</span>';
         $data[$i]['acciones'] = '<div>
            <button class="btn btn-danger" type="button" onclick="btnEliminarProducto('.$data[$i]['id'].');"><i class="fas fa-trash-alt"></i></button>
            <button class="btn btn-success" type="button" onclick="btnReingresarProducto('.$data[$i]['id'].');"><i class="fas fa-circle"></i></button>
             </div>';
      }
   }
   echo json_encode($data, JSON_UNESCAPED_UNICODE);
   die();
}


public function registrar()
{  
   $nombre = $_POST['nombre'];
   $descripcion = $_POST['descripcion'];
   $precio = $_POST['precio'];
   $disponibilidad = $_POST['disponibilidad'];
   $estado = $_POST['estado'];
   $categoria = $_POST['categoria'];
   $id = $_POST['id'];
   if(empty($nombre)||  empty($categoria) ){
      $msg = "Todos los campos son obligatorios";
   }else{//revisar validacion
      if(!preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]*$/", $nombre) || !preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]*$/", $descripcion) ){
         $msg = "letras";
      }else if ( !preg_match("/^[0-9]+([.][0-9]+)?$/", $precio) ) {
         $msg = "numeros";
      }else{
         if($id ==""){
            $data = $this->model->registrarProductos($nombre, $descripcion,$precio,$disponibilidad,$estado, $categoria );
            if($data == "ok"){
               $msg = "si";
      
            }else if($data=="existe"){
               $msg = "El nombre ya existe";
            } else{
               $msg = "Error al registrar producto";
            }
         }else{
            $data = $this->model->modificarProducto($nombre, $descripcion,$precio, $disponibilidad,  $estado, $categoria,$id );
            if($data == "modificado"){
               $msg = "modificado";
      
            } else{
               $msg = "Error al modificar el producto";
            }
         }
      }
   }
   echo json_encode($msg, JSON_UNESCAPED_UNICODE);
   die();
}

public function editar(int $id){
   $data = $this->model->editarProducto($id);
   echo json_encode($data, JSON_UNESCAPED_UNICODE);
   die();
}
public function eliminar(int $id){
   $data = $this->model->eliminarProducto($id);
   if($data == 1){
      $msg = "ok";

   } else{
      $msg = "Error al eliminar el producto";
   }
   echo json_encode($msg, JSON_UNESCAPED_UNICODE);
   die();
}
public function deshabilitar(int $id){
   $data = $this->model->accionProducto(0, $id);
   if($data == 1){
      $msg = "ok";

   } else{
      $msg = "Error al dashabilitar el producto";
   }
   echo json_encode($msg, JSON_UNESCAPED_UNICODE);
   die();
}
public function reingresar(int $id){
   $data = $this->model->accionProducto(1, $id);
   if($data == 1){
      $msg = "ok";

   } else{
      $msg = "Error al reingresar el producto";
   }
   echo json_encode($msg, JSON_UNESCAPED_UNICODE);
   die();
}


}




?>

