<?php
defined('BASEPATH') or exit('No direct script access allowed');

class review extends CI_Controller
{
    public function __construct()
    { 
        parent ::__construct();
        $this->load->model('review_model');
    }

    public function index()
    {
        $this->form_validation->set_rules('nama', 'Nama Pembeli', 'required', [
            'required' => 'Nama Pembeli harus di isi'
        ]);
        $this->form_validation->set_rules('nhp', 'Nomor HP', 'required', [
            'required' => 'Nomor HP harus di isi'
        ]);
        if ($this->form_validation->run() == false) {
            $data['merk'] = ['Nike', 'Adidas', 'Kichers', 'Eiger', 'Bucherri'];
            $this->load->view('Review/v_input', $data);
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'nhp' => $this->input->post('nhp'),
                'merk' => $this->input->post('merk'),
                'ukuran' => $this->input->post('ukuran'),
                'harga' => $this->review_model->proses($this->input->post('merk'))
            ];
           
            $this->load->view('Review/v_output', $data);
        }
    }
}
