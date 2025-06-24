<?php
namespace App\Models;
use CodeIgniter\Model;
class UserModel extends Model
{
    protected $table = 'user';
    protected $allowedFields = ['id_user','name','username','email','password','role','img','created_at','updated_at'];
    protected $useTimeStamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $validationRules = [
        'name' => [
            'rules' => 'required',
            'errors' =>[
                'required'=>'Kolom Nama Harus Di isi!!!'
            ]
        ],
        'username' => [
            'rules' => 'required|is_unique[user.username]',
            'errors' => [
                'required' => 'Kolom Username Harus Di isi!!!',
                'is_unique' => 'Username sudah terdaftar!! Harap gunakan username lain!!!'
            ]
        ],
        'email' => [
            'rules' => 'required|valid_email|is_unique[user.email]',
            'errors' => [
                'required' => 'Kolom Email Harus Di isi!!!',
                'is_unique' => 'Akun email sudah terdaftar!! Harap gunakan akun email lain!!!'
            ]
        ],
        'password' => [
            'rules' => 'required|min_length[8]',
            'errors' => [
                'min_length[8]' => 'Password yang dimasukan terlalu pendek!! Minimal terdapat 8 kata'
            ]
        ]
    ];
    protected $skipValidation = false;
    protected $beforeInsert = ['hashPassword'];
    protected function hashPassword(array $data)
    {
        if(!isset($data['data']['password'])){
            return $data;
        }
        $data['data']['password'] = password_hash($data['data']['password'],PASSWORD_DEFAULT);
        return $data;
    }
}