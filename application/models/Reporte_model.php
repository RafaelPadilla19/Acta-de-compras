<?php class Reporte_model extends CI_Model {
	
	public function __construct(){
    	// Call the CI_Model constructor
        parent::__construct();
    }

    public function get_reportes(){
        // cambiar el valor solo de un campo
        $this->db->select("*");
        $this->db->from("solicitud_requerimientos");
        //$this->db->join("proveedor", "proveedor.proveedorid = acta_reporte.proveedorid");
        $this->db->order_by("solicitud_id", "desc");
        $query=$this->db->get();
        return $query->result();
    }

    public function insert_solicitud($data){
        $this->db->insert('solicitud_requerimientos', $data);
    	return $this->db->insert_id();
    }

    public function insert_propuesta_orden_de_compras($data){
    	$this->db->insert('propuesta_orden_de_compras', $data);
    	return $this->db->insert_id();
    }

    public function guardarProducto($data){
        $this->db->insert('productos', $data);
        return $this->db->insert_id();
    }

    // traer todos los productos de una acta_reporte
    public function getProductosPorSolicitud($idSolicitud){
        $this->db->select("*");
        $this->db->from("productos");
        $this->db->where("solicitud_id", $idSolicitud);
        $query=$this->db->get();
        return $query->result();      
    }
    //traer reporte por id
    public function getActa($id){
        $this->db->select("*");
        $this->db->from("solicitud_requerimientos");
        $this->db->where("solicitud_id", $id);
        $query=$this->db->get();
        return $query->row();
    }
 
    
    
}
?>