<?php
class AdministracionModel extends Query{
public function __construct(){
    parent::__construct();
}
public function getEmpresa()
{
    $sql = "SELECT * FROM configuracion";
    $data = $this->select($sql);
    return $data;
}
public function sorteo()
{
    $sql = "SELECT c.nombre AS nombre_ganador, c.ci AS carnet_ganador FROM venta v JOIN cliente c ON v.cliente_id = c.id WHERE c.estado = true AND v.fecha_compra >= DATE_SUB(CURDATE(), INTERVAL 7 DAY) ORDER BY RAND() LIMIT 1;";
    $data = $this->select($sql);
    return $data;
}
public function modificar(string $nit,string $nombre, string $telefono, string $dir, string $mensaje, int $id)
{
        $sql = "UPDATE configuracion SET nit = ?,nombre = ?, telefono = ?, direccion = ?, mensaje = ? WHERE id=?";
        $datos = array($nit, $nombre, $telefono, $dir, $mensaje,$id );
        $data = $this->save($sql, $datos);
        if($data == 1){
          $res = 'ok';
        }else {
            $res = 'error';
        }
    return $res;
}
public function getCuartos()
{
    $sql = "SELECT p.*, cc.nombre as nombre_c FROM producto p INNER JOIN categoria cc WHERE p.categoria_id = cc.id";
    $data = $this->selectAll($sql);
    return $data;
}
public function getClientes()
{
    $sql = "SELECT * FROM cliente";
    $data = $this->selectAll($sql);
    return $data;
}
public function getUsuarios()
{
    $sql = "SELECT * FROM usuario";
    $data = $this->selectAll($sql);
    return $data;
}
public function getReservas()
{
    $sql = "SELECT * FROM venta";
    $data = $this->selectAll($sql);
    return $data;
}
/*public function getHoraFin($id)
{
    date_default_timezone_set('America/La_Paz');
    $fecha = date('Y-m-d');
    $hora = date('H:i'); 
    $sql = "SELECT dr.hora_fin
    FROM detalle_reserva dr
    JOIN Reserva r ON dr.reserva_id = r.id
    WHERE dr.cuarto_id =$id
      AND r.fecha_compra = '$fecha'
      AND '$hora' BETWEEN dr.hora_inicio AND dr.hora_fin;";
    $data = $this->select($sql);
    return $data;
}

public function getVendido()
{
    $sql = "SELECT producto.numero, COUNT(*) AS veces_reservado
    FROM producto
    INNER JOIN detalle_reserva ON producto.id = detalle_reserva.cuarto_id
    GROUP BY producto.id 
    ORDER BY veces_reservado DESC
    LIMIT 10";
    $data = $this->selectAll($sql);
    return $data;
}
public function getVentas()
{
    $sql = "SELECT MONTH(fecha_compra) AS mes, YEAR(fecha_compra) AS anio, SUM(total) AS monto_vendido
    FROM Reserva
    GROUP BY YEAR(fecha_compra), MONTH(fecha_compra)
    ORDER BY YEAR(fecha_compra), MONTH(fecha_compra)";
    $data = $this->selectAll($sql);
    return $data;
}
public function getVentasSemana()
{
    $sql = "SELECT fecha_compra AS dia, SUM(total) AS monto_vendido
    FROM Reserva
    WHERE fecha_compra >= CURDATE() - INTERVAL 9 DAY
    GROUP BY dia;";
    $data = $this->selectAll($sql);
    return $data;
}*/

}


?>