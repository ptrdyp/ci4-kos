<?php 
namespace App\Models;

use CodeIgniter\Model;

class Model_Kos extends Model 
{

    public function getAllData() {
        return $this->db->table('area_fakultas')->get()->getResultArray();  
    }

    public function saveFakultas($data) {
        $this -> db -> table('area_fakultas') -> insert($data);
    }

    public function detailFakultas($id_fakultas) {
        return $this -> db -> table('area_fakultas') -> where('id_fakultas', $id_fakultas) -> get() -> getRowArray();
    }

    public function updateData($id_fakultas, $data) {
        $this -> db -> table('area_fakultas') -> where('id_fakultas', $id_fakultas) -> update($data);
    }

    public function deleteData($id_fakultas) {
        $this -> db -> table('area_fakultas') -> where('id_fakultas', $id_fakultas) -> delete();
    }
    
    
}