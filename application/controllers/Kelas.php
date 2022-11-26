<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Agama extends CI_Controller
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
        $data['title'] = "Data Agama";
        $data['agama'] = $this->admin->get('agama');
        $this->template->load('templates/dashboard', 'agama/data', $data);
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('agama', 'Nama agama', 'required|trim');
    }

    public function add()
    {
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "Tambah Agama";
            $this->template->load('templates/dashboard', 'agama/add', $data);
        } else {
            $input = $this->input->post(null, true);
            $insert = $this->admin->insert('agama', $input);
            if ($insert) {
                set_pesan('data berhasil disimpan');
                redirect('agama');
            } else {
                set_pesan('data gagal disimpan', false);
                redirect('agama/add');
            }
        }
    }

    public function edit($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "Edit Agama";
            $data['agama'] = $this->admin->get('agama', ['id_agama' => $id]);
            $this->template->load('templates/dashboard', 'agama/edit', $data);
        } else {
            $input = $this->input->post(null, true);
            $update = $this->admin->update('agama', 'id_agama', $id, $input);
            if ($update) {
                set_pesan('data berhasil disimpan');
                redirect('agama');
            } else {
                set_pesan('data gagal disimpan', false);
                redirect('agama/add');
            }
        }
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->admin->delete('agama', 'id_agama', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('agama');
    }
}
