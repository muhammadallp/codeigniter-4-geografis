<?php

namespace App\Models;

use CodeIgniter\Model;

class barangbekas_model extends Model
{
    protected $table = "brg_bekas";
    protected $primaryKey = "id";
    protected $allowedFields = ["nama", "nohp","latitude","longitude","data_create","image"];
    protected $useTimestamps = false;
    

    public function edit_data($data,$id)
    {
        return $this->db->table('brg_bekas')->update($data, array('id'=>$id));
    }

    public function deletebarang($id)
    {
        $query = $this->db->table('brg_bekas')->delete(array('id' => $id));
        return $query;
    } 
}