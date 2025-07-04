<?php

namespace App\Controllers;

use App\Models\BookModel;
use App\Models\GenreModel;

class Book extends BaseController
{
    public function index()
    {
        if (session('role') != 1 || session('role') == null) {
            return redirect()->to('/');
        }
        $model = new BookModel();
        $genre = new GenreModel();
        $data['book'] = $model->findAll();
        $data['genre'] = $genre->findAll();
        $data['title'] = "book";
        return view('admin/book/book_data.php', $data);
    }
    public function edit($id)
    {
        if (session('role') != 1 || session('role') == null) {
            return redirect()->to('/');
        }
        $genre = new GenreModel();
        $model = new BookModel();
        $data['book'] = $model->where('book_id', $id)->first();
        $data['genre'] = $genre->findAll();
        $data['title'] = "book";
        return view('admin/book/edit.php', $data);
    }
    public function tambah()
    {
        if (session('role') != 1 || session('role') == null) {
            return redirect()->to('/');
        }
        $genre = new GenreModel();
        $data['genre'] = $genre->findAll();
        $data['title'] = "book";
        return view('admin/book/tambah.php', $data);
    }

    public function book_input()
    {
        if (session('role') != 1 || session('role') == null) {
            return redirect()->to('/');
        }

        $model = new BookModel();

        $validate = $this->validate([
            'title' => [
                'rules' => 'required|is_unique[book.title]',
                'errors' => [
                    'required' => 'Kolom Title Harus Di isi!',
                    'is_unique' => 'Title sudah terdaftar!'
                ]
            ],
            'author' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Author Harus Di isi!',
                ]
            ],
            'genre_id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Genre harus dipilih!'
                ]
            ],
            'publisher' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Publisher harus Di isi!'
                ]
            ],
            'isbn' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'ISBN harus Di isi!'
                ]
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi harus Di isi!'
                ]
            ],
            'sinopsis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Sinopsis harus Di isi!'
                ]
            ],
            'pdf' => [
                'rules' => 'uploaded[pdf]|mime_in[pdf,application/pdf]|max_size[pdf,10240]',
                'errors' => [
                    'uploaded' => 'PDF must be uploaded.',
                    'mime_in' => 'File must be a PDF.',
                    'max_size' => 'PDF max size is 10MB.'
                ]
            ],
            'cover' => [
                'rules' => 'uploaded[cover]|mime_in[cover,image/jpg,image/jpeg,image/png]|max_size[cover,2048]',
                'errors' => [
                    'uploaded' => 'Cover harus diunggah!',
                    'mime_in' => 'Tipe file cover harus berupa gambar (jpg/jpeg/png)',
                    'max_size' => 'Ukuran gambar terlalu besar. Maks 2MB',
                ]
            ]
        ]);

        if (!$validate) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $pdfFile = $this->request->getFile('pdf');
        $pdfName = $pdfFile->getClientName();

        $coverFile = $this->request->getFile('cover');
        $coverName = $coverFile->getClientName();

        $pdfFile->move('asset/pdf/', $pdfName);
        $coverFile->move('asset/img/book_cover/', $coverName);

        $data = [
            'title'     => $this->request->getPost('title'),
            'author'    => $this->request->getPost('author'),
            'genre_id'  => $this->request->getPost('genre_id'),
            'publisher' => $this->request->getPost('publisher'),
            'isbn' => $this->request->getPost('isbn'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'sinopsis' => $this->request->getPost('sinopsis'),
            'cover'     => $coverName,
            'pdf' => $pdfName
        ];
        // var_dump($data);
        // exit;

        $save = $model->save($data);
        if ($save) {
            session()->setFlashdata("success", "Book added successfully!");
            return redirect()->to('/book');
        } else {
            session()->setFlashdata("error", $model->errors());
            return redirect()->back()->withInput();
        }
    }

    public function book_update($id)
    {
        if (session('role') != 1 || session('role') == null) {
            return redirect()->to('/');
        }

        $model = new BookModel();

        // Get the old book data
        $book = $model->find($id);
        if (!$book) {
            session()->setFlashdata("error", "Book not found.");
            return redirect()->to('/book/index');
        }

        // Validate input
        $validationRules = [
            'title' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'genre_id' => 'required',
            'isbn' => 'required',
            'deskripsi' => 'required',
            'sinopsis' => 'required',
            'cover' => [
                'rules' => 'if_exist|mime_in[cover,image/jpg,image/jpeg,image/png]|max_size[cover,2048]',
                'errors' => [
                    'mime_in' => 'Cover must be a valid image (jpg, jpeg, png).',
                    'max_size' => 'Max size is 2MB.'
                ]
            ],
            'pdf' => [
                'rules' => 'if_exist|mime_in[pdf,application/pdf]|max_size[pdf,10240]',
                'errors' => [
                    'mime_in' => 'File must be a PDF.',
                    'max_size' => 'PDF max size is 10MB.'
                ]
            ]

        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'title'     => $this->request->getPost('title'),
            'author'    => $this->request->getPost('author'),
            'publisher' => $this->request->getPost('publisher'),
            'genre_id'  => $this->request->getPost('genre_id'),
            'isbn'      => $this->request->getPost('isbn'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'sinopsis' => $this->request->getPost('sinopsis'),
        ];

        $coverFile = $this->request->getFile('cover');
        if ($coverFile && $coverFile->isValid() && !$coverFile->hasMoved()) {
            $coverName = $coverFile->getClientName();
            $coverFile->move('asset/img/book_cover/', $coverName);
            $data['cover'] = $coverName;

            $oldCoverPath = 'asset/img/book_cover/' . $book['cover'];
            if (is_file($oldCoverPath)) {
                unlink($oldCoverPath);
            }
        }

        $pdfFile = $this->request->getFile('pdf');
        if ($pdfFile && $pdfFile->isValid() && !$pdfFile->hasMoved()) {
            $pdfName = $pdfFile->getClientName();
            $pdfFile->move('asset/pdf/', $pdfName);
            $data['pdf'] = $pdfName;

            $oldPdfPath = 'asset/pdf/' . $book['pdf'];
            if (is_file($oldPdfPath)) {
                unlink($oldPdfPath);
            }
        }

        $model->update($id, $data);

        session()->setFlashdata("success", "Book updated successfully.");
        return redirect()->to('/book');
    }
    public function book_delete($id)
    {
        if (session('role') != 1 || session('role') == null) {
            return redirect()->to('/');
        }

        $model = new BookModel();
        $book = $model->find($id);

        if (!$book) {
            session()->setFlashdata("error", "Book not found.");
            return redirect()->to('/book');
        }

        // Delete cover if exists
        $coverPath = 'asset/img/book_cover/' . $book['cover'];
        if (is_file($coverPath)) {
            unlink($coverPath);
        }

        // Delete PDF if exists
        $pdfPath = 'asset/pdf/' . ($book['pdf'] ?? '');
        if (!empty($book['pdf']) && is_file($pdfPath)) {
            unlink($pdfPath);
        }

        // Delete the book record
        $model->delete($id);

        session()->setFlashdata("success", "Book deleted successfully.");
        return redirect()->to('/book');
    }
}
