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

    public function insertOrdenCompra($data){
        $this->db->insert('orden_de_compra', $data);
        return $this->db->insert_id();
    }

    public function insertAsiganacionPresupuestaria($data){
        $this->db->insert('asignacion_presupuestaria', $data);
        $this->db->insert_id();
        $idSolicitud=$data['solicitud_id'];
        $estado=$data['estado'];

        //actualizar estado de la solicitud_requerimientos
        $this->db->set('estado', $estado);
        $this->db->where('solicitud_id', $idSolicitud);
        $this->db->update('solicitud_requerimientos');

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
 
    public function getPropuestaOrdenCompra($id){
        $this->db->select("*");
        $this->db->from("propuesta_orden_de_compras");
        $this->db->where("solicitud_id", $id);
        $query=$this->db->get();
        return $query->row();
    }

    public function getAsignacionPresupuestaria($id){
        $this->db->select("*");
        $this->db->from("asignacion_presupuestaria");
        $this->db->where("solicitud_id", $id);
        $query=$this->db->get();
        return $query->row();
    }

    function getOrdenCompra($id_solicitud){
        $this->db->select("*");
        $this->db->from("orden_de_compra");
        $this->db->where("solicitud_id", $id_solicitud);
        $query=$this->db->get();
        return $query->row();
    }

    function getAdjudicacion($id_solicitud){
        $this->db->select("*");
        $this->db->from("adjudicacion");
        $this->db->where("solicitud_id", $id_solicitud);
        $query=$this->db->get();
        return $query->row();
    }

    function getActaDeRecepcion($id_solicitud){
        $this->db->select("*");
        $this->db->from("acta_de_recepcion");
        $this->db->where("solicitud_id", $id_solicitud);
        $query=$this->db->get();
        return $query->row();
    }
}
?>