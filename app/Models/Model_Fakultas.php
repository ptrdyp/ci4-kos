<?php 
namespace App\Models;

use CodeIgniter\Model;

class Model_Fakultas extends Model 
{

    public function getAllData() {
        return $this->db->table('tbl_fakultas')->get()->getResultArray();  
    }

    public function saveFakultas($data) {
        $this -> db -> table('tbl_fakultas') -> insert($data);
    }

    public function detailFakultas($fakultas_id) {
        return $this -> db -> table('tbl_fakultas') -> where('fakultas_id', $fakultas_id) -> get() -> getRowArray();
    }

    public function updateData($fakultas_id, $data) {
        $this -> db -> table('tbl_fakultas') -> where('fakultas_id', $fakultas_id) -> update($data);
    }

    public function deleteData($fakultas_id) {
        $this -> db -> table('tbl_fakultas') -> where('fakultas_id', $fakultas_id) -> delete();
    }
    
    
}