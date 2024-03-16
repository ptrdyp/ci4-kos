<?php 
namespace App\Models;

use CodeIgniter\Model;

class Model_Fakultas extends Model 
{

    public function getAllData() {
        return $this->db->table('area_fakultas')->get()->getResultArray();  
    }
    
    
}