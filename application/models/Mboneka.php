<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mboneka extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }

    public function get_product()
    {
        return $this->db->get('produk')->result(); 
    }

    public function delete_product($id_produk)
    {
        $this->db->where('id_produk', $id_produk);
        return $this->db->delete('produk');
    }

    public function add_product($data)
    {
        return $this->db->insert('produk', $data);
    }

    public function update_product($id, $data) {
        $this->db->where('id_produk', $id);
        return $this->db->update('produk', $data);
    }
    
    public function get_product_by_id($id)
    {
        return $this->db->get_where('produk', ['id_produk' => $id])->row();
    }

    // ✅ Register user
    public function insert_user($data)
    {
        return $this->db->insert('admin', $data);
    }

    // ✅ Ambil data user berdasarkan email (untuk login)
    public function get_user_by_email($email)
    {
        return $this->db->get_where('admin', ['email' => $email])->row();
    }

    public function get_all_produk()
{
    return $this->db->get('produk')->result();
}


}