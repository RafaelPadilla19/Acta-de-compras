<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reporte extends CI_Controller
{
    public function index()
	{
		
		//array de datos
		$data=[
			'title' => 'Solicitudes de requerimientos',
		];
		$this->load->view('templates/header');
		$this->load->view('templates/menu');
		$this->load->view('forms/reporte/index_view', $data);
		$this->load->view('templates/footer');
	}

	public function getReportes()
	{
		$this->load->model('Reporte_model');	
		$response= $this->Reporte_model->get_reportes();
		echo json_encode($response);
	}

	public function registrar(){
		$this->load->view('templates/header');
		$this->load->view('templates/menu');
		$this->load->view('forms/reporte/insertar_view');
		$this->load->view('templates/footer');
	}

	public function documentacionCompra($id){
		$this->load->model('Reporte_model');
		$acta= $this->Reporte_model->getActa($id);
		$orden_de_compra= $this->Reporte_model->getOrdenCompra($id);
		$data=[
			'title' => 'Documentación de compra',
			'id' => $id,
			'solicitud' => $acta,
			'orden_de_compra' => $orden_de_compra,
		];
		$this->load->view('templates/header');
		$this->load->view('templates/menu');
		$this->load->view('forms/reporte/solicitud_view', $data);
		$this->load->view('templates/footer');
	}
	//guardar reporte
	public function guardar(){
		$dt = file_get_contents("php://input");
		$assocArray = json_decode($dt, true);
		$this->load->model('Reporte_model');
		$response = $this->Reporte_model->guardar($assocArray);
		echo json_encode($response);
	}

	//guardar producto
	public function guardarProducto(){
		$dt = file_get_contents("php://input");
		$assocArray = json_decode($dt, true);
		$this->load->model('Reporte_model');
		$response = $this->Reporte_model->guardarProducto($assocArray);
		echo json_encode($response);
	}
	
	public function acta($id_acta){
		//validar sessio usuario
		if(!$this->session->userdata('usuario')){
			redirect('Usuario/logear');
		}
		$this->load->model('Reporte_model');
		$productos= $this->Reporte_model->getProductosPorActa($id_acta);
		$acta= $this->Reporte_model->getActa($id_acta);

		$data=[
			'id'=>$id_acta,
			'productos'=>$productos,
			'acta'=>$acta,
		];
		$this->load->view('forms/reporte/acta_view',$data);
	}
	public function getProductosPorIdActa($id_acta){
		$this->load->model('Reporte_model');
		$productos= $this->Reporte_model->getProductosPorSolicitud($id_acta);
		echo json_encode($productos);
	}
	public function solicitudRequerimiento($id){

		$this->validarSessionReporte();

		$this->load->model('Reporte_model');
		$productos= $this->Reporte_model->getProductosPorSolicitud($id);
		$propuestaOrdenCompra= $this->Reporte_model->getPropuestaOrdenCompra($id);
		$acta= $this->Reporte_model->getActa($id);
		$asignacion= $this->Reporte_model->getAsignacionPresupuestaria($id);

		$data=[
			'id'=>$id,
			'productos'=>$productos,
			'solicitud'=>$acta,
			'propuesta'=>$propuestaOrdenCompra,
			'asignacion'=>$asignacion,
		];
		$this->load->view('reportes/solicitud/solicitud',$data);
	}

	public function getAsignacionPresupuestaria($id)
	{
		$this->load->model('Reporte_model');
		$asignacion= $this->Reporte_model->getAsignacionPresupuestaria($id);
		echo json_encode($asignacion);
	}

	public function recibo($id_acta){
		$this->load->model('Reporte_model');
		$productos= $this->Reporte_model->getProductosPorSolicitud($id_acta);
		$acta= $this->Reporte_model->getActa($id_acta);
		$asignacion= $this->Reporte_model->getAsignacionPresupuestaria($id_acta);
		$solicitud = $this->Reporte_model->getSolicitudRequeimiento_OrdenCompra_Proveedor($id_acta);
		$orden = $this->Reporte_model->getOrdenCompra($id_acta);

		$data=[
			'id'=>$id_acta,
			'productos'=>$productos,
			'acta'=>$acta,
			'asignacion'=>$asignacion,
			'solicitud'=>$solicitud,
			'orden'=>$orden,
		];
		$this->load->view('reportes/recibo/recibo',$data);
	}
	public function agregarOrden($id){

		$this->validarSessionReporte();
		$data=[
			'id' => $id,
		];

		$this->load->view('templates/header');
		$this->load->view('templates/menu');
		$this->load->view('reportes/orden/insertar_orden_view',$data);
		$this->load->view('templates/footer');
	}
	public function ordenCompra($id_acta){
		$this->load->model('Reporte_model');
		$productos= $this->Reporte_model->getProductosPorSolicitud($id_acta);
		$acta= $this->Reporte_model->getActa($id_acta);
		$solicitud= $this->Reporte_model->getSolicitudRequeimiento_OrdenCompra_Proveedor($id_acta);
		$orden= $this->Reporte_model->getOrdenCompra($id_acta);
		$asignacion =$this->Reporte_model->getAsignacionPresupuestaria($id_acta);

		$data=[
			'id'=>$id_acta,
			'productos'=>$productos,
			'acta'=>$acta,
			'solicitud'=>$solicitud,
			'orden'=>$orden,
			'asignacion'=>$asignacion,
		];
		$this->load->view('reportes/orden/orden',$data);
	}	

	public function updateProducto(){
		$dt = file_get_contents("php://input");
		$assocArray = json_decode($dt, true);
		$id=$assocArray['producto_id'];
		$this->load->model('Reporte_model');
		$response = $this->Reporte_model->actualizarProducto($assocArray,$id);
		echo json_encode($response);
	}

	public function actualizarAsigancionPresupuestaria()
	{
		$dt = file_get_contents("php://input");
		$assocArray = json_decode($dt, true);
		$id=$assocArray['solicitud_id'];
		$this->load->model('Reporte_model');
		$response = $this->Reporte_model->actualizarAsigancionPresupuestaria($assocArray,$id);
		echo json_encode($response);
	}
	
	public function recepcion($id_acta){
		$this->load->model('Reporte_model');
		$productos= $this->Reporte_model->getProductosPorSolicitud($id_acta);
		$acta= $this->Reporte_model->getSolicitudRequeimiento_OrdenCompra_Proveedor($id_acta);
		$adjudicacion=$this->Reporte_model->getAdjudicacion($id_acta);
		$asignacion= $this->Reporte_model->getAsignacionPresupuestaria($id_acta);
		$recepcion = $this->Reporte_model->getActaDeRecepcion($id_acta);
		$orden = $this->Reporte_model->getSolicitudRequeimiento_OrdenCompra_Proveedor($id_acta);

		$data=[
			'id'=>$id_acta,
			'productos'=>$productos,
			'acta'=>$acta,
			'adjudicacion'=>$adjudicacion,
			'asignacion'=>$asignacion,
			'recepcion'=>$recepcion,
			'orden'=>$orden,
		];
		$this->load->view('reportes/recepcion/recepcion',$data);
	}
	public function getActaDeRecepcion($id)
	{
		$this->load->model('Reporte_model');
		$recepcion = $this->Reporte_model->getActaDeRecepcion($id);
		echo json_encode($recepcion);	
		
	}

	public function actualizarActaRecepcion()
	{
		$dt = file_get_contents("php://input");
		$assocArray = json_decode($dt, true);
		$id=$assocArray['solicitud_id'];
		$this->load->model('Reporte_model');
		$response = $this->Reporte_model->actualizarActaRecepcion($assocArray,$id);
		echo json_encode($response);
	}
	public function getAdjudicacion($id)
	{
		$this->load->model('Reporte_model');
		$recepcion = $this->Reporte_model->getAdjudicacion($id);
		echo json_encode($recepcion);	
		
	}
	public function actualizarAdjudicacion()
	{
		$dt = file_get_contents("php://input");
		$assocArray = json_decode($dt, true);
		$id=$assocArray['solicitud_id'];
		$this->load->model('Reporte_model');
		$response = $this->Reporte_model->actualizarAdjudicacion($assocArray,$id);
		echo json_encode($response);
	}
	public function declaracion($id_acta){
		$this->load->model('Reporte_model');
		$acta= $this->Reporte_model->getSolicitudRequeimiento_OrdenCompra_Proveedor($id_acta);

		$data=[
			'id'=>$id_acta,
			'acta'=>$acta,
		];
		$this->load->view('reportes/declaracion/declaracion',$data);
	}

	public function adjudicacion($id_acta){
		$this->load->model('Reporte_model');
		$productos= $this->Reporte_model->getProductosPorSolicitud($id_acta);
		$acta= $this->Reporte_model->getSolicitudRequeimiento_OrdenCompra_Proveedor($id_acta);
		$asignacion= $this->Reporte_model->getAsignacionPresupuestaria($id_acta);
		$adjudicacion=$this->Reporte_model->getAdjudicacion($id_acta);
		$orden=$this->Reporte_model->getOrdenCompra($id_acta);
		$propuesta=$this->Reporte_model->getPropuestaOrdenCompra($id_acta);
		
		$data=[
			'id'=>$id_acta,
			'productos'=>$productos,
			'acta'=>$acta,
			'asignacion'=>$asignacion,
			'adjudicacion'=>$adjudicacion,
			'orden'=>$orden,
			'propuesta'=>$propuesta,
		];
		$this->load->view('reportes/adjudicacion/adjudicacion',$data);
	}
	public function insertSolicitud(){
		$dt = file_get_contents("php://input");
		$assocArray = json_decode($dt, true);
		$this->load->model('Reporte_model');
		$response = $this->Reporte_model->insert_solicitud($assocArray);
		echo json_encode($response);
	}
	public function insertPropuesta(){
		$dt = file_get_contents("php://input");
		$assocArray = json_decode($dt, true);
		$this->load->model('Reporte_model');
		$response = $this->Reporte_model->insert_propuesta_orden_de_compras($assocArray);
		echo json_encode($response);
	}

	public function actualizarPropuesta(){
		$dt = file_get_contents("php://input");
		$assocArray = json_decode($dt, true);
		$solicitud_id=$assocArray['solicitud_id'];
		unset($assocArray['solicitud_id']);
		$this->load->model('Reporte_model');
		$response = $this->Reporte_model->actualizar_propuesta_orden_de_compras($assocArray,$solicitud_id);
		echo json_encode($response);
	}


	public function insertProducto(){
		$dt = file_get_contents("php://input");
		$assocArray = json_decode($dt, true);
		$this->load->model('Reporte_model');
		$response = $this->Reporte_model->guardarProducto($assocArray);
		echo json_encode($response);
	}

	public function insertAsignacionPresupuestaria(){
		$dt = file_get_contents("php://input");
		$assocArray = json_decode($dt, true);
		$this->load->model('Reporte_model');
		$response = $this->Reporte_model->insertAsiganacionPresupuestaria($assocArray);
		echo json_encode($response);
	}

	public function existOrdenCompra($solicitud_id){

		$this->load->model('Reporte_model');
		$response = $this->Reporte_model->getOrdenCompra($solicitud_id);
		
		if($response){
			echo json_encode(true);
		}else{
			echo json_encode(false);
		}
	}

	public function existAdjudicacion($solicitud_id){

		$this->load->model('Reporte_model');
		$response = $this->Reporte_model->getAdjudicacion($solicitud_id);
		
		if($response){
			echo json_encode(true);
		}else{
			echo json_encode(false);
		}
	}

	public function existActaRecepcion($solicitud_id){

		$this->load->model('Reporte_model');
		$response = $this->Reporte_model->getActaDeRecepcion($solicitud_id);
		
		if($response){
			echo json_encode(true);
		}else{
			echo json_encode(false);
		}
	}

	public function insertOrdenCompra(){
		$dt = file_get_contents("php://input");
		$assocArray = json_decode($dt, true);
		$this->load->model('Reporte_model');
		$response = $this->Reporte_model->insertOrdenCompra($assocArray);
		echo json_encode($response);
	}

	public function insertAdjudicacion(){
		$dt = file_get_contents("php://input");
		$assocArray = json_decode($dt, true);
		$this->load->model('Reporte_model');
		$response = $this->Reporte_model->insertAdjudicacion($assocArray);
		echo json_encode($response);
	}

	public function insertActaRecepcion(){
		$dt = file_get_contents("php://input");
		$assocArray = json_decode($dt, true);
		$this->load->model('Reporte_model');
		$response = $this->Reporte_model->insertActaDeRecepcion($assocArray);
		echo json_encode($response);
	}

	public function validarSessionReporte(){
		if($this->session->userdata("usuario") == null){
			if(!($this->uri->segment(1) == "Usuario" && $this->uri->segment(2) == "logear"))
				{
					return redirect("Usuario/logear");
				}
		}
	}

	public function actualizarSolicitud($id){
		$this->validarSessionReporte();
		$data=[
			'id' => $id,
		];

		$this->load->view('templates/header');
		$this->load->view('templates/menu');
		$this->load->view('reportes/solicitud/actualizar_solicitud',$data);
		$this->load->view('templates/footer');
	}

	public function actualizarOrden($id)
	{
		$this->validarSessionReporte();
		$data=[
			'id' => $id,
		];

		$this->load->view('templates/header');
		$this->load->view('templates/menu');
		$this->load->view('reportes/orden/actualizar_orden_view',$data);
		$this->load->view('templates/footer');
	}

	public function getSolicitudRequerimientoPorId($id){
		$this->load->model('Reporte_model');
		$response = $this->Reporte_model->getSolicitudRequerimientoPorId($id);
		echo json_encode($response);
	}

	public function getPropuestaOrdenCompra($id){
		$this->load->model('Reporte_model');
		$response = $this->Reporte_model->getPropuestaOrdenCompra($id);
		echo json_encode($response);
		
	}

	public function actualizareSolicitud(){
		$dt = file_get_contents("php://input");
		$assocArray = json_decode($dt, true);
		$id=$assocArray['solicitud_id'];
		unset($assocArray['solicitud_id']);
		$this->load->model('Reporte_model');
		$response = $this->Reporte_model->actualizar_solicitud($assocArray,$id);
		echo json_encode($response);
	}

	public function eliminarProceso($id)
	{
		$this->load->model('Reporte_model');
    	$this->Reporte_model->eliminar_solicitud($id);
		redirect('/');
	}

	public function getOrdenCompra($id)
	{
		$this->load->model('Reporte_model');
		$response = $this->Reporte_model->getOrdenCompra($id);
		echo json_encode($response);
	}

	public function actualizarOrdenCompra()
	{
		$dt = file_get_contents("php://input");
		$assocArray = json_decode($dt, true);
		$id=$assocArray['solicitud_id'];
		$this->load->model('Reporte_model');
		$response = $this->Reporte_model->actualizarOrdenCompra($assocArray,$id);
		echo json_encode($response);
	}

}
?>