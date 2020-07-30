<?php

class Table_model extends CI_Model
{
    public function getAllSiswa()
    {
        return $this->db->get('calon_siswa')->result_array();
    }

    public function tableTambah()
    {
        $data = [
            'nama_siswa' => $this->input->post('nama_siswa'),
            'nis' => $this->input->post('nis'),
            'asal' => $this->input->post('asal'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'alamat' => $this->input->post('alamat')

        ];

        $this->db->insert('calon_siswa', $data);
    }

    public function hapusDataSiswa($id)
    {
        $this->db->where('id_siswa', $id);
        $this->db->delete('calon_siswa');
    }

    public function getSiswaById($id)
    {
        return $this->db->get_where('calon_siswa', ['id_siswa' => $id])->row_array();
    }

    public function ubahDataSiswa()
    {
        $data = [
            'nama_siswa' => $this->input->post('nama_siswa'),
            'nis' => $this->input->post('nis'),
            'asal' => $this->input->post('asal'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'alamat' => $this->input->post('alamat')
        ];

        $this->db->where('id_siswa', $this->input->post('id'));
        $this->db->update('calon_siswa', $data);
    }
}
