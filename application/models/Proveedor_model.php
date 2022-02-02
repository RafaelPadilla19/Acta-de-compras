<?php class Proveedor_model extends CI_Model {
	
	public function __construct(){
    	// Call the CI_Model constructor
        parent::__construct();
    }

    public function getProveedores(){
        $this->db->from("proveedor");
        $this->db->where('estado', 1);
        $this->db->order_by("proveedor_id", "desc");
        $query = $this->db->get();
        return $query->result();
    }

    public function getProveedoresInactivos(){
        $this->db->from("proveedor");
        $this->db->where('estado', 0);
        $this->db->order_by("proveedor_id", "desc");
        $query = $this->db->get();
        return $query->result();
    }

    public function guardar($data){
        $this->db->insert('proveedor', $data);
        return $this->db->insert_id();
    }

    public function actualizar($id, $data){
        $this->db->where('proveedor_id', $id);
        $this->db->update('proveedor', $data);
        return $this->db->affected_rows();
    }
}
?>
