<?php class Reporte_model extends CI_Model {
	
	public function __construct(){
    	// Call the CI_Model constructor
        parent::__construct();
    }

    public function get_reportes(){
        // cambiar el valor solo de un campo
        $this->db->select("*");
        $this->db->from("solicitud_requerimientos");
   /*      $this->db->join("orden_de_compra", "orden_de_compra.solicitud_id = solicitud_requerimientos.solicitud_id");
        $this->db->join("proveedor", "proveedor.proveedor_id = orden_de_compra.proveedor_id"); */
        
        $this->db->order_by("solicitud_requerimientos.solicitud_id", "desc");
        $query=$this->db->get();
        return $query->result();
    }

    public function insert_solicitud($data){
        $this->db->insert('solicitud_requerimientos', $data);
    	return $this->db->insert_id();
    }

    public function actualizar_solicitud($data, $id){
        $this->db->where('solicitud_id', $id);
        $this->db->update('solicitud_requerimientos', $data);
        
        return $id;
    }


    public function insert_propuesta_orden_de_compras($data){
    	$this->db->insert('propuesta_orden_de_compras', $data);
    	return $this->db->insert_id();
    }

    public function actualizar_propuesta_orden_de_compras($data, $id){
        $this->db->where('solicitud_id', $id);
        $this->db->update('propuesta_orden_de_compras', $data);
        
        return $id;
    }

    public function guardarProducto($data){
        $this->db->insert('productos', $data);
        return $this->db->insert_id();
    }
    //actualizar producto
    public function actualizarProducto($data, $id){
        unset($data['producto_id']);
        $this->db->where('producto_id', $id);
        $this->db->update('productos', $data);
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

    public function actualizarAsigancionPresupuestaria($data, $id){
        $this->db->where('solicitud_id', $id);
        $this->db->update('asignacion_presupuestaria', $data);
        return $id;
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

    function insertActaDeRecepcion($data){
        $this->db->insert('acta_de_recepcion', $data);
        return $this->db->insert_id();
    }

    function insertAdjudicacion($data){
        $this->db->insert('adjudicacion', $data);
        return $this->db->insert_id();
    }

    function getSolicitudRequeimiento_OrdenCompra_Proveedor($solicitud_id){
        $this->db->select("*");
        $this->db->from("solicitud_requerimientos");
        $this->db->join("orden_de_compra", "orden_de_compra.solicitud_id = solicitud_requerimientos.solicitud_id");
        $this->db->join("proveedor", "proveedor.proveedor_id = orden_de_compra.proveedor_id");
        $this->db->where("solicitud_requerimientos.solicitud_id", $solicitud_id);
        $query=$this->db->get();
        return $query->row();
    
    }

    function getSolicitudRequerimientoPorId($id_solicitud){
        $this->db->select("*");
        $this->db->from("solicitud_requerimientos");
        $this->db->where("solicitud_id", $id_solicitud);
        $query=$this->db->get();
        return $query->row();
    }
}
?>