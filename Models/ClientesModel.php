<?php
class ClientesModel extends Query{
    private  $ci, $nombre, $apellido, $telefono, $direccion, $estado, $id, $data;
public function __construct(){
    parent::__construct();
}
public function getClientes()
{
    $sql = "SELECT * FROM cliente";
    $data = $this->selectAll($sql);
    return $data;
}
public function registrarCliente(int $ci,string $nombre, string $apellido, string $telefono, string $direccion,int $estado )
{
    $this->ci = $ci;
    $this->nombre = $nombre;
    $this->apellido = $apellido;
    $this->telefono = $telefono;
    $this->direccion = $direccion;
    $this->estado = $estado;
    $verificar = "SELECT * FROM cliente WHERE ci = '$this->ci'";
    $existe = $this->select($verificar);
    if(empty($existe)){

        $sql = "INSERT INTO cliente(ci, nombre, apellido, telefono, direccion, estado) VALUES (?,?,?,?,?,?)";
        $datos = array($this->ci, $this->nombre, $this->apellido, $this->telefono, $this->direccion,$this->estado);
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


public function modificarCliente(int $ci, string $nombre, string $apellido, string $telefono, string $direccion, int $estado, int $id )
{
    $this->ci = $ci;
    $this->nombre = $nombre;
    $this->apellido = $apellido;
    $this->telefono = $telefono;
    $this->direccion = $direccion;
    $this->id = $id;
    $this->estado = $estado;
    $sql = "UPDATE cliente SET ci = ?,nombre = ?, apellido = ?, telefono = ?, direccion = ?,  estado = ? WHERE id = ?";
    $datos = array($this->ci,$this->nombre, $this->apellido, $this->telefono, $this->direccion, $this->estado, $this->id);
    $data = $this->save($sql, $datos);
    if($data == 1){
      $res = 'modificado';
    }else {
        $res = 'error';
    }
    return $res;
}

public function editarCliente(int $id){
    $sql = "SELECT * FROM cliente WHERE id = $id";
    $data = $this->select($sql);
    return $data;
}
public function accionCliente( int $estado,int $id){
    $this->id = $id;
    $this->estado = $estado;
    $sql = "UPDATE cliente SET estado = ? WHERE id = ?";
    $datos = array($this->estado, $this->id);
    $data = $this->save($sql, $datos);
    return $data;
}
public function eliminarCliente(int $id){
    $this->id = $id;
    $sql = "DELETE FROM cliente WHERE id = ?";
    $datos = array( $this->id);
    $data = $this->save($sql, $datos);
    return $data;
}


}


?>