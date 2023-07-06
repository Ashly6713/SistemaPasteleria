<?php
class VentasModel extends Query{
    private  $nombre, $codigo, $precio_hora, $estado, $id, $data;
public function __construct(){
    parent::__construct();
}
public function getCategorias()
{
    $sql = "SELECT * FROM categoria WHERE estado = 1";
    $data = $this->selectAll($sql);
    return $data;
}
public function getProd(int $id)
{
    $sql = "SELECT p.id, p.descripcion, p.stock, p.precio AS precio_unidad, p.nombre AS producto, cc.nombre AS nombre_c FROM producto p INNER JOIN categoria cc WHERE p.categoria_id = cc.id AND p.id = $id AND p.estado = 1 AND p.disponibilidad = 1" ;
    $data = $this->select($sql);
    return $data;
}
public function getCi(string $ci)
{
    $sql = "SELECT * FROM cliente WHERE ci = $ci AND estado = 1" ;
    $data = $this->select($sql);
    return $data;
}
public function getClientes()
{
    $sql = "SELECT * FROM cliente WHERE estado = 1" ;
    $data = $this->selectAll($sql);
    return $data;
}
public function getProductos(int $id)
{
    $sql = "SELECT p.* FROM producto p  WHERE p.id = $id" ;
    $data = $this->select($sql);
    return $data;
}
public function registrarDetalle(string $precio, int $cantidad, string $sub_total, int $cliente_id, int $producto_id, int $usuario_id)
{
    $sql = "INSERT INTO detalle(precio, cantidad, sub_total, cliente_id, producto_id, usuario_id) VALUES (?,?,?,?,?,?)";
    $datos = array($precio, $cantidad, $sub_total, $cliente_id, $producto_id, $usuario_id);
    $data = $this->save($sql, $datos);
    if($data == 1){
        $res = 'ok';
    }else {
          $res = 'error';
    }
    return $res;
}

public function getDetalle(int $id)
{
    $sql = "SELECT d.*, p.id as producto_id, p.descripcion, p.precio, p.nombre, ca.nombre as nombre_c FROM detalle d INNER JOIN producto p ON p.id = d.producto_id INNER JOIN categoria ca ON ca.id = p.categoria_id  WHERE d.usuario_id =  $id";
    $data = $this->selectAll($sql);
    return $data;
}
public function calcularVenta(int $id_usuario)
{
   $sql = "SELECT sub_total, SUM(sub_total) AS total FROM detalle WHERE usuario_id =  $id_usuario";
   $data = $this->select($sql);
   return $data;
}
public function deleteDelete(int $id)
{
   $sql = "DELETE FROM detalle WHERE producto_id = $id";
   $datos = array($id);
   $data = $this->save($sql, $datos);
   if($data == 1){
    $res = 'ok';
    }else {
        $res = 'error';
    }
    return $res;
}
public function consultarDetalle(int $id_producto, int $id_usuario)
{
   $sql = "SELECT * FROM detalle WHERE producto_id =  $id_producto AND usuario_id = $id_usuario";
   $data = $this->select($sql);
   return $data;
}
public function actualizarDetalle(string $precio, int $cantidad, string $sub_total, int $cliente_id, int $producto_id, int $usuario_id)
{
    $sql = "UPDATE detalle SET precio = ?, cantidad = ?, sub_total = ? WHERE cliente_id = ? AND producto_id = ? AND usuario_id = ?";
    $datos = array($precio, $cantidad, $sub_total, $cliente_id,$producto_id, $usuario_id);
    $data = $this->save($sql, $datos);
    if($data == 1){
        $res = 'modificado';
    }else {
          $res = 'error';
    }
    return $res;
}
public function actualizarDisponibilidad(int $producto_id, int $nStock, int $disp)
{
    $sql = "UPDATE producto SET stock = ?, disponibilidad = ? WHERE id = ?";
    $datos = array($nStock, $disp, $producto_id);
    $data = $this->save($sql, $datos);
    if($data == 1){
        $res = 'ok';
    }else {
          $res = 'error';
    }
    return $res;
}
public function registraVenta(string $fecha_compra, string $total, int $cliente_id, int $usuario_id, int $tipo)
{
    $sql = "INSERT INTO venta(fecha_compra, total, cliente_id, usuario_id, tipo) VALUES (?,?,?,?,?)";
    $datos = array($fecha_compra, $total, $cliente_id, $usuario_id, $tipo);
    $data = $this->save($sql, $datos);
    if($data == 1){
        $res = 'ok';
    }else {
        $res = 'error';
    }
    return $res;
}
public function id_venta(){
    $sql = "SELECT MAX(id) AS id FROM venta";
    $data = $this->select($sql);
     return $data;
}
public function registrarDetalleVenta(string $precio, int $cantidad,string $sub_total,int $producto_id,int $venta_id){
    $sql = "INSERT INTO detalle_venta(precio, cantidad, sub_total, producto_id, venta_id) VALUES (?,?,?,?,?)";
    $datos = array($precio, $cantidad, $sub_total, $producto_id, $venta_id);
    $data = $this->save($sql, $datos);
    if($data == 1){
        $res = 'ok';
    }else {
        $res = 'error';
    }
    return $res;
}
public function getEmpresa()
{
    $sql = "SELECT * FROM configuracion";
    $data = $this->select($sql);
     return $data;
}
public function vaciarDetalle(int $usuario_id)
{
    $sql = "DELETE FROM detalle WHERE usuario_id = ?";
    $datos = array($usuario_id);
    $data = $this->save($sql, $datos);
    if($data == 1){
        $res = 'ok';
    }else {
        $res = 'error';
    }
    return $res;
}
public function getCuVenta(int $venta_id)
{
    $sql = "SELECT v.*, d.*, ca.*, p.id as producto_id, p.nombre AS producto, p.descripcion AS descrip  FROM venta v INNER JOIN detalle_venta d ON v.id = d.venta_id INNER JOIN producto p ON p.id = d.producto_id INNER JOIN categoria ca ON ca.id = p.categoria_id  WHERE v.id =  $venta_id";
    $data = $this->selectAll($sql);
    return $data;
}
public function getCliVenta(int $id)
{
    $sql = "SELECT * FROM cliente WHERE id = $id AND estado = 1" ;
    $data = $this->select($sql);
    return $data;
}

public function actualizarDisponibles()
{
    date_default_timezone_set('America/La_Paz');
    $fecha = date('Y-m-d');
    $hora = date('H:i:s');
    $sql = "UPDATE Cuarto
    SET disponibilidad = ?
    WHERE NOT EXISTS (
      SELECT 1
      FROM detalle_venta dr
      INNER JOIN venta r ON dr.venta_id = r.id
      WHERE dr.producto_id = Cuarto.id
        AND r.fecha_compra = '$fecha'
        AND '$hora' BETWEEN dr.hora_inicio AND dr.hora_fin
    );" ;
    $datos = array(1);
    $data = $this->save($sql, $datos);
    if($data == 1){
        $res = 'ok';
    }else {
        $res = 'error';
    }
    return $res;
}
public function actualizarNoDisponibles()
{
    date_default_timezone_set('America/La_Paz');
    $fecha = date('Y-m-d');
    $hora = date('H:i:s');
    $sql = "UPDATE Cuarto
    SET disponibilidad = ?
    WHERE id IN (
      SELECT producto_id
      FROM detalle_venta
      WHERE venta_id IN (
        SELECT id
        FROM venta
        WHERE fecha_compra = '$fecha' 
        AND '$hora' BETWEEN hora_inicio AND hora_fin
      )
    );" ;
    $datos = array(0);
    $data = $this->save($sql, $datos);
    if($data == 1){
        $res = $hora;
    }else {
        $res = 'error';
    }
    return $res;
}
public function getDisponibles(int $categoria)
{  
    $sql = "SELECT p.id, p.nombre AS producto, p.descripcion, p.precio AS precio_unidad, p.stock
    FROM producto p
    INNER JOIN categoria cc ON p.categoria_id = cc.id
    WHERE p.estado = 1  AND p.disponibilidad = 1
    AND cc.id = $categoria AND p.estado = 1";
    $data = $this->selectAll($sql);
    return $data;
}
public function getHistorialVentas()
{
    $sql = "SELECT u.nom_usuario, u.nombres as nombre_u, u.apellido as apellido_u, c.ci, c.nombre, c.apellido, r.* FROM cliente c INNER JOIN Venta r ON r.cliente_id = c.id INNER JOIN usuario u ON u.id = r.usuario_id";
    $data = $this->selectAll($sql);
    return $data;
}

public function getRangoFechas(string $desde, string $hasta)
{
    $sql = "SELECT u.nom_usuario, u.nombres as nombre_u, u.apellido as apellido_u, c.ci, c.nombre, c.apellido, r.* FROM cliente c INNER JOIN Venta r ON r.cliente_id = c.id INNER JOIN usuario u ON u.id = r.usuario_id WHERE r.fecha_compra BETWEEN '$desde' AND '$hasta'";
    $data = $this->selectAll($sql);
    return $data;
}
public function getRangoFechasCi(string $desde, string $hasta, string $ci)
{
    $sql = "SELECT u.nom_usuario, u.nombres as nombre_u, u.apellido as apellido_u, c.ci, c.nombre, c.apellido, r.* FROM cliente c INNER JOIN Venta r ON r.cliente_id = c.id INNER JOIN usuario u ON u.id = r.usuario_id WHERE c.ci = '$ci' AND r.fecha_compra BETWEEN '$desde' AND '$hasta'";
    $data = $this->selectAll($sql);
    return $data;
}
public function getRangoFechasUsuario(string $desde, string $hasta, string $usuario)
{
    $sql = "SELECT u.nom_usuario, u.nombres as nombre_u, u.apellido as apellido_u, c.ci, c.nombre, c.apellido, r.* FROM cliente c INNER JOIN Venta r ON r.cliente_id = c.id INNER JOIN usuario u ON u.id = r.usuario_id WHERE u.nom_usuario = '$usuario' AND r.fecha_compra BETWEEN '$desde' AND '$hasta'";
    $data = $this->selectAll($sql);
    return $data;
}
public function getRangoFechasCiUsuario(string $desde, string $hasta, string $ci, string $usuario)
{
    $sql = "SELECT u.nom_usuario, u.nombres as nombre_u, u.apellido as apellido_u, c.ci, c.nombre, c.apellido, r.* FROM cliente c INNER JOIN Venta r ON r.cliente_id = c.id INNER JOIN usuario u ON u.id = r.usuario_id WHERE c.ci = '$ci' AND u.nom_usuario = '$usuario' AND r.fecha_compra BETWEEN '$desde' AND '$hasta'";
    $data = $this->selectAll($sql);
    return $data;
}

}


?>