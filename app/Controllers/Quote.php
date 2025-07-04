<?php

namespace App\Controllers;

use App\Models\QuoteModel;

class Quote extends BaseController
{
    public function index()
    {
        if (session('role') != 1 || session('role') == null) {
            return redirect()->to('/');
        }

        $model = new QuoteModel();
        $data['quotes'] = $model->findAll();
        $data['title'] = "quote";

        return view('admin/quote/quote_data.php', $data);
    }

    public function edit($id)
    {
        if (session('role') != 1 || session('role') == null) {
            return redirect()->to('/');
        }

        $model = new QuoteModel();
        $data['quote'] = $model->where('id', $id)->first();
        $data['title'] = "quote";

        return view('admin/quote/edit.php', $data);
    }

    public function tambah()
    {
        if (session('role') != 1 || session('role') == null) {
            return redirect()->to('/');
        }

        $data['title'] = "quote";
        return view('admin/quote/tambah.php', $data);
    }

    public function quote_input()
    {
        if (session('role') != 1 || session('role') == null) {
            return redirect()->to('/');
        }

        $model = new QuoteModel();
        $validate = $this->validate([
            'quote' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Quote Harus Di isi!!!'
                ]
            ],
            'author' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Author Harus Di isi!!!'
                ]
            ]
        ]);

        if (!$validate) {
            return redirect()->back()->withInput();
        }

        $data = [
            'quote'  => $this->request->getPost('quote'),
            'author' => $this->request->getPost('author'),
            'active' => $this->request->getPost('active') ?? 1
        ];

        if ($model->save($data)) {
            session()->setFlashdata("success", "Quote berhasil ditambahkan!");
            return redirect()->to('/quote');
        } else {
            session()->setFlashdata("error", $model->errors());
            return redirect()->back();
        }
    }

    public function quote_update()
    {
        if (session('role') != 1 || session('role') == null) {
            return redirect()->to('/');
        }

        $model = new QuoteModel();
        $validate = $this->validate([
            'quote' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Quote Harus Di isi!!!'
                ]
            ],
            'author' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Author Harus Di isi!!!'
                ]
            ]
        ]);

        if (!$validate) {
            return redirect()->back()->withInput();
        }

        $id = $this->request->getPost('id');

        $update = $model->update($id, [
            'quote'  => $this->request->getPost('quote'),
            'author' => $this->request->getPost('author'),
            'active' => $this->request->getPost('active') ?? 1
        ]);

        if ($update) {
            session()->setFlashdata("success", "Quote berhasil diperbarui!");
            return redirect()->to('/quote');
        } else {
            session()->setFlashdata("error", $model->errors());
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        if (session('role') != 1 || session('role') == null) {
            return redirect()->to('/');
        }

        $model = new QuoteModel();
        if ($model->delete($id)) {
            session()->setFlashdata('success', 'Quote berhasil dihapus!');
        } else {
            session()->setFlashdata('error', 'Gagal menghapus quote.');
        }

        return redirect()->to('/quote');
    }
}
