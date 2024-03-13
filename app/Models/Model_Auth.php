<?php 
namespace App\Models;

use CodeIgniter\Model;

class Model_Auth extends Model 
{
    public function save_register($data) {
        $this -> db -> table('users') -> insert($data);
    }

    public function cek_login($email, $password) {
        return $this -> db -> table('users') -> where([
            'email' => $email,
            'password' => $password,
        ]) -> get() -> getRowArray();
    }

    public function getLevelName($levelId) {
        return $this->db->table('user_level')->where('id', $levelId)->get()->getRowArray()['nama'];
    }
    
}