<?php 
namespace App\Models;

use CodeIgniter\Model;

class Model_Setting extends Model 
{

    public function getData() {
        return $this->db->table('setting') -> where('id', 1) -> get() -> getRowArray(); 
    }

    public function updateData($data) {
        $this -> db -> table('setting') -> where('id', 1) -> update($data);
    }
    
}