<?php

namespace App\Controllers;
use App\Models\UserModel;

class Auth extends BaseController
{
	protected $model;

	public function __construct()
	{
		$this->model = new UserModel();
		$this->helpers = ['form','url'];
	}

	public function index()
	{
		return view('tampilan/login.php');
	}
	public function login()
	{
		return view('tampilan/login.php');
	}
	public function register()
	{
		return view('tampilan/register.php');
	}
	public function auth(){
		$session = session();
		$email = $this->request->getVar('email');
		$password = $this->request->getVar('password');
		//$password = password_hash($pasword,PASSWORD_DEFAULT);
		$data = $this->model->where('email',$email)->first();
		if($data){
			$pass = $data['password'];
			$verify_pass = password_verify($password,$pass);
			if($verify_pass){
				$ses_data = [
					'id' => $data['id_user'],
					'name' => $data['name'],
					'email' => $data['email'],
					'username' => $data['username'],
					'role' => $data['role']
				];
				$session->set($ses_data);
				return redirect()->to('/');
			}else{
				$session->setFlashdata("error","Password Salah!!");
				return redirect()->back();
			}
		}else{
			$session->setFlashdata("error","Email tidak ditemukan!!");
			return redirect()->back();
		}
	}
	public function register_submit()
	{
		$validate = $this->validate([
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
						'min_length' => 'Password yang dimasukan terlalu pendek!! Minimal terdapat 8 kata'
					]
				],
				'password_confirm'=>[
					'rules' => 'required|matches[password]',
					'errors' => [
						'matches' => 'Password yang anda masukkan tidak sama!!'
					]
				]
			]);
		if(!$validate){
			return redirect()->back()->withInput();
		}
		$data = $this->request->getPost(['name','username','email','password']);
		$save = $this->model->save($data);
		if($save){
			session()->setFlashdata("success","Register Berhasil!");
			return redirect()->to(base_url('login'));
		}else{
			session()->setFlashdata("error",$this->model->errors());
			return redirect()->back();
		}
	}
}

