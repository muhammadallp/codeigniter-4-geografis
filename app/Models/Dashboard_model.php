<?php namespace App\Models;
use CodeIgniter\Model;
 
class Dashboard_model extends Model
{
    protected $table = 'product';

    // hitung total data pada transaction
    public function getCountbarangbekas()
    {
        return $this->db->table("brg_bekas")->countAll();
    }

    // hitung total data pada category
    public function getCountCategory()
    {
        return $this->db->table("kategori")->countAll();
    }

    // hitung total data pada product
    public function getCountProduct()
    {
        return $this->db->table("produk")->countAll();
    }

    // hitung total data pada user
    public function getCountUser()
    {
        return $this->db->table("user")->countAll();
    }

    public function getCountPenjualan()
    {
        return $this->db->table("penjualan")->countAll();
    }
}