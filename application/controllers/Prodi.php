<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prodi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();

        $this->load->model('Admin_model', 'admin');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = " Data Program Study";
        $data['prodi'] = $this->admin->get('prodi');
        $this->template->load('templates/dashboard', 'prodi/data', $data);
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('nama_prodi', 'Nama Prodi', 'required|trim');
    }

    public function add()
    {
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "Program Study";
            $this->template->load('templates/dashboard', 'prodi/add', $data);
        } else {
            $input = $this->input->post(null, true);
            $insert = $this->admin->insert('prodi', $input);
            if ($insert) {
                set_pesan('data berhasil disimpan');
                redirect('prodi');
            } else {
                set_pesan('data gagal disimpan', false);
                redirect('prodi/add');
            }
        }
    }

    public function edit($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "Edit Program Study";
            $data['prodi'] = $this->admin->get('prodi', ['id_jurusan' => $id]);
            $this->template->load('templates/dashboard', 'prodi/edit', $data);
        } else {
            $input = $this->input->post(null, true);
            $update = $this->admin->update('prodi', 'id_jurusan', $id, $input);
            if ($update) {
                set_pesan('data berhasil disimpan');
                redirect('prodi');
            } else {
                set_pesan('data gagal disimpan', false);
                redirect('prodi/add');
            }
        }
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->admin->delete('prodi', 'prodi', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('prodi');
    }
}
