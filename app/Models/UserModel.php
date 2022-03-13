<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = "user";
    protected $primaryKey = "id";
    protected $allowedFields = ["username", "password","nama", "role","salt","image","data_create"];
    protected $useTimestamps = false;
    
}

