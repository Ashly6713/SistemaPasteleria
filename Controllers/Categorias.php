<?php
class Categorias extends Controller{
   public function __construct(){
      session_start();
        parent::__construct();
  } 
public function index()
{
   $this->views->getView($this, "index");
}
public function listar()
{
   $data = $this->model->getCategorias();
   for($i=0;$i< count($data); $i++){
      if($data[$i]['estado']==1) {
         $data[$i]['estado'] = '<span class="badge badge-success">Activo</span>';
         $data[$i]['acciones'] = '<div>
            <button class="btn btn-primary" type="button" onclick="btnEditarCategoria('.$data[$i]['id'].');"><i class="fas fa-edit"></i></button>
            <button class="btn btn-danger" type="button" onclick="btnEliminarCategoria('.$data[$i]['id'].');"><i class="fas fa-trash-alt"></i></button>
            <button class="btn btn-secondary" type="button" onclick="btnDeshabilitarCategoria('.$data[$i]['id'].');"><i class="fas fa-circle"></i></button>
             </div>';
      }else{
         $data[$i]['estado'] = '<span class="badge badge-secondary">Inactivo</span>';
         $data[$i]['acciones'] = '<div>
            <button class="btn btn-danger" type="button" onclick="btnEliminarCategoria('.$data[$i]['id'].');"><i class="fas fa-trash-alt"></i></button>
            <button class="btn btn-success" type="button" onclick="btnReingresarCategoria('.$data[$i]['id'].');"><i class="fas fa-circle"></i></button>
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
   $estado = $_POST['estado'];
   $id = $_POST['id'];
   if(empty($nombre)|| empty($descripcion) ){
      $msg = "Todos los campos son obligatorios";
   }else{
      if(!preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]*$/", $nombre) || !preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]*$/",$descripcion)){
         $msg = "letras";
      }else{
         if($id == "")
         {  
            $data = $this->model->registrarCategoria( $nombre, $descripcion, $estado );
            if($data == "ok"){
               $msg = "si";
      
            }else if($data=="existe"){
               $msg = "La categoria ya existe";
            } else{
               $msg = "Error al registrar la categoria";
            }
           
         }else{
            $data = $this->model->modificarCategoria( $nombre, $descripcion, $estado, $id );
            if($data == "modificado"){
               $msg = "modificado";
      
            } else{
               $msg = "Error al modificar la categoria";
            }
         }
      }
      
      
   }
   echo json_encode($msg, JSON_UNESCAPED_UNICODE);
   die();
}

public function editar(int $id){
   $data = $this->model->editarCategoria($id);
   echo json_encode($data, JSON_UNESCAPED_UNICODE);
   die();
}
public function eliminar(int $id){
   $data = $this->model->eliminarCategoria($id);
   if($data == 1){
      $msg = "ok";

   } else{
      $msg = "Error al eliminar la categoria";
   }
   echo json_encode($msg, JSON_UNESCAPED_UNICODE);
   die();
}
public function deshabilitar(int $id){
   $data = $this->model->accionCategoria(0, $id);
   if($data == 1){
      $msg = "ok";

   } else{
      $msg = "Error al reingresar la categoria";
   }
   echo json_encode($msg, JSON_UNESCAPED_UNICODE);
   die();
}
public function reingresar(int $id){
   $data = $this->model->accionCategoria(1, $id);
   if($data == 1){
      $msg = "ok";

   } else{
      $msg = "Error al reingresar la categoria";
   }
   echo json_encode($msg, JSON_UNESCAPED_UNICODE);
   die();
}
public function salir(){
   session_destroy();
   header("location:".base_url) ;
}


}




?>

