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

        $model = new \App\Models\QuoteModel();

        $validate = $this->validate([
            'quote' => 'required',
            'author' => 'required',
            'active' => 'required|in_list[0,1]'
        ]);

        if (!$validate) {
            return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
        }

        $active = $this->request->getPost('active');

        // deactivate all if setting a new one as active
        if ($active == '1') {
            $model->where('active', 1)->set(['active' => 0])->update();
        }

        $saved = $model->save([
            'quote' => $this->request->getPost('quote'),
            'author' => $this->request->getPost('author'),
            'active' => $active,
        ]);

        if ($saved) {
            session()->setFlashdata('success', 'Quote successfully added!');
        } else {
            session()->setFlashdata('error', $model->errors());
        }

        return redirect()->back();
    }

    public function quote_update()
    {
        if (session('role') != 1 || session('role') == null) {
            return redirect()->to('/');
        }

        $model = new \App\Models\QuoteModel();

        $validate = $this->validate([
            'quote' => 'required',
            'author' => 'required',
            'active' => 'required|in_list[0,1]'
        ]);

        if (!$validate) {
            return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
        }

        $id = $this->request->getPost('id');
        $quoteText = $this->request->getPost('quote');
        $author = $this->request->getPost('author');
        $active = $this->request->getPost('active');

        // if user selects active = 1, set all others to inactive first
        if ($active == '1') {
            $model->where('active', 1)->set(['active' => 0])->update();
        }

        // update the current quote
        $updated = $model->update($id, [
            'quote' => $quoteText,
            'author' => $author,
            'active' => $active,
        ]);

        if ($updated) {
            session()->setFlashdata('success', 'Quote successfully updated!');
        } else {
            session()->setFlashdata('error', 'Failed to update quote.');
        }

        return redirect()->back();
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
