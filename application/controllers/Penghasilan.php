<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penghasilan extends CI_Controller
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
        $data['title'] = "Data Penghasilan";
        $data['penghasilan'] = $this->admin->get('tbl_penghasilan');
        $this->template->load('templates/dashboard', 'penghasilan/data', $data);
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('penghasilan', 'Nama penghasilan', 'required|trim');
    }

    public function add()
    {
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "Tambah Penghasilan";
            $this->template->load('templates/dashboard', 'penghasilan/add', $data);
        } else {
            $input = $this->input->post(null, true);
            $insert = $this->admin->insert('tbl_penghasilan', $input);
            if ($insert) {
                set_pesan('data berhasil disimpan');
                redirect('penghasilan');
            } else {
                set_pesan('data gagal disimpan', false);
                redirect('penghasilan/add');
            }
        }
    }

    public function edit($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "Edit Penghasilan";
            $data['penghasilan'] = $this->admin->get('penghasilan', ['id_penghasilan' => $id]);
            $this->template->load('templates/dashboard', 'penghasilan/edit', $data);
        } else {
            $input = $this->input->post(null, true);
            $update = $this->admin->update('penghasilan', 'id_penghasilan', $id, $input);
            if ($update) {
                set_pesan('data berhasil disimpan');
                redirect('penghasilan');
            } else {
                set_pesan('data gagal disimpan', false);
                redirect('penghasilan/add');
            }
        }
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->admin->delete('penghasilan', 'id_penghasilan', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('penghasilan');
    }
}
