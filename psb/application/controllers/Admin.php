<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Table_model');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Dashboard';
        $data['calon_siswa'] = $this->Table_model->getAllSiswa();


        $this->load->view('templates/table_header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/table_footer');
    }

    public function viewMember()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Data Calon Siswa Baru';
        $data['calon_siswa'] = $this->Table_model->getAllSiswa();

        $this->load->view('templates/table_header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('table/table_member', $data);
        $this->load->view('templates/table_footer');
    }

    public function tambah()
    {
        $data['calon_siswa'] = $this->Table_model->getAllSiswa();

        $this->form_validation->set_rules('nama_siswa', 'Nama', 'required|trim');
        $this->form_validation->set_rules('nis', 'NIS', 'required|trim');
        $this->form_validation->set_rules('asal', 'Asal Sekolah', 'required|trim');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');


        if ($this->Table_model->tableTambah($_POST) > 0) {
            redirect('admin');
            $this->Table_model->tableTambah();
        } else {

            $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Data Added<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect('admin');
        }
    }

    public function hapus($id)
    {
        $this->Table_model->hapusDataSiswa($id);
        $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert">Data Removed<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button></div>');
        redirect('admin');
    }

    public function ubah()
    {

        if ($this->Table_model->ubahDataSiswa($_POST) > 0) {
            $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert">Data Change Failed<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('admin');
        } else {
            $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Data Changed<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
            $this->Table_model->ubahDataSiswa();
            redirect('admin');
        }
    }
    public function getubah()
    {
        echo json_encode($this->Table_model->getSiswaById($_POST['id']));
    }
}
