<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\BookModel;
use App\Models\GenreModel;

class Home extends BaseController
{
	public function index()
	{
		$model = new BookModel();
		$data['book'] = $model->findAll();
		return view('tampilan/main_page',$data);
	}
	public function login()
	{
		return view('tampilan/login.php');
	}
	public function register()
	{
		return view('tampilan/register.php');
	}
	public function usersetting($id)
	{
		if (session('id') != $id) {
			echo "ID tidak sesuai";
			exit;
		} else {
			$model = new UserModel();
			$data['data'] = $model->where('id_user', $id)->first();
			return view('tampilan/user_setting.php', $data);
		}
	}
	public function change_password()
	{
		$model = new UserModel();
		if (session('id') != null) {
			$data['data'] = $model->where('id_user', session('id'))->first();
		} else {
			$data['data'] = null;
		}
		return view('tampilan/change_password.php', $data);
	}
	public function userupdate()
	{
		$model = new UserModel();
		$data = $this->request->getVar(['name', 'username', 'id']);
		$nama_file = $_FILES['profile']['name'];
		$img = $this->request->getFile('profile');
		//var_dump($nama_file);exit;
		if ($nama_file != "") {
			$validate = $this->validate([
				'username' => [
					'rules' => "required|is_unique[user.username,id,{$data['username']}]",
					'errors' => [
						'required' => 'Kolom Username Harus Di isi!!',
						'is_unique' => 'Username sudah terdaftar!! Harap gunakan username lain!!!'
					]
				],
				'name' => [
					'rules' => 'required',
					'errors' => [
						'required' => 'Kolom Nama Harus Di isi!!!'
					]
				],
				'profile' => [
					'label' => 'Image File',
					'rules' => [
						'uploaded[profile]',
						'is_image[profile]',
						'mime_in[profile,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
						'max_size[profile,100]',
						'max_dims[profile,1024,768]',
					],
				],
			]);
		} else {
			$validate = $this->validate([
				'username' => [
					'rules' => "required|is_unique[user.username,id,{$data['username']}]",
					'errors' => [
						'required' => 'Kolom Username Harus Di isi!!',
						'is_unique' => 'Username sudah terdaftar!! Harap gunakan username lain!!!'
					]
				],
				'name' => [
					'rules' => 'required',
					'errors' => [
						'required' => 'Kolom Nama Harus Di isi!!!'
					]
				]
			]);
		}
		if (!$validate) {
			return redirect()->back()->withInput();
		}
		if (! $img->hasMoved()) {
			$img->move(ROOTPATH . 'public\asset\img\avatar');
			$model->where('id_user', $data['id'])->set([
				'img' => $nama_file,
				'username' => $data['username'],
				'name' => $data['name']
			])->update();
			session()->setFlashdata("success", "Akun Anda Berhasil Di ganti!");
			return redirect()->back();
		} else {
			session()->setFlashdata("error", "file dengan nama tersebut telah ada,harap ubah nama file!!!");
			return redirect()->back();
		}
	}
	public function session_terminate()
	{
		$session = session();
		$session->destroy();
		return redirect()->to(base_url(''));
	}
	public function book()
	{
		$bookModel = new BookModel();
		$data['books'] = $bookModel->paginate(16);
		$data['pager'] = $bookModel->pager;
		$data['title'] = "Library";
		return view('tampilan/book.php', $data);
	}

	public function book_detail($id)
	{
		$genre = new GenreModel();
		$model = new BookModel();
		$data['genre'] = $genre->findAll();
		$data['data'] = $model->where('book_id', $id)->first();
		return view('tampilan/book_detail.php',$data);
	}
	public function passwordupdate()
	{
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
			'password_confirm' => [
				'rules' => 'required|matches[password]',
				'errors' => [
					'matches' => 'Password yang anda masukkan tidak sama!!'
				]
			]
		]);
		if (!$validate) {
			return redirect()->back()->withInput();
		}
		$password = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);

		$model->where('email', $email)->set([
			'password' => $password
		])->update();
		session()->setFlashdata("success", "Password Berhasil Di ganti!");
		return redirect()->back();
	}
}
