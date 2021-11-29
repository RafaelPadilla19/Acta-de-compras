<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function index()
	{
		echo "Hola";
	}
	public function logear()
	{
		if($this->session->userdata("usuario") != null){
			redirect('/');
		}else{
			$this->load->view('templates/header');
			$this->load->view('forms/usuario/login_view');
			$this->load->view('templates/footer');
		}
		
	}
	public function login(){
		$this->load->model('Usuario_model');
		$usuario = $this->input->post('usuario');
		$password = $this->input->post('password');
		$resultado = $this->Usuario_model->login($usuario,$password);
		if($resultado){
			$this->session->set_userdata('usuario',$resultado);
			redirect('/');
		}else{
			$this->session->set_flashdata('error','Usuario o contraseña incorrectos');
			redirect('/Usuario/logear');
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('/');
	}
	//agregar view


}
