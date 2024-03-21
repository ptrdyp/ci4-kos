<?php 
namespace App\Models;

use CodeIgniter\Model;

class Model_Setting extends Model 
{

    public function getData() {
        return $this->db->table('tbl_setting') -> where('setting_id', 1) -> get() -> getRowArray(); 
    }

    public function updateData($data) {
        $this -> db -> table('tbl_setting') -> where('setting_id', 1) -> update($data);
    }
    
}