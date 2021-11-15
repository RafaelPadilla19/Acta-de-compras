<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reporte extends CI_Controller
{
    public function index()
	{
		
		//array de datos
		$data=[
			'title' => 'Ordenes de compra',
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

	public function actaRecepcion($id_acta){
		$this->load->model('Reporte_model');
		$productos= $this->Reporte_model->getProductosPorActa($id_acta);
		$acta= $this->Reporte_model->getActa($id_acta);

		$data=[
			'id'=>$id_acta,
			'productos'=>$productos,
			'acta'=>$acta,
		];
		$this->load->view('reportes/solicitud/solicitud',$data);
	}

	public function recibo($id_acta){
		$this->load->model('Reporte_model');
		$productos= $this->Reporte_model->getProductosPorActa($id_acta);
		$acta= $this->Reporte_model->getActa($id_acta);

		$data=[
			'id'=>$id_acta,
			'productos'=>$productos,
			'acta'=>$acta,
		];
		$this->load->view('reportes/recibo/recibo',$data);
	}
	public function ordenCompra($id_acta){
		$this->load->model('Reporte_model');
		$productos= $this->Reporte_model->getProductosPorActa($id_acta);
		$acta= $this->Reporte_model->getActa($id_acta);

		$data=[
			'id'=>$id_acta,
			'productos'=>$productos,
			'acta'=>$acta,
		];
		$this->load->view('reportes/orden/orden',$data);
	}	

	public function recepcion($id_acta){
		$this->load->model('Reporte_model');
		$productos= $this->Reporte_model->getProductosPorActa($id_acta);
		$acta= $this->Reporte_model->getActa($id_acta);

		$data=[
			'id'=>$id_acta,
			'productos'=>$productos,
			'acta'=>$acta,
		];
		$this->load->view('reportes/recepcion/recepcion',$data);
	}

	public function declaracion($id_acta){
		$this->load->model('Reporte_model');
		$productos= $this->Reporte_model->getProductosPorActa($id_acta);
		$acta= $this->Reporte_model->getActa($id_acta);

		$data=[
			'id'=>$id_acta,
			'productos'=>$productos,
			'acta'=>$acta,
		];
		$this->load->view('reportes/declaracion/declaracion',$data);
	}
	public function adjudicacion($id_acta){
		$this->load->model('Reporte_model');
		$productos= $this->Reporte_model->getProductosPorActa($id_acta);
		$acta= $this->Reporte_model->getActa($id_acta);

		$data=[
			'id'=>$id_acta,
			'productos'=>$productos,
			'acta'=>$acta,
		];
		$this->load->view('reportes/adjudicacion/adjudicacion',$data);
	}
}
?>