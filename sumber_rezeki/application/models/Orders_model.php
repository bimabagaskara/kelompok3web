<?php 

class Orders_model extends CI_Model
{
    public function getOrders($id_order = null)
    {
        if( $id_order === null ) {
            return $this->db->get('orders')->result_array();
        } else {
            return $this->db->get_where('orders', ['id_order' => $id_order])->result_array();
        }
    }
}