<?php
class ProductosModel extends Query{
    private $nombre, $descripcion, $precio, $disponibilidad,$estado, $id_categoria , $id;
public function __construct(){
    parent::__construct();
}
public function getCategorias()
{
    $sql = "SELECT * FROM categoria WHERE estado = 1";
    $data = $this->selectAll($sql);
    return $data;
}
public function getProductos()
{
    $sql = "SELECT p.*, cc.id as categoria_id, cc.nombre as nombre_c FROM producto p INNER JOIN categoria cc WHERE p.categoria_id = cc.id";
    $data = $this->selectAll($sql);
    return $data;
}
public function registrarProductos(string $nombre, string $descripcion, string $precio, int $disponibilidad, int $estado, int $id_categoria )
{
    $this->nombre = $nombre;
    $this->descripcion = $descripcion;
    $this->precio = $precio;
    $this->disponibilidad = $disponibilidad;
    $this->estado = $estado;
    $this->id_categoria = $id_categoria;
    $verificar = "SELECT * FROM producto WHERE nombre = '$this->nombre'";
    $existe = $this->select($verificar);
    if(empty($existe)){

        $sql = "INSERT INTO producto(nombre, descripcion, precio, disponibilidad, estado, categoria_id) VALUES (?,?,?,?,?,?)";
        $datos = array($this->nombre,  $this->descripcion, $this->precio, $this->disponibilidad,  $this->estado, $this->id_categoria);
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


public function modificarProducto(string $nombre, string $descripcion, string $precio, int $disponibilidad, int $estado, int $id_categoria, int $id )
{
    $this->nombre = $nombre;
    $this->descripcion = $descripcion;
    $this->precio = $precio;
    $this->disponibilidad = $disponibilidad;
    $this->estado = $estado;
    $this->id_categoria = $id_categoria;
    $this->id = $id;
    $sql = "UPDATE producto SET nombre = ?, descripcion = ?, precio = ?, disponibilidad = ?, estado = ?, categoria_id = ?  WHERE id = ?";
    $datos = array($this->nombre,  $this->descripcion, $this->precio, $this->disponibilidad, $this->estado, $this->id_categoria,   $this->id);
    $data = $this->save($sql, $datos);
    if($data == 1){
      $res = 'modificado';
    }else {
        $res = 'error';
    }
    return $res;
}

public function editarProducto(int $id){
    $sql = "SELECT * FROM producto WHERE id = $id";
    $data = $this->select($sql);
    return $data;
}
public function accionProducto( int $estado,int $id){
    $this->id = $id;
    $this->estado = $estado;
    $sql = "UPDATE producto SET estado = ? WHERE id = ?";
    $datos = array($this->estado, $this->id);
    $data = $this->save($sql, $datos);
    return $data;
}
public function eliminarProducto(int $id){
    $this->id = $id;
    $sql = "DELETE FROM producto WHERE id = ?";
    $datos = array( $this->id);
    $data = $this->save($sql, $datos);
    return $data;
}


}


?>