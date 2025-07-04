<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\BookModel;
use App\Models\GenreModel;
use App\Models\QuoteModel;

class Home extends BaseController
{
	public function index()
	{
		$bookModel = new BookModel();
		$quoteModel = new QuoteModel();
		// $genreModel = new GenreModel();
		$data['book'] = $bookModel->orderBy('hit_counter', 'DESC')->findAll();
		$bookModel = new BookModel();
		$data['best_selling'] = $bookModel->orderBy('hit_counter', 'DESC')->first();
		$data['book_in_general'] = $bookModel->orderBy('hit_counter', 'ASC')->findAll(4);
		$data['book_on_the_rise'] = $bookModel->orderBy('hit_counter', 'DESC')->findAll(4);
		$data['book_genres'] = $bookModel->orderBy('hit_counter', 'DESC')->findAll();
		$data['quotes'] = $quoteModel->findAll();
		$data['genre'] = $bookModel->join('genre', 'genre.genre_id = book.genre_id')->groupBy('name')->findAll();
		// var_dump($data['genre']);
		// exit;
		return view('tampilan/main_page', $data);
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
			return redirect()->to('/');
		} else {
			$model = new UserModel();
			$data['data'] = $model->where('id_user', $id)->first();
			return view('tampilan/user_setting.php', $data);
		}
	}
	public function change_password()
	{
		if (session('id') == null) {
			return redirect()->to('/');
		}
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
		$model = new \App\Models\UserModel();
		$id = $this->request->getPost('id');

		// Get existing user
		$user = $model->find($id);
		if (!$user) {
			session()->setFlashdata('error', 'User not found.');
			return redirect()->to('/user/settings/' . $id);
		}

		$username = $this->request->getPost('username');
		$name     = $this->request->getPost('name');
		$img      = $this->request->getFile('profile');

		// Base validation rules
		$rules = [
			'name' => 'required'
		];

		// Only check is_unique if username has changed
		if ($username !== $user['username']) {
			$rules['username'] = 'required|is_unique[user.username]';
		} else {
			$rules['username'] = 'required';
		}

		// File validation
		if ($img && $img->isValid() && !$img->hasMoved()) {
			$rules['profile'] = [
				'rules' => 'is_image[profile]|mime_in[profile,image/jpg,image/jpeg,image/png,image/webp]|max_size[profile,2048]',
				'errors' => [
					'is_image' => 'File harus berupa gambar.',
					'mime_in'  => 'Format gambar tidak didukung.',
					'max_size' => 'Ukuran maksimum gambar adalah 2MB.'
				]
			];
		}

		// Validate
		if (!$this->validate($rules)) {
			return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
		}

		// Prepare data
		$data = [
			'username' => $username,
			'name'     => $name
		];

		// Handle image upload
		if ($img && $img->isValid() && !$img->hasMoved()) {
			$imgName = $img->getClientName();
			$img->move('asset/img/avatar', $imgName);
			$data['img'] = $imgName;

			// Delete old image
			if (!empty($user['img']) && $user['img'] !== 'default.jpg') {
				$oldPath = 'asset/img/avatar/' . $user['img'];
				if (file_exists($oldPath)) {
					unlink($oldPath);
				}
			}
		}

		$model->update($id, $data);
		session()->setFlashdata('success', 'Akun berhasil diperbarui.');
		return redirect()->to('/user/settings/' . $id);
	}
	public function deleteAccount()
	{
		$id = session()->get('id');
		$password = $this->request->getPost('password');
		$model = new \App\Models\UserModel();

		$user = $model->find($id);
		if (!$user) {
			session()->setFlashdata('error', 'User tidak ditemukan.');
			return redirect()->back();
		}

		// Check password
		if (!password_verify($password, $user['password'])) {
			session()->setFlashdata('error', 'Password salah. Akun tidak dihapus.');
			return redirect()->back();
		}

		// Delete image (optional)
		if (!empty($user['img']) && $user['img'] !== 'default.jpg') {
			$imgPath = 'asset/img/avatar/' . $user['img'];
			if (file_exists($imgPath)) {
				unlink($imgPath);
			}
		}

		$model->delete($id);
		session()->destroy(); // logout
		session()->setFlashdata('success', 'Akun berhasil dihapus.');
		return redirect()->to('/');
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
	public function book_cari()
	{
		$model = new BookModel();
		$judul = $this->request->getVar('judul');
		$data['books'] = $model->like('title', $judul)->paginate(16);
		$data['pager'] = $model->pager;
		$data['title'] = "Library";
		return view('tampilan/cari_book.php', $data);
	}
	public function book_detail($id)
	{
		if (session('id') != null) {
			$genre = new GenreModel();
			$model = new BookModel();
			$data['genre'] = $genre->findAll();
			$data['data'] = $model->where('book_id', $id)->first();
			$counter = (int)$data['data']['hit_counter'];
			$count = $counter + 1;
			$model->where('book_id', $id)->set(['hit_counter' => $count])->update();
			return view('tampilan/book_detail.php', $data);
		} else {
			session()->setFlashdata("error", "Anda Harus Login Terlebih Dahulu!!!");
			return redirect()->to(base_url('login'));
		}
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
