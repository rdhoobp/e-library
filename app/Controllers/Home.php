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
		$data['data'] = $model->where('email',$email)->first();
		var_dump($data['data']);exit;
	}
}
