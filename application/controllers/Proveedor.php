<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proveedor extends CI_Controller
{
    public function index(){
        $data=[
            'title'=>'Proveedores',
        ];

        $this->load->view('templates/header');
		$this->load->view('templates/menu');
        $this->load->view('forms/proveedor/index_view',$data);
        $this->load->view('templates/footer');
    }
    
    public function getProveedores()
    {
        $this->load->model('Proveedor_model');
        $result = $this->Proveedor_model->getProveedores();
        echo json_encode($result);
    
    }

    public function guardar(){
        $dt = file_get_contents("php://input");
		$assocArray = json_decode($dt, true);
		$this->load->model('Proveedor_model');
		$response = $this->Proveedor_model->guardar($assocArray);
		echo $response;
    }
    public function actualizar(){
        $dt = file_get_contents("php://input");
		$assocArray = json_decode($dt, true);
		$id = $assocArray["proveedorid"];
		unset($assocArray["proveedorid"]);
		$this->load->model('Proveedor_model');
		$response = $this->Proveedor_model->actualizar($id, $assocArray);
		echo $response;
    
    }
}
?>