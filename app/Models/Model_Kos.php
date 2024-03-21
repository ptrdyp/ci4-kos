<?php 
namespace App\Models;

use CodeIgniter\Model;

class Model_Kos extends Model 
{

    public function getAllData() {
        return $this->db->table('tbl_kos')->get()->getResultArray();  
    }

    public function saveKos($data) {
        $this -> db -> table('tbl_kos') -> insert($data);
    }

    // public function detailFakultas($kos_id) {
    //     return $this -> db -> table('tbl_kos') -> where('kos_id', $kos_id) -> get() -> getRowArray();
    // }

    // public function updateData($kos_id, $data) {
    //     $this -> db -> table('tbl_kos') -> where('kos_id', $kos_id) -> update($data);
    // }

    // public function deleteData($kos_id) {
    //     $this -> db -> table('tbl_kos') -> where('kos_id', $kos_id) -> delete();
    // }
    
    
}