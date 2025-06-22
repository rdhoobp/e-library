<?php

namespace App\Controllers;
use App\Models\UserModel;
class Home extends BaseController
{
	public function index()
	{
		return view('tampilan/main_page');
	}
	public function login()
	{
		return view('tampilan/login.php');
	}
	public function register()
	{
		return view('tampilan/register.php');
	}
	public function usersetting($id){
		if(session('id')!=$id){
			echo"ID tidak sesuai";exit;
		}else{
			$model = new UserModel();
			$data['data'] = $model->where('id_user',$id)->first();
			return view('tampilan/user_setting.php',$data);
		}
	}
	public function change_password(){
		$model = new UserModel();
		if(session('id')!=null){
			$data['data'] = $model->where('id_user',session('id'))->first();
			
		}else{
			$data['data'] = null;
		}
		return view('tampilan/change_password.php',$data);
	}
	public function userupdate(){

	}
	public function passwordupdate(){
		$model = new UserModel();
		$email = $this->request->getVar('email');
		$validate = $this->validate([
				'email' => [
					'rules' => 'required',
					'errors' => [
						'required' => 'Kolom Email Harus Di isi!!!',
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
		$data['data'] = $model->where('email',$email)->first();
		$model->update($email,[
			"password" => $this->request->getVar('password')
		]);
		session()->setFlashdata("success","Password Berhasil Di ganti!");
		return redirect()->back();
	}
}
