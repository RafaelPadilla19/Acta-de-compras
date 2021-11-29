<?php class Usuario_model extends CI_Model {
	
	public function __construct(){
    	// Call the CI_Model constructor
        parent::__construct();
    }

    public function login($usuario,$clave){
        $clave= sha1($clave);
        $this->db->where('usuario',$usuario);
        $this->db->where('clave',$clave);
        $query = $this->db->get('usuario');  
        return $query->row();
    }
}
?>