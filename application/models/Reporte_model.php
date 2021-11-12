<?php class Reporte_model extends CI_Model {
	
	public function __construct(){
    	// Call the CI_Model constructor
        parent::__construct();
    }

    public function get_reportes(){
        // cambiar el valor solo de un campo
        $this->db->select("*");
        $this->db->from("acta_reporte");
        $this->db->join("proveedor", "proveedor.proveedorid = acta_reporte.proveedorid");
        $this->db->order_by("id", "desc");
        $query=$this->db->get();
        return $query->result();
    }

    // guardar reporte
    public function guardar($data){
        $this->db->insert('acta_reporte', $data);
        return $this->db->insert_id();
    }

    public function guardarProducto($data){
        $this->db->insert('producto', $data);
        return $this->db->insert_id();
    }

    // traer todos los productos de una acta_reporte
    public function getProductosPorActa($idActa){
        $this->db->select("*");
        $this->db->from("producto");
        $this->db->where("id_acta", $idActa);
        $query=$this->db->get();
        return $query->result();      
    }
    //traer reporte por id
    public function getActa($id){
        $this->db->select("*");
        $this->db->from("acta_reporte");
        $this->db->join("proveedor", "proveedor.proveedorid = acta_reporte.proveedorid");
        $this->db->where("id", $id);
        $query=$this->db->get();
        return $query->row();
    }
 
    
    
}
?>