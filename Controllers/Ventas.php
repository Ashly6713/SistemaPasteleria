<?php 
class Ventas extends Controller {
    public function __construct()
    {
        session_start();
        parent::__construct();
    }  
    public function index()
    {
        $data['categorias'] = $this->model->getCategorias();
        $data['clientes']= $this->model->getClientes();
        $this->views->getView($this, "index", $data);
    }
    public function historial()
    {
        $data['clientes']= $this->model->getClientes();
        $this->views->getView($this, "historial", $data);
    }
    public function buscarCi($ci)
    {
        $data = $this->model->getCi($ci);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function buscarProducto($id)
    {
        $data = $this->model->getProd($id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function ingresar()
    {
        date_default_timezone_set('America/La_Paz');
        $id = $_POST['id_pro'];
        $cliente_id = $_POST['id_cli'];
        $datos = $this->model->getProductos($id); 
        $precio = $datos['precio'];
        $cantidad = $_POST['cantidad'];
        $producto_id = $datos['id'];
        $usuario_id = $_SESSION['id'];
         
         $comprobar = $this->model->consultarDetalle($producto_id, $usuario_id);
         //calcular total
         $preTot =  $cantidad*$precio;
         $rPreTot = round($preTot,2);
         $decimal = $rPreTot - floor($rPreTot);
         if($decimal == 0.0 || $decimal == 0.50 ){
             $sub_total =  $rPreTot;
         }else{
             if($decimal > 0.50 ){
             $sub_total =floor($rPreTot)+1;
             } else{
                 $sub_total =floor($rPreTot);
             }
         }
         //fin
         if(empty($comprobar)){
            $data = $this->model->registrarDetalle($precio, $cantidad, $sub_total, $cliente_id, $producto_id, $usuario_id);
            if($data == 'ok'){
                $msg = array('msg'=>'Producto ingresado a la venta', 'icono'=> 'success');
            } else{
                $msg = array('msg'=>'Error al ingresar producto a la venta', 'icono'=> 'error');
            }
         } else {
            $data = $this->model->actualizarDetalle($precio, $cantidad, $sub_total, $cliente_id, $producto_id, $usuario_id);
            if($data == 'modificado'){
                $msg = array('msg'=>'Registro de producto modificado', 'icono'=> 'success');
            } else{
                $msg = array('msg'=>'Error al modificar', 'icono'=> 'error');
            }
        }
       
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function listar()
    {
        $id_usuario = $_SESSION['id'];
        $data['detalle'] = $this->model->getDetalle($id_usuario);
        $data['total_pagar'] = $this->model->calcularVenta( $id_usuario);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function delete(int $id)
    {
       $data =  $this->model->deleteDelete($id);
       if($data == 'ok'){
            $msg = array('msg'=>'Producto eliminado', 'icono'=> 'success');
        } else{
            $msg = array('msg'=>'Error eliminar producto', 'icono'=> 'error');
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function registrarVenta($cliente_id){
        date_default_timezone_set('America/La_Paz');
        $fecha_compra = date('Y-m-d');
        $usuario_id = $_SESSION['id'];
        $rol =  $_SESSION['rol'];
        if($rol == 3){
            $tipo = 0;
        }else{
            $tipo = 1;
        }
       $detalle= $this->model->getDetalle($usuario_id);
       $total = $this->model->calcularVenta($usuario_id); 
       $data = $this->model->registraVenta($fecha_compra, $total['total'], $cliente_id, $usuario_id, $tipo);
       if($data == 'ok'){
            $venta_id = $this->model->id_venta();
            foreach($detalle as $row){
                $precio = $row['precio'];
                $cantidad = $row['cantidad'];
                $sub_total = $row['sub_total'];
                $producto_id = $row['producto_id'];
                $data = $this->model->getProd($producto_id);
                $stock = $data['stock'];
                $nStock = $stock - $cantidad;
                if($nStock == 0){
                    $disp = 0;
                } else {
                    $disp = 1;
                }
                $this->model->registrarDetalleVenta($precio, $cantidad, $sub_total, $producto_id, $venta_id['id']);
                $this->model->actualizarDisponibilidad($producto_id, $nStock, $disp);
            }
            $vaciar = $this->model->vaciarDetalle($usuario_id);
            if($vaciar == 'ok'){
                $msg =  array('msg'=>'ok', 'icono'=> 'success', 'id_venta'=> $venta_id['id']);
            }
        } else{
            $msg = array('msg'=>'Error al generar Venta', 'icono'=> 'error');
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    } 
    public function listar_ventas()
    {
        $data = $this->model->getHistorialVentas();
        for ($i = 0; $i < count($data); $i++){
            $data[$i]['acciones'] = '<div>
            <a class="btn btn-danger" href="'. base_url."Ventas/generarPdf/".$data[$i]['id'].'" terget="_blank"><i class="fas fa-file-pdf"></i></a>
            </div>';
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function generarPdf($id_venta)
    {
        $empresa = $this->model->getEmpresa();
        
        $productos = $this->model->getCuVenta($id_venta);
        $cliente_id = $productos[0]['cliente_id'];
        $tipo = $productos[0]['tipo'];
        $cliente = $this->model->getCliVenta($cliente_id);
        $Date= strtotime($productos[0]['fecha_compra']);
        $Fecha =  date("d-m-Y", $Date);
        
        require('Libraries/fpdf/fpdf.php');
        
        $pdf = new FPDF('P','mm',  'Letter');//arra y ancho y alto
        $pdf->AddPage();
        $pdf->SetMargins(6, 0, 0);
        $pdf->SetTitle('Reporte Compra');
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(210,10, utf8_decode($empresa['nombre']), 0, 1, 'C');
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(218, 5, utf8_decode($empresa['mensaje']), 0, 1, 'C');
        $pdf->Image(base_url . 'Assets/img/log.png', 180, 17, 25, 26);// , tamaño, atura, 25*25 
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(15, 6, 'NIT: ', 0, 0, 'L');
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(25, 6, $empresa['ruc'], 0, 0, 'L');

        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(20, 6, utf8_decode('Teléfono: '), 0, 0, 'L');
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(20, 6, $empresa['telefono'], 0, 1, 'L');
        
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(20, 6, utf8_decode('Dirección: '), 0, 0, 'L');
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(30, 6, utf8_decode($empresa['direccion']), 0, 1, 'L');

        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(20, 8, 'Ticket:', 0, 0, 'L');
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(110, 8, $id_venta, 0, 0, 'L');
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(20, 8, 'Fecha:', 0, 0, 'L');
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(20, 8, $Fecha, 0, 1, 'L');

        //Encabezado Cliente
        $pdf->SetFillColor(0,0,0);
        $pdf->SetTextColor(255,255,255);
        $pdf->Cell(50, 5, 'C. I.', 0, 0, 'L', true);
        $pdf->Cell(50, 5, 'Nombre', 0, 0, 'L', true);
        $pdf->Cell(50, 5, 'Telefono', 0, 0, 'L', true);
        if($tipo == 0){
            $pdf->Cell(50, 5,  utf8_decode('Dirección'), 0, 1, 'L', true);
            $clidir =  $cliente['direccion'];
        } else{
            $pdf->Cell(50, 5,  ' ', 0, 1, 'L', true);
        }
        $pdf->SetTextColor(0,0,0);
        $pdf->Cell(50, 5, $cliente['ci'], 0, 0, 'L');
        $pdf->Cell(50, 5,utf8_decode( $cliente['nombre'].' '.$cliente['apellido']), 0, 0, 'L');
        $pdf->Cell(50, 5, $cliente['telefono'], 0, 0, 'L');
        if($tipo == 0){
            $pdf->Cell(50, 5, $clidir, 0, 1, 'L');
        } else{
            $pdf->Cell(50, 5,  ' ', 0, 1, 'L');
        }
        
        $pdf->Ln();
        //Encabezado Productos
        $pdf->SetFillColor(0,0,0);
        $pdf->SetTextColor(255,255,255);
        $pdf->Cell(40, 5, 'Producto', 0, 0, 'L', true);
        $pdf->Cell(80, 5, 'Descripcion', 0, 0, 'L', true);
        $pdf->Cell(25, 5, 'Categoria', 0, 0, 'L', true);
        $pdf->Cell(18, 5, 'Precio', 0, 0, 'L', true);
        $pdf->Cell(17, 5, 'Cantidad', 0, 0, 'L', true);
        $pdf->Cell(20, 5, 'Sub Total', 0, 1, 'L', true);
        $pdf->SetTextColor(0,0,0);
        $total = 0.00;
        foreach($productos as $row) {
            $total = $total + $row['sub_total'];
            $pdf->Cell(40, 5, $row['producto'], 0, 0, 'L');
            $pdf->Cell(80, 5, $row['descrip'], 0, 0, 'L');
            $pdf->Cell(25, 5, $row['nombre'], 0, 0, 'L');
            $pdf->Cell(18, 5, $row['precio'], 0, 0, 'L');
            $pdf->Cell(17, 5, $row['cantidad'], 0, 'L');
            $pdf->Cell(20, 5, number_format($row['sub_total'], 2, '.', ','), 0, 1, 'L');
        }
        $pdf->Ln();
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(200, 3,'Total a pagar', 0, 1, 'R');
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(200, 5, number_format($total, 2, '.', ',').' Bs.', 0, 1, 'R');
        $pdf->Output();
    } 
    
    public function disponibles()
    {
        $categoria = $_POST['categoria']; 
        $data = $this->model->getDisponibles($categoria);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function actualizar()
    {
        $data1 = $this->model->actualizarDisponibles();
        if($data1 == 'ok'){
             $msg = array('msg'=>'Actualizado', 'icono'=> 'success');
         } else{
             $msg = array('msg'=>'Error al actualizar', 'icono'=> 'error');
         }
         echo json_encode($msg, JSON_UNESCAPED_UNICODE);
         die();
    }
    public function actualizarNo()
    {
        $data2 = $this->model->actualizarNoDisponibles();
        if( $data2 !='error'){
             $msg = array('msg'=> $data2, 'icono'=> 'success');
         } else{
             $msg = array('msg'=>'Error No disponibles', 'icono'=> 'error');
         }
         echo json_encode($msg, JSON_UNESCAPED_UNICODE);
         die();
    }

    public function pdf()
    {
        $desde = $_POST['desde'];
        $hasta = $_POST['hasta'];
        $ci = $_POST['ci'];
        $usuario = $_POST['usuario'];
        
        if (empty($desde) && empty($hasta) && empty($ci)&& empty($usuario)){
            $data = $this->model->getHistorialVentas();
        }else if( $ci=="" && $usuario=="" ){
            $data = $this->model->getRangoFechas($desde, $hasta);
        }else if( !empty($ci) && empty($usuario)){
           $data = $this->model->getRangoFechasCi($desde, $hasta, $ci);
        }else if( !empty($usuario) && empty($ci)){
            $data = $this->model->getRangoFechasUsuario($desde, $hasta, $usuario);
        } else {
             $data = $this->model->getRangoFechasCiUsuario($desde, $hasta, $ci, $usuario);
        }
        $mensaje = "No existen registros con estos parametros";
        if(empty($data)){ 
            echo "<script>alert('" . $mensaje . "');</script>";
            die();
        }
        require('Libraries/fpdf/fpdf.php');
        $pdf = new FPDF('P','mm', 'Letter');//array ancho y alto
        $pdf->AddPage();
        $pdf->SetMargins(10, 0, 0);
        $pdf->SetTitle('Reporte Ventas');
        $pdf->SetFont('Arial','B',20);
        $pdf->Cell(200, 10, utf8_decode('Reporte de Ventas'), 0, 1, 'C');
        $pdf->Image(base_url . 'Assets/img/log.png', 196, 7, 14, 15);// , tamaño, atura, 25*25 
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(15, 5, 'Desde:', 0, 0, 'L');
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(32, 5, $desde, 0, 0, 'L');
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(11, 5, 'Hata:', 0, 0, 'L');
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(20, 5, $hasta, 0, 1, 'L');
        $pdf->SetFont('Arial','B',10);
        $pdf->SetFillColor(0,0,0);
        $pdf->SetTextColor(255,255,255);
        $pdf->Cell(8, 5, 'Id', 0, 0, 'L', true);
        $pdf->Cell(20, 5, 'Fecha', 0, 0, 'L', true);
        $pdf->Cell(15, 5, 'Total', 0, 0, 'L', true);
        $pdf->Cell(16, 5, 'C. I.', 0, 0, 'L', true);
        $pdf->Cell(30, 5, 'Nombres', 0, 0, 'L', true);
        $pdf->Cell(30, 5, 'Apellidos', 0, 0, 'L', true);
        $pdf->Cell(20, 5, 'Usuario', 0, 0, 'L', true);
        $pdf->Cell(30, 5, 'Nombres', 0, 0, 'L', true);
        $pdf->Cell(30, 5, 'Apellidos', 0, 1, 'L', true);
        $pdf->SetFont('Arial','',9);
        
        $pdf->SetTextColor(0,0,0);
        $total = 0.00;
        foreach($data as $row) {
            $total = $total + $row['total'];
            $pdf->Cell(8, 5, $row['id'], 0, 0, 'L');
            $pdf->Cell(20, 5, $row['fecha_compra'], 0, 0, 'L');
            $pdf->Cell(15, 5, $row['total'], 0, 0, 'L');
            $pdf->Cell(16, 5, $row['ci'], 0, 0, 'L');
            $pdf->Cell(30, 5, utf8_decode($row['nombre']), 0, 0, 'L');
            $pdf->Cell(30, 5, utf8_decode($row['apellido']), 0, 0, 'L');
            $pdf->Cell(20, 5, utf8_decode($row['nom_usuario']), 0, 0, 'L');
            $pdf->Cell(30, 5, utf8_decode($row['nombre_u']), 0, 0, 'L');
            $pdf->Cell(30, 5, utf8_decode($row['apellido_u']), 0, 1, 'L');
        }
        $pdf->Ln();
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(172, 3,'', 0, 0, 'R');
        $pdf->SetFillColor(0,0,0);
        $pdf->SetTextColor(255,255,255);
        $pdf->Cell(24, 5,'Total Vendido', 0, 1, 'R', true);
        $pdf->SetTextColor(0,0,0);
        $pdf->Cell(196, 5, number_format($total, 2, '.', ',').' Bs.', 0, 1, 'R');
        $pdf->Output();
    } 

}

?>