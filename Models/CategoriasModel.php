<?php
class CategoriasModel extends Query{
    private  $nombre, $descripcion, $precio_hora, $estado, $id, $data;
public function __construct(){
    parent::__construct();
}
public function getCategorias()
{
    $sql = "SELECT * FROM categoria";
    $data = $this->selectAll($sql);
    return $data;
}
public function registrarCategoria(string $nombre, string $descripcion, int $estado )
{
    $this->nombre = $nombre;
    $this->descripcion = $descripcion;
    $this->estado = $estado;
    $vericar = "SELECT * FROM categoria WHERE nombre = '$this->nombre'";
    $existe = $this->select($vericar);
    if(empty($existe)){

        $sql = "INSERT INTO categoria(nombre, descripcion, estado) VALUES (?,?,?)";
        $datos = array($this->nombre, $this->descripcion, $this->estado);
        $data = $this->save($sql, $datos);
        if($data == 1){
          $res = 'ok';
        }else {
            $res = 'error';
        }
    }else{
        $res = "existe";
    }
    return $res;
}


public function modificarCategoria(string $nombre, string $descripcion, int $estado, int $id )
{
    $this->nombre = $nombre;
    $this->descripcion = $descripcion;
    $this->id = $id;
    $this->estado = $estado;
    $sql = "UPDATE categoria SET nombre = ?, descripcion = ?, estado = ? WHERE id = ?";
    $datos = array($this->nombre, $this->descripcion, $this->estado, $this->id);
    $data = $this->save($sql, $datos);
    if($data == 1){
      $res = 'modificado';
    }else {
        $res = 'error';
    }
    return $res;
}

public function editarCategoria(int $id){
    $sql = "SELECT * FROM categoria WHERE id = $id";
    $data = $this->select($sql);
    return $data;
}
public function accionCategoria( int $estado,int $id){
    $this->id = $id;
    $this->estado = $estado;
    $sql = "UPDATE categoria SET estado = ? WHERE id = ?";
    $datos = array($this->estado, $this->id);
    $data = $this->save($sql, $datos);
    return $data;
}
public function eliminarCategoria(int $id){
    $this->id = $id;
    $sql = "DELETE FROM categoria WHERE id = ?";
    $datos = array( $this->id);
    $data = $this->save($sql, $datos);
    return $data;
}


}


?>