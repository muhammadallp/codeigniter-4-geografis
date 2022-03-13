<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class Product_model extends Model
{ 
    protected $table = "produk";
    protected $primaryKey = "product_id";
    protected $allowedFields = ["product_name", "product_price","product_category_id", "deskripsi","image"];
    protected $useTimestamps = false;
     
    public function getCategory()
    {
        $builder = $this->db->table('kategori');
        return $builder->get();
    }
 
    public function getProduct()
    {
        $builder = $this->db->table('produk');
        $builder->select('*');
        $builder->join('kategori', 'category_id = product_category_id','left');
        return $builder->get();
        
    }
 
    public function saveProduct($data){
        return $this->db->table('produk')->insert($data);
        
    }
 
    public function updateProduct($data, $id)
    {   
        
        return $this->db->table('produk')->update($data, array('product_id' => $id));
        
    }
 
    public function deleteProduct($id)
    {
        $query = $this->db->table('produk')->delete(array('product_id' => $id));
        return $query;
    } 

    // category
    
    public function savekategori($data){
        return $this->db->table('kategori')->insert($data);
        
    }
 
    public function updatekatagori($data, $id)
    {
        return $this->db->table('kategori')->update($data, array('category_id' => $id));
        
    }
 
    public function deletekatagori($id)
    {
        $query = $this->db->table('kategori')->delete(array('category_id' => $id));
        return $query;
    }  

    public function tambah_pelanggan($data)
	{
		return $this->db->table('pelanggan')->insert($data);
        
		
	}
	
	public function tambah_penjualan($data)
	{
		return $this->db->table('penjualan')->insert($data);
                 
	}    


    public function getbarangbekas()
    {
        $builder = $this->db->table('brg_bekas');
        return $builder->get();
    }
    public function getpenjualan()
    {
        $builder = $this->db->table('penjualan');
        $builder->select('penjualan.id_pen as penjualanid, berat, product_price, product_name, gambar, tanggal, nama_pen,nama,nohp_pel nohp, latitude,latitude_pel, longitude_pel, longitude');
        $builder->join('produk', 'produk.product_id = produk_id');
        $builder->join('pelanggan', 'pelanggan.id_pel = penjualan.pelanggan_id','left');
        $builder->join('brg_bekas', 'brg_bekas.id = brg_bekas_id');
        return $builder->get();
    }
    public function getpelanggan()
    {
        $builder = $this->db->table('pelanggan');
        return $builder->get();
    }
    // public function getpenjualan()
    // {
    //     $builder = $this->db->table('penjualan');
    //     return $builder->get();
    // }
    

    
}