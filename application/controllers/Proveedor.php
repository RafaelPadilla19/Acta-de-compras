<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proveedor extends CI_Controller
{
    protected $proveedor_model;
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

    public function getProveedoresInactivos()
    {
        $this->load->model('Proveedor_model');
        $result = $this->Proveedor_model->getProveedoresInactivos();
        echo json_encode($result);
    
    }

    public function eliminados(){
        //ordenar por id de forma decente        
        $data = [
            'titulo'=>'Proveedores Eliminados',
        ];
        
        $this->load->view('templates/header');
		$this->load->view('templates/menu');
        $this->load->view('forms/proveedor/inactivos_view',$data);
        $this->load->view('templates/footer');
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
		$id = $assocArray["proveedor_id"];
		unset($assocArray["proveedor_id"]);
		$this->load->model('Proveedor_model');
		$response = $this->Proveedor_model->actualizar($id, $assocArray);
		echo $response;
    
    }

    public function eliminarProveedor($id){
        
        $data = [
            'estado'=>0
        ];
        $this->load->model('Proveedor_model');
        $this->Proveedor_model->actualizar($id, $data);
        redirect('/Proveedor');
    }

    public function restaurar($id){
        $data = [
            'estado'=>1
        ];
        $this->load->model('Proveedor_model');
        $this->Proveedor_model->actualizar($id, $data);
        redirect('/Proveedor/eliminados');
    }

}
?>